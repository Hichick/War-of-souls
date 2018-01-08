<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {
    
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
    
    //регистрация аккаунта
	public function create()
	{

		//Проверка формы на валидность
		$this->form_validation->set_rules('username', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|matches[email_confirm]');
        $this->form_validation->set_rules('email_confirm', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('username'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'gender' => $this->input->post('gender'),
                'full_name' => $username,
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//Аккаунт зарегестрирован, показываем форму входа и выводим сообщение о регистрации
            
			$this->session->set_flashdata('message', $this->ion_auth->messages());
            $data['message_login'] = "Аккаунт зарегистирован, можете войти через форму входа!";
            $data['styles'] = array();
             $data['javascript'] = array();
            
            $data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
                'class' => 'input_field',
				'value' => $this->form_validation->set_value('identity'),
    			);
                
    			$data['password'] = array('name' => 'password',
    				'id' => 'password',
    				'type' => 'password',
                    'class' => 'input_field',
    			);
                
				$this->base_lib->get_view($data,'user/v_login');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$data['message_reg'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $data['styles'] = array();
        $data['javascript'] = array();

			$data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username'),
                'size' => '50',
                'class' => 'input_field',
			);
			$data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
                'size' => '50',
                'class' => 'input_field',
			);
            $data['email_confirm'] = array(
				'name'  => 'email_confirm',
				'id'    => 'email_confirm',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email_confirm'),
                'size' => '50',
                'class' => 'input_field',
			);
			$data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
                'class' => 'input_field',
			);
			$data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
                'class' => 'input_field',
			);
            
            $this->base_lib->get_view($data,'user/v_registration');
			//$this->_render_page('user/v_registration', $data);
		}
	}
    
    
    public function index ()
    {
        
              
        if ($this->input->post('reg'))
        {
            $this->create();
        }else
        {
                if ($this->ion_auth->logged_in())
            {
                redirect('', 'refresh');
            }
            
            
            $data = array();
        
            $data['content'] = '';
            $data['message_reg'] = '';
            
            $data['styles'] = array();
            $data['javascript'] = array();
            
            $data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username'),
                'class' => 'input_field',
                'size' => '50',
			);
    		$data['email'] = array(
    				'name'  => 'email',
    				'id'    => 'email',
    				'type'  => 'text',
    				'value' => $this->form_validation->set_value('email'),
                    'size' => '50',
                    'class' => 'input_field',
    			);
             $data['email_confirm'] = array(
    		'name'  => 'email_confirm',
    		'id'    => 'email_confirm',
    		'type'  => 'text',
    		'value' => $this->form_validation->set_value('email_confirm'),
            'size' => '50',
            'class' => 'input_field',
			);
    		$data['password'] = array(
    				'name'  => 'password',
    				'id'    => 'password',
    				'type'  => 'password',
    				'value' => $this->form_validation->set_value('password'),
                    'class' => 'input_field',
    			);
    		$data['password_confirm'] = array(
    				'name'  => 'password_confirm',
    				'id'    => 'password_confirm',
    				'type'  => 'password',
    				'value' => $this->form_validation->set_value('password_confirm'),
                    'class' => 'input_field',
    			);
            $this->base_lib->get_view($data,'user/v_registration'); 
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