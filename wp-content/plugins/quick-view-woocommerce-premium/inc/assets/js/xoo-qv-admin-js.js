jQuery(document).ready(function($){

	$(function(){
		$('.color-field').wpColorPicker();
	})

	$('.xoo-qv-tabs li').on('click',function(){
		var tab_class = $(this).attr('class').split(' ')[0];
		$('li').removeClass('active-tab');
		$('.settings-tab').removeClass('settings-tab-active');
		$(this).addClass('active-tab');
		var class_c = $('[tab-class='+tab_class+']').attr('class');
		$('[tab-class='+tab_class+']').attr('class',class_c+' settings-tab-active');
	})
	
	//Manual speed SlideShow
	$('.ss-m-speed').click(function(){
		$('#ss-m-input').show();
		$('#ss-m-input').prop('disabled', false);
	})

	$('#xoo-qv-p-gl-sss').click(function(){
		$('#ss-m-input').hide();
		$('#ss-m-input').prop('disabled', true);
	})

	$('.xoo-qv-form').on('submit',function(){
		var val_array = [];
		var i = 0;
		$("input[name='xoo-qv-p-gl-df']:checked").each(
	    	function(){
	        val_array[i] = $(this).val();
	        i++;
    	});
    	$("input[name='xoo-qv-p-gl-df']").val(JSON.stringify(val_array));
	})

})