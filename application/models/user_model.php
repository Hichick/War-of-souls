<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class User_model extends CI_Model
{
    
    function __construct()
    {
        // �������� ����������� ������
        parent::__construct();
    }
    
    public function get_user_data($id) // ��������� ��� ������ �� ������ ������������
    {

        $this->db->limit(1);
        
        $this->db->where ('id',$id);
        $query = $this->db->get('users');
        
        return $query->result_array(); // ���������� ������ � ���������
    }
    
    public function login_char ($id)
    {
        
        $data = array(
         'char_id' => 0,
        );
       
        $this->db->where('id', $id);
        $query = $this->db->update('users', $data); 
    }
}

?>
