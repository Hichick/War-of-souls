  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>
           
			<div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> <?=$building['Building_Name'];?> </span></div>
                    
          </div>
       
          </div>
          
           <br>
           
           <div style="width:700px; height:394px; background-image:url(<?= base_url();?>img/location/<?=$building['Building_Background'];?>); background-repeat:no-repeat;"> 
           
           
           </div>
           
            
           <table width="680" border="0">
          <tr>
            <td>
            
            <script type="text/javascript" > 
                        
            var Char_id = <?=$character['id_char'];?>;
            var base_url = "<?=base_url();?>";
            
            </script>
       
            <div id="chat_body">

       	 <!--Текстовое поле чата-->
        <div id="chat_text_field" style="height:300px;">
        <?php echo $message_code; ?>
        </div>

        <!--Номер последнего сообщения-->
        <input id="last_act" name="last_act" type="hidden" value="<?php echo $last_act; ?>" />

        <!--Блокировка повторного выполнения функции get_chat_messages()-->
        <input id="block" name="block" type="hidden" value="no" />

        <!--<input id="chat_text_input" class="input_field" name="chat_text_input" type="text" />-->
        
        <textarea id="chat_text_input" class="input_field" name="chat_text_input" cols="40" rows="4"></textarea> 
        
        <input class="button2" type="button" value="Смайлы" onclick="smiles()"/>
        
        <input id="chat_button" name="chat_button" class="button2" type="button" value="Ответить"/>

   		 </div>
            
            </td>
            <td>Список игроков на локации</td>
          </tr>
        </table>
           
           
          </div>
          
          
         
          </td>
        </tr>
</table>
