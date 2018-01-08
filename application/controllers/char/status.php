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
        
        $data['styles'] = array();
        $data['javascript'] = array();
        
        // Получение данных о персонаже
        $user_id = $this->base_lib->get_user_id();
        
        $this->load->model('char_model');
        
        $data['character'] = $this->char_model->get_char($user_id);
        
        //-------------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'char/v_status'); 
        
    }
    
    
}

?>
