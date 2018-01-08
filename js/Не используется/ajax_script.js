function learn_skill (Char_id,Skill_id) // Скрипт изучение скила
{    
    
    var data2 = { 'Skill_id': Skill_id, 'Char_id':Char_id };
    
    $("div [id='" + Skill_id + "']").hide(300);
    
    $.ajax("<?=base_url()?>char/learn_skill/learn_new_skill",{
		type: "POST", 
        data: ({ 'Skill_id': Skill_id, 'Char_id':Char_id }),
		success: function(data)
			{
				$("#info_skill").html(data);
			}
      } );
    	 
}