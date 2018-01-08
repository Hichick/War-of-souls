<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_Lib
{
    
    // ��������� ���� ����� 
    public function get_view ($data, $name) // $data - ������ ������, $name - �������� �����������
    {
        $CI =& get_instance ();
        
        $CI->load->view('v_preheader',$data);
        
        // �������� ����������� ������������ � ����� ����
        if ($CI->ion_auth->logged_in()) // ���� ������������ �����������
        {
            $player = $CI->ion_auth->user()->row_array();
            
            if ($player['char_id'] != 0) // ���� ������������ ����������� � ������ ����
            {
                $CI->load->model('char_model');
                
                $character = $CI->char_model->get_char($player['id']);
                $char = $character [0]; // ���������� ������ ���������
                
                $CI->load->view('header/v_header_char');
                
                if ($char['Char_Status'] == 1) // ���� ������ ��������� � ����� ����� ���
                {
                    $CI->load->view('left_block/v_leftblock_in_battle');  
                    
                }else if ($char['Char_Status'] == 0)
                {
                  $CI->load->view('left_block/v_leftblock_char'); 
                   
                }else if ($char['Char_Status'] == 2)  // ���� ������ ��������� �� ������
                {
                    $CI->load->view('left_block/v_leftblock_on_mission');   
                }
                
                
            }else // ���� ������������ ����������� � �� ������ ����
            {
                $CI->load->view('header/v_header_no_char');
                $CI->load->view('left_block/v_leftblock_no_char');
            }
     
        }else // ���� ������������ �� �����������
        {
            $CI->load->view('header/v_header_login',$data);
            $CI->load->view('left_block/v_leftblock_base');
        }
        
        $CI->load->view($name ,$data);
        $CI->load->view('v_footer');
    }
    
    
    // �������� �� �����������
    public function check_user ()
    {
        $CI =& get_instance ();
        
        if ($CI->ion_auth->logged_in()) // ���� �� �����������, �� ������� �� �������
        {
            return true;
        }
        
        return false;
        
    }
    
    // ��������� id ���������
    public function get_user_id ()
    {
        $CI =& get_instance ();
        
        $user = $CI->ion_auth->user()->row();
        
        return $user_id = $user->id;
    }
    
    
    // �������� �� ����������� � �� ������� ���������
    public function check_char ()
    {
        $CI =& get_instance ();
        
        if (!$CI->ion_auth->logged_in()) // ���� �� �����������, �� ������� �� �������
        {
            redirect('/');
        }
         
        $user = $CI->ion_auth->user()->row();
        
        $user_id = $user->id;
        
        $CI->load->model('char_model');
        
        
        // ��������, ������ �� ��������
        if ($CI->char_model->get_char($user_id))
        {
            return true;
        }
        
        return false;
        //-----------------------
            
            
        
        
    }
    
}

?>
