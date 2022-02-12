/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
 jQuery(function($){
	jQuery(document).on('click', '.single_add_to_cart_button', function (e) {
		var error = 0;
		var valid_for_check =  $("#isValidCategory").val();
		 // your validation here
		 if(valid_for_check =='yes'){			
			var wdm_name = $("#wdm_name").val();
			var wdm_age = $("#wdm_age").val();
			var wdm_height = $("#wdm_height").val();
			var wdm_weight = $("#wdm_weight").val();
			var wdm_favorite_player = $("#wdm_favorite_player").val();
			var wdm_coaches_name = $("#wdm_coaches_name").val();
			if(wdm_name ==''){
				error++;
				$("#wdm_name").addClass('valid_error');				
			}
			else{
				$("#wdm_name").removeClass('valid_error');
			}

			if(wdm_age ==''){
				error++;
				$("#wdm_age").addClass('valid_error');
			}
			else{
				$("#wdm_age").removeClass('valid_error');
			}

			if(wdm_height ==''){
				error++;
				$("#wdm_height").addClass('valid_error');
			}
			else{
				$("#wdm_height").removeClass('valid_error');
			}
			
			if(wdm_weight ==''){
				error++;
				$("#wdm_weight").addClass('valid_error');
			}
			else{
				$("#wdm_weight").removeClass('valid_error');
			}

			if(wdm_favorite_player ==''){
				error++;
				$("#wdm_favorite_player").addClass('valid_error');
			}
			else{
				$("#wdm_favorite_player").removeClass('valid_error');
			}

			if(wdm_coaches_name ==''){
				error++;
				$("#wdm_coaches_name").addClass('valid_error');
			}
			else{
				$("#wdm_coaches_name").removeClass('valid_error');
			}
			
			if(error > 0){
				return false;
			}
			else{
				return true;	
			}		

		 }
		 else
		 {
			return true;
		 }
	});  
 });