<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_account extends CI_Controller {
    
      function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ?
		$this->load->library('mongo_db') :

		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');
	}
    
    public function index ()
    {
        
              
        if ($this->input->post('my_account'))
        {
            
            // Вызов функции для сохранения данных
            
            $user = $this->ion_auth->user()->row();
            
            $id = $user->id;
            
            $this->save_info($id);
            
        }else
        {
            if (!$this->ion_auth->logged_in()) // Если не авторизован, то вернуть на главную
            {
                redirect('/', 'refresh');
            }
            
            
            $data = array();
        
            $data['content'] = '';
            
            $data['styles'] = array();
            $data['javascript'] = array();
            
            $data['message_account'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
            
            $user = $this->ion_auth->user()->row();
            
            $birthday = $user->birthday; // День рождения
		   
		    $yy = substr($birthday,0,4); // Год
			$mm = substr($birthday,5,2); // Месяц
			$dd = substr($birthday,8,2); // День
            
            if ($mm == "00") $mm1="месяц";
            if ($mm == "01") $mm1="январь";
    		if ($mm == "02") $mm1="февраль";
    		if ($mm == "03") $mm1="март";
    		if ($mm == "04") $mm1="апрель";
    		if ($mm == "05") $mm1="май";
    		if ($mm == "06") $mm1="июнь";
    		if ($mm == "07") $mm1="июль";
    		if ($mm == "08") $mm1="август";
    		if ($mm == "09") $mm1="сентябрь";
    		if ($mm == "10") $mm1="октябрь";
    		if ($mm == "11") $mm1="ноябрь";
    		if ($mm == "12") $mm1="декабрь";
            
            $data['dd'] = "<option value=".$dd." selected>".$dd."</option>";
            
            $data['mm'] = "<option value=".$mm." selected>".$mm1."</option>";
            
            $data['yy'] = "<option value=".$yy." selected>".$yy."</option>";
            
            $data['full_name'] = array(
				'name'  => 'full_name',
				'id'    => 'full_name',
				'type'  => 'text',
				'value' => $user->full_name,
                'size' => '50',
                'class' => 'input_field',
			);

            
            $this->base_lib->get_view($data,'user/v_my_account'); 
        }   
            
    }
     
    function save_info($id)
	{

		//validate form input
        $this->form_validation->set_rules('full_name', 'full_name', 'xss_clean');

		if ($this->form_validation->run() == true)
		{
		  
             $day = $this->input->post('day');
  	         $month = $this->input->post('month');
        	 $year = $this->input->post('year');
        	 
        	 $birthday = $year."-".$month."-".$day;
             
    		$data_user = array(
    					'full_name' => strtolower($this->input->post('full_name')),
                        'birthday' => $birthday,
    					 );

			if ($this->ion_auth->update($id,$data_user))
			{
				// Пользователь успешно обновил данные 
				$this->session->set_flashdata('message', $this->ion_auth->messages());
                
                $data['message_account'] = 'Данные успешно обновлены!';
                
                $data['styles'] = array();
                $data['javascript'] = array();
                
                $user = $this->ion_auth->user()->row();
            
                $birthday = $user->birthday; // День рождения
    		   
    		    $yy = substr($birthday,0,4); // Год
    			$mm = substr($birthday,5,2); // Месяц
    			$dd = substr($birthday,8,2); // День
                
                if ($mm == "01") $mm1="январь";
        		if ($mm == "02") $mm1="февраль";
        		if ($mm == "03") $mm1="март";
        		if ($mm == "04") $mm1="апрель";
        		if ($mm == "05") $mm1="май";
        		if ($mm == "06") $mm1="июнь";
        		if ($mm == "07") $mm1="июль";
        		if ($mm == "08") $mm1="август";
        		if ($mm == "09") $mm1="сентябрь";
        		if ($mm == "10") $mm1="октябрь";
        		if ($mm == "11") $mm1="ноябрь";
        		if ($mm == "12") $mm1="декабрь";
                
                $data['dd'] = "<option value=".$dd." selected>".$dd."</option>";
                
                $data['mm'] = "<option value=".$mm." selected>".$mm1."</option>";
                
                $data['yy'] = "<option value=".$yy." selected>".$yy."</option>";
                
                $data['full_name'] = array(
    				'name'  => 'full_name',
    				'id'    => 'full_name',
    				'type'  => 'text',
    				'value' => $user->full_name,
                    'size' => '50',
                    'class' => 'input_field',
    			);
                
				$this->base_lib->get_view($data,'user/v_my_account'); 
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
				$data['message_account'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data['styles'] = array();
                $data['javascript'] = array();
                
                $user = $this->ion_auth->user()->row();
            
                $birthday = $user->birthday; // День рождения
    		   
    		    $yy = substr($birthday,0,4); // Год
    			$mm = substr($birthday,5,2); // Месяц
    			$dd = substr($birthday,8,2); // День
                
                if ($mm == "01") $mm1="январь";
        		if ($mm == "02") $mm1="февраль";
        		if ($mm == "03") $mm1="март";
        		if ($mm == "04") $mm1="апрель";
        		if ($mm == "05") $mm1="май";
        		if ($mm == "06") $mm1="июнь";
        		if ($mm == "07") $mm1="июль";
        		if ($mm == "08") $mm1="август";
        		if ($mm == "09") $mm1="сентябрь";
        		if ($mm == "10") $mm1="октябрь";
        		if ($mm == "11") $mm1="ноябрь";
        		if ($mm == "12") $mm1="декабрь";
                
                $data['dd'] = "<option value=".$dd." selected>".$dd."</option>";
                
                $data['mm'] = "<option value=".$mm." selected>".$mm1."</option>";
                
                $data['yy'] = "<option value=".$yy." selected>".$yy."</option>";
                
                $data['full_name'] = array(
    				'name'  => 'full_name',
    				'id'    => 'full_name',
    				'type'  => 'text',
    				'value' => $user->full_name,
                    'size' => '50',
                    'class' => 'input_field',
    			);
                
                
				$this->base_lib->get_view($data,'user/v_my_account');
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$data['message_account'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data['styles'] = array();
             $data['javascript'] = array();
            
            $user = $this->ion_auth->user()->row();
            
            $birthday = $user->birthday; // День рождения
		   
		    $yy = substr($birthday,0,4); // Год
			$mm = substr($birthday,5,2); // Месяц
			$dd = substr($birthday,8,2); // День
            
            if ($mm == "01") $mm1="январь";
    		if ($mm == "02") $mm1="февраль";
    		if ($mm == "03") $mm1="март";
    		if ($mm == "04") $mm1="апрель";
    		if ($mm == "05") $mm1="май";
    		if ($mm == "06") $mm1="июнь";
    		if ($mm == "07") $mm1="июль";
    		if ($mm == "08") $mm1="август";
    		if ($mm == "09") $mm1="сентябрь";
    		if ($mm == "10") $mm1="октябрь";
    		if ($mm == "11") $mm1="ноябрь";
    		if ($mm == "12") $mm1="декабрь";
            
            $data['dd'] = "<option value=".$dd." selected>".$dd."</option>";
            
            $data['mm'] = "<option value=".$mm." selected>".$mm1."</option>";
            
            $data['yy'] = "<option value=".$yy." selected>".$yy."</option>";
            
            $data['full_name'] = array(
				'name'  => 'full_name',
				'id'    => 'full_name',
				'type'  => 'text',
				'value' => $user->full_name,
                'size' => '50',
                'class' => 'input_field',
			);


			$this->base_lib->get_view($data,'user/v_my_account');
		}
	}
    
    function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}
    
    
    
    
}

?>