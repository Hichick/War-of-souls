<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_Lib
{
    
    // Получение вида сайта 
    public function get_view ($data, $name) // $data - массив данных, $name - название контроллера
    {
        $CI =& get_instance ();
        
        $CI->load->view('v_preheader',$data);
        
        // Проверка авторизации пользователя и вывод меню
        if ($CI->ion_auth->logged_in()) // Если пользователь авторизован
        {
            $player = $CI->ion_auth->user()->row_array();
            
            if ($player['char_id'] != 0) // Если пользователь авторизован и выбран перс
            {
                $CI->load->model('char_model');
                
                $character = $CI->char_model->get_char($player['id']);
                $char = $character [0]; // Записываем данные персонажа
                
                $CI->load->view('header/v_header_char');
                
                if ($char['Char_Status'] == 1) // Если статус персонажа в битве стори мод
                {
                    $CI->load->view('left_block/v_leftblock_in_battle');  
                    
                }else if ($char['Char_Status'] == 0)
                {
                  $CI->load->view('left_block/v_leftblock_char'); 
                   
                }else if ($char['Char_Status'] == 2)  // Если статус персонажа на миссии
                {
                    $CI->load->view('left_block/v_leftblock_on_mission');   
                }
                
                
            }else // Если пользователь авторизован и не выбран перс
            {
                $CI->load->view('header/v_header_no_char');
                $CI->load->view('left_block/v_leftblock_no_char');
            }
     
        }else // Если пользователь не авторизован
        {
            $CI->load->view('header/v_header_login',$data);
            $CI->load->view('left_block/v_leftblock_base');
        }
        
        $CI->load->view($name ,$data);
        $CI->load->view('v_footer');
    }
    
    
    // Проверка на авторизацию
    public function check_user ()
    {
        $CI =& get_instance ();
        
        if ($CI->ion_auth->logged_in()) // Если не авторизован, то вернуть на главную
        {
            return true;
        }
        
        return false;
        
    }
    
    // Получение id акккаунта
    public function get_user_id ()
    {
        $CI =& get_instance ();
        
        $user = $CI->ion_auth->user()->row();
        
        return $user_id = $user->id;
    }
    
    
    // Проверка на авторизацию и на наличие персонажа
    public function check_char ()
    {
        $CI =& get_instance ();
        
        if (!$CI->ion_auth->logged_in()) // Если не авторизован, то вернуть на главную
        {
            redirect('/');
        }
         
        $user = $CI->ion_auth->user()->row();
        
        $user_id = $user->id;
        
        $CI->load->model('char_model');
        
        
        // Проверка, выбран ли персонаж
        if ($CI->char_model->get_char($user_id))
        {
            return true;
        }
        
        return false;
        //-----------------------
            
            
        
        
    }
    
}

?>
