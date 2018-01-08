<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Chat_model extends CI_Model
{
    
    function __construct()
    {
        // вызываем конструктор модели
        parent::__construct();
    }
    
    public function get_chat($from_last_act) // получение последних сообщений в чате
    {
        
        if ($from_last_act != false)
    	{
    	   $this->db->order_by('Message_date','ASC');
           $this->db->order_by('Chat_id','ASC');
           $this->db->where('Chat_id >', $from_last_act);
    	}
    	else
    	{ 
    		$this->db->order_by('Message_date','ASC');
            $this->db->order_by('Chat_id','ASC');
    	}

        //$this->db->limit(5);
        
        $query = $this->db->get('chat');
        
        return $query->result_array(); // возвращаем массив с сообщениями
    }
    
    
    public function add_message ($data_message) // добавление сообщения в базу
    { 
        return $this->db->insert('chat', $data_message);
    }
}

?>
