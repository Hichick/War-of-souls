<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_avatar extends CI_Controller
{
    


    public function index()
    {
        
        if (!$this->base_lib->check_char()) // Проверка, выбран ли персонаж
        {
           redirect('/'); 
        } 
        
        $data = array();
    
        $data['content'] = '';
        
        $data['styles'] = array();
        $data['javascript'] = array('js/jquery.js','js/ajaxfileupload.js');
        
        // Получение данных о персонаже
        $user_id = $this->base_lib->get_user_id();
        
        $this->load->model('char_model');
        
        $character = array();
        
        $character = $this->char_model->get_char($user_id);
        
        $char = $character [0]; // Записываем данные персонажа
        
        $data['character'] = $char;
        
        //-------------------------------------------
        
        $data['message_char'] = ''; // Сообщение об ошибка и успешном изменнении данных
            
        $this->base_lib->get_view($data,'char/v_setting_avatar'); 
        
    }
    
    
    public function load_image_avatar ()
    {
        
        $error = "";
        $msg = "";
        $file_element_name = 'userfile';
        
        $path_img = ""; // Полный путь к картинке
        $file_name =""; // Имя картинки
        
        
        if (!$error) {
            $config['upload_path'] = "./uploads/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= 512;
            $config['max_width']  = '170';
            $config['max_height']  = '240';
            $config['encrypt_name'] = TRUE;
        
            $this->load->library('upload', $config);
        
            if (!$this->upload->do_upload($file_element_name)) {
              $error = $this->upload->display_errors('', '');
            } else {
              // Update your DB here
              //$msg .= "success";
              $data_img = $this->upload->data();
              
              $path_img = $data_img['full_path'];
              $file_name = $data_img['file_name'];
              
              $msg =  $data_img['full_path'];
              
              
              // Изменение аватара у персонажа
              
              
              $user_id = $this->base_lib->get_user_id();
                
              $this->load->model('char_model');
                
              $character = array();
                
              $character = $this->char_model->get_char($user_id);
                
              $char = $character [0]; // Записываем данные персонажа
              
              $data_new = array(
                
                'Char_Ava1' => 'uploads/'.$file_name
                
              );
              
              $this->char_model->change_char_info($char['id_char'], $data_new);
              
              // ------------------------------------------------
            }
            // For security reason, we remove the uploaded file
            @unlink($_FILES[$file_element_name]);
        }
        
        echo "{";
        echo "error: '" . $error . "',\n";
        echo "msg: '" . $msg . "',\n";
        echo "file_name: '" . $file_name . "',\n";
        echo "path_img: '" . $path_img . "'\n";
        echo "}";        
                
    }
    
    
     public function change_avatar ()
    {
              
          // Изменение аватара у персонажа
          
          $user_id = $this->base_lib->get_user_id();
            
          $this->load->model('char_model');
            
          $character = array();
            
          $character = $this->char_model->get_char($user_id);
            
          $char = $character [0]; // Записываем данные персонажа
          
          $data_new = array(
            
            'Char_Ava1' => $this->input->post('Char_Ava1')
            
          );
          
          $this->char_model->change_char_info($char['id_char'], $data_new);
                
    }
    
}

?>
