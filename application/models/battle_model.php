<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Battle_model extends CI_Model
{
    
    function __construct()
    {
        // вызываем конструктор модели
        parent::__construct();
    }
    
    public function update_stat ($Char_id,$data_stat) // Функция изменения статов (Обычно бафф)
    {                  
        $this->db->where('id_char', $Char_id);
        $query = $this->db->update('characters', $data_stat);
        
        return $query;
    }
    
    public function return_default_stat ($Char_id) // Функция возвращение характеристик к максимальному значению
    {
        
        $this->db->where('id_char', $Char_id);
        $Char = $this->db->get('characters');
        $Char = $Char->row_array();
        
        $data = array (
                  
                  'Char_Strength' => $Char['Char_MaxStregth'],
                  'Char_Spirit' => $Char['Char_MaxSpirit'],
                  'Char_Speed' => $Char['Char_MaxSpeed']
                  
                  );
                  
        $this->db->where('id_char', $Char_id);
        $query = $this->db->update('characters', $data);
        
        return $query;
    }
    
    public function over_baff ($Char_id) // Функция закончился бафф
    {   
        
        // Получаем id баффа
        
        $this->db->where('id_char', $Char_id);
        $char = $this->db->get('characters');
        $char = $char->row_array();
        
        $baff_id = $char['Char_baff_id'];
        
        // ---------------------
        
        // Получаем баффа
        
        $this->db->where('Skill_id', $baff_id);
        $baff = $this->db->get('skills_standart');
        $baff = $baff->row_array();
        
         // ---------------------
        
        $Char_Strength = $char['Char_Strength'] - $baff['Skill_Strength'];
        $Char_Spirit = $char['Char_Spirit'] - $baff['Skill_Spirit'];
        $Char_Speed = $char['Char_Speed'] - $baff['Skill_Speed'];
        
        $data_stat = array (
                  'Char_baff_id' => 0,
                  'Char_Strength' => $Char_Strength,
                  'Char_Spirit' => $Char_Spirit,
                  'Char_Speed' => $Char_Speed
                  
                  );
        
        $this->db->where('id_char', $Char_id);
        $query = $this->db->update('characters', $data_stat);
        
        return $query;
    }
}

?>
