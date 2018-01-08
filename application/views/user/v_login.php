  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>

            <div id="infoMessage"><?php echo $message_login;?></div>

<?php echo form_open("user/login");?>
      
<p>
    E-mail:
    <?php echo form_input($identity);?>
  </p>

  <p>
    Пароль:
    <?php echo form_input($password);?>
  </p>

  <p>
    Запомнить меня:
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>

      <input class="button" name="login" type="submit" value="Вход в аккаунт">

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

        	<br>
          </div>
          
          
         
          </td>
        </tr>
</table>
