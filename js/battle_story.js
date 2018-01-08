$(document).ready(function() {

Refresh ();

function Refresh () // Функция для обновления данных страницы
{
	
	var skill_uses = $('#skill_table img'); // выборка всех скилов из таблицы для игрока
	skill_uses.click(function ()
	{
		$('#skill_table').hide(1000);
		$('#skill_table').show(1000);
		PlayerAttack($(this).attr('alt'),2);
		
	}); // вызов события клик по скилу

} // конец функции для обновления данных страницы


// Переменный и параметры, персонажа игрока

var MaxHP = Number($("[name='MaxHP']").val()); // значение максимум хп
var CurHP = Number($("[name='CurHP']").val()); // значение текущего хп


var MaxMP = Number($("[name='MaxMP']").val()); // значение максимум реацу
var CurMP = Number($("[name='CurMP']").val()); // значение текущего реацу

var MaxED = Number($("[name='MaxED']").val()); // значение максимум выносливость
var CurED = Number($("[name='CurED']").val()); // значение текущего выносливость

var hp_text = $('#hp_text'); // записываем объект текст хп
hp_text.text (CurHP); // изменяем текст блока с текстом хп

var mp_text = $('#mp_text'); // записываем объект текст реацу
mp_text.text (CurMP); // изменяем текст блока с текстом реацу

var ed_text = $('#ed_text'); // записываем объект текст вынсливость
ed_text.text (CurED); // изменяем текст блока с текстом выносливости

var MaxSize = 160; // размер полоски хп,mp,ed

// кол-во hp в одном пикселе
var PixHP = MaxHP / MaxSize;

// кол-во mp в одном пикселе
var PixMP = MaxMP / MaxSize;

// кол-во ed в одном пикселе
var PixED = MaxED / MaxSize;

// текущее размер полоски хп
var CurSize_HP = CurHP/PixHP;
CurSize_HP = Math.round(CurSize_HP);

// текущее размер полоски mp
var CurSize_MP = CurMP/PixMP;
CurSize_MP = Math.round(CurSize_MP);

// текущее размер полоски ed
var CurSize_ED = CurED/PixED;
CurSize_ED = Math.round(CurSize_ED);

var hp_img = $('#hp_img'); // записываем объект картинку хп
hp_img.width (CurSize_HP);  // меняем ширину полосы здоровья

var mp_img = $('#mp_img'); // записываем объект картинку реацу
mp_img.width (CurSize_MP);  // меняем ширину полосы реацу

var ed_img = $('#ed_img'); // записываем объект картинку выносливости
ed_img.width (CurSize_ED);  // меняем ширину полосы выносливости


var Character_Strength = Number($("[name='Char_Strength']").val());
var Character_Spirit = Number($("[name='Char_Spirit']").val());
var Character_Speed = Number($("[name='Char_Speed']").val());

// ------------------------------------------------------------------


// Переменный и параметры, персонажа врага

var MaxHP_2 = Number($("[name='MaxHP_2']").val()); // значение максимум хп
var CurHP_2 = Number($("[name='CurHP_2']").val()); // значение текущего хп

var MaxMP_2 = Number($("[name='MaxMP_2']").val()); // значение максимум реацу
var CurMP_2 = Number($("[name='CurMP_2']").val()); // значение текущего реацу

var MaxED_2 = Number($("[name='MaxED_2']").val()); // значение максимум выносливость
var CurED_2 = Number($("[name='CurED_2']").val()); // значение текущего выносливость

var hp_text_2 = $('#hp_text_2 '); // записываем объект текст хп
hp_text_2.text (CurHP_2); // изменяем текст блока с текстом хп

var mp_text_2 = $('#mp_text_2'); // записываем объект текст реацу
mp_text_2.text (CurMP_2); // изменяем текст блока с текстом реацу

var ed_text_2 = $('#ed_text_2'); // записываем объект текст вынсливость
ed_text_2.text (CurED_2); // изменяем текст блока с текстом выносливости

// кол-во hp в одном пикселе
var PixHP_2 = MaxHP_2 / MaxSize;

// кол-во mp в одном пикселе
var PixMP_2 = MaxMP_2 / MaxSize;

// кол-во ed в одном пикселе
var PixED_2 = MaxED_2 / MaxSize;

// текущее размер полоски хп
var CurSize_HP_2 = CurHP_2/PixHP_2;
CurSize_HP_2 = Math.round(CurSize_HP_2);

// текущее размер полоски mp
var CurSize_MP_2 = CurMP_2/PixMP_2;
CurSize_MP_2 = Math.round(CurSize_MP_2);

// текущее размер полоски ed
var CurSize_ED_2 = CurED_2/PixED_2;
CurSize_ED_2 = Math.round(CurSize_ED_2);

var hp_img_2 = $('#hp_img_2'); // записываем объект картинку хп
hp_img_2.width (CurSize_HP_2);  // меняем ширину полосы здоровья

var mp_img_2 = $('#mp_img_2'); // записываем объект картинку реацу
mp_img_2.width (CurSize_MP_2);  // меняем ширину полосы реацу

var ed_img_2 = $('#ed_img_2'); // записываем объект картинку выносливости
ed_img_2.width (CurSize_ED_2);  // меняем ширину полосы выносливости


var Enemy_Strength = Number($("[name='Enemy_Strength']").val());
var Enemy_Spirit = Number($("[name='Enemy_Spirit']").val());
var Enemy_Speed = Number($("[name='Enemy_Speed']").val());

var kuchiki_skill =  new Array (); // Скилы Бьякуи
		
kuchiki_skill [1] = char_skill[6]; // Первый Скил Бьякуи, Хадо№1
kuchiki_skill [2] = char_skill[1]; // Второй Скил Бьякуи, Удар Рукой

// ------------------------------------------------------------------

var CountMove = 1; // какой по счету ход
var Move_1 = 0; // ход игрока, 0 - неходил, 1 - ходил
var Move_2 = 0; // ход компа
var Status_battle = 1; // статус битвы, 1 - начата, 2 - завершена 



function PlayerAttack (Skill_id,Skill_id_2)
{

if (char_skill[Skill_id].remaining != 0) // Если скил не откатан
{
	alert("У вас не закончилось время отката скилла!");	
	return false;
}
      
// Запись скила игрока

var Skill_Name = char_skill[Skill_id].name;
var Skill_Rejatsu = char_skill[Skill_id].rejatsu;
var Skill_Endurance = char_skill[Skill_id].endurance;
var Skill_Damage = char_skill[Skill_id].damage;
var Skill_Type = char_skill[Skill_id].type;
var Skill_Type_Damage = char_skill[Skill_id].type_damage;



// Проверка хватит ли выносливости на навык и действие

if ($('[name="player_action"]').val() == 1)
{
    var Action_MP_ED = 0; // Затраты на ничего
}

if ($('[name="player_action"]').val() == 2)
{
    var Action_MP_ED = 15; // Затраты на блок   
}

if ($('[name="player_action"]').val() == 3)
{
    var Action_MP_ED = 20; // Затраты на уклон 
}

var Proverka_MP = CurMP - Action_MP_ED - Skill_Rejatsu;
var Proverka_ED = CurED - Action_MP_ED - Skill_Endurance;

if (Proverka_MP < 0 || Proverka_ED < 0)
{
    alert('У вас недостаточно выносливости и реацу!');
    return false;
}

//--------------------------------------------------

// Создаем откат скила
var Skill_Reset = char_skill[Skill_id].reseting;
char_skill[Skill_id].remaining = Skill_Reset;

// Создаем продолжительность скила, если бафф
var Skill_Duration = char_skill[Skill_id].duration_original;
char_skill[Skill_id].duration = Skill_Duration;


// Проверяем тип атака Физа или Духовная
if (Skill_Type_Damage == 1)
{
  var Char_damage = getRandomInt(Math.round(Character_Strength*0.8), Math.round(Character_Strength*1.2));
  var Damage = Skill_Damage + Char_damage; // Если физа
   
}

if (Skill_Type_Damage == 2)
{
  var Char_damage = getRandomInt(Math.round(Character_Spirit*0.8), Math.round(Character_Spirit*1.2));
  var Damage = Skill_Damage + Char_damage;  // если духовная
}

if (Skill_Type_Damage == 0 ) // Если скилл бафф
{
    var Skill_Strength = char_skill[Skill_id].strength;
    var Skill_Spirit = char_skill[Skill_id].spirit;
    var Skill_Speed = char_skill[Skill_id].speed;
    
    var Damage = 0; // урон 0
}


$('#log_battle').prepend('<p>Вы атакавали техникой : ' + Skill_Name + ' Урон: ' + Damage + '</p>'); // Вывод действия в лог битвы

// Проверяем все скилы и уменьшаем откат на один ход
// Бафф не считается за действие, поэтому скилы откатывать не надо

if (Skill_Type_Damage != 0)	// Проверка является ли выбранный скилл бафом
{
    var i;

    for (i=0; i < char_skill.length; i++)  // Проверяем все скилы и уменьшаем откат на один ход
    {	
    	if( i != Skill_id && char_skill[i] != null) // Если скил не равен используемому скилу и откат больше 0, то уменьшить откат
    	{
    		if (char_skill[i].remaining > 0)
    		{
    			char_skill[i].remaining--;
    		}
            
            if (char_skill[i].duration > 0)
    		{
    			char_skill[i].duration--;
    		}
            
    	}
    }
    
}

// ---------------------------------------------------

// Расчет по игроку	
	
	var Enemy_Action = getRandomInt(1, 2);  // действие противника блок или уклон

	
	if (Enemy_Action == 1)
	{
		
		if (Skill_Type_Damage == 1) // Если физ атака
		{
			var Block_Enemy = Evasion(Enemy_Strength,Character_Strength); // если физ атака
		}
        
        if(Skill_Type_Damage == 2) // Если маг атака
		{
			var Block_Enemy = Evasion(Enemy_Spirit,Character_Spirit); // если маг атака
		}
        
        if(Skill_Type_Damage == 0) // Если баф, то блокировать не нужно
		{
			var Block_Enemy = false;
		}
		
		if (Block_Enemy == true) // Если противник блокировал
		{
		//alert("Противник заблокировал удар!");
		$('#log_battle').prepend('<p>Противник заблокировал удар!' + '</p>'); // Вывод действия в лог битвы
		
		if (Skill_Type_Damage == 1)
		{
			var ED_FOR_Block = 15; // Выносливость за блок, если физическая атака
			var MP_FOR_Block = 0; // Реацу за блок, если физическая атака
				
		}else
		{
			var ED_FOR_Block = 0; // Выносливость за блок, если магическая атака
			var MP_FOR_Block = 15; // Реацу за блок, если магическая атака
		}
		
		// Расчет параметров компа, если блок прошёл успешно
		
			CurMP_2 = CurMP_2 - MP_FOR_Block; // изменяем кол-во реацу у врага за использование блока
			CurED_2 = CurED_2 - ED_FOR_Block; // изменяем кол-во выносливости у врага за использование блока
			
			mp_text_2.text (CurMP_2); // изменяем текст блока с текстом выносливости
			ed_text_2.text (CurED_2); // изменяем текст блока с текстом выносливости
		
			CurSize_MP_2 = CurSize_MP_2 - Math.round(MP_FOR_Block/PixMP_2);// изменяем размер полосы выносливости у перса за использование уклона	
			CurSize_ED_2 = CurSize_ED_2 - Math.round(ED_FOR_Block/PixED_2);// изменяем размер полосы выносливости у перса за использование уклона	
	
			mp_img_2.width (CurSize_MP_2); // меняем ширину полосы выносливости	
			ed_img_2.width (CurSize_ED_2); // меняем ширину полосы выносливости	
			
		// ------------------------------------------------------------------
		
		CurMP = CurMP - Skill_Rejatsu; // изменяем кол-во реацу у перса за использование скила
		CurED = CurED - Skill_Endurance; // изменяем кол-во выносливости у перса за использование скила
		
		mp_text.text (CurMP); // изменяем текст блока с текстом реацу
		ed_text.text (CurED); // изменяем текст блока с текстом выносливости
		
		CurSize_MP = CurSize_MP - Math.round(Skill_Rejatsu/PixMP); // изменяем размер полосы реацу у перса за использование скила
		CurSize_ED = CurSize_ED - Math.round(Skill_Endurance/PixED);// изменяем размер полосы выносливости у перса за использование скила
		
		mp_img.width (CurSize_MP); // меняем ширину полосы реацу
		ed_img.width (CurSize_ED); // меняем ширину полосы выносливости	
		
		Move_1 = 1;	
		
	} else // Иначе, Если противник не уклонился
	{
	
		CurHP_2 = CurHP_2 - Damage; // изменяем кол-во здоровья у врага
		CurSize_HP_2 = CurSize_HP_2 - Math.round(Damage/PixHP_2);
			
		hp_img_2.width (CurSize_HP_2); // меняем ширину полосы здоровья у игрока
		hp_text_2.text (CurHP_2); // изменяем текст блока с текстом хп у врага
		
		
		CurMP = CurMP - Skill_Rejatsu; // изменяем кол-во реацу у перса за использование скила
		CurED = CurED - Skill_Endurance; // изменяем кол-во выносливости у перса за использование скила
		
		mp_text.text (CurMP); // изменяем текст блока с текстом реацу
		ed_text.text (CurED); // изменяем текст блока с текстом выносливости
		
		CurSize_MP = CurSize_MP - Math.round(Skill_Rejatsu/PixMP); // изменяем размер полосы реацу у перса за использование скила
		CurSize_ED = CurSize_ED - Math.round(Skill_Endurance/PixED);// изменяем размер полосы выносливости у перса за использование скила
		
		mp_img.width (CurSize_MP); // меняем ширину полосы реацу
		ed_img.width (CurSize_ED); // меняем ширину полосы выносливости
		
		Move_1 = 1;
	
	}
	
	// ---------------
	
	}else
	{
        
        if (Skill_Type_Damage != 0) // Если cкил не бафф, то уклон
		{
			var Evasion_Enemy = Evasion(Enemy_Speed,Character_Speed); // расчет уклона
		}else
        {
            var Evasion_Enemy = false; // Если скилл бафф, то уклон не нужен
        }
		
	 	if (Evasion_Enemy == true) // Если противник уклонился
		{
		//alert("Противник уклонился!");
		$('#log_battle').prepend('<p>Противник уклонился!' + '</p>'); // Вывод действия в лог битвы
		
		var ED_FOR_Evasion = 20; // забираемая выносливость за уклон
		
		// Расчет параметров компа, если уклон прошла успешно
		
			CurED_2 = CurED_2 - ED_FOR_Evasion; // изменяем кол-во выносливости у перса за использование блока
			
			ed_text_2.text (CurED_2); // изменяем текст блока с текстом выносливости
		
			CurSize_ED_2 = CurSize_ED_2 - Math.round(ED_FOR_Evasion/PixED_2);// изменяем размер полосы выносливости у перса за использование уклона	
	
			ed_img_2.width (CurSize_ED_2); // меняем ширину полосы выносливости	
			
		// ------------------------------------------------------------------
		
		CurMP = CurMP - Skill_Rejatsu; // изменяем кол-во реацу у перса за использование скила
		CurED = CurED - Skill_Endurance; // изменяем кол-во выносливости у перса за использование скила
		
		mp_text.text (CurMP); // изменяем текст блока с текстом реацу
		ed_text.text (CurED); // изменяем текст блока с текстом выносливости
		
		CurSize_MP = CurSize_MP - Math.round(Skill_Rejatsu/PixMP); // изменяем размер полосы реацу у перса за использование скила
		CurSize_ED = CurSize_ED - Math.round(Skill_Endurance/PixED);// изменяем размер полосы выносливости у перса за использование скила
		
		mp_img.width (CurSize_MP); // меняем ширину полосы реацу
		ed_img.width (CurSize_ED); // меняем ширину полосы выносливости	
		
		Move_1 = 1;	
		
	} else // Иначе, Если противник не уклонился
	{
	
		CurHP_2 = CurHP_2 - Damage; // изменяем кол-во здоровья у врага
		CurSize_HP_2 = CurSize_HP_2 - Math.round(Damage/PixHP_2);
			
		hp_img_2.width (CurSize_HP_2); // меняем ширину полосы здоровья у игрока
		hp_text_2.text (CurHP_2); // изменяем текст блока с текстом хп у врага
		
		
		CurMP = CurMP - Skill_Rejatsu; // изменяем кол-во реацу у перса за использование скила
		CurED = CurED - Skill_Endurance; // изменяем кол-во выносливости у перса за использование скила
		
		mp_text.text (CurMP); // изменяем текст блока с текстом реацу
		ed_text.text (CurED); // изменяем текст блока с текстом выносливости
		
		CurSize_MP = CurSize_MP - Math.round(Skill_Rejatsu/PixMP); // изменяем размер полосы реацу у перса за использование скила
		CurSize_ED = CurSize_ED - Math.round(Skill_Endurance/PixED);// изменяем размер полосы выносливости у перса за использование скила
		
		mp_img.width (CurSize_MP); // меняем ширину полосы реацу
		ed_img.width (CurSize_ED); // меняем ширину полосы выносливости
		
		Move_1 = 1;
	
	}
	
	// ---------------
	
	}
    
// Конец Расчета по игроку (Игрок атаковал, Враг выбирал действие) -------------------------------



// Если скилл бафф, то обновить скилы

if (Skill_Type_Damage == 0)
{
    Character_Strength += Skill_Strength;
    Character_Spirit += Skill_Spirit;
    Character_Speed += Skill_Speed;
    
    $('#skill_baff').html('Бафф');
    
    Baff_skill (Skill_id,Char_id,Skill_Reset,Skill_Duration); // Обновление скилов
    return false;
}
// ----------------------------------------


// Запись скила противника
	
var Skill_Name_2 = kuchiki_skill[Skill_id_2].name;
var Skill_Rejatsu_2 = kuchiki_skill[Skill_id_2].rejatsu;
var Skill_Endurance_2 = kuchiki_skill[Skill_id_2].endurance;
var Skill_Damage_2 = kuchiki_skill[Skill_id_2].damage;
var Skill_Type_2 = kuchiki_skill[Skill_id_2].type;
var Skill_Type_Damage_2 = kuchiki_skill[Skill_id_2].type_damage;


// Проверяем тип атака Физа или Духовная
if (Skill_Type_Damage_2 == 1)
{
  var Damage_2 = Skill_Damage_2 + Enemy_Strength; // Если физа
   
}

if (Skill_Type_Damage_2 == 2)
{
  var Damage_2 = Skill_Damage_2 + Enemy_Spirit;  // если духовная
}


//alert ("Вас атакавали техникой: " + Skill_Name_2);
$('#log_battle').prepend('<p>Вас атакавали техникой : ' + Skill_Name_2 + ' Урон: (' + Damage_2 + ')' + '</p>'); // Вывод действия в лог битвы

// Расчет по врагу
	
	
	var Player_Action = $('[name="player_action"]').val(); // Выбранное действие игрока (Ничего,Блок,Уклон)
	
	if (Player_Action == 1) // Когда выбранное действие, ничего
	{
			CurHP = CurHP - Damage_2;
			CurSize_HP = CurSize_HP - Math.round(Damage_2/PixHP);
				
			hp_img.width (CurSize_HP); // меняем ширину полосы здоровья у игрока
			hp_text.text (CurHP); // изменяем текст блока с текстом хп
				
			CurMP_2 = CurMP_2 - Skill_Rejatsu_2; // изменяем кол-во реацу у перса за использование скила
			CurED_2 = CurED_2 - Skill_Endurance_2; // изменяем кол-во выносливости у перса за использование скила
				
			mp_text_2.text (CurMP_2); // изменяем текст блока с текстом хп у врага
			ed_text_2.text (CurED_2); // изменяем текст блока с текстом хп у врага
				
			CurSize_MP_2 = CurSize_MP_2 - Math.round(Skill_Rejatsu_2/PixMP_2); // изменяем размер полосы реацу у перса за использование скила
			CurSize_ED_2 = CurSize_ED_2 - Math.round(Skill_Endurance_2/PixED_2);// изменяем размер полосы выносливости у перса за использование скила
			
			mp_img_2.width (CurSize_MP_2); // меняем ширину полосы реацу
			ed_img_2.width (CurSize_ED_2); // меняем ширину полосы выносливости
			
			Move_2 = 1;
		
	} 
	
	if (Player_Action == 2) // Когда выбранное действие, блок
	{
		
		if (Skill_Type_Damage_2 == 1)
		{
			var Block_Player = Evasion(Character_Strength,Enemy_Strength);
		}
        
        if (Skill_Type_Damage_2 == 2)
		{
			var Block_Player = Evasion(Character_Spirit,Enemy_Spirit);
		}
		
	
		if (Block_Player == true) // Если игрок блокировал
		{
			//alert("Вы заблокировали удар противника!");	
			$('#log_battle').prepend('<p>Вы заблокировали удар противника!' + '</p>');
			
			
			if (Skill_Type_Damage_2 == 1)
			{
			 	var ED_FOR_Block = 15; // Выносливость за блок, если физическая атака
				var MP_FOR_Block = 0; // Реацу за блок, если физическая атака
				
			}else
			{
				var ED_FOR_Block = 0; // Выносливость за блок, если магическая атака
				var MP_FOR_Block = 15; // Реацу за блок, если магическая атака
			}
			
			// Расчет параметров игрока, если блокировка прошла успешно
			
			CurMP = CurMP - MP_FOR_Block; // изменяем кол-во реацу у перса за использование блока
			CurED = CurED - ED_FOR_Block; // изменяем кол-во выносливости у перса за использование блока
			
			mp_text.text (CurMP); // изменяем текст блока с текстом реацу
			ed_text.text (CurED); // изменяем текст блока с текстом выносливости
		
			CurSize_MP = CurSize_MP - Math.round(MP_FOR_Block/PixMP); // изменяем размер полосы реацу у перса за использование блока
			CurSize_ED = CurSize_ED - Math.round(ED_FOR_Block/PixED);// изменяем размер полосы выносливости у перса за использование блока	
				
			mp_img.width (CurSize_MP); // меняем ширину полосы реацу
			ed_img.width (CurSize_ED); // меняем ширину полосы выносливости	
			
			// ------------------------------------------------------------------
			
			CurMP_2 = CurMP_2 - Skill_Rejatsu_2; // изменяем кол-во реацу у перса за использование скила
			CurED_2 = CurED_2 - Skill_Endurance_2; // изменяем кол-во выносливости у перса за использование скила
				
			mp_text_2.text (CurMP_2); // изменяем текст блока с текстом хп у врага
			ed_text_2.text (CurED_2); // изменяем текст блока с текстом хп у врага
				
			CurSize_MP_2 = CurSize_MP_2 - Math.round(Skill_Rejatsu_2/PixMP_2); // изменяем размер полосы реацу у перса за использование скила
			CurSize_ED_2 = CurSize_ED_2 - Math.round(Skill_Endurance_2/PixED_2);// изменяем размер полосы выносливости у перса за использование скила
			
			mp_img_2.width (CurSize_MP_2); // меняем ширину полосы реацу
			ed_img_2.width (CurSize_ED_2); // меняем ширину полосы выносливости
			
			Move_2 = 1;
			
		} else // Иначе, если игрок не блокировал
		
		{
		
			CurHP = CurHP - Damage_2;
			CurSize_HP = CurSize_HP - Math.round(Damage_2/PixHP);
				
			hp_img.width (CurSize_HP); // меняем ширину полосы здоровья у игрока
			hp_text.text (CurHP); // изменяем текст блока с текстом хп
				
			CurMP_2 = CurMP_2 - Skill_Rejatsu_2; // изменяем кол-во реацу у перса за использование скила
			CurED_2 = CurED_2 - Skill_Endurance_2; // изменяем кол-во выносливости у перса за использование скила
				
			mp_text_2.text (CurMP_2); // изменяем текст блока с текстом хп у врага
			ed_text_2.text (CurED_2); // изменяем текст блока с текстом хп у врага
				
			CurSize_MP_2 = CurSize_MP_2 - Math.round(Skill_Rejatsu_2/PixMP_2); // изменяем размер полосы реацу у перса за использование скила
			CurSize_ED_2 = CurSize_ED_2 - Math.round(Skill_Endurance_2/PixED_2);// изменяем размер полосы выносливости у перса за использование скила
			
			mp_img_2.width (CurSize_MP_2); // меняем ширину полосы реацу
			ed_img_2.width (CurSize_ED_2); // меняем ширину полосы выносливости
			
			Move_2 = 1;
		
		}
		
		// ---------------
		
	}
	
	if (Player_Action == 3) // Когда выбранное действие, уклонение
	{
		
		var Evasion_Player = Evasion(Character_Speed,Enemy_Speed);
	
		if (Evasion_Player == true) // Если игрок уклонился
		{
			//alert("Вы уклонились от удара противника!");	
			$('#log_battle').prepend('<p>Вы уклонились от удара противника!' + '</p>');
			
			var ED_FOR_Evasion = 20; // забираемая выносливость за уклон
			
			// Расчет параметров игрока, если уклонение успешно
	
			CurED = CurED - ED_FOR_Evasion; // изменяем кол-во выносливости у перса за использование уклона
			
			ed_text.text (CurED); // изменяем текст блока с текстом выносливости
	
			CurSize_ED = CurSize_ED - Math.round(ED_FOR_Evasion/PixED);// изменяем размер полосы выносливости у перса за использование блока	
				
			ed_img.width (CurSize_ED); // меняем ширину полосы выносливости	
			
			// ------------------------------------------------------------------
			
			
			CurMP_2 = CurMP_2 - Skill_Rejatsu_2; // изменяем кол-во реацу у перса за использование скила
			CurED_2 = CurED_2 - Skill_Endurance_2; // изменяем кол-во выносливости у перса за использование скила
				
			mp_text_2.text (CurMP_2); // изменяем текст блока с текстом хп у врага
			ed_text_2.text (CurED_2); // изменяем текст блока с текстом хп у врага
				
			CurSize_MP_2 = CurSize_MP_2 - Math.round(Skill_Rejatsu_2/PixMP_2); // изменяем размер полосы реацу у перса за использование скила
			CurSize_ED_2 = CurSize_ED_2 - Math.round(Skill_Endurance_2/PixED_2);// изменяем размер полосы выносливости у перса за использование скила
			
			mp_img_2.width (CurSize_MP_2); // меняем ширину полосы реацу
			ed_img_2.width (CurSize_ED_2); // меняем ширину полосы выносливости
			
			Move_2 = 1;
			
		} else // Иначе, если игрок не уклонился
		
		{
		
			CurHP = CurHP - Damage_2;
			CurSize_HP = CurSize_HP - Math.round(Damage_2/PixHP);
				
			hp_img.width (CurSize_HP); // меняем ширину полосы здоровья у игрока
			hp_text.text (CurHP); // изменяем текст блока с текстом хп
				
			CurMP_2 = CurMP_2 - Skill_Rejatsu_2; // изменяем кол-во реацу у перса за использование скила
			CurED_2 = CurED_2 - Skill_Endurance_2; // изменяем кол-во выносливости у перса за использование скила
				
			mp_text_2.text (CurMP_2); // изменяем текст блока с текстом хп у врага
			ed_text_2.text (CurED_2); // изменяем текст блока с текстом хп у врага
				
			CurSize_MP_2 = CurSize_MP_2 - Math.round(Skill_Rejatsu_2/PixMP_2); // изменяем размер полосы реацу у перса за использование скила
			CurSize_ED_2 = CurSize_ED_2 - Math.round(Skill_Endurance_2/PixED_2);// изменяем размер полосы выносливости у перса за использование скила
			
			mp_img_2.width (CurSize_MP_2); // меняем ширину полосы реацу
			ed_img_2.width (CurSize_ED_2); // меняем ширину полосы выносливости
			
			Move_2 = 1;
		
		}
		
		// ---------------
	
	} // конец условия, когда выбранное действие, уклонение
    
// Конец расчета по врагу (Враг атаковал, игрок выбирал действие)----------

if (CurHP_2 > 0 && CurMP_2 > 0 && CurED_2 > 0 && CurHP > 0 && CurMP > 0 && CurED > 0)
{
    Write_Base (Skill_id,Char_id,Skill_Reset); // Обновление скилов
}


// Убираем бонусы от баффа

if (Skill_Type_Damage != 0)	// Проверка является ли выбранный скилл бафом
{
    var j;

    for (j=0; j < char_skill.length; j++)  // Проверяем все скилы и уменьшаем откат на один ход
    {	        
        if (char_skill[j] != null && char_skill[j].type_damage == 0 && char_skill[j].duration == 0)
        {
                $('#skill_baff').html('');
                Over_baff (Char_id);
        }
    }
    
}

// Следующий ход

$('#log_battle').prepend('<p>---------------------' + CountMove + ' Ход--------------------' + '</p>');

CountMove++;
Move_1 = 0;
Move_2 = 0;
//alert (CountMove + " Ход ");
$('#count_move').text(CountMove + " Ход");	
$('#count_move_2').text(CountMove);	

// ---------------


Update_Story (CurHP_2,CurMP_2,CurED_2,CountMove); // Обновление параметров врага в базе и информации об истории

// Определение победы
	
if (CurHP_2 <= 0 || CurMP_2 < 10 || CurED_2 < 10)
{
    if (CurHP_2 <= 0)
    {
        hp_text_2.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurMP_2 <= 0)
    {
        mp_text_2.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurED_2 <= 0)
    {
        ed_text_2.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurHP <= 0)
    {
        hp_text.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurMP <= 0)
    {
        mp_text.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurED <= 0)
    {
        ed_text.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    
    $('#skill_table').html('');
    
	alert("Игрок победил!!!");
    
    var SMC_id = Number($("[name='SMC_id']").val());
    
    var data2 = {'SMC_id': SMC_id, 'Char_id':Char_id};
	
    var Url_Sript = base_url + "battle/story_mode/compleate_battle";
     
     $.ajax(Url_Sript,{
		type: "POST", 
        data: data2, 
		success: function(data)
			{
				$('#skill_table').html(data);
                clearInterval(Battle_Timer);
			}
      } ); 
    
    clearInterval(Battle_Timer);
    
    return false;
	
}
	

if (CurHP <= 0 || CurMP < 10 || CurED < 10)
{
    if (CurHP <= 0)
    {
        hp_text.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurMP <= 0)
    {
        mp_text.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurED <= 0)
    {
        ed_text.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurHP_2 <= 0)
    {
        hp_text_2.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurMP_2 <= 0)
    {
        mp_text_2.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    if (CurED_2 <= 0)
    {
        ed_text_2.text ('0'); // изменяем текст блока с текстом хп у врага
    }
    
    $('#skill_table').html('');
    
	alert("Вы лузер, вас порвал бот!!");
    
    var SMC_id = Number($("[name='SMC_id']").val());
    
    var data2 = {'SMC_id': SMC_id, 'Char_id':Char_id};
	
    var Url_Sript = base_url + "battle/story_mode/delete_battle";
     
     $.ajax(Url_Sript,{
		type: "POST", 
        data: data2, 
		success: function(data)
			{
				$('#skill_table').html(data);
                clearInterval(Battle_Timer);
			}
      } ); 
      
	//$('#skill_table').text("Вы лузер, вас порвал бот!!");
    clearInterval(Battle_Timer);
    
    return false;
}


// ---------------


} // Конец атаки игрока



function Write_Base (Skill_id,Char_id,Skill_Reset) // Функция для записи данных в базу и обновления скилов (Для отката)
{	
	var data2 = {'Skill_id': Skill_id, 'Char_id':Char_id ,'Skill_Remaining':Skill_Reset };
	
    var Url_Sript = base_url + "battle/story_mode/battle_skill";
     
     $.ajax(Url_Sript,{
        beforeSend: function () { 
        $('#loader').show();
        $('#skill_table').html('');
        },
		type: "POST", 
        data: data2, 
		success: function(data)
			{
				$('#skill_table').html(data);
                Refresh();
                
                $('#loader').hide();
			}
      } ); 
      
	
}

function Baff_skill (Skill_id,Char_id,Skill_Reset,Skill_Duration) // Функция для записи данных в базу и обновления бафа
{	
	var data2 = {'Skill_id': Skill_id, 'Char_id':Char_id ,'Skill_Remaining':Skill_Reset,'Skill_Duration':Skill_Duration  };
	
    var Url_Sript = base_url + "battle/story_mode/baff_skill";
     
     $.ajax(Url_Sript,{
        beforeSend: function () { 
        $('#loader').show();
        $('#skill_table').html('');
        },
		type: "POST", 
        data: data2, 
		success: function(data)
			{
				$('#skill_table').html(data);
                Refresh();
                
                $('#loader').hide();
			}
      } ); 
      
	
}

function Over_baff (Char_id) // Функция для конца баффа
{	
	var data2 = {'Char_id':Char_id};
	
    var Url_Sript = base_url + "battle/story_mode/over_baff";
     
     $.ajax(Url_Sript,{
		type: "POST", 
        data: data2, 
		success: function(data)
			{
				
			}
      } );      
	
}


function Update_Story (Enemy_HP,Enemy_MP,Enemy_ED,CountMove) // Функция для изменения данных хп,мп в базе и кол-во ходов
{	
    var SMC_id = Number($("[name='SMC_id']").val());
    
	var data2 = {'SMC_id': SMC_id,'SMC_CurHealth': Enemy_HP, 'SMC_CurRejatsu':Enemy_MP ,'SMC_CurEndurance':Enemy_ED,'SMC_Count_Move': CountMove};
	
    var Url_Sript = base_url + "battle/story_mode/update_story";
     
     $.ajax(Url_Sript,{
		type: "POST", 
        data: data2, 
		success: function(data)
			{
				
			}
      } ); 
	
}


function Evasion (Character_Speed,Enemy_Speed) // Функция для расчета процента уклона,блока
{
	
	var First = Character_Speed / Enemy_Speed;
	
	var Ratio = First / (First + 1);
	
	Ratio = Math.round(Ratio * 100); // Расчитали процент уворота
	
	if (Ratio > 0) // Если вероятность уклона не равна нулю
	{
		
		var Random_Evasion = getRandomInt(0,100);
		
		if(Random_Evasion <= Ratio)
		{
			//alert("Уклонился с вероятностью " + Ratio + " %. Получив рандомом " + Random_Evasion);
			return true;
		}
		
		return false;
	}
	
	return false;
}


// использование Math.round() даст неравномерное распределение!
function getRandomInt(min, max) // Функция для рандома
{
  return Math.floor(Math.random() * (max - min + 1)) + min;
}


// Настройка тамера для битвы
var DateStart = new Date($("[name='SMC_Date']").val());

var AllSecondStart = DateStart.getTime()/1000; // Всего секунд в начале

var Temp_SM_Time = $("[name='SM_Time']").val();
SM_Time = Temp_SM_Time.split(':',3);

var SM_hh = SM_Time[0];
var SM_mm = SM_Time[1];
var SM_ss = SM_Time[2];

var TimeStory = SM_hh * 3600 + SM_mm * 60 + SM_ss * 1; // Время на бой

var AllSecondEnd =  AllSecondStart + TimeStory; // Все секунд в конце с тамером на TimeStory минут


var outTimer = $('#battle_timer');
var secEnd = AllSecondEnd; 

var Battle_Timer = setInterval(function () {
    var curDate = new Date();
    var curSec = curDate.getTime()/1000;
    var TimeZone = -curDate.getTimezoneOffset()*60;
    
    var diff = (secEnd + TimeZone) - curSec;
    
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
    
    outTimer.html(minutes + ':' + seconds);
    
}, 1000);
// Конец настройки тамера для битвы


function Time_Over () // Время закончилось, вы просрали
{
    //alert("Вы лузер, вы не успели порвать бота!!");
	//$('#skill_table').text("Вы лузер, вы не успели порвать бота!!");
    
    var SMC_id = Number($("[name='SMC_id']").val());
    
    var data2 = {'SMC_id': SMC_id, 'Char_id':Char_id};
	
    var Url_Sript = base_url + "battle/story_mode/delete_battle";
     
     $.ajax(Url_Sript,{
		type: "POST", 
        data: data2, 
		success: function(data)
			{
			 
                $('#skill_table').html('');
				$('#skill_table').html(data);
                clearInterval(Battle_Timer);
			}
      } ); 
    
    
}



} ); //Конец ready 



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