<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller
{
    
    
    public function index()
    {
        
        if (!$this->base_lib->check_char()) // Проверка, выбран ли персонаж
        {
           redirect('/'); 
        } 
        
        $data = array();
    
        $data['content'] = '';
        
        $data['styles'] = array('styles/chat_style.css');
        $data['javascript'] = array('js/jquery.js','js/chat.js');
        
        // Получение данных о персонаже
        
        $user_id = $this->base_lib->get_user_id();
        
        $this->load->model('char_model');
    
        
        $character = $this->char_model->get_char($user_id);
        
        $char = $character [0]; // Записываем данные персонажа
        
        $char_id = $character [0]['id_char']; // Получаем id выбранного перса
        
        $data['character'] = $char;
        
        //-------------------------------------
        
        // Получение данных о локации
        
        $this->load->model('map_model');
        
        $data['building'] = $this->map_model->get_building($char['Building']);
        
        //-------------------------------------
        
        // Мини-чат ---------------------------------------
        
        $chat_logdata = $this->get_chat_log($char_id,0);
				
        $data['message_code'] = $chat_logdata['log'];
        $data['last_act'] = $chat_logdata['last_act'];
       
       // ------------------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'map/v_location'); 
        
    }
    
    function safe_var ($var) // защита переменных
    {
    	$var = trim($var);
    	$var = mysql_real_escape_string($var);
    	$var = htmlspecialchars($var);
    	return $var;
    }
        
    public function get_chat_log($Char_id,$from_last_act = false) // Получение чата
    {	 
        $this->load->model('chat_model');
        
        $chatlog_data = array ();
        
        $chatlog_data['log'] = "";
        
    	$sel_result = $this->chat_model->get_chat($from_last_act);
        
        if($sel_result != false)
        {
            foreach ($sel_result as $sel_row) 
            {
               if ($sel_row['Char_id'] == $Char_id)
    			{
    				$chatlog_data['log'] .= '<p class="chat_post_my"><span class="chat_mess_time">'.date("d.m.Y H:i:s",strtotime($sel_row['Message_date'])).'</span><span class="chat_nickname"> (id:'.$sel_row['Char_id'].')</span></p><div class="mess_text_area">'.$this->url_parsing($sel_row['Message_text']).'</div>';
    				
    			}
    			else
    			{
    				$chatlog_data['log'] .= '<p class="chat_post_other"><span class="chat_mess_time">'.date("d.m.Y H:i:s",strtotime($sel_row['Message_date'])).'</span><span class="chat_nickname"> (id:'.$sel_row['Char_id'].')</span></p><div class="mess_text_area">'.$this->url_parsing($sel_row['Message_text']).'</div>';
    				
    			}
    			
    			$chatlog_data['last_act'] = $sel_row['Chat_id']; 
            }
        }else
        {
            $chatlog_data['log'] = "";
            $chatlog_data['last_act'] = 0;
        }
        
        return $chatlog_data; // Возвращаем лог чата
    }
    
    function url_parsing($u)
    {
    	$u = preg_replace('(((https?|ftp)\:\/\/)([a-zА-Яа-я0-9\-\.]+)?(([a-zА-Яа-я0-9\-])+(!?\.[рфa-z]{2,6})+|localhost)(\/{1}(\S)*)?)u', "<a href='$0' target='_blank' class='parsed_url'>$0</a>", $u);
    	return nl2br($u);
    }
    
    
    public function chat_script () // скрипт обработки данных
    {
    	// отправка сообщения
        if ($_POST['action'] == 'add_message')
        {
        	$Chat_room = 0;
        	$Char_id = $_POST['Char_id'];
        	$Char_id_to = 0;
        	$Message_text = $this->safe_var($_POST['message_text']);
            
            // текущее время
            $now_time = date("Y-m-d H:i:s");
            
            $data_message = array (
            
                'Chat_room' => $Chat_room,
                'Char_id' => $Char_id,
                'Char_id_to' => $Char_id_to,
                'Message_text' => $Message_text,
                'Message_date' => $now_time
                
            );
            
            $this->load->model('chat_model');
            
        	$ins_result = $this->chat_model->add_message($data_message);
        }
        
        // получение новых сообщений
        if ($_POST['action'] == 'get_chat_message')
        {
        	
        	$from_last_act = $_POST['last_act'];
        	$Char_id = $_POST['Char_id'];
        	
        	$chat_logdata_2 = $this->get_chat_log($Char_id,$from_last_act);
        
        	
        	if ($chat_logdata_2['log']!="")
        	{
        		$message_code = $chat_logdata_2['log'];
        		$last_act = $chat_logdata_2['last_act'];
        	
        		$data_str = array(
        						  'its_ok' => 1,
        						  'message_code' => $message_code, 
        						  'last_act' => $last_act
        						  );
        		
        	}	
        	else
        	{
        		$data_str = array('its_ok' => 0);	
        	}
        	
        	echo json_encode($data_str);
        }
    }
}



?>
