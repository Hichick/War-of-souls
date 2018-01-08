  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>

            <div id="infoMessage"><?php echo $message_reg;?></div>

<?php echo form_open("user/registration");?>
      
      <table width="650px" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                <p class="p_text_news">*Введите свое полное имя: (пример: Вася Рогов)</p>
            <?php echo form_input($username);?>
            </td>
              </tr>
              
              <tr>
                <td width="48%">
                <br>
                <p class="p_text_news">*Введите свой E-mail: (пример: bleach@mail.ru)</p>
            <?php echo form_input($email);?>
                </td>
                <td width="48%">
                <br>
                <p class="p_text_news">*Подтвердите свой E-mail:</p>
            <?php echo form_input($email_confirm);?>
                </td>
              </tr>
              
              <tr>
                <td width="48%">
                <br>
                <p class="p_text_news">*Введите свой пароль:</p>
             <?php echo form_input($password);?>
                </td>
                <td width="48%">
                <br>
                <p class="p_text_news">*Подтвердите свой пароль:</p>
            <?php echo form_input($password_confirm);?>
                </td>
              </tr>
              
              <tr>
                <td>
                <br>
                <p class="p_text_news">Выберете свой пол:</p>
                <select class="input_field" name="gender">
                	<option value="Мужчина">Мужчина</option>
                    <option value="Женщина">Женщина</option>
                </select>
                
            </td>
              </tr>
            </table>


      <input class="button" name="reg" type="submit" value="Регистрация аккаунта">

<?php echo form_close();?>

        	<br>
          </div>
          
          
         
          </td>
        </tr>
</table>
