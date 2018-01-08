  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>

            <div id="infoMessage"><?php echo $message_char;?></div>
            
      
<?php foreach ($characters as $char):?>

<?php echo form_open("char/select");?>

    <input name="id_char" type="hidden" value="<?php echo $char['id_char'];?>">
      
     <table width="500px" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="170px">
               	  <div class="imgList" style="background-image:url(<?=base_url().$char['Char_Ava1'];?>);"> </div>      
                </td>
                <td valign="top" style="font-family:Verdana; font-size:12px; font-style:italic;">
                <div class="div_info_char">
                Информация о персонаже
                </div>
                
                <div style="padding:10px;">
                
                
               <b>Имя:</b> <?php echo $char['Char_Name'];?> <br> 
                <b>Раса:</b> <?php echo $char['Char_Rasa'];?><br> <br>
                              
                <img src="<?=base_url();?>img/other/health.png" align="absmiddle"> <?php echo $char['Char_CurHealth'];?> / <?php echo $char['Char_MaxHealth'];?> <br>
                <img src="<?=base_url();?>img/other/rejatsu.png" align="absmiddle"> <?php echo $char['Char_CurRejatsu'];?> / <?php echo $char['Char_MaxRejatsu'];?> <br>
                <img src="<?=base_url();?>img/other/endurance.png" align="absmiddle"> <?php echo $char['Char_CurEndurance'];?> / <?php echo $char['Char_MaxEndurance'];?> <br>
                
                <br><br>
                <input class="button" name="select" type="submit" value="Играть"> <input class="button" name="delete" type="submit" value="Удалить">
                
                </div>
                
                </td>
              </tr>
            </table>


<?php echo form_close();?>

<br>

<?php endforeach;?>

        	<br>
          </div>
          
          
         
          </td>
        </tr>
</table>
