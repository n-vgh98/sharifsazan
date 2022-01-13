// JavaScript Document

	let buttonToggle = true;
			
			$(document).ready(function(){
				$("#formID").slideUp("fast");
				$(".buttonShowForm").click(function(){
			    $("#formID").slideToggle("fast");
				
				   if(buttonToggle == true){
					$(".buttonShowForm").text("بستن فیلتر ها");
					   buttonToggle = false;
				   }
					else{
						$(".buttonShowForm").text("نمایش فیلتر ها");
						buttonToggle = true;
					}
					
				})
			})