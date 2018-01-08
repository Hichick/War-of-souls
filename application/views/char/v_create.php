  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>

            <div id="infoMessage"><?php echo $message_char;?></div>

<?php echo form_open("char/create");?>
      
      <table width="650px" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td style="padding-left: 10px;">
                <p class="p_text_news">*Введите имя персонажа:</p>
            <input class="input_field" name="char_name" type="text" size="40" maxlength="40" value="Mekitakito">
            
            <br><br>
                <p class="p_text_news">Выбирете расу:</p>
                <select class="input_field" name="char_rasa">
                	<option value="1">Shinigami</option>
                    <option value="2">Hollow</option>
                </select>
            
            </td>
            
                <td style="padding-left: 10px;">
                <p class="p_text_news">Биография персонажа:</p>                
                 <?php echo form_textarea($char_biografia);?>    
            
            </td>
            
              </tr>
            
            </table>

        <br>
      <input class="button" name="create" type="submit" value="Создать персонажа">

<?php echo form_close();?>

        	<br>
          </div>
          
          
         
          </td>
        </tr>
</table>
