$(document).ready(function() { 


$("input[id='no_skill']").fadeTo(0,0);


$("input[id='all_skill']").click( function() {
	
	$("div [id='hakuda_div']").show(300);
	$("div [id='zanjutsu_div']").show(300);
	$("div [id='kido_div']").show(300);
	$("div [id='hoho_div']").show(300);
    
	});

$("input[id='hakuda']").click( function() {
	
	$("div [id='hakuda_div']").show(300);
	$("div [id='zanjutsu_div']").hide(300);
	$("div [id='kido_div']").hide(300);
    $("div [id='hoho_div']").hide(300);
	
	});
	
$("input[id='zanjutsu']").click( function() {
	
	$("div [id='zanjutsu_div']").show(300);
	$("div [id='hakuda_div']").hide(300);
	$("div [id='kido_div']").hide(300);
    $("div [id='hoho_div']").hide(300);
	
	});
	
$("input[id='kido']").click( function() {
	
	$("div [id='kido_div']").show(300);
	$("div [id='hakuda_div']").hide(300);
	$("div [id='zanjutsu_div']").hide(300);
    $("div [id='hoho_div']").hide(300);
	
	});
    
    
$("input[id='hoho']").click( function() {
	
	$("div [id='hoho_div']").show(300);
	$("div [id='hakuda_div']").hide(300);
	$("div [id='zanjutsu_div']").hide(300);
    $("div [id='kido_div']").hide(300);
	
	});
    

$("td [id='skill_image']").easyTooltip();



});  // конец ready

