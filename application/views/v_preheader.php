<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="description" content="Описание Сайта" >
<meta name="keywords" content="Ключевые слова" >

<title>Название страницы</title>

<link rel="stylesheet" type="text/css" href="<?=base_url();?>styles/style.css">

<?php foreach ($styles as $style):?>

<?='<link rel="stylesheet" type="text/css" href="'.base_url().$style.'">';?>

<?php endforeach;?>

<?php foreach ($javascript as $js):?>

<?='<script type="text/javascript" src="'.base_url().$js.'"></script>';?>

<?php endforeach;?>



</head>

<body>

<div id="loader"><span>Загрузка...</span></div>

<center>

<div style="height:80px; width:1150px;">
<div class="style_bleach"> </div>
</div>

<div class="main_frame">
