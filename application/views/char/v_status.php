  <td width="724px" valign="top" class="content" align="center">
                 
          <?php foreach ($character as $char):?>
          
          
          <?php endforeach;?>
          
          <br><br>
          <div class="block_for_news">
          
           <br>
           
           <div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Основная информация </span></div>
                    
          </div>
           
           
           <table width="650px" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td width="180px" valign="top" align="center">
               
               <img class="imgList" src="<?=base_url().$char['Char_Ava1'];?>">
               <br><br>
               <a href="<?=base_url();?>char/setting_avatar"><input class="button2" type="button"  name="Setting_ava" value="Настроить аватар"> </a>
               
               </td>
               <td valign="top" width="520px;">
               
               <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
              <div style="float: left; padding-top:3px; text-align:left; padding-left:10px;">Имя: <?=$char['Char_Name'];?>
               
           </div>
           </div> 
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
              <div style="float: left; padding-top:3px; text-align:left; padding-left:10px;">Раса: <?=$char['Char_Rasa'];?>
               
           </div>
           </div> 
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
              <div style="float: left; padding-top:3px; width:150px; text-align:left; padding-left:10px;">Отряд: 11</div>
              <div style="float: left; padding-top:3px; width:150px; text-align:left; padding-left:10px;">Ранг: Капитан</div>
           </div> 
           
               
             <div>
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 110px; text-align:left; padding-left:10px;">Жизни
                 <img src="<?=base_url();?>img/other/health.png" align="absmiddle" /> 
           </div>
           
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_MaxHealth'];?> </div>
           
           </div> 
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 110px; text-align:left; padding-left:10px;">Реацу
                 <img src="<?=base_url();?>img/other/rejatsu.png" align="absmiddle" />
           </div>
           
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png); "></div>
           
           <div style="float: left; padding-top:3px;"> <?="+".$char['Char_MaxRejatsu'];?> </div>
           
           </div> 
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 110px; text-align:left; padding-left:10px;">Выносливость
                 <img src="<?=base_url();?>img/other/endurance.png" align="absmiddle" /> 
           </div>
           
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_MaxEndurance'];?>  </div>
           
           </div> 
           
           
           </div>
               
               </td>
             </tr>
             
           </table>
           
           <br>
            
           
        	<br>
          </div>
          
          <br>
          
          <div class="block_for_news"> <!--Блок с Параметрами Персонажа-->
          
           <br>
          
          <div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Параметры персонажа </span></div>
                    
          </div>
          
          
            <div align="left">
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 120px; text-align:left; padding-left:10px;">Физическая сила
                 <img src="<?=base_url();?>img/other/strength.png" align="absmiddle" /> 
           </div>
           
           
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_0.png); background-repeat:no-repeat;">
           <div style="width:150px;height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           </div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_Strength'];?>    </div>
           
           </div> 
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 120px; text-align:left; padding-left:10px;">Духовная сила
                 <img src="<?=base_url();?>img/other/spirit.png" align="absmiddle" />
           </div>
           
          
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_0.png); background-repeat:no-repeat;">
           <div style="width:150px;height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           </div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_Spirit'];?>   </div>
           
           </div> 
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 120px; text-align:left; padding-left:10px;">Скорость
                 <img src="<?=base_url();?>img/other/speed.png" align="absmiddle" /> 
           </div>
           
          
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_0.png); background-repeat:no-repeat;">
           <div style="width:150px;height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           </div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_Speed'];?>  </div>
           
           </div> 
           
           
           
           </div>
          
          <br>
          </div>
          
          <br>
          
          <div class="block_for_news"> <!--Блок с Навыками Персонажа-->
          
           <br>
          
           <div align="left">
           
          <div class="news_left_td" width="440px" height="47px" style="padding-top:15px;"> <span class="news_left_text"> Навыки персонажа </span></div>
                    
          </div>
          
          
          <div align="left">
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 120px; text-align:left; padding-left:10px;">Занджутсу
                 <img src="<?=base_url();?>img/other/zanjutsu.png" align="absmiddle" /> 
           </div>
           
          
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_0.png); background-repeat:no-repeat;">
           <div style="width:150px;height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           </div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_Zanjutsu'];?>   </div>
           
           </div> 
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 120px; text-align:left; padding-left:10px;">Хакуда
                 <img src="<?=base_url();?>img/other/hakuda.png" align="absmiddle" />
           </div>
           
          
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_0.png); background-repeat:no-repeat;">
           <div style="width:150px;height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           </div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_Hakuda'];?>   </div>
           
           </div> 
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 120px; text-align:left; padding-left:10px;">Хохо
                 <img src="<?=base_url();?>img/other/hoho.png" align="absmiddle" /> 
           </div>
           
          
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_0.png); background-repeat:no-repeat;">
           <div style="width:150px;height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           </div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_Hoho'];?>   </div>
           
           </div> 
           
           
           
           <div style=" width: 360px;height: 30px;margin-top: 4px; font-family:Verdana; font-size:10px;">
           <div style="float: left; padding-top:3px;width: 120px; text-align:left; padding-left:10px;">Кидо
                 <img src="<?=base_url();?>img/other/kido.png" align="absmiddle" />
           </div>
           
          
           <div style="float: left;width:200px; height:20px; background-image:url(<?=base_url();?>img/other/bar_0.png); background-repeat:no-repeat;">
           <div style="width:150px;height:20px; background-image:url(<?=base_url();?>img/other/bar_100.png);"></div>
           </div>
           
           <div style="float: left; padding-top:3px;">  <?="+".$char['Char_Kido'];?>  </div>
           
           </div> 
           
           </div>
          
          <br>
          </div>
         
          </td>
        </tr>
</table>