<script type="text/javascript">

$(document).ready(function() {

$("[id='map_object']").easyTooltip();

});

</script>


<script type="text/javascript" > 
              
            var base_url = "<?=base_url();?>";
            
</script>

  
  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>
           
			<div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Общество Душ </span></div>
                    
          </div>
       
          </div>
          
           <br>
           
           <?php
           
           if ($character['Location'] == 1)
           {
             $Location_image = "soul_map.png"; // если мир Сейретей
             
           }else if ($character['Location'] == 2)
           {
            
             $Location_image = "rukongai_main.png"; // если мир Руконгай
           
           }
	
            ?>
           
           <div style="width:700px; height:394px; background-image:url(<?= base_url();?>img/world_map/<?=$Location_image;?>); background-repeat:no-repeat;"> 
           
           <?php foreach ($world as $building):?>
          
          
          <?php
          
          if ($character['Building'] == $building['Building_id']) // Если локация в которой игрок
				{
					print("<div id=\"map_object\" style=\"width:".$building['Building_Width']."px; height:".$building['Building_Height']."px; background-image:url(".base_url()."img/world_map/".$building['Building_Image']."); background-repeat:no-repeat; margin-top:".$building['Building_Y']."px; margin-left:".$building['Building_X']."px; position:absolute;\" title=\"");
				
				print("<div align='center' class='info_skill_full'>
					 ".$building['Building_Name']."<br>
					<img class='map_img' src='".base_url()."img/other/polosa3.png' width='160' height='3' ><br>
					Вы здесь!
					</div>");
				
				print("\">  
				<img src=\"".base_url()."img/world_map/shinigami.png\" width=\"50\" height=\"56\"/>
				</div>");
				
				}else // Инача, Если локация в которой игрок
				{
				
				print("<div id=\"map_object\" style=\"cursor: pointer;width:".$building['Building_Width']."px; height:".$building['Building_Height']."px; background-image:url(".base_url()."img/world_map/".$building['Building_Image']."); background-repeat:no-repeat; margin-top:".$building['Building_Y']."px; margin-left:".$building['Building_X']."px; position:absolute;\" onclick=\"Move_To(".$building['Building_World'].",".$building['Building_id'].",".$character['id_char'].")\" title=\"");
				
				print("<div align='center' class='info_skill_full'>
					 ".$building['Building_Name']."<br>
					<img src='".base_url()."img/other/polosa3.png' width='160' height='3' >
				
					</div>");
                    
                print("\"></div>");
				
				}
          
          
          ?>
          
          <?php endforeach;?>
           
           
           </div>
           
            
           
           
           
          </div>
          
          
         
          </td>
        </tr>
</table>
