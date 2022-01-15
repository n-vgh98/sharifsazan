// JavaScript Document

		let aflag = document.getElementsByClassName('menu-flag2');
			let bflag = true;
			
			function mFlag(){
			
				if(bflag == true){
					for(let i = 0 ; i < aflag.length ; i++){
					aflag[i].style.display = "block";
				}
				bflag = false;	
		
				}
				else{
					bflag = true;
					for(let i = 0 ; i < aflag.length ; i++){
					aflag[i].style.display = "none";
				}

				}
				
			}