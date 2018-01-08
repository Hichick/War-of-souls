<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Study extends CI_Controller
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
        $data['javascript'] = array('js/jquery.js');
        
        // Получение данных о персонаже
        
        $user_id = $this->base_lib->get_user_id();
        
        $this->load->model('char_model');
    
        
        $character = $this->char_model->get_char($user_id);
        
        $char = $character [0]; // Записываем данные персонажа
        
        $char_id = $character [0]['id_char']; // Получаем id выбранного перса
        
        $data['character'] = $char;
        
        //-------------------------------------
        
        
        // Получение миссий 
        
         $this->load->model('mission_model');
         
         $data['missions'] = $this->mission_model->get_all_missions($char_id);
        
        //-------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'mission/v_study'); 
        
    }
    
    
}



?>
