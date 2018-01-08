<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Char_model extends CI_Model
{
    
    function __construct()
    {
        // вызываем конструктор модели
        parent::__construct();
    }
    
    public function create_new_char($data_char) // Создание нового персонажа
    {
        return $this->db->insert('characters', $data_char);
        
    }
    
     public function select_character($user_id,$char_id) // Выбор игрового персонажа
    {
        
        $data = array(
         'char_id' => $char_id,
       );
    
        $this->db->where('id', $user_id);
        $query = $this->db->update('users', $data); 
            
        return $query;
        
    }
    
    public function get_char($user_id) // Получение текущего персонажа
    {
        
        $this->db->select('*');
        $this->db->join('users', 'users.char_id = characters.id_char');
        $this->db->where('users.id', $user_id); 
        $this->db->where('users.char_id = characters.id_char');
        $this->db->limit(1);
        
        $query = $this->db->get('characters');
        
        return $query->result_array(); // возвращаем массив с новостями
        
    }
    
    public function get_all_char($id) // Получение все персонажей по одному аккаунту
    {
        
        $this->db->select('*');
        $this->db->from('characters');
        $this->db->join('users', 'users.id = characters.id_user');
        $this->db->where('characters.id_user', $id); 
        
        $query = $this->db->get();
        
        return $query->result_array(); // возвращаем массив с новостями
        
    }
    
    
    public function learn_new_skill($data) // Изучение нового скила в академии
    {
        return $this->db->insert('skills_standart_learn', $data);
        
    }
    
    public function get_my_skill ($char_id) // Получение всех выученных скилов,у данного персонажа
    {
        
         // Выборка всех скилов
        
        $this->db->select('skills_standart.*');
        
        $this->db->from('skills_standart');
        
        $all_skills = $this->db->get();
        $all_skills = $all_skills->result_array();
           
        
        // Выборка скилов игрока
        
        $this->db->select('*');
        $this->db->from('skills_standart_learn');
        $this->db->where('Char_id', $char_id); 
        
        $char_skills = $this->db->get();
        $char_skills = $char_skills->result_array();
        
        // Сравнение
        
        for ($i = 0; $i < count($all_skills); $i++ )
           {
            $Skill_have = 0; // Переменная показывает, есть ли скил у игрока (0 - нету, 1 - есть))
            
            $all_skill = $all_skills [$i];
            
            for ($j = 0; $j < count($char_skills); $j++ )
            {
                $char_skill = $char_skills[$j];
                
                if ($all_skill['Skill_id'] == $char_skill['Skill_id'])
                {
                   $Skill_have = 1; // Если скила есть
                   $all_skill['Remaining'] = $char_skill['Remaining'];
                   $all_skill['Duration'] = $char_skill['Duration'];
                }
            }
            
            if ($Skill_have == 1) // Если скила есть, то засовываем в массив для показа
            {
              $query_skill[$i] = $all_skill;
            }
            
           }
        
        return $query_skill; // возвращаем массив со скилами
        
    }
    
    public function get_all_skill ($char_id) // Получение всех скилов, доступных для изучения в академии
    {
        
        // Выборка всех скилов
        
        $this->db->select('skills_standart.*');
        
        $this->db->from('skills_standart');
        
        $all_skills = $this->db->get();
        $all_skills = $all_skills->result_array();
        
        
        
        // Выборка скилов игрока
        
        $this->db->select('*');
        $this->db->from('skills_standart_learn');
        $this->db->where('Char_id', $char_id); 
        
        $char_skills = $this->db->get();
        $char_skills = $char_skills->result_array();
        
        
        
        // Сравнение
        
        for ($i = 0; $i < count($all_skills); $i++ )
           {
            $Skill_have = 0; // Переменная показывает, есть ли скил у игрока (0 - нету, 1 - есть))
            
            $all_skill = $all_skills [$i];
            
            for ($j = 0; $j < count($char_skills); $j++ )
            {
                $char_skill = $char_skills[$j];
                
                if ($all_skill['Skill_id'] == $char_skill['Skill_id'])
                {
                   $Skill_have = 1; // Если скила есть
                }
            }
            
            if ($Skill_have == 0) // Если скила нету, то засовываем в массив для показа
            {
              $query_skill[$i] = $all_skill;
            }
            
           }
        
        
        
        return $query_skill; // возвращаем массив со скилами
        
    }
    
    
    public function get_all_story ($char_id) // получение всех записей story_mode
    {
        
        // Выборка всех историй
        
        $this->db->select('*');
        
        $query_story = $this->db->get('story_mode');
        
        $query_story = $query_story->result_array();
        
        //-------------------------------
        
        // Выборка пройденных историй
        
        $this->db->select('*');
        $this->db->from('story_mode_complete');
        $this->db->where('SMC_Char', $char_id);
        $this->db->where('SMC_Status', 2);  
        
        $char_storys = $this->db->get();
        $char_storys = $char_storys->result_array();
        
         //-------------------------------
         
         // Сравнение
        
        for ($i = 0; $i < count($query_story); $i++ )
           {
            
            $Compleate = 0;
            
            $story = $query_story[$i];
            
            for ($j = 0; $j < count($char_storys); $j++ )
            {
                $char_story = $char_storys[$j];
                
                if ($story['SM_id'] == $char_story['SM_id'])
                {
                   $Compleate = 1; // Если скила есть
                   $query_story[$i]['Status'] = 1;
                }
            }
            
            if ($Compleate == 0) // Если скила нету, то засовываем в массив для показа
            {
             $query_story[$i]['Status'] = 0;
            }
            
           }
        
        return $query_story; // возвращаем массив с историями
    }
    
    
    
    public function change_status_char($char_id,$status) // изменение статуса персонажа
    {
        
        $data = array (
                  
                  'Char_Status' => $status
                  
                  );
                  
        $this->db->where('id_char', $char_id);
        $query = $this->db->update('characters', $data); 
            
        return $query;
        
    }
    
    public function change_char_info ($char_id,$new_data) // изменение информации о персонаже
    {
                  
        $this->db->where('id_char', $char_id);
        $query = $this->db->update('characters', $new_data); 
            
        return $query;
        
    }
    
}

?>
