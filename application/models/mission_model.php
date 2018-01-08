<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mission_model extends CI_Model
{
    
    function __construct()
    {
        // �������� ����������� ������
        parent::__construct();
    }
    
    public function create_mission ($data_mission) // �������� ����� ��� ���������
    {
        
       return $this->db->insert('missions_complete', $data_mission);
    }
    
    public function check_mission ($�har_id) // �������� ���� �� ��� ������
    {        
        $this->db->limit(1);
        $this->db->where ('Miss_Char',$�har_id);
        $this->db->where ('Miss_Status',0);
        
        $query = $this->db->get('missions_complete');
        
        if (!$query->result_array())
        {
            return true; // ���� ���� �������
        }else
        {
            return false; // ���� ���� �������
        }
        
    }
    
    public function complete_mission ($Miss_Com_id,$Miss_Char,$data_mission) // ������ ��������
    {
        
        $this->db->where('Miss_Com_id', $Miss_Com_id);
        $this->db->where('Miss_Char', $Miss_Char);
        $query = $this->db->update('missions_complete', $data_mission); 
            
        return $query;  
    }
    
    public function get_mission_char ($�har_id) // ��������� ������ �� ������� ��������
    {
    
        $this->db->limit(1);
        
        $this->db->where ('Miss_Char',$�har_id);
        
        $this->db->where ('Miss_Status',0);
    
        $query = $this->db->get('missions_complete');
            
        return $query->row_array(); // ���������� ������
    }
    
    
    public function get_mission ($Miss_id) // ��������� ������
    {
    
        $this->db->limit(1);
        
        $this->db->where ('Miss_id',$Miss_id);
    
        $query = $this->db->get('missions');
            
        return $query->row_array(); // ���������� ������
    }
    
    public function get_all_missions ($char_id) // ��������� ���� ������� ������
    {
        
        // ������� ���� �������
        
        $this->db->select('*');
        
        $query_story = $this->db->get('missions');
        
        $query_story = $query_story->result_array();
        
        //-------------------------------
        
        // ������� ���������� �������
        
        $this->db->select('*');
        $this->db->from('missions_complete');
        $this->db->where('Miss_Char', $char_id);
        $this->db->where('Miss_Status', 2);  
        
        $char_storys = $this->db->get();
        $char_storys = $char_storys->result_array();
        
         //-------------------------------
         
         // ���������
        
        for ($i = 0; $i < count($query_story); $i++ )
           {
            
            $Compleate = 0;
            
            $story = $query_story[$i];
            
            for ($j = 0; $j < count($char_storys); $j++ )
            {
                $char_story = $char_storys[$j];
                
                if ($story['Miss_id'] == $char_story['Miss_id'])
                {
                   $Compleate = 1; // ���� ����� ����
                   $query_story[$i]['Status'] = 1;
                }
            }
            
            if ($Compleate == 0) // ���� ����� ����, �� ���������� � ������ ��� ������
            {
             $query_story[$i]['Status'] = 0;
            }
            
           }
        
        return $query_story; // ���������� ������ � ���������
    }
    
    
    public function get_all_mission () // ��������� ��� ������
    {
        
        $query = $this->db->get('missions');
        
        return $query->result_array(); // ���������� ������ � ��������
    }

}

?>
