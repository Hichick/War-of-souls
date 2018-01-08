<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    
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
        
              
        if ($this->input->post('login'))
        {
            $this->login();
        }else
        {
            if ($this->ion_auth->logged_in())
            {
                redirect('/', 'refresh');
            }
            
            
            $data = array();
        
            $data['content'] = '';
            
            $data['styles'] = array();
            $data['javascript'] = array();
            
            if (isset($message_login))
            {
               $data['message_login'] = $message_login;
            }else
            {
                $data['message_login'] = '';
            }
            
            $data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
                'class' => 'input_field',
			);
			$data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
                'class' => 'input_field',
			);
            
            $this->base_lib->get_view($data,'user/v_login'); 
        }   
            
    }
     
    function login()
	{

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				// Пользователь успешно авторизован, переход на главную страницу
				$this->session->set_flashdata('message', $this->ion_auth->messages());
                
            
                $this->load->model('user_model');
                
                $user = $this->ion_auth->user()->row();
            
                $id = $user->id;
                
                $this->user_model->login_char($id);
                
				redirect('/');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
				$data['message_login'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                
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
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
            $this->session->set_flashdata('message', $this->ion_auth->errors());
			$data['message_login'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            
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