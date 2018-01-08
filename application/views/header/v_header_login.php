<div class="head"> 

<div class="login_border"> 
<div class="login"> 

<!--Подключаем шапку сайта-->
<div id="infoMessage">
<?php
    if(isset($message) && !empty($message))
    {
	   echo $message;
    }else
    {
        echo "Добро пожаловать в <br> War of Souls!";
    }
?>
</div>
   	 
<?php echo form_open("user/login");?>

    E-mail: <input type="text" class="input_field" id="identity" name="identity" value="" size="16" />
    <br>
    Пароль:<input type="password" class="input_field" id="password" name="password" value="" size="16" />    
    <br>
    <div align="left" style="padding-left: 8px;">
     <input type="submit" class="button2" id="login_user" name="login" value="Вход" />         Запомнить вас? <input type="checkbox" style="vertical-align: middle;" id="remember" name="remember" />
    </div>

<?php echo form_close();?>

</div>
</div>

</div>




<div style=" height: 26px; background-color:#25313b;"> </div>


<table width="944px" border="0" cellspacing="0" cellpadding="0" style="padding-left: 40px; padding-right: 40px;">
        <tr>