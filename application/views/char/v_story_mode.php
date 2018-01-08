  
  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>
           
           <div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Режим Истории </span></div>
          
          <div id="info_story" align="center"></div>
                    
          </div>
           
           
        	<br>
          </div>
          
          <br>
          
          <img src="<?=base_url();?>img/story_mode/first_arca.png" align="absmiddle" />
          
          <br><br>
                   
          
          <?php foreach ($story_mode as $story):?>
          
          <?php echo form_open("battle/story_mode");?>
          
          <input name="SM_id" type="hidden" value="<?=$story['SM_id'];?>">
          <input name="Char_id" type="hidden" value="<?=$character['id_char'];?>">
          <input name="Enemy_id" type="hidden" value="<?=$story['SM_Enemy'];?>">
          
          <div class="block_for_news" id="<?=$story['SM_id'];?>" >
          
          <table width="690" border="0" cellspacing="0" cellpadding="0" style="font-family:Verdana; font-size:11px; padding: 5px;">
          <tr>
            <td style="width: 100px;height: 64px; background-image:url(<?=base_url();?>img/story_mode/<?=$story['SM_Image'];?>); background-repeat:no-repeat;" id="skill_image" title="">
			</td>
			
			
            <td style="width:340px; padding: 3px;" valign="top"> <b>Название: <?=$story['SM_Title'];?></b><hr>
            Описание: <?=$story['SM_Text'];?> </td>
			
			
			
            <td style="120px;" align="center" > Типо требования 
            
            
            </td>			
			
            <td style="120px;" align="center">
            
            <?php
            
            if ($story['Status'] == 1)
            {
                print('<input class="button2" type="button" value="Выполнено">');
            }else
            {
                print('<input class="button2" type="submit" name="battle_story" value="Дуэль">');
            }
	
            ?>
            
            </td>
          </tr>
        </table>
    
          </div>	  
			 		
    <br>
            <?php echo form_close();?>
            
          <?php endforeach;?>
          
         
          </td>
        </tr>
</table>