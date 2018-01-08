// JavaScript Document



function Move_To (Location_To,Building_To,Char_id)
{	
    
    if ( (Location_To == 1) && (Building_To == 3)) // Если игрок нажимает на переход сейретей-руконгай
    {
       Location_To = 2;
       Building_To = 4;
        
    }else 
    {
        if ((Location_To == 2) && (Building_To == 4)) // Если игрок нажимает на переход руконгай-сейретей
        {
           Location_To = 1;
           Building_To = 3;
        }
        
    }
    
    
    
	var data_3 = {action: 'Move_To',Location_To: Location_To, Building_To: Building_To, Char_id:Char_id};
    
    var url_script = base_url + "map/world_map/moving_to";
    
	$.ajax(url_script,
	{
		type: "POST",
		data:data_3,
		success: function (result) 
		{		
			location.href= base_url + "map/world_map";
		} // конец success
		}); // конец ajax
        
		
}

