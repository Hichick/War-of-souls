  <input name="Miss_Com_id" type="hidden" value="<?=$mission_status['Miss_Com_id'];?>" />
  <input name="Miss_Char" type="hidden" value="<?=$mission_status['Miss_Char'];?>" />
  <input name="Miss_End" type="hidden" value="<?=$mission_status['Miss_End'];?>" />
  
  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>
           
			<div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Статус миссии: <?=$mission['Miss_Title'];?> </span></div>
          
          Осталось до конца миссии: <p id="mission_timer" style="font-family:Arial; font-size:16px; color:#FFF; font-style:italic;"></p>
          
          <div id="info_mission" align="center"></div>  <br>      
          
          </div>
       
          </div>
          
           <br>
           
           
          <script type="text/javascript">
           <?php
            
           // Записываем скилы в javascript
           
           print ("
           var base_url = \"".base_url()."\";");
           
           ?>
           
           </script>
            
           <div class="block_for_news">
           
           <?=$mission['Miss_Content'];?>
        
           </div>
           
  
           
           
          </div>
          
          
         
          </td>
        </tr>
</table>
