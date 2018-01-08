<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Map_model extends CI_Model
{
    
    function __construct()
    {
        // вызываем конструктор модели
        parent::__construct();
    }
    
    public function get_world($Building_World) // получение всех локаций в мире
    {
        
        $this->db->where('Building_World', $Building_World);
        
        $query = $this->db->get('buildings');
        
        return $query->result_array(); // возвращаем массив локаций
    }
    
    public function get_building($Building_id) // получение конкретной локации
    {

        $this->db->limit(1);
        
        $this->db->where('Building_id', $Building_id);
        
        $query = $this->db->get('buildings');
        
        return $query->row_array(); // возвращаем локацию
    }
    
    
    public function change_building_location($Char_id,$data_moving) // изменение локации у персонажа
    {
    
        $this->db->where('id_char', $Char_id);
        $query = $this->db->update('characters', $data_moving); 
            
        return $query;
    }
    
    
    
}

?>
