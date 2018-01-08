<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Controller {
    
    public function index ()
    {
    
    
    $this->load->model('news_model');
    
	$data = array();
    
    $data['content'] = $this->news_model->get_news();
    $data['message'] = '';
    
    $data['styles'] = array();
    $data['javascript'] = array();
    
	$this->base_lib->get_view($data,'v_content');
    
    
    }
    
    
    
}


?>