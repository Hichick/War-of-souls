<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Story_model extends CI_Model
{
    
    function __construct()
    {
        // �������� ����������� ������
        parent::__construct();
    }
    
    public function get_enemy ($enemy_id) // ��������� ���������� ��� story_mode
    {
        $this->db->limit(1);
        
        $this->db->where ('Enemy_id',$enemy_id);
        
        $query = $this->db->get('enemy');
        
        return $query->row_array(); // ���������� ������ � ���������
    }
    
    public function update_story ($SMC_id,$data_story) // ��������� ��,�� ���������� � ���-�� ����� ��� story_mode
    {
        $this->db->where('SMC_id', $SMC_id);
        $query = $this->db->update('story_mode_complete', $data_story); 
            
        return $query;
    }
        
    
    public function create_story_mode ($data_story) // �������� ������� ��� ���������
    {
        
        return $this->db->insert('story_mode_complete', $data_story);
        
    }
    
    public function delete_story_mode ($data_story) // �������� ������� ��� ���������
    {
        return $this->db->delete('story_mode_complete', $data_story);   
    }
    
    public function compleate_story_mode ($SMC_id,$SMC_Char,$data_story) // ������� ��������
    {
        
        $this->db->where('SMC_id', $SMC_id);
        $this->db->where('SMC_Char', $SMC_Char);
        $query = $this->db->update('story_mode_complete', $data_story); 
            
        return $query;     
    }
    
    public function check_story ($char_id) // �������� ���� �� ��� ������� ��� ������� ���������, ���� ���� �� �������
    {
        $n = 0;
        
        $this->db->limit(1);
        $this->db->where ('SMC_Char',$char_id);
        $this->db->where ('SMC_Status',0);
        
        $query = $this->db->get('story_mode_complete');
        
        if (!$query->result_array())
        {
            return true; // ���� ���� �������
        }else
        {
            return false; // ���� ���� �������
        }
        
    }
    
    public function check_this_story ($SM_id,$SMC_Char) // �������� ���� �� ��� ������� ��� ������� ���������, ���� ���� �� �������
    {
        
        $this->db->limit(1);
        $this->db->where ('SM_id',$SM_id);
        $this->db->where ('SMC_Char',$SMC_Char);
        $this->db->where ('SMC_Status',2);
        
        $query = $this->db->get('story_mode_complete');
        
        if (!$query->result_array())
        {
            return true; // ���� ���� �������
        }else
        {
            return false; // ���� ���� �������
        }
        
    }
    
    public function get_story_mode ($story_id) // ��������� ������ �������, � ������� ��������� ��������
    {
               
        $this->db->limit(1);
        $this->db->where ('SM_id',$story_id);
        
        $query = $this->db->get('story_mode');
        
        return $query->row_array();
    }
    
    
    public function get_story ($char_id) // ��������� �������, � ������� ��������� ��������
    {
        $n = 0;
        
        $this->db->limit(1);
        $this->db->where ('SMC_Char',$char_id);
        $this->db->where ('SMC_Status',$n);
        
        $query = $this->db->get('story_mode_complete');
        
        return $query->row_array();
    }
    
    
    
}

?>
