<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story_mode extends CI_Controller
{
    
    // Битва в режиме истори
    public function index()
    {
        
        
        if (!$this->base_lib->check_char()) // Проверка, выбран ли персонаж
        {
           redirect('/'); 
        } 
        
        
        $this->load->model('story_model');
        $this->load->model('char_model');
        $this->load->model('skill_model');
        
        $data = array();
    
        $data['content'] = '';
        
        $data['styles'] = array();
        $data['javascript'] = array('js/jquery.js','js/easyTooltip.js','js/battle_story.js');
        
         // Получение данных о персонаже
        $user_id = $this->base_lib->get_user_id();
        
        $character = $this->char_model->get_char($user_id);
        
        $char = $character [0]; // Записываем данные персонажа
        
        $char_id = $character [0]['id_char']; // Получаем id выбранного перса
        
        
        // Сначала надо будет проверить, создана ли битва, если да, то загрузить данные, если нет то создать
        
        if ($this->story_model->check_story($char_id)) // Если событие не существует
        {
          
          if ($this->input->post('Char_id') && $this->input->post('Enemy_id') && $this->input->post('SM_id')) // Проверка пришли ли данные по ajax
            {            
                

                $Char_id = $this->input->post('Char_id'); // Персонаж, который будет сражаться
                $Enemy_id = $this->input->post('Enemy_id'); // Враг, который будет сражаться
                $SM_id = $this->input->post('SM_id'); // идентификатор события
                
                if (!$this->story_model->check_this_story($SM_id,$Char_id)) // Проверка пройденно ли данное событие (конкретно)
                {
                    redirect('char/story_mode'); 
                }
                
               
                
                $Enemy = $this->story_model->get_enemy($Enemy_id);
                
                $today = date("Y-m-d H:i:s");
          
                  $data_story = array (
                  
                  'SM_id' => $SM_id,
                  'SMC_Char' => $Char_id,
                  'SMC_Date' => $today,
                  'SMC_CurHealth' => $Enemy['Enemy_MaxHealth'],
                  'SMC_CurRejatsu' => $Enemy['Enemy_MaxRejatsu'],
                  'SMC_CurEndurance' => $Enemy['Enemy_MaxEndurance']
                  
                  );
                  
                $this->story_model->create_story_mode($data_story); // Создание события, если его нету и пришли данные
                
                $this->char_model->change_status_char($Char_id,1); // изменение статуса персонажа (В бою)
                
                $this->skill_model->update_skill_null($Char_id); // обнуление всех скилов перед битвой
                
                $this->load->model('battle_model');
                $this->battle_model->return_default_stat($Char_id); // обнуление всех статов
                
            }else
            {
                redirect('char/story_mode'); 
            }   
                    
        }else // Если событие уже существует
        {
            
            $story = $this->story_model->get_story($char_id);
            
            $SM_id = $story['SM_id'];
            
            
            $story_mode = $this->story_model->get_story_mode($SM_id);
            
            $Enemy_id = $story_mode['SM_Enemy'];
            
            
            // Проверка вышло ли время боя
            
            $SMC_id = $story['SMC_id'];
            $SMC_Date = $story['SMC_Date'];
            $SM_Time = $story_mode['SM_Time'];
            
            $SMC_hh = substr($SMC_Date,11,2); // Час
			$SMC_mm = substr($SMC_Date,14,2); // Минута
			$SMC_ss = substr($SMC_Date,17,2); // Секунда
            
            $hh=date("H");
        	$mm=date("i");
        	$ss=date("s");
            
            $SMC_all = $SMC_hh * 3600 + $SMC_mm * 60 + $SMC_ss * 1; // Всего секунд в начале битвы
            $Cur_all = $hh * 3600 + $mm * 60 + $ss * 1; // Всего секунд сейчас
            $Time_battle = substr($SM_Time,3,2) * 60; // Всего секунд битву
            
            $diff = $SMC_all + $Time_battle - $Cur_all;

            
            if ($diff < 0 || $diff > $Time_battle) // Если время на битву прошло
            {
                
                // Показать что битва проиграна и отправить на другу страницу, удалить событие
                
                
                $data_2 = array(
            
                'SMC_id' => $SMC_id,
                'SMC_Char' => $char_id
                
                );
            
                $this->story_model->delete_story_mode($data_2);
                
                $this->char_model->change_status_char($char_id,0); // изменение статуса персонажа (В бою)
                
                redirect('char/story_mode'); 
            }
            
            //------------------------------------
            
        }
        
        
        $data['character'] = $char;
        
        $enemy = $this->story_model->get_enemy($Enemy_id);
        
        $data['enemy'] = $enemy; // Текущий враг
        
        $data['skills'] = $this->char_model->get_my_skill($char_id); // Скилы перса
        
        $data['story'] = $this->story_model->get_story($char_id); // Инфа по истории
            
        $SM_id = $data['story']['SM_id'];
               
        $data['story_mode'] = $this->story_model->get_story_mode($SM_id);
        
        //-------------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'battle/v_story_mode'); 
        
    }
    
    
    public function baff_skill()
    {
        // Скрипт для бафа

    	if ($this->input->post('Skill_id') && $this->input->post('Char_id') && $this->input->post('Skill_Remaining') && $this->input->post('Skill_Duration'))
    	{
 	      
            $Skill_id = $this->input->post('Skill_id');
       	    $Char_id = $this->input->post('Char_id');
        	$Skill_Remaining = $this->input->post('Skill_Remaining');
            $Skill_Duration = $this->input->post('Skill_Duration');
            
            $this->load->model('skill_model');
            
            if ($this->skill_model->update_baff_remaining($Char_id,$Skill_id,$Skill_Remaining,$Skill_Duration))
            {
                $data_2 = array();
         
                $this->load->model('char_model');
                $user_id = $this->base_lib->get_user_id();
                $character = $this->char_model->get_char($user_id);
                
                // Бафаемся
                
                $Skill_baff = $this->skill_model->get_skill($Skill_id);
                
                $Char_Strength = $character[0]['Char_Strength'] + $Skill_baff['Skill_Strength'];
                $Char_Spirit = $character[0]['Char_Spirit'] + $Skill_baff['Skill_Spirit'];
                $Char_Speed = $character[0]['Char_Speed'] + $Skill_baff['Skill_Speed'];

                $data_stat = array (
                
                      'Char_baff_id' => $Skill_id,
                      'Char_Strength' => $Char_Strength,
                      'Char_Spirit' => $Char_Spirit,
                      'Char_Speed' => $Char_Speed
                );
                
                $this->load->model('battle_model');
                $this->battle_model->update_stat($Char_id,$data_stat);
                
                //-------------------------------------------------
                
                $data_2['character'] = $character [0]; // Записываем данные персонажа
                $data_2['skills'] = $this->char_model->get_my_skill($Char_id);
                
                $this->load->view('battle/v_skill',$data_2);
            
            }else
        	{
        		echo "<p>Произошла ошибка обработки данных!</p>";		
        	}
            
        }else
    	{
    		echo "<p>Ошибка передачи!</p>";
    	}
        
    }
    
    public function over_baff()
    {
        // Скрипт бафф закончился 

    	if ($this->input->post('Char_id'))
    	{
     
       	    $Char_id = $this->input->post('Char_id');
            
            $this->load->model('battle_model');
            
            $this->battle_model->over_baff($Char_id);
            
        }else
    	{
    		echo "<p>Ошибка передачи!</p>";
    	}
        
    }
    
    public function battle_skill()
    {
        // Скрипт для занесения данных в базу после каждого хода

    	if ($this->input->post('Skill_id') && $this->input->post('Char_id') && $this->input->post('Skill_Remaining'))
    	{
 	      
            $Skill_id = $this->input->post('Skill_id');
       	    $Char_id = $this->input->post('Char_id');
        	$Skill_Remaining = $this->input->post('Skill_Remaining');
            
            $this->load->model('skill_model');
            
            if ($this->skill_model->update_skill_remaining($Char_id,$Skill_id,$Skill_Remaining))
            {
                $data_2 = array();
         
                $this->load->model('char_model');
                $user_id = $this->base_lib->get_user_id();
                $character = $this->char_model->get_char($user_id);
                
                // Бафаемся
                
                $Skill_baff = $this->skill_model->get_skill($Skill_id);
                
                $Char_Strength = $character[0]['Char_Strength'] + $Skill_baff['Skill_Strength'];
                $Char_Spirit = $character[0]['Char_Spirit'] + $Skill_baff['Skill_Spirit'];
                $Char_Speed = $character[0]['Char_Speed'] + $Skill_baff['Skill_Speed'];

                $data_stat = array (
                
                      'Char_Strength' => $Char_Strength,
                      'Char_Spirit' => $Char_Spirit,
                      'Char_Speed' => $Char_Speed
                );
                
                $this->load->model('battle_model');
                $this->battle_model->update_stat($Char_id,$data_stat);
                
                //-------------------------------------------------
                
                $data_2['character'] = $character [0]; // Записываем данные персонажа
                $data_2['skills'] = $this->char_model->get_my_skill($Char_id);
                
                $this->load->view('battle/v_skill',$data_2);
            
            }else
        	{
        		echo "<p>Произошла ошибка обработки данных!</p>";		
        	}
            
        }else
    	{
    		echo "<p>Ошибка передачи!</p>";
    	}
        
    }
    
    
     public function delete_battle()
    {
        // Скрипт для удаление записи

    	if ($this->input->post('SMC_id') && $this->input->post('Char_id'))
    	{
 	      
            $SMC_id = $this->input->post('SMC_id');
            $SMC_Char = $this->input->post('Char_id');
            
            $this->load->model('story_model');
            $this->load->model('char_model');
            
            $data_2 = array(
            
            'SMC_id' => $SMC_id,
            'SMC_Char' => $SMC_Char
            
            );
            
            $this->char_model->change_status_char($SMC_Char,0); // изменение статуса персонажа (В бою)
            
            
            // Возвращаем статы в норму
            $this->load->model('battle_model');
            $this->battle_model->return_default_stat($SMC_Char);
            // ----------------------------------------------------
            
            if ($this->story_model->delete_story_mode($data_2))
            {
                 echo "<p>Вы лузер, вас порвал бот!!</p>";
            
            }else
        	{
        		echo "<p>Произошла ошибка обработки данных!</p>";		
        	}
            
        }else
    	{
    		echo "<p>Ошибка передачи!</p>";
    	}
        
    }
    
    
     public function update_story()
    {
        // Скрипт для изменения хп,мп противника и кол-во ходов

    	if ($this->input->post('SMC_id') && $this->input->post('SMC_CurHealth')&& $this->input->post('SMC_CurRejatsu')&& $this->input->post('SMC_CurEndurance') && $this->input->post('SMC_Count_Move'))
    	{
 	      
            $SMC_id = $this->input->post('SMC_id');
            $SMC_CurHealth = $this->input->post('SMC_CurHealth');
            $SMC_CurRejatsu = $this->input->post('SMC_CurRejatsu');
            $SMC_CurEndurance = $this->input->post('SMC_CurEndurance');
            $SMC_Count_Move = $this->input->post('SMC_Count_Move');
            
            $this->load->model('story_model');
            
            $data_story = array(
            
            'SMC_Count_Move' => $SMC_Count_Move,
            'SMC_CurHealth' => $SMC_CurHealth,
            'SMC_CurRejatsu' => $SMC_CurRejatsu,
            'SMC_CurEndurance' => $SMC_CurEndurance
            
            );
            
            
            if ($this->story_model->update_story($SMC_id,$data_story))
            {
                
            
            }else
        	{
        		echo "<p>Произошла ошибка обработки данных!</p>";		
        	}
            
        }else
    	{
    		echo "<p>Ошибка передачи!</p>";
    	}
        
    }
    
    
     public function compleate_battle()
    {
        // Игрок победил битва пройдена

    	if ($this->input->post('SMC_id') && $this->input->post('Char_id'))
    	{
 	      
            $SMC_id = $this->input->post('SMC_id');
            $SMC_Char = $this->input->post('Char_id');
            
            $this->load->model('story_model');
            $this->load->model('char_model');
            
            $data_story = array(
            
            'SMC_Status' => 2 // 0 - не пройдена,2 - пройдена, 1 - просмотр результатов
            
            );
            
            $this->char_model->change_status_char($SMC_Char,0); // изменение статуса персонажа (В бою)
            
            
            
            // Возвращаем статы в норму
            $this->load->model('battle_model');
            $this->battle_model->return_default_stat($SMC_Char);
            // ----------------------------------------------------
            
            if ($this->story_model->compleate_story_mode($SMC_id,$SMC_Char,$data_story))
            {
                echo "<p>Игрок победил!!!</p>";
            
            }else
        	{
        		echo "<p>Произошла ошибка обработки данных!</p>";		
        	}
            
        }else
    	{
    		echo "<p>Ошибка передачи!</p>";
    	}
        
    }
    
    
    
}

?>
