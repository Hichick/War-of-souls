<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Story_model extends CI_Model
{
    
    function __construct()
    {
        // вызываем конструктор модели
        parent::__construct();
    }
    
    public function get_enemy ($enemy_id) // получение противника для story_mode
    {
        $this->db->limit(1);
        
        $this->db->where ('Enemy_id',$enemy_id);
        
        $query = $this->db->get('enemy');
        
        return $query->row_array(); // возвращаем массив с историями
    }
    
    public function update_story ($SMC_id,$data_story) // изменение хп,мп противника и кол-во ходов для story_mode
    {
        $this->db->where('SMC_id', $SMC_id);
        $query = $this->db->update('story_mode_complete', $data_story); 
            
        return $query;
    }
        
    
    public function create_story_mode ($data_story) // создание события для персонажа
    {
        
        return $this->db->insert('story_mode_complete', $data_story);
        
    }
    
    public function delete_story_mode ($data_story) // удаление события для персонажа
    {
        return $this->db->delete('story_mode_complete', $data_story);   
    }
    
    public function compleate_story_mode ($SMC_id,$SMC_Char,$data_story) // история пройдена
    {
        
        $this->db->where('SMC_id', $SMC_id);
        $this->db->where('SMC_Char', $SMC_Char);
        $query = $this->db->update('story_mode_complete', $data_story); 
            
        return $query;     
    }
    
    public function check_story ($char_id) // проверка есть ли уже события для данного персонажа, если нету то создать
    {
        $n = 0;
        
        $this->db->limit(1);
        $this->db->where ('SMC_Char',$char_id);
        $this->db->where ('SMC_Status',0);
        
        $query = $this->db->get('story_mode_complete');
        
        if (!$query->result_array())
        {
            return true; // Если нету события
        }else
        {
            return false; // Если есть событие
        }
        
    }
    
    public function check_this_story ($SM_id,$SMC_Char) // проверка есть ли уже события для данного персонажа, если нету то создать
    {
        
        $this->db->limit(1);
        $this->db->where ('SM_id',$SM_id);
        $this->db->where ('SMC_Char',$SMC_Char);
        $this->db->where ('SMC_Status',2);
        
        $query = $this->db->get('story_mode_complete');
        
        if (!$query->result_array())
        {
            return true; // Если нету события
        }else
        {
            return false; // Если есть событие
        }
        
    }
    
    public function get_story_mode ($story_id) // получение данных истории, в которой участвует пероонаж
    {
               
        $this->db->limit(1);
        $this->db->where ('SM_id',$story_id);
        
        $query = $this->db->get('story_mode');
        
        return $query->row_array();
    }
    
    
    public function get_story ($char_id) // получение истории, в которой участвует пероонаж
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
