 
  
  <td width="724px" valign="top" class="content" align="center">         

          <br><br>
          <div class="block_for_news">
          
           <br>
           
           <div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Мои техники </span></div>
          
          <div id="info_skill" align="center"></div>
                    
          </div>
           
           
        	<br>
          </div>
          
          <br>
          
           <input class="button2" type="button" id="all_skill" value="Все"><input class="button2" type="button" id="hakuda" value="Хакуда"><input class="button2" type="button" id="zanjutsu" value="Занджутсу"><input class="button2" type="button" id="kido" value="Кидо"><input class="button2" type="button" id="hoho" value="Хохо">
          
          <br><br>
          
          
          <?php foreach ($skills as $skill):?>
          
          
          <?php
          
          if ($skill['Skill_Type'] == 1)
          {
            print('<div id="hakuda_div">');
            
          }else if ($skill['Skill_Type'] == 2)
          {
            print('<div id="zanjutsu_div">');
            
          }else if ($skill['Skill_Type'] == 3)
          {
            print('<div id="kido_div" >');
            
          }else if ($skill['Skill_Type'] == 4 || $skill['Skill_Type'] == 44)
          {
           print('<div id="hoho_div">'); 
           
          }
          
          ?>
          
          
          <div class="block_for_news" id="<?=$skill['Skill_id'];?>" >
          
          <table width="690" border="0" cellspacing="0" cellpadding="0" style="font-family:Verdana; font-size:11px; padding: 5px;">
          <tr>
            <td style="width: 100px;height: 64px; background-image:url(<?=base_url();?>img/skills/<?=$skill['Skill_Image'];?>); background-repeat:no-repeat;" id="skill_image" title="
			
		<?php
        
        
        if ($skill['Skill_Damage'] == 0 && $skill['Skill_Type'] == 44) // Если скилл бафф( например: Шинпо))
        {
            print("
        
        <div align='center'>
			<img src='".base_url()."img/other/hakuda.png' width='16' height='16' align='absmiddle'> ".$skill['Skill_Name']."<br>
			<img src='".base_url()."img/other/polosa3.png' width='160' height='3' >
			<br/>
			Усиление<br/> "); 
            
            
            if ($skill['Skill_Strength'] != 0)
            {
               print("
            
			Физическая сила: + ".$skill['Skill_Strength']."
			<br/>
            
            "); 
             
            }
            
            
            if ($skill['Skill_Spirit'] != 0)
            {
               print("
            
			Духовная сила: + ".$skill['Skill_Spirit']."
			<br/>
            
            "); 
             
            }
            
            if ($skill['Skill_Speed'] != 0)
            {
               print("
            
			Скорость: + ".$skill['Skill_Speed']."
			<br/>
            
            "); 
             
            }
            
            
            print("
            Востановление: ".$skill['Skill_Reset']." хода
			<br/>
			<img src='".base_url()."img/other/polosa3.png' width='160' height='3' >
			<br/>
			<img src='".base_url()."img/other/rejatsu.png' align='absmiddle' width='16' height='16'> ".$skill['Skill_Rejatsu']." <img src='".base_url()."img/other/endurance.png' align='absmiddle' width='16' height='16'> ".$skill['Skill_Endurance']."
			</div>
        
        "); 
            
        }else // Если не бафф, а боевой
        {
            print("
        
        <div align='center'>
			<img src='".base_url()."img/other/hakuda.png' width='16' height='16' align='absmiddle'> ".$skill['Skill_Name']."<br>
			<img src='".base_url()."img/other/polosa3.png' width='160' height='3' >
			<br/>
			
			Урон: + ".$skill['Skill_Damage']."
			<br/>
            Востановление: ".$skill['Skill_Reset']." хода
			<br/>
			<img src='".base_url()."img/other/polosa3.png' width='160' height='3' >
			<br/>
			<img src='".base_url()."img/other/rejatsu.png' align='absmiddle' width='16' height='16'> ".$skill['Skill_Rejatsu']." <img src='".base_url()."img/other/endurance.png' align='absmiddle' width='16' height='16'> ".$skill['Skill_Endurance']."
			</div>
        
        "); 
        
        }
        
        
        
        ?>	
			
			
			">
			</td>
			
			
            <td style="width:340px; padding: 3px;" valign="top"> <b>Название: <?=$skill['Skill_Name'];?></b><hr>
            Описание: <?=$skill['Skill_Text'];?> </td>
			
			
			
            <td style="120px;" align="center" >Хакуда: <?=$skill['Skill_Hakuda'];?> <br>  Кидо: <?=$skill['Skill_Kido'];?> <br>   Занджутсу: <?=$skill['Skill_Zanjutsu'];?> <br>   Хохо: <?=$skill['Skill_Hoho'];?>  </td>
			
			
			
			
            <td style="120px;" align="center">
            
            <input class="button2" type="button" value="Изучен">
            
            </td>
          </tr>
        </table>
    
          </div>	  
			 		
    <br>
          </div>
          
          
          
          <?php endforeach;?>
          
          
          
         
          </td>
        </tr>
</table>