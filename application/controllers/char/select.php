<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Select extends CI_Controller
{

    public function index()
    {
        
        $this->base_lib->check_user(); // Проверка авторизации
        
        if ($this->input->post('select'))
        {
            
            //Вызов функции выбора персонажа
            $this->select_char();
            
        }else
        {
        
        $data = array();
    
        $data['content'] = '';
        
        $data['styles'] = array();
        $data['javascript'] = array();
        
        // Получение данных о персонажах пользователя
        
        $user = $this->ion_auth->user()->row();
        
        $user_id = $user->id;
        
        $this->load->model('char_model');
        
        $characters = array();
        
        $characters =  $this->char_model->get_all_char($user_id);
        
        $data['characters'] = $characters;
        
        //---------------------------------------------------
        
        
        // Проверка, выбран ли персонаж
        if ($this->char_model->get_char($user_id))
        {
            redirect('/');
        }
        //-----------------------
        
        
        if ($data['characters'] == NULL)
        {
             $data['message_char'] = 'Вы не создали ни одного персонажа!'; // Сообщение об ошибка и успешном изменнении данных
        }else
        {
            $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
        }
        

        $this->base_lib->get_view($data,'char/v_select'); 
        
        }
    }
    
    
    public function select_char() // Функция выбора персонажа
    {
        
        $this->base_lib->check_char();
        
        $user = $this->ion_auth->user()->row();
        
        $user_id = $user->id;
        
        $char_id = $this->input->post('id_char');
        
        $this->char_model->select_character($user_id,$char_id);
        
        redirect('/');
               
    }
}

?>
