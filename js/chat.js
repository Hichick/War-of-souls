$(document).ready(function () {


// делаем фокус на поле ввода при загрузке страницы
	if ($("#chat_text_input").size()>0)
	{
		$("#chat_text_input").focus();
	}

	
// отправка сообщения
	function send_message()
	{
		var message_text = $('#chat_text_input').val();
		
		if (message_text!="")
		{
			
			var data3 = {action: 'add_message','message_text': message_text, 'Char_id': Char_id};
            
            var url_script = base_url + "map/location/chat_script";
            		
			$.ajax(url_script,
			{
				type: "POST",
				data:data3,
				success: function (result) 
				{			
					$('#chat_text_input').val('');
					get_chat_messages(); 
				} // конец success
			}); // конец ajax
		}
	}
	
	function get_chat_messages() 
	{	
		if ($('#block').val() == 'no')
		{
			$('#block').val('yes');
			var last_act = $('#last_act').val();
			
			//alert(last_act);
			
			var data2 = {action: 'get_chat_message',last_act: last_act, Char_id: Char_id};
            
			var url_script = base_url + "map/location/chat_script";
            		
			$.ajax(url_script,
			{
				type: "POST", 
				data: data2,
				dataType: "json",
				success: function (results) 
				{
						
				$('#block').val('no');
				
				//alert(results.last_act);
				
				if (results.its_ok == 1)
					{
						$('#chat_text_field').append(results.message_code);
						$('#last_act').val(results.last_act);
						$('#chat_text_field').scrollTop($('#chat_text_field').scrollTop()+100*$('.chat_post_my, .chat_post_other').size());	
					}

					
				} // конец success
			  } ); 
		}
		
	}
	
	$('#chat_text_input').keydown(function(event)
    {
        if (event.which == 13 && !event.shiftKey)
        {
			event.preventDefault();
			send_message();
    	}
    });
	
	$('#chat_button').click(function() 
	{
		send_message();
	});
	
	
	setInterval(function() 
	{
		get_chat_messages();
	}, 2000);
	
	
	$('#chat_text_field').scrollTop($('#chat_text_field').scrollTop()+1000*$('.chat_post_my, .chat_post_other').size());

});