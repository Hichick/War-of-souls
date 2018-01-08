  <td width="724px" valign="top" class="content" align="center">
                 
          
          <br><br>
          <div class="block_for_news">
          
           <br>
           
			<?php foreach ($content as $news):?>
            
	         <table width="700px" border="0" cellspacing="0" cellpadding="0">
        	 <tr>
 			 <td class="news_left_td" width="440px" height="47px"> 
 			 <a href="news_view.php?id=1" class="news_left_text"><?php echo $news['title'];?></a>
  			 </td>
    		  <td class="news_right_td" align="right" >
    		  <span  class="news_right_text"><?php echo $news['date'];?></span>
    		  </td>
    		  </tr>
    		  </table>
  
		  	   <table width="700px" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			  <td  width="700px"> 				  
				<img id="cover_img" src="<?= base_url();?>img/news/log_dev.png" align="left" width="280" height="180"> 				 
					  <p class="p_text_news"> <?php echo $news['text'];?> </p>
			  </td>
			  </tr>
			  </table>
				   <br>
                   
            <?php endforeach;?>
            </br>
            <a href="all_news.php"><input class="button2" name="submit_news" type="submit" value="Все новости"></a>
           <br>
        	<br>
          </div>
          
          
         
          </td>
        </tr>
</table>
