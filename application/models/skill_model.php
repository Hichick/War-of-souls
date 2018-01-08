<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Skill_model extends CI_Model
{
    
    function __construct()
    {
        // вызываем конструктор модели
        parent::__construct();
    }
    
    
    public function get_skill ($Skill_id) // получение скилла
    {
        
        $this->db->where('Skill_id', $Skill_id);
        $query = $this->db->get('skills_standart'); 
            
        return $query->row_array();
    }
    
    public function update_baff_remaining ($char_id,$skill_id,$skill_remaining,$skill_duration) // откат бафа
    {

        $data = array(
        
         'Remaining' => $skill_remaining,
         'Duration' => $skill_duration
         
       );
        
        $this->db->where('Skill_id', $skill_id);
        $this->db->where('Char_id', $char_id);
        $query = $this->db->update('skills_standart_learn', $data); 
            
        return $query;
    }
    
    public function update_skill_remaining ($char_id,$skill_id,$skill_remaining) // откат всех скилов персонажа
    {

        $data = array(
        
         'Remaining' => $skill_remaining,
       );
        
        $this->db->where('Skill_id', $skill_id);
        $this->db->where('Char_id', $char_id);
        $query = $this->db->update('skills_standart_learn', $data); 
        
        $this->db->where('Char_id', $char_id);
        $query_skill = $this->db->get('skills_standart_learn');
        $query_skill = $query_skill->result_array();
         
        foreach ($query_skill as $skill)
        {
            if ($skill['Remaining']!= 0 && $skill['Skill_id'] != $skill_id)
            {
                $Ream = $skill['Remaining'] - 1;
                
                $data2 = array('Remaining' => $Ream);
                
                $this->db->where('Skill_id', $skill['Skill_id']);
                $this->db->where('Char_id', $char_id);
                $this->db->update('skills_standart_learn', $data2);
            }
            
            
            if ($skill['Duration']!= 0 && $skill['Skill_id'] != $skill_id)
            {
                $Ream = $skill['Duration'] - 1;
                
                $data2 = array('Duration' => $Ream);
                
                $this->db->where('Skill_id', $skill['Skill_id']);
                $this->db->where('Char_id', $char_id);
                $this->db->update('skills_standart_learn', $data2);
            }
            
        }
            
        return $query;
    }
    
    public function update_skill_null ($char_id) // откат всех скилов персонажа перед боями
    {

        $data = array(
        
         'Remaining' => 0,
         'Duration' => 0
         
       );
        
        $this->db->where('Char_id', $char_id);
        $query = $this->db->update('skills_standart_learn', $data); 
            
        return $query;
    }
    
}

?>
