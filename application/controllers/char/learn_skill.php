<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Learn_skill extends CI_Controller
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
        
        $data['skills'] = $this->char_model->get_all_skill($char_id);
        
        //-------------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'char/v_learn_skill'); 
        
    }
    
    public function learn_new_skill ()
    {
        
        if ($this->input->post('Char_id') && $this->input->post('Skill_id'))
        {
            
            $char_id = $this->input->post('Char_id');
    		$skill_id = $this->input->post('Skill_id');
            
            
            $day=date("d");
        	$mon=date("m");
        	$year=date("Y");
        	
        		   
        	$Date_learn = $year."-".$mon."-".$day;
            
            // Массив данных по скилу
            $data_learn = array (
                
                'Skill_id' => $skill_id,
                'Char_id' => $char_id,
                'Date_learn' => $Date_learn
                
            );
            
            $this->load->model('char_model');
            
            if ($this->char_model->learn_new_skill($data_learn))
            {
                echo '<p>Ваш персонаж изучил новую технику!</p>';
            }else
            {
                echo '<p>Ваш персонаж не смог изучить технику!</p>';
            }
            
        }else
        {
          redirect('/');  
        }
        
    }
        
    
}

?>
