<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller
{
    
    
    public function index()
    {
        
        if (!$this->ion_auth->logged_in()) // Если не авторизован, то вернуть на главную
        {
            redirect('/', 'refresh');
        }
        
        // Проверка, выбран ли персонаж
        
        $user = $this->ion_auth->user()->row();
        
        $user_id = $user->id;
        
        $this->load->model('char_model');
        
        if ($this->char_model->get_char($user_id))
        {
            redirect('/');
        }
        //-----------------------
        
        if ($this->input->post('create'))
        {
            
            //Вызов функции создания персонажа
            $this->create_char();
            
        }else
        {
        
        $data = array();
    
        $data['content'] = '';
        
        $data['styles'] = array();
        $data['javascript'] = array();
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
        
        $data['char_biografia'] = array(
				'name'  => 'char_biografia',
				'id'    => 'char_biografia',
				'type'  => 'text',
				'value' => 'Здесь можете написать историю вашего персонажа.',
                'size' => '50',
                'cols' => '40',
                'rows' => '5',
                'class' => 'input_field',
			);
            
        $this->base_lib->get_view($data,'char/v_create'); 
        
        }
    }
    
    
    public function create_char() // Функция проверки данных и создание персонажа
    {
        
        if (!$this->ion_auth->logged_in()) // Если не авторизован, то вернуть на главную
        {
            redirect('/', 'refresh');
        }
        
        // Проверка, выбран ли персонаж
        
        $user = $this->ion_auth->user()->row();
        
        $user_id = $user->id;
        
        $this->load->model('char_model');
        
        if ($this->char_model->get_char($user_id))
        {
            redirect('/');
        }
        //-----------------------
        
        $this->form_validation->set_rules('char_name', 'char_name', 'required|xss_clean|min_length[6]|max_length[20]|alpha_dash|is_unique[characters.Char_Name]');
        $this->form_validation->set_rules('char_biografia', 'char_biografia', 'xss_clean');
        
        if ($this->form_validation->run() == true) // Валидация пройдена
		{
			$char_name = strtolower($this->input->post('char_name'));
			$char_rasa  = $this->input->post('char_rasa');
			$char_biografia = $this->input->post('char_biografia');
	
            $char_day = date("Y-m-d");;
            
            // ------------Сдандартные аватары---------------
				
			if ($char_rasa == 1 ) // Если Шинигами
			{
				$char_ava1 = "img/chars/shinigami_1.jpg";
			} else if ($char_rasa == 2) // Если пустой
			{
				$char_ava1 = "img/chars/hollow_1.jpg";
			}
			
			// --------------------------------------------
			
			// ---------Стартовая локация------------------
			
			if ($char_rasa == 1 ) // Если Шинигами
			{
				$char_location = 1;
				$char_building = 1;
			}
			
			// --------------------------------------------
        
            
            $user = $this->ion_auth->user()->row(); // Получение пользователя
            $user_id = $user->id;
            
            // Массив данных по персонажу
            $data_char = array(
                'id_user'  => $user_id,
				'Char_Name'  => $char_name,
				'Char_Rasa'    => $char_rasa,
				'Char_Biografia'  => $char_biografia,
                'Char_Day' => $char_day,
                'Char_Ava1' => $char_ava1,
                'Location' => $char_location,
                'Building' => $char_building,  
			);
            
            $this->load->model('char_model');
            
            if ($this->char_model->create_new_char($data_char))
            {
                redirect('char/select', 'refresh'); //Перенаправление на страницу выбора персонажа, после создания
            }            
            

		}else
        {
                       
            $data['message_char'] = validation_errors() ;
            
            $data['styles'] = array();
            $data['javascript'] = array();
            
            $data['char_biografia'] = array(
				'name'  => 'char_biografia',
				'id'    => 'char_biografia',
				'type'  => 'text',
				'value' => $this->input->post('char_biografia'),
                'size' => '50',
                'cols' => '40',
                'rows' => '5',
                'class' => 'input_field',
			);
            
            $this->base_lib->get_view($data,'char/v_create');
            
        }
    
        
        
        
        
    }
}

?>
