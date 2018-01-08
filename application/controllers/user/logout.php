<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    
    public function index ()
    {
        
        if (!$this->ion_auth->logged_in()) // ≈сли пользователь не авторизован
        {
            redirect(base_url()); // отправить на главную
        }else
        {
            $user = $this->ion_auth->user()->row();
            
            $id = $user->id;
            
            $data_user = array(
    					'char_id' => 0,
    					 );
                         
            $this->ion_auth->update($id,$data_user); // убираем выбранного перса
            
            $this->ion_auth->logout(); // выход пользовател€
            
            
            redirect(base_url());// отправить на главную
        }
            
    }
    
    
}

?>