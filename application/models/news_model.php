<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class News_model extends CI_Model
{
    
    function __construct()
    {
        // вызываем конструктор модели
        parent::__construct();
    }
    
    public function get_news() // получение 5 последних новостей для главной
    {

        $this->db->order_by('id','desc');
        $this->db->limit(5);
        
        $query = $this->db->get('news');
        
        return $query->result_array(); // возвращаем массив с новостями
    }
}

?>
