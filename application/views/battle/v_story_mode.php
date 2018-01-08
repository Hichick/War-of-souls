 <input name="SMC_id" type="hidden" value="<?=$story['SMC_id'];?>" />
 <input name="SMC_Date" type="hidden" value="<?=$story['SMC_Date'];?>" />
 <input name="SM_Time" type="hidden" value="<?=$story_mode['SM_Time'];?>" />
 
 <input name="MaxHP" type="hidden" value="<?=$character['Char_MaxHealth'];?>" />
 <input name="CurHP" type="hidden" value="<?=$character['Char_CurHealth'];?>" />
 <input name="MaxMP" type="hidden" value="<?=$character['Char_MaxRejatsu'];?>" />
 <input name="CurMP" type="hidden" value="<?=$character['Char_CurRejatsu'];?>" />
 <input name="MaxED" type="hidden" value="<?=$character['Char_MaxEndurance'];?>" />
 <input name="CurED" type="hidden" value="<?=$character['Char_CurEndurance'];?>" />
 
 
 <input name="Char_Strength" type="hidden" value="<?=$character['Char_Strength'];?>" />
 <input name="Char_Spirit" type="hidden" value="<?=$character['Char_Spirit'];?>" />
 <input name="Char_Speed" type="hidden" value="<?=$character['Char_Speed'];?>" />
 
 
 <input name="MaxHP_2" type="hidden" value="<?=$enemy['Enemy_MaxHealth'];?>" />
 <input name="CurHP_2" type="hidden" value="<?=$story['SMC_CurHealth'];?>" />
 <input name="MaxMP_2" type="hidden" value="<?=$enemy['Enemy_MaxRejatsu'];?>" />
 <input name="CurMP_2" type="hidden" value="<?=$story['SMC_CurRejatsu'];?>" />
 <input name="MaxED_2" type="hidden" value="<?=$enemy['Enemy_MaxEndurance'];?>" />
 <input name="CurED_2" type="hidden" value="<?=$story['SMC_CurEndurance'];?>" />
 
 
 <input name="Enemy_Strength" type="hidden" value="<?=$enemy['Enemy_Strength'];?>" />
 <input name="Enemy_Spirit" type="hidden" value="<?=$enemy['Enemy_Spirit'];?>" />
 <input name="Enemy_Speed" type="hidden" value="<?=$enemy['Enemy_Speed'];?>" />
 
  <td width="724px" valign="top" class="content" align="center">
                 
          
           <br /><br />
          
           <div style="width:100px; height:100px; background-image:url(<?=base_url();?>img/other/hod.png); background-repeat:no-repeat; margin-top:100px; margin-left:300px; position:absolute;">
           <h4 id="count_move_2" style="font-family:Arial; font-size:24px; color:#FFF; font-style:italic; position:absolute; margin-top:20px; margin-left:38px;"><?=$story['SMC_Count_Move'];?></h4><br />
           <p id="battle_timer" style="font-family:Arial; font-size:20px; color:#FFF; font-style:italic; position:absolute; margin-top:30px; margin-left:23px;"></p>
           </div>
           
            
           <div id="count_move" style="width:100px; height:80px; margin-top:25px; margin-left:300px; position:absolute;"><?=$story['SMC_Count_Move'];?> ход</div>
           <div style="width:170px; height:22px; background-image:url(<?=base_url();?>img/other/nick.png); background-repeat:no-repeat; margin-top:260px; margin-left:100px; position:absolute; color:#FFF;"> <?=$character['Char_Name'];?> </div>
           <div style="width:170px; height:22px; background-image:url(<?=base_url();?>img/other/nick.png); background-repeat:no-repeat; margin-top:260px; margin-left:435px; position:absolute; color:#FFF;"> <?=$enemy['Enemy_Name'];?> </div>
           <div style="width:350px; height: 290px; background-image:url(<?=base_url();?>img/reatsu/reatsu_1.png);background-repeat:no-repeat;float:left;">
           <img src="<?=base_url().$character['Char_Ava1'];?>" style="margin-top:43px; margin-left: 20px;" width="170" height="240"  alt=""/>
           </div>
           <div style="width:350px; height: 290px; background-image:url(<?=base_url();?>img/reatsu/reatsu_2.png); background-repeat:no-repeat; float:left;">
           <img src="<?=base_url().$enemy['Enemy_Ava1'];?>" style="margin-top:43px; margin-right: 17px;" width="170" height="240"  alt=""/>
           </div>
			
           <table width="500" border="0" style="font-family:Verdana;font-size:12px;color:#ffffff;">
              <tr>
                <td width="160" align="center">
                 <div style="float: left;width:160px; height:20px; background-image:url(<?=base_url();?>img/other/hp_mp_st_0.png); background-repeat:no-repeat;">
           <div id="hp_img" style="float: left;width:100px;height:20px; background-image:url(<?=base_url();?>img/other/hp.png);"></div>
           <div id="hp_text" style="position:absolute;margin-left:70px;margin-top:2px;"><?=$character['Char_CurHealth'];?></div>
           </div>
           </div> 
           
            <div style="float: left;width:160px; height:20px; background-image:url(<?=base_url();?>img/other/hp_mp_st_0.png); background-repeat:no-repeat;">
           <div id="mp_img" style="float: left;width:100px;height:20px; background-image:url(<?=base_url();?>img/other/mp.png);"></div>
           <div id="mp_text" style="position:absolute;margin-left:70px;margin-top:2px;"><?=$character['Char_CurRejatsu'];?></div>
           </div>
           </div> 
           
            <div style="float: left;width:160px; height:20px; background-image:url(<?=base_url();?>img/other/hp_mp_st_0.png); background-repeat:no-repeat;">
           <div id="ed_img" style="float: left;width:100px;height:20px; background-image:url(<?=base_url();?>img/other/st.png);"></div>
           <div id="ed_text" style="position:absolute;margin-left:70px;margin-top:2px;"><?=$character['Char_CurEndurance'];?></div>
           </div>
           </div>  
                   
               
                    </td>
                <td width="180" align="center">
                <input class="button2" type="button"  name="" value="Лог Битвы">
                 
                <div id="skill_baff">
                <?php foreach ($skills as $skill):?>
                
                <?php       
           
               if ($skill['Skill_Type_Damage'] == 0 && $skill['Remaining'] != 0)
                {
        		  print ('
        		<img alt="'.$skill['Skill_id'].'" id="skill_image" onclick="PlayerAttack()" src="'.base_url().'img/skills/'.$skill['Skill_Image'].'" width="30%" style="margin-left:5px;" height="30%" title="');
                
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
            
            
            print("</div>"); 
                
                print ('">');
 		        }
                
                ?>
                <?php endforeach;?>
                </div>
                
                </td>
                <td width="160" align="center">
               <div style="float: left;width:160px; height:20px; background-image:url(<?=base_url();?>img/other/hp_mp_st_0.png); background-repeat:no-repeat;">
           <div id="hp_img_2" style="float: left;width:100px;height:20px; background-image:url(<?=base_url();?>img/other/hp.png);"></div>
           <div id="hp_text_2" style="position:absolute;margin-left:70px;margin-top:2px;">2000</div>
           </div>
           </div> 
           
            <div style="float: left;width:160px; height:20px; background-image:url(<?=base_url();?>img/other/hp_mp_st_0.png); background-repeat:no-repeat;">
           <div id="mp_img_2" style="float: left;width:100px;height:20px; background-image:url(<?=base_url();?>img/other/mp.png);"></div>
           <div id="mp_text_2" style="position:absolute;margin-left:70px;margin-top:2px;">2000</div>
           </div>
           </div> 
           
            <div style="float: left;width:160px; height:20px; background-image:url(<?=base_url();?>img/other/hp_mp_st_0.png); background-repeat:no-repeat;">
           <div id="ed_img_2" style="float: left;width:100px;height:20px; background-image:url(<?=base_url();?>img/other/st.png);"></div>
           <div id="ed_text_2" style="position:absolute;margin-left:70px;margin-top:2px;">2000</div>
           </div>
           </div> 
                </td>
              </tr>
          </table>
          
            <br>
            
            
          <p class="p_text_news">Выберете действие:</p>
                <select class="input_field" name="player_action">
                	<option value="1">Ничего</option>
                    <option value="2">Блок (-15)</option>
                    <option value="3">Уклон (-20)</option>
                </select>
            
                
           <div id="skill_table" class="block_for_skill" align="left">
           
           
           <?php foreach ($skills as $skill):?>
           
           
           
           <?php       
           
           
           if ($skill['Skill_Type_Damage'] == 2)
			{
			 $Bonus_Damage = round($character['Char_Spirit']*0.8); // 80% силы
             $Bonus_Damage_2 = round($character['Char_Spirit']*1.2); // 120% силы
             
			} else if ($skill['Skill_Type_Damage'] == 1)
			{
			 $Bonus_Damage = round($character['Char_Strength']*0.8); // 80% силы
             $Bonus_Damage_2 = round($character['Char_Strength']*1.2); // 120% силы
			}else
            {
                $Bonus_Damage = 0;
                $Bonus_Damage_2 = 0;
            }
					
            $All_Damage = $skill['Skill_Damage'] + $Bonus_Damage;
            $All_Damage_2 = $skill['Skill_Damage'] + $Bonus_Damage_2;
   
	
    
           if ($skill['Remaining'] == 0)
			{	
			print ('
			<img alt="'.$skill['Skill_id'].'" id="skill_image" src="'.base_url().'img/skills/'.$skill['Skill_Image'].'" width="100" style="margin-left:5px;" height="64" title="');
			}else
			{
			 
             print ('
			<img alt="'.$skill['Skill_id'].'" id="skill_image" name="skill_image" src="'.base_url().'img/skills/'.$skill['Skill_Image'].'" width="100" style="margin-left:5px;" height="64" title="');
			}
            
            ?>
            
            
            <?php 
            if ($skill['Skill_Type_Damage'] == 0) // Если скилл бафф( например: Шинпо))
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
            Востановление: ".$skill['Skill_Reset']." (<span class='Skill_Remaining'> ".$skill['Remaining']." осталось</span>)
			<br/>
            Действие: ".$skill['Skill_Duration']." (<span class='Skill_Remaining'> ".$skill['Duration']." осталось</span>)
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
			
            Урон: ".$All_Damage." - ".$All_Damage_2."
			<br/>
            Востановление: ".$skill['Skill_Reset']." (<span class='Skill_Remaining'> ".$skill['Remaining']." осталось</span>)
			<br/>
			<img src='".base_url()."img/other/polosa3.png' width='160' height='3' >
			<br/>
			<img src='".base_url()."img/other/rejatsu.png' align='absmiddle' width='16' height='16'> ".$skill['Skill_Rejatsu']." <img src='".base_url()."img/other/endurance.png' align='absmiddle' width='16' height='16'> ".$skill['Skill_Endurance']."
			</div>
        
        "); 
        
        }
        
        
        
        ?>	
              

                    
             ">
           
           
           <?php endforeach;?>
           
           <script type="text/javascript">
           
           <?php
            
           // Записываем скилы в javascript
           
           print ("
           
           var base_url = \"".base_url()."\";
           
           var Char_id = ".$character['id_char'].";
           
           var char_skill = new Array ();
           
           ");
           
           ?>
           
           <?php foreach ($skills as $skill):?>
           
           <?php 
           
           /*Записываем все скилы игрока в Javascript, чтобы проводить расчеты*/
					
			print ('

			var skill =  new Object ();
			
			skill.name = "'.$skill['Skill_Name'].'";
			skill.damage = '.$skill['Skill_Damage'].';
			skill.rejatsu = '.$skill['Skill_Rejatsu'].';
			skill.endurance = '.$skill['Skill_Endurance'].';
            skill.strength = '.$skill['Skill_Strength'].';
            skill.spirit = '.$skill['Skill_Spirit'].';
            skill.speed = '.$skill['Skill_Speed'].';
			skill.type = '.$skill['Skill_Type'].';
            skill.type_damage = '.$skill['Skill_Type_Damage'].';
			skill.reseting = '.$skill['Skill_Reset'].';
			skill.remaining = '.$skill['Remaining'].';
            
            skill.duration_original = '.$skill['Skill_Duration'].';
            skill.duration = '.$skill['Duration'].';
			
			char_skill ['.$skill['Skill_id'].'] = skill; 
				
			');
           
           ?>
            
           <?php endforeach;?>
           
           </script>
           
           
           <script type="text/javascript" >
            $(function() {
            	$("[id='skill_image']").easyTooltip({clickRemove: true});
            
            	$("[name='skill_image']").fadeTo(0,0.3);
            
            	$("[id='skill_image'][name != 'skill_image']").hover( 
            	
            	function() { 
            	$(this).fadeTo(0,0.5);
            	},
            	function() { 
            	$(this).fadeTo(0,1);
            	}
            	
            	);
            });
            
            </script>

          </div>
          
          <br>
          Лог Битвы
          
          <div id="log_battle" class="block_for_skill">
          
          </div>
          
         
          </td>
        </tr>
</table>