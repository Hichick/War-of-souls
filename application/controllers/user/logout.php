<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    
    public function index ()
    {
        
        if (!$this->ion_auth->logged_in()) // ���� ������������ �� �����������
        {
            redirect(base_url()); // ��������� �� �������
        }else
        {
            $user = $this->ion_auth->user()->row();
            
            $id = $user->id;
            
            $data_user = array(
    					'char_id' => 0,
    					 );
                         
            $this->ion_auth->update($id,$data_user); // ������� ���������� �����
            
            $this->ion_auth->logout(); // ����� ������������
            
            
            redirect(base_url());// ��������� �� �������
        }
            
    }
    
    
}

?>