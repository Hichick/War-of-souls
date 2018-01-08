<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Test extends CI_Controller
{
    
   public function index ()
   {
    
    $identity = 'Hichas@yandex.com';
	$password = 'shaman';
	$remember = TRUE; // remember the user
    
	if ($this->ion_auth->login($identity, $password, $remember))
    {
        $this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect($this->config->item('base_url'), 'refresh');
        
    } else
    {
        $this->session->set_flashdata('message', $this->ion_auth->errors());
		redirect('auth/login', 'refresh');
    }
    
   }
    
}

?>
