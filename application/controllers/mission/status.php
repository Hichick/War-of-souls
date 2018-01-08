<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller
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
        $data['javascript'] = array('js/jquery.js','js/status_mission.js');
        
        // Получение данных о персонаже
        
        $user_id = $this->base_lib->get_user_id();
        
        $this->load->model('char_model');
    
        
        $character = $this->char_model->get_char($user_id);
        
        $char = $character [0]; // Записываем данные персонажа
        
        $char_id = $character [0]['id_char']; // Получаем id выбранного перса
        
        $data['character'] = $char;
        
        //-------------------------------------
        
        
        // Создание миссии 
        
        
        $this->load->model('mission_model');
        
        
        if ($this->mission_model->check_mission($char_id)) // Проверка есть ли миссия
        {
    
            if ($this->input->post('accept_mission'))
                {
                    $Miss_id = $this->input->post('Miss_id');
                    $Char_id = $this->input->post('Char_id');
                    
                    $Mission = $this->mission_model->get_mission($Miss_id);
                    $Miss_Time = $Mission['Miss_Time']; // Время миссии
                    
                    $Miss_hh = substr($Miss_Time,0,2); // Час
        			$Miss_mm = substr($Miss_Time,3,2); // Минута
        			$Miss_ss = substr($Miss_Time,5,2); // Секунда
            
                    $all_second_start = time(); // Время начала миссии
                    $all_second_end = $all_second_start + $Miss_hh*3600 + $Miss_mm *60 + $Miss_ss*1; // Время конца миссии
                    
                    $Miss_Start = date('Y-m-d H:i:s',$all_second_start);
                    $Miss_End = date('Y-m-d H:i:s',$all_second_end);
                    
                    
                    $data_mission = array (
                    
                    'Miss_id' => $Miss_id,
                    'Miss_Char' => $Char_id,
                    'Miss_Start' => $Miss_Start,
                    'Miss_End' => $Miss_End
                    
                    );
                    
                    $this->mission_model->create_mission($data_mission); // создание миссии
                    
                    $this->char_model->change_status_char($Char_id,2); // изменение статуса персонажа (На миссии)
                    
                    $Mission_status = $this->mission_model->get_mission_char($char_id);
                    
                }
    
        }else
        {
            echo 'Есть миссия';
            
            $Mission_status = $this->mission_model->get_mission_char($char_id);
            $Mission = $this->mission_model->get_mission($Mission_status['Miss_id']);
            
        }
        
        
        
         
         
         $data['mission_status'] = $Mission_status;
         
         $data['mission'] = $Mission;
        
        //-------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'mission/v_status'); 
        
    }
    
    
     public function complete_mission()
    {
        // Конец миссии

    	if ($this->input->post('Miss_Com_id') && $this->input->post('Miss_Char'))
    	{
 	      
            $Miss_Com_id = $this->input->post('Miss_Com_id');
            $Miss_Char = $this->input->post('Miss_Char');
            
            $this->load->model('mission_model');
            $this->load->model('char_model');
            
            $data_mission = array(
            
            'Miss_Status' => 2 // 0 - не пройдена,2 - пройдена, 1 - просмотр результатов
            
            );
            
            $this->char_model->change_status_char($Miss_Char,0); // изменение статуса персонажа
            
            
            if ($this->mission_model->complete_mission($Miss_Com_id,$Miss_Char,$data_mission))
            {
                echo "<p>Миссия пройдена!!!</p>";
            
            }else
        	{
        		echo "<p>Произошла ошибка обработки данных!</p>";		
        	}
            
        }else
    	{
    		echo "<p>Ошибка передачи!</p>";
    	}
        
    }
    
    
}



?>
