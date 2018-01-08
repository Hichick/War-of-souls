<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class World_map extends CI_Controller
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
        $data['javascript'] = array('js/jquery.js','js/easyTooltip.js','js/moving_world.js');
        
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
        
        $data['world'] = $this->map_model->get_world($char['Location']);
        
        //------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'map/v_world_map');
        
    }
    
    public function moving_to ()
    {
        // Перемещение перса
        if ($_POST['action'] == 'Move_To')
        {
        	$Location_To = $_POST['Location_To'];
        	$Building_To = $_POST['Building_To'];
        	$Char_id = $_POST['Char_id'];
            
            $data_moving = array (
            
            'Location' => $Location_To,
            'Building' => $Building_To
            
            );
            
            $this->load->model('map_model');
        	
        	$ins_result = $this->map_model->change_building_location($Char_id,$data_moving);
        }
    }
    
    
}

?>
