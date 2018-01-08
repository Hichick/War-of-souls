-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 01 2015 г., 02:01
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `war-of-souls`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `Building_id` int(3) NOT NULL AUTO_INCREMENT,
  `Building_Name` varchar(40) NOT NULL,
  `Building_Type` int(2) NOT NULL,
  `Building_Image` varchar(100) NOT NULL,
  `Building_World` int(2) NOT NULL,
  `Building_X` int(3) NOT NULL,
  `Building_Y` int(3) NOT NULL,
  `Building_Width` int(3) NOT NULL,
  `Building_Height` int(3) NOT NULL,
  `Building_Background` varchar(100) NOT NULL,
  PRIMARY KEY (`Building_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `buildings`
--

INSERT INTO `buildings` (`Building_id`, `Building_Name`, `Building_Type`, `Building_Image`, `Building_World`, `Building_X`, `Building_Y`, `Building_Width`, `Building_Height`, `Building_Background`) VALUES
(1, 'Академия Шинигами', 1, 'academy.png', 1, 100, 260, 80, 58, 'academy.png'),
(2, 'Сэнкаймон', 1, 'senkaimon.png', 1, 300, 50, 100, 70, 'senkaimon.png'),
(3, 'Руконгай', 1, 'rukongai.png', 1, 350, 300, 110, 77, 'rukongai.png'),
(4, 'Ворота в Сейретей', 1, 'gate_seiretei.png', 2, 80, 300, 120, 65, 'gate_seiretei.png'),
(5, 'Лес Руконгая', 1, 'forest.png', 2, 500, 80, 120, 65, 'forest.png');

-- --------------------------------------------------------

--
-- Структура таблицы `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `id_char` int(7) NOT NULL AUTO_INCREMENT,
  `id_user` int(7) NOT NULL,
  `id_zampacto` int(7) NOT NULL,
  `Char_Name` varchar(50) NOT NULL,
  `Char_Rasa` smallint(1) NOT NULL,
  `Char_Class` smallint(2) NOT NULL DEFAULT '0',
  `Char_Power` int(8) NOT NULL,
  `Char_Strength` int(5) NOT NULL DEFAULT '5',
  `Char_MaxStregth` int(5) NOT NULL DEFAULT '5',
  `Char_Spirit` int(5) NOT NULL DEFAULT '5',
  `Char_MaxSpirit` int(5) NOT NULL DEFAULT '5',
  `Char_Speed` int(5) NOT NULL DEFAULT '5',
  `Char_MaxSpeed` int(5) NOT NULL DEFAULT '5',
  `Char_CurHealth` int(5) NOT NULL DEFAULT '200',
  `Char_MaxHealth` int(5) NOT NULL DEFAULT '200',
  `Char_CurRejatsu` int(5) NOT NULL DEFAULT '200',
  `Char_MaxRejatsu` int(5) NOT NULL DEFAULT '200',
  `Char_CurEndurance` int(5) NOT NULL DEFAULT '200',
  `Char_MaxEndurance` int(5) NOT NULL DEFAULT '200',
  `Char_Zanjutsu` int(11) NOT NULL DEFAULT '5',
  `Char_Hoho` int(11) NOT NULL DEFAULT '0',
  `Char_Kido` int(11) NOT NULL DEFAULT '0',
  `Char_Hakuda` int(11) NOT NULL DEFAULT '5',
  `Char_Status` smallint(2) NOT NULL DEFAULT '0',
  `Char_Rank` varchar(30) NOT NULL,
  `Char_Sqard` smallint(2) NOT NULL,
  `Location` int(3) NOT NULL,
  `Building` int(3) NOT NULL,
  `Char_Biografia` text NOT NULL,
  `Char_Day` date NOT NULL,
  `Char_Ava1` varchar(100) NOT NULL,
  `Char_Ava2` varchar(100) NOT NULL,
  `Char_Ava3` varchar(100) NOT NULL,
  `Char_Money` int(8) NOT NULL,
  `Char_baff_id` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_char`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `characters`
--

INSERT INTO `characters` (`id_char`, `id_user`, `id_zampacto`, `Char_Name`, `Char_Rasa`, `Char_Class`, `Char_Power`, `Char_Strength`, `Char_MaxStregth`, `Char_Spirit`, `Char_MaxSpirit`, `Char_Speed`, `Char_MaxSpeed`, `Char_CurHealth`, `Char_MaxHealth`, `Char_CurRejatsu`, `Char_MaxRejatsu`, `Char_CurEndurance`, `Char_MaxEndurance`, `Char_Zanjutsu`, `Char_Hoho`, `Char_Kido`, `Char_Hakuda`, `Char_Status`, `Char_Rank`, `Char_Sqard`, `Location`, `Building`, `Char_Biografia`, `Char_Day`, `Char_Ava1`, `Char_Ava2`, `Char_Ava3`, `Char_Money`, `Char_baff_id`) VALUES
(5, 17, 0, 'mekitakito7', 1, 0, 0, 11, 11, 5, 5, 5, 5, 200, 200, 200, 200, 200, 200, 5, 30, 5, 10, 0, '', 0, 1, 1, 'Здесь можете написать историю вашего персонажа.', '2014-03-09', 'img/chars/shinigami_2.jpg', '', '', 0, 0),
(4, 17, 0, 'mekitakito2', 1, 0, 0, 5, 5, 5, 5, 5, 5, 200, 200, 200, 200, 200, 200, 5, 0, 0, 5, 2, '', 0, 1, 1, 'Здесь можете написать историю вашего персонажа.', '2014-03-09', 'img/chars/shinigami_1.jpg', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `Chat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Chat_room` int(3) NOT NULL DEFAULT '0',
  `Char_id` int(7) NOT NULL,
  `Char_id_to` int(7) NOT NULL DEFAULT '0',
  `Message_text` text NOT NULL,
  `Message_date` datetime NOT NULL,
  PRIMARY KEY (`Chat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`Chat_id`, `Chat_room`, `Char_id`, `Char_id_to`, `Message_text`, `Message_date`) VALUES
(1, 0, 5, 0, 'sdasdasdasdasdasdasd', '2014-03-19 00:00:00'),
(2, 0, 5, 0, 'Все работает!', '2014-03-19 14:05:12'),
(3, 0, 5, 0, 'Отдача', '2014-09-09 06:34:18');

-- --------------------------------------------------------

--
-- Структура таблицы `enemy`
--

CREATE TABLE IF NOT EXISTS `enemy` (
  `Enemy_id` int(3) NOT NULL AUTO_INCREMENT,
  `Enemy_Name` varchar(30) NOT NULL,
  `Enemy_Rasa` int(1) NOT NULL,
  `Enemy_Type` int(2) NOT NULL,
  `Enemy_Strength` int(5) NOT NULL,
  `Enemy_Spirit` int(5) NOT NULL,
  `Enemy_Speed` int(5) NOT NULL,
  `Enemy_CurHealth` int(5) NOT NULL,
  `Enemy_MaxHealth` int(5) NOT NULL,
  `Enemy_CurRejatsu` int(5) NOT NULL,
  `Enemy_MaxRejatsu` int(5) NOT NULL,
  `Enemy_CurEndurance` int(5) NOT NULL,
  `Enemy_MaxEndurance` int(5) NOT NULL,
  `Enemy_Zanjutsu` int(5) NOT NULL,
  `Enemy_Hoho` int(5) NOT NULL,
  `Enemy_Kido` int(5) NOT NULL,
  `Enemy_Hakuda` int(5) NOT NULL,
  `Enemy_Status` int(2) NOT NULL,
  `Enemy_Ava1` varchar(100) NOT NULL DEFAULT 'img/story_mode/story_mode_1.png',
  PRIMARY KEY (`Enemy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `enemy`
--

INSERT INTO `enemy` (`Enemy_id`, `Enemy_Name`, `Enemy_Rasa`, `Enemy_Type`, `Enemy_Strength`, `Enemy_Spirit`, `Enemy_Speed`, `Enemy_CurHealth`, `Enemy_MaxHealth`, `Enemy_CurRejatsu`, `Enemy_MaxRejatsu`, `Enemy_CurEndurance`, `Enemy_MaxEndurance`, `Enemy_Zanjutsu`, `Enemy_Hoho`, `Enemy_Kido`, `Enemy_Hakuda`, `Enemy_Status`, `Enemy_Ava1`) VALUES
(1, 'Рыбья Бошка', 2, 2, 10, 10, 10, 2000, 2000, 2000, 2000, 2000, 2000, 10, 10, 10, 10, 1, 'img/story_mode/story_mode_1.png'),
(2, 'Брат Иное', 2, 2, 10, 10, 10, 200, 200, 200, 200, 200, 200, 10, 10, 10, 10, 1, 'img/story_mode/story_mode_3.png'),
(3, 'Большая Бошка', 2, 2, 10, 10, 10, 200, 200, 200, 200, 200, 200, 5, 5, 5, 5, 1, 'img/story_mode/story_mode_4.png');

-- --------------------------------------------------------

--
-- Структура таблицы `enemy_skills_standart`
--

CREATE TABLE IF NOT EXISTS `enemy_skills_standart` (
  `Skill_id` int(5) NOT NULL AUTO_INCREMENT,
  `Skill_Type` int(2) NOT NULL,
  `Skill_Nomber` int(3) NOT NULL,
  `Skill_Name` varchar(50) NOT NULL,
  `Skill_Text` text NOT NULL,
  `Skill_Image` varchar(100) NOT NULL,
  `Skill_Damage` int(4) NOT NULL,
  `Skill_Rejatsu` int(4) NOT NULL,
  `Skill_Endurance` int(4) NOT NULL,
  `Skill_Strength` int(5) NOT NULL DEFAULT '0',
  `Skill_Spirit` int(5) NOT NULL DEFAULT '0',
  `Skill_Speed` int(5) NOT NULL DEFAULT '0',
  `Skill_Zanjutsu` int(4) NOT NULL,
  `Skill_Kido` int(4) NOT NULL,
  `Skill_Hoho` int(4) NOT NULL,
  `Skill_Hakuda` int(4) NOT NULL,
  `Skill_Reset` int(4) NOT NULL,
  `Skill_Duration` int(4) NOT NULL DEFAULT '0',
  `Skill_Type_Damage` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Skill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `enemy_skills_standart_learn`
--

CREATE TABLE IF NOT EXISTS `enemy_skills_standart_learn` (
  `Learn_id` int(11) NOT NULL AUTO_INCREMENT,
  `Skill_id` int(4) NOT NULL,
  `Char_id` int(4) NOT NULL,
  `Date_learn` date NOT NULL,
  `Remaining` int(2) NOT NULL DEFAULT '0',
  `Duration` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Learn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Структура таблицы `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(7) NOT NULL,
  `to` int(7) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `missions`
--

CREATE TABLE IF NOT EXISTS `missions` (
  `Miss_id` int(5) NOT NULL AUTO_INCREMENT,
  `Miss_Number` int(5) NOT NULL,
  `Miss_Type` int(2) NOT NULL,
  `Miss_Title` varchar(200) NOT NULL,
  `Miss_Text` text NOT NULL,
  `Miss_Time` time NOT NULL,
  `Miss_Content` text NOT NULL,
  PRIMARY KEY (`Miss_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `missions`
--

INSERT INTO `missions` (`Miss_id`, `Miss_Number`, `Miss_Type`, `Miss_Title`, `Miss_Text`, `Miss_Time`, `Miss_Content`) VALUES
(1, 1, 1, 'Основные характеристики', 'В этой миссии вы узнаете об основных характеристиках, узнаете за что каждая их них отвечает.', '00:05:00', 'Контент миссии'),
(2, 2, 1, 'Боевая система', 'В это миссии вы постигните основы боевой системы.', '00:05:00', 'Здесь контент миссии');

-- --------------------------------------------------------

--
-- Структура таблицы `missions_complete`
--

CREATE TABLE IF NOT EXISTS `missions_complete` (
  `Miss_Com_id` int(11) NOT NULL AUTO_INCREMENT,
  `Miss_id` int(5) NOT NULL,
  `Miss_Char` int(9) NOT NULL,
  `Miss_Start` datetime NOT NULL,
  `Miss_End` datetime NOT NULL,
  `Miss_Status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Miss_Com_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `missions_complete`
--

INSERT INTO `missions_complete` (`Miss_Com_id`, `Miss_id`, `Miss_Char`, `Miss_Start`, `Miss_End`, `Miss_Status`) VALUES
(11, 2, 5, '2014-08-08 11:07:29', '2014-08-08 11:12:29', 2),
(10, 1, 5, '2014-08-06 13:10:39', '2014-08-06 13:15:39', 2),
(12, 1, 4, '2015-05-07 10:58:13', '2015-05-07 11:03:13', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `author` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `meta_d`, `meta_k`, `description`, `text`, `date`, `author`) VALUES
(1, 'Супер новость', '', '', 'мировые новости', 'мировые новости', '2014-01-18', 'Hichas');

-- --------------------------------------------------------

--
-- Структура таблицы `skills_standart`
--

CREATE TABLE IF NOT EXISTS `skills_standart` (
  `Skill_id` int(5) NOT NULL AUTO_INCREMENT,
  `Skill_Type` int(2) NOT NULL,
  `Skill_Nomber` int(3) NOT NULL,
  `Skill_Name` varchar(50) NOT NULL,
  `Skill_Text` text NOT NULL,
  `Skill_Image` varchar(100) NOT NULL,
  `Skill_Damage` int(4) NOT NULL,
  `Skill_Rejatsu` int(4) NOT NULL,
  `Skill_Endurance` int(4) NOT NULL,
  `Skill_Strength` int(5) NOT NULL DEFAULT '0',
  `Skill_Spirit` int(5) NOT NULL DEFAULT '0',
  `Skill_Speed` int(5) NOT NULL DEFAULT '0',
  `Skill_Zanjutsu` int(4) NOT NULL,
  `Skill_Kido` int(4) NOT NULL,
  `Skill_Hoho` int(4) NOT NULL,
  `Skill_Hakuda` int(4) NOT NULL,
  `Skill_Reset` int(4) NOT NULL,
  `Skill_Duration` int(4) NOT NULL DEFAULT '0',
  `Skill_Type_Damage` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Skill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `skills_standart`
--

INSERT INTO `skills_standart` (`Skill_id`, `Skill_Type`, `Skill_Nomber`, `Skill_Name`, `Skill_Text`, `Skill_Image`, `Skill_Damage`, `Skill_Rejatsu`, `Skill_Endurance`, `Skill_Strength`, `Skill_Spirit`, `Skill_Speed`, `Skill_Zanjutsu`, `Skill_Kido`, `Skill_Hoho`, `Skill_Hakuda`, `Skill_Reset`, `Skill_Duration`, `Skill_Type_Damage`) VALUES
(1, 1, 1, 'Прямой удар', 'Это простой удар рукой, не требует никаких знаний боевых искусств.', 'hakuda_1.png', 47, 0, 10, 0, 0, 0, 0, 0, 0, 5, 1, 0, 1),
(2, 1, 2, 'This is Sparta!!!', 'Мощный удар ногой в солнечное сплетение, этот удар знаменит тем, что его использовал царь Леонид, чтобы скинуть посланника.', 'hakuda_2.png', 100, 0, 45, 0, 0, 0, 0, 0, 0, 10, 2, 0, 1),
(3, 1, 3, 'Вот это круто!', 'Выставляя два пальца вверх, вы показываете , что анально покараете врага.', 'hakuda_3.png', 60, 0, 17, 0, 0, 0, 0, 0, 0, 5, 3, 0, 1),
(4, 1, 4, 'Духовный хук', 'Данная техника представляет собой обычный удар с размаха с использование духовной энергии!', 'hakuda_4.png', 80, 15, 20, 0, 0, 0, 0, 2, 0, 10, 3, 0, 1),
(5, 1, 5, 'Убийственный взгляд!', 'Вы смотрите на противника убийственным взглядом c испусканием духовной энергии и он впадает в панику, поэтому он пропускает мощный удар по компалу.', 'hakuda_5.png', 100, 20, 30, 0, 0, 0, 0, 5, 0, 15, 3, 0, 2),
(6, 2, 1, 'Вертикальный удар', 'Вертикальный удар мечем, снизу вверх.', 'zanjutsu_1.png', 60, 0, 30, 0, 0, 0, 5, 0, 0, 0, 2, 0, 1),
(8, 3, 1, 'Хадо №1 Sho', 'Хадо, как хадо. Шмаляешь сгустком реацу из пальца.', 'hado_1.png', 50, 10, 0, 0, 0, 0, 0, 5, 0, 0, 1, 0, 2),
(9, 4, 1, 'Сенка', 'Перемещаясь за спину противника, атакующий наносит два быстрых удара в Saketsu и Hakusui.', 'hoho_1.png', 200, 50, 10, 0, 0, 0, 50, 0, 50, 0, 3, 0, 1),
(10, 44, 1, 'Шинпо <Практик>', 'Шинпо уровня "Практик", позволяет быстро двигаться в течение короткого периода времени, преодолевая небольшие расстояния.', 'shunpo_1.png', 0, 25, 25, 0, 0, 20, 0, 0, 30, 0, 5, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `skills_standart_learn`
--

CREATE TABLE IF NOT EXISTS `skills_standart_learn` (
  `Learn_id` int(11) NOT NULL AUTO_INCREMENT,
  `Skill_id` int(4) NOT NULL,
  `Char_id` int(4) NOT NULL,
  `Date_learn` date NOT NULL,
  `Remaining` int(2) NOT NULL DEFAULT '0',
  `Duration` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Learn_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `skills_standart_learn`
--

INSERT INTO `skills_standart_learn` (`Learn_id`, `Skill_id`, `Char_id`, `Date_learn`, `Remaining`, `Duration`) VALUES
(1, 2, 5, '2014-03-12', 0, 0),
(2, 1, 5, '2014-03-12', 1, 0),
(3, 6, 5, '2014-03-12', 0, 0),
(4, 1, 4, '2014-03-12', 0, 0),
(5, 6, 4, '2014-03-12', 0, 0),
(6, 3, 4, '2014-03-12', 0, 0),
(7, 3, 5, '2014-03-15', 0, 0),
(8, 10, 5, '2014-03-21', 0, 0),
(9, 4, 5, '2014-04-05', 0, 0),
(10, 8, 5, '2014-06-18', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `story_mode`
--

CREATE TABLE IF NOT EXISTS `story_mode` (
  `SM_id` int(4) NOT NULL AUTO_INCREMENT,
  `SM_Arca` int(2) NOT NULL,
  `SM_Nomber` int(3) NOT NULL,
  `SM_Title` varchar(150) NOT NULL,
  `SM_Text` text NOT NULL,
  `SM_Char` int(7) NOT NULL,
  `SM_Enemy` int(4) NOT NULL,
  `SM_Time` time NOT NULL,
  `SM_Image` varchar(150) NOT NULL,
  PRIMARY KEY (`SM_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `story_mode`
--

INSERT INTO `story_mode` (`SM_id`, `SM_Arca`, `SM_Nomber`, `SM_Title`, `SM_Text`, `SM_Char`, `SM_Enemy`, `SM_Time`, `SM_Image`) VALUES
(1, 1, 1, 'Первая встреча!', 'Первое сражение Ичиго с пустым.', 0, 1, '00:05:00', 'story_mode_1_mini.png'),
(2, 1, 2, 'Битва с братом Иное!', 'Битва с братом Иное!', 0, 2, '00:05:00', 'story_mode_3_mini.png'),
(3, 1, 3, 'Битва с Большой Башкой!', 'Битва с Большой Башкой!', 0, 3, '00:05:00', 'story_mode_4_mini.png');

-- --------------------------------------------------------

--
-- Структура таблицы `story_mode_complete`
--

CREATE TABLE IF NOT EXISTS `story_mode_complete` (
  `SMC_id` int(9) NOT NULL AUTO_INCREMENT,
  `SM_id` int(4) NOT NULL,
  `SMC_Char` int(7) NOT NULL,
  `SMC_Date` datetime NOT NULL,
  `SMC_Count_Move` int(2) NOT NULL DEFAULT '1',
  `SMC_Status` int(2) NOT NULL DEFAULT '0',
  `SMC_CurHealth` int(5) NOT NULL,
  `SMC_CurRejatsu` int(5) NOT NULL,
  `SMC_CurEndurance` int(5) NOT NULL,
  UNIQUE KEY `SMC_id` (`SMC_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=198 ;

--
-- Дамп данных таблицы `story_mode_complete`
--

INSERT INTO `story_mode_complete` (`SMC_id`, `SM_id`, `SMC_Char`, `SMC_Date`, `SMC_Count_Move`, `SMC_Status`, `SMC_CurHealth`, `SMC_CurRejatsu`, `SMC_CurEndurance`) VALUES
(183, 2, 5, '2014-04-05 11:20:42', 4, 2, -35, 200, 170),
(179, 3, 5, '2014-03-27 17:25:41', 3, 2, -44, 200, 170);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `gender` varchar(15) NOT NULL,
  `char_id` int(11) NOT NULL DEFAULT '0',
  `full_name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `remember_code` (`remember_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `gender`, `char_id`, `full_name`, `birthday`) VALUES
(1, '\0\0', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, '10bd3f40a4ebb18c8e7165019d352680f5f34bc7', 1268889823, 1394299387, 1, '', 0, '', '0000-00-00'),
(2, '', 'Hichas', 'shaman', NULL, 'Hichas@yandex.ru', NULL, NULL, NULL, NULL, 0, NULL, NULL, '', 0, '', '0000-00-00'),
(3, '\0\0', 'rambler', '$2y$08$nr3MZQwTsmH08RA0UtgZ6.p4963FlwhfPSTCaTlGr1XsjV2mvo5VG', NULL, 'bleach@mail.ru', NULL, NULL, NULL, NULL, 1393852127, 1393852358, 1, 'Мужчина', 0, '', '0000-00-00'),
(17, '\0\0', 'Калин Глеб5', '$2y$08$VTZFawLGYZ0R6VxYi9XDYu0t.TctU6cTuKjfly/Rt6/8WBzLjR0oO', NULL, 'glebkalin@mail.ru', NULL, NULL, NULL, 'df1026aafb036e21e7f2f63a72a76eaa52cb730c', 1394339926, 1430978264, 1, 'Мужчина', 0, 'Калин Глеб', '1995-01-03'),
(5, '\0\0', 'Глеб Калин', '$2y$08$PwjuD3G5vlFNh0L32Kh1kO6j1/H9RknoluF1/yPMMYzS3oxvoqLw6', NULL, 'hichas2@yandex.ru', NULL, NULL, NULL, NULL, 1394293485, 1394293485, 1, '', 0, '', '0000-00-00'),
(6, '\0\0', 'Калин Глеб', '$2y$08$qvlOqOWgHqovZa5PtXP8n.zx/BghbC6dis4TOecRKWX.BV3kcoF42', NULL, 'hichas3@yandex.ru', NULL, NULL, NULL, NULL, 1394296326, 1394296326, 1, 'Мужчина', 0, '', '0000-00-00'),
(7, '\0\0', 'Калин Глеб1', '$2y$08$2JM/gsmaa2eOlD.inM3EpeaLnI431LYkRIVXPWLWzkzkDX7vuyFzq', NULL, 'hichas4@yandex.ru', NULL, NULL, NULL, NULL, 1394296592, 1394296592, 1, 'Мужчина', 0, '', '0000-00-00'),
(8, '\0\0', 'Калин Глеб2', '$2y$08$afBcxUAhe3uQ5XzIgH3C1OpzdL5b5DhSZ5pOoOSS1ALKkvjzPkLwm', NULL, 'hichas5@yandex.ru', NULL, NULL, NULL, NULL, 1394296633, 1394296633, 1, 'Мужчина', 0, '', '0000-00-00'),
(9, '\0\0', 'Калин Глеб3', '$2y$08$0GKOsGQ8AMBO8/8iVgoP.enC7KU9WHu96R32wQfRGW7dH4f/l5b2.', NULL, 'hichas6@yandex.ru', NULL, NULL, NULL, NULL, 1394296764, 1394299272, 1, 'Мужчина', 0, 'Калин Глеб', '0000-00-00'),
(10, '\0\0', 'Калин Глеб4', '$2y$08$yRcSyvbiWagwVeEOLYZb/uZjOHADA5kh7tYHhfms0K6/BroOeQ6zO', NULL, 'hichas7@yandex.ru', NULL, NULL, NULL, NULL, 1394296829, 1394296829, 1, 'Мужчина', 0, 'Калин Глеб', '0000-00-00'),
(11, '\0\0', 'rambler1', '$2y$08$Ok5dAtJiAwADQ59j9Dr03OSZqgCQK/FOMc47VXqUmNC1DMv8Tfp7.', NULL, 'hichas8@yandex.ru', NULL, NULL, NULL, NULL, 1394299697, 1394299697, 1, 'Мужчина', 0, 'rambler', '0000-00-00'),
(12, '\0\0', 'rambler2', '$2y$08$X5VXST3jARRQgunMNW77t.bMo3o3Sjdf6Y5ptI4vQHSpBwS1cykFC', NULL, 'hichas9@yandex.ru', NULL, NULL, NULL, NULL, 1394299841, 1394299841, 1, 'Мужчина', 0, 'rambler', '0000-00-00'),
(13, '\0\0', 'rambler3', '$2y$08$vXiz5vDWJtpJOv8zTZNc8uV.N0ymg80z4b0EULTxWK/I71/uCQQ3i', NULL, 'hichas10@yandex.ru', NULL, NULL, NULL, NULL, 1394299988, 1394299988, 1, 'Мужчина', 0, 'rambler', '0000-00-00'),
(14, '\0\0', 'rambler4', '$2y$08$j.b89hvzZYUNDOnM.mmhKutuqhaGMYBNS0uki78AtuPxOH86Xnwxu', NULL, 'hichas11@yandex.ru', NULL, NULL, NULL, NULL, 1394300230, 1394300230, 1, 'Мужчина', 0, 'rambler', '0000-00-00'),
(15, '\0\0', 'tdsa', '$2y$08$DzqFC0IFG.posyMt07JRgulde28pb3iBvGtsQ084xIzGgu8tpiO6C', NULL, 'hichas77@yandex.ru', NULL, NULL, NULL, NULL, 1394300361, 1394300361, 1, 'Мужчина', 0, 'tdsa', '0000-00-00'),
(16, '\0\0', 'tdsa1', '$2y$08$PnfQkI.28a7DU0elrA26huJSaOuiR0tI2spmAhpaYYcNRKLXm.pqG', NULL, 'hichas78@yandex.ru', NULL, NULL, NULL, NULL, 1394300442, 1394300465, 1, 'Мужчина', 0, 'Вася Рогов', '1965-03-10');

-- --------------------------------------------------------

--
-- Структура таблицы `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 2),
(17, 17, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
