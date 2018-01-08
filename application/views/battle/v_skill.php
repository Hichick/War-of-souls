        
           
           
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