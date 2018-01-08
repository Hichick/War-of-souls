<script type="text/javascript">
	function ajaxFileUpload()
	{
		$("#loading2")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url:"<?=base_url();?>char/setting_avatar/load_image_avatar",
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
						}else
						{
		  
							alert(data.file_name);
                            $("#char_ava_img").attr('src','<?=base_url();?>uploads/'+data.file_name);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}
    
    function change_avatar(link_img,path_img)
    {
        alert(link_img);    
            
        var data2 = {'Char_Ava1': path_img};
	
        var Url_Sript = "<?=base_url();?>char/setting_avatar/change_avatar";
    
        $.ajax(Url_Sript,{
		type: "POST", 
        data: data2, 
		success: function(data)
			{ 
			 $("#char_ava_img").attr('src',link_img);
			}
      } ); 
    }
    
</script>	



  <td width="724px" valign="top" class="content" align="center">
                 

          
          <br><br>
          <div class="block_for_news">
           <br>
            <div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Загрузка аватара </span></div>
                    
          </div>
          
           <img id="loading2" src="<?=base_url();?>img/style/loader.gif" style="display:none;">
        
           
           
           <div id="load_avatar">
          
           <br>
           
          	
                
		
            
            <table width="650px" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td style="padding-left: 10px;">
              
              <div id="preview">
               
			<img id="char_ava_img" src="<?=base_url().$character['Char_Ava1'];?>" class="imgList">
            
            <input id="char_ava" type="hidden" value="<?=base_url().$character['Char_Ava1'];?>">
                    
            </div>
            
            
            </td>  
            <td style="padding-left: 10px;">
            Разрешение аватара должно быть 170х240 пикселей.<br /> Вес аватара не должен превышать 512 кб.<br />
            Аватар не должен содержать мата, ссылок и порнографии.
             </td>   
              </tr>
            
            </table>
            
            <br>
			
            
            <?php echo form_open_multipart(); ?>
            
            <input id="fileToUpload" type="file" name="userfile"/>
            <button class="button" id="buttonUpload" onclick="return ajaxFileUpload();">Загрузить аватар</button>
            
           <?php echo form_close(); ?>

            
        	<br>
          </div>
          
          
          <br>
          </div>
          
          <br><br>
          <div class="block_for_news">
          
          <br>
            <div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Выбор аватара </span></div>
                    
          </div>
          
          <?php
          $dir = 'img/chars/'; // Папка с изображениями
          $cols = 3; // Количество столбцов в будущей таблице с картинками
          $files = scandir($dir); // Берём всё содержимое директории
          echo "<table>"; // Начинаем таблицу
          $k = 0; // Вспомогательный счётчик для перехода на новые строки
          for ($i = 0; $i < count($files); $i++) { // Перебираем все файлы
            if (($files[$i] != ".") && ($files[$i] != "..")) { // Текущий каталог и родительский пропускаем
              if ($k % $cols == 0) echo "<tr>"; // Добавляем новую строку
              echo "<td>"; // Начинаем столбец
              $path = base_url().$dir.$files[$i]; // Получаем путь к картинке
              //echo "<a href='$path'>"; // Делаем ссылку на картинку
              echo "<img id='selected_avatar' src='$path' width='100' onclick='change_avatar(\"".$path."\",\"".$dir.$files[$i]."\");' />"; // Вывод превью картинки
              //echo "</a>"; // Закрываем ссылку
              echo "</td>"; // Закрываем столбец
              /* Закрываем строку, если необходимое количество было выведено, либо данная итерация последняя */
              if ((($k + 1) % $cols == 0) || (($i + 1) == count($files))) echo "</tr>";
              $k++; // Увеличиваем вспомогательный счётчик
            }
          }
          echo "</table>"; // Закрываем таблицу
        ?>
          
          <br>
          </div>
         
          </td>
        </tr>
</table>