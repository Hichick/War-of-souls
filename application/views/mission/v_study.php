  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>
           
			<div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Обучающие миссии </span></div>
                    
          </div>
       
          </div>
          
           <br>
           
           
            <?php foreach ($missions as $mission):?>
            
            <?php echo form_open("mission/status");?>
          
          <input name="Miss_id" type="hidden" value="<?=$mission['Miss_id'];?>">
          <input name="Char_id" type="hidden" value="<?=$character['id_char'];?>">
            
           <div class="block_for_news">
            <table width="690" border="0" cellspacing="0" cellpadding="0" style="font-family:Verdana; font-size:11px; padding: 5px;">
          <tr>
          <td style="width:340px; padding: 3px;" valign="top"> <b><?=$mission['Miss_Title'];?></b><hr>
             <?=$mission['Miss_Text'];?>
             
             </td>
			
			<td style="120px;" align="center" ><?=$mission['Miss_Time'];?>  </td>
			
            <td style="120px;" align="center" >Требования  </td>
			
			
			
			
            <td style="120px;" align="center">
            
            <?php
            
            if ($mission['Status'] == 1)
            {
                print('<input class="button2" type="button" value="Выполнено">');
            }else
            {
                print('<input class="button2" type="submit" name="accept_mission" value="Принять">');
            }
	
            ?>
            
            </td>
          </tr>
        </table>
           </div>
           
           <?php echo form_close();?>
             <br>
           <?php endforeach;?>
           
           
          </div>
          
          
         
          </td>
        </tr>
</table>
