$(document).ready(function() {


// Настройка тамера 

var outTimer = $('#mission_timer');

var EndDate = new Date($("[name='Miss_End']").val());
var secEnd = EndDate.getTime()/1000;

var Mission_Timer = setInterval(function () {
   
    var curDate = new Date();
    var curSec = curDate.getTime()/1000; // текущее время
    var TimeZone = -curDate.getTimezoneOffset()*60;
    
    var diff = (secEnd + TimeZone) - curSec;
    
    
    //alert(curSec);
    
    if (diff <= 0) 
    {
       Time_Over ();
       return false;
    }
    
    var hours = Math.floor(diff / 3600);
    var  minutes = Math.floor(diff / 60) % 60;
    var  seconds = Math.floor(diff) % 60;

    if (hours < 10) hours = '0' + hours;
    if (minutes < 10) minutes = '0' + minutes;
    if (seconds < 10) seconds = '0' + seconds;
    
    outTimer.html(hours + ':' + minutes + ':' + seconds);
    
}, 1000);
// Конец настройки тамера для битвы


function Time_Over () // Время закончилось, вы просрали
{
    $('#info_mission').html('<input class="button2" type="button" onclick="Complete_mission()" value="Завершить миссию">');
    clearInterval(Mission_Timer);    
}



} ); //Конец ready 


function Complete_mission() // завершение миссии
{
    
    var Miss_Com_id = Number($("[name='Miss_Com_id']").val());
    var Miss_Char = Number($("[name='Miss_Char']").val());
    
    var data2 = {'Miss_Com_id': Miss_Com_id, 'Miss_Char':Miss_Char};
	
    var Url_Sript = base_url + "mission/status/complete_mission";
     
     $.ajax(Url_Sript,{
		type: "POST", 
        data: data2, 
		success: function(data)
			{
				$('#info_mission').html(data);
                location.href = base_url + "char/status";
			}
      } );  
}

/*

###События###

mouseover - наведение мыши на объект
mouseout - увод мыши от объекта
click - клик мыши по объекту
dblclick - двойной клик мыши по объекту
mousemove - перемещение курсора
mousedown - момент нажатия кнопки мыши
mouseup - момент отпускания кнопки мыши
submit - момент отправки формы
focus - момент получения фокуса
blur - момент потери фокуса
change - изменение объекта формы
reset - сброс формы
keypress - нажатие клавиши
load - полная загрузка страницы
scroll - прокрутка страницы
upload - уход со страницы

###Методы###


###Выборки###


###Пример###

$(document).ready(function() {

var ava = $('#ava_player');

ava.fadeOut (3000);
ava.fadeIn (3000);

var heal = $('#heal').attr('value');

var heal2 =;

heal2 += 40;

alert(heal2);


} ); //Конец ready 

*/