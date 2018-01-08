$(document).ready(function() { 
 
$("div [id='form_message']").hide();
$("div [id='message_output']").hide();
$("div [id='message_input']").show(300);
    
$('#button_input').click( function() {

$("div [id='form_message']").hide(300);
$("div [id='message_output']").hide(300);
$("div [id='message_input']").show(300);

});


$('#button_output').click( function() {

$("div [id='form_message']").hide(300);
$("div [id='message_output']").show(300);
$("div [id='message_input']").hide(300);

});


$('#button_write').click( function() {

$("div [id='form_message']").show(300);
$("div [id='message_output']").hide(300);
$("div [id='message_input']").hide(300);

});

});  // конец ready