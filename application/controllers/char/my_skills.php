<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_skills extends CI_Controller
{
    
    
    public function index()
    {
                
        if ($this->base_lib->check_char() == false) // Проверка, выбран ли персонаж
        {
           redirect('/'); 
        } 
        
        $data = array();
    
        $data['content'] = '';
        
        $data['styles'] = array();
        $data['javascript'] = array('js/jquery.js','js/easyTooltip.js','js/learn_skill.js');
        
        // Получение данных о персонаже
        $user_id = $this->base_lib->get_user_id();
        
        $this->load->model('char_model');
        
        $character = array();
        
        $character = $this->char_model->get_char($user_id);
        
        
        $char = $character [0]; // Записываем данные персонажа
        
        $char_id = $character [0]['id_char']; // Получаем id выбранного перса
        
        $data['character'] = $char;
        
        $data['skills'] = $this->char_model->get_my_skill($char_id);
        
        //-------------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'char/v_my_skills'); 
        
    }
    
        
    
}

?>
