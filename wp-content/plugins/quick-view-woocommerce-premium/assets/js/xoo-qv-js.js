jQuery(document).ready(function($){

//PrettyPhoto
function prettyPhotoLoad() {
	$("a.zoom").prettyPhoto({
		hook: 'data-rel',
		social_tools: false,
		theme: 'pp_woocommerce',
		horizontal_padding: 20,
		opacity: 0.8,
		deeplinking: false
	});
	$("a[data-rel^='prettyPhoto']").prettyPhoto({
		hook: 'data-rel',
		social_tools: false,
		theme: 'pp_woocommerce',
		horizontal_padding: 20,
		opacity: 0.8,
		deeplinking: false
	});

}

//FlexSlider
function initFlexslider() {
	var images  = $('.xoo-qv-images .woocommerce-product-gallery__image'),
		$target = $('.xoo-qv-images .woocommerce-product-gallery');

	$target.flexslider( {
		selector:       '.woocommerce-product-gallery__wrapper > .woocommerce-product-gallery__image',
		animation:      'slide',
		smoothHeight:   false,
		directionNav:   false,
		controlNav:     'thumbnails',
		slideshow:      false,
		animationSpeed: 500,
		animationLoop:  false, // Breaks photoswipe pagination if true.
		start: function() {
			$target.css( 'opacity', 1 );

			var largest_height = 0;

			images.each( function() {
				var height = $( this ).height();

				if ( height > largest_height ) {
					largest_height = height;
				}
			} );

			images.each( function() {
				$( this ).css( 'min-height', largest_height );
			} );
		}
	} );
};

//Photoswipe
function initPhotoswipe() {
	var $images  = $('.xoo-qv-images .woocommerce-product-gallery__image'),
		$target = $('.xoo-qv-images .woocommerce-product-gallery');

		if ( $images.length > 0 ) {
			$target.prepend( '<a href="#" class="woocommerce-product-gallery__trigger">🔍</a>' );
			//$target.on( 'click', '.woocommerce-product-gallery__trigger', this.openPhotoswipe );
		}
		$target.on( 'click', '.woocommerce-product-gallery__trigger , .woocommerce-product-gallery__image', function(e){openPhotoswipe(e)} );
};


//Open photoswipe
function openPhotoswipe( e ) {
	e.preventDefault();
	var target = $('.xoo-qv-images .woocommerce-product-gallery');
	var pswpElement = $( '.pswp' )[0],
		items       = getGalleryItems(),
		eventTarget = $( e.target ),
		clicked;

	if ( ! eventTarget.is( '.woocommerce-product-gallery__trigger' ) ) {
		clicked = eventTarget.closest( '.woocommerce-product-gallery__image' );
	} else {
		clicked = target.find( '.flex-active-slide' );
	}

	var options = {
		index:                 $( clicked ).index(),
		shareEl:               false,
		closeOnScroll:         false,
		history:               false,
		hideAnimationDuration: 0,
		showAnimationDuration: 0
	};

	// Initializes and opens PhotoSwipe.
	var photoswipe = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options );
	photoswipe.init();
};

//Get Gallery Items

function getGalleryItems() {
	var $slides = $('.xoo-qv-images .woocommerce-product-gallery__image'),
		items   = [];

	if ( $slides.length > 0 ) {
		$slides.each( function( i, el ) {
			var img = $( el ).find( 'img' ),
				large_image_src = img.attr( 'data-large_image' ),
				large_image_w   = img.attr( 'data-large_image_width' ),
				large_image_h   = img.attr( 'data-large_image_height' ),
				item            = {
					src: large_image_src,
					w:   large_image_w,
					h:   large_image_h,
					title: img.attr( 'title' )
				};
			items.push( item );
		} );
	}

	return items;
};

function initZoom(){
	$( '.woocommerce-product-gallery__image').zoom();
}

//Initialize zoom/photoswipe
function initLightbox(){
	
	//If lightbox disabled , return
	if(!xoo_qv_localize.lightbox_enable){return;}

	var lightbox = xoo_qv_localize.lightbox_type;

	switch(lightbox){
		case 'zoom':
			initZoom();
			initFlexslider()
			break;

		case 'photoswipe':
			initPhotoswipe();
			initFlexslider()
			break;

		case 'zoom_photoswipe':
			initZoom();
			initFlexslider()
			initPhotoswipe();
			break;

		case 'prettyphoto':
			prettyPhotoLoad();
			break;
	}
};

/** Quick View Modal Animation **/
	//Animate Type (anim_class = Bounce-in,linear CSS)
function xoo_qv_animate_1(direction,anim_class){

		var height = $(document).height()+'px';
		var width = $(document).width()+'px';

		if(direction == 'top'){
			$(".xoo-qv-inner-modal").css('transform','translate(0,-'+height+')').addClass(anim_class);
		}
		else if(direction == 'next'){
			$(".xoo-qv-inner-modal").css('transform','translate(-'+width+',0)').addClass(anim_class);
		}
		else if(direction == 'prev'){
			$(".xoo-qv-inner-modal").css('transform','translate('+width+',0)').addClass(anim_class);
		}	
}
	//Animate Type (anim_class = Fade-In)
function xoo_qv_animate_2(direction,anim_class){
		$(".xoo-qv-inner-modal").css('opacity','0').addClass(anim_class);
}
	//Animate type(none)
function xoo_qv_animate_3(){}

	//Check User settings
function xoo_qv_animation_func(qv_id,index_id,direction){
	
	if(xoo_qv_localize.modal_anim == 'bounce-in'){
		xoo_qv_ajax(qv_id,index_id,xoo_qv_animate_1,direction,'xoo-qv-animation-bounce');
	}
	else if(xoo_qv_localize.modal_anim == 'linear'){
		xoo_qv_ajax(qv_id,index_id,xoo_qv_animate_1,direction,'xoo-qv-animation-linear');
	}
	else if(xoo_qv_localize.modal_anim == 'fade-in'){
		xoo_qv_ajax(qv_id,index_id,xoo_qv_animate_2,null,'xoo-qv-animation-fadein');
	}
	else {
		xoo_qv_ajax(qv_id,index_id,xoo_qv_animate_3);
	}
}


//CLose Popup
function xoo_qv_close_popup(e){
	$.each(e.target.classList,function(key,value){
		if(value == 'xoo-qv-close' || value == 'xoo-qv-inner-modal' || value == 'xoo-qv-atcclose'){
			$('.xoo-qv-opac').hide();
			$('.xoo-qv-panel').removeClass('xoo-qv-panel-active');
			$('.xoo-qv-modal').html('');
		}
	})
}

$('.xoo-qv-panel').on('click','.xoo-qv-close',xoo_qv_close_popup);
$('.xoo-qv-panel').on('click','.xoo-qv-atcclose',function(e){
	e.preventDefault();
	xoo_qv_close_popup(e);
});

$('body').on('click','.xoo-qv-inner-modal',xoo_qv_close_popup);


$(document).keyup(function(e) {
  if (e.keyCode === 27){
  	$('.xoo-qv-close').trigger('click');
  }    

});

/*****    Ajax call on button click      *****/	
function xoo_qv_ajax(xoo_qv_id,xoo_index_id,anim_type,direction,anim_class){
		var product_length = $('.xoo-qv-button').length;
		$.ajax({
		url: xoo_qv_localize.adminurl,
		type: 'POST',
		data: {action: 'xoo_qv_ajax',
			   product_id: xoo_qv_id
			},
		success: function(response){
			$('.xoo-qv-modal').html(response);
			anim_type(direction,anim_class);
			$('.xoo-qv-counter').html(xoo_index_id+' / '+product_length);
			$('.xoo-qv-pl-active').removeClass('xoo-qv-pl-active');
			$('.xoo-qv-panel .variations_form').wc_variation_form().trigger('check_variations');
			initLightbox();
		 	$('.xoo-qv-panel .variations_form select').change();
		},
	})
}

if(xoo_qv_localize.lightbox_type != 'prettyphoto'){
	$('.xoo-qv-panel').on('change','.variations_form select',function(){
		$('.xoo-qv-images .woocommerce-product-gallery').flexslider( 0 );
	})
}

// Main Quickview Button
$(document).on('click','.xoo-qv-button',function(e){
	e.preventDefault();
	$('.xoo-qv-opac').show();
	var xoo_qv_panel = $('.xoo-qv-panel');
	xoo_qv_panel.addClass('xoo-qv-panel-active');
	xoo_qv_panel.find('.xoo-qv-outer-opl').addClass('xoo-qv-pl-active');
	var qv_id = $(this).data('qv-id');
	var index_id = $(this).index('.xoo-qv-button') + 1;
	xoo_qv_animation_func(qv_id,index_id,'top');

})

// Next Product
$('.xoo-qv-panel').on('click','.xoo-qv-nxt',function(){
	$('.xoo-qv-mpl').addClass('xoo-qv-pl-active');
	var qv_id = $(this).attr('qv-nxt-id');
	var product_nxt_find = $("[data-qv-id="+qv_id+"]").parents().next().find('.xoo-qv-button');
	var index_id = $(product_nxt_find).index('.xoo-qv-button') +1;
	var product_nxt = product_nxt_find.data('qv-id');
	var product_nxt_id;

	if(product_nxt === undefined){
		product_nxt_id = $('.xoo-qv-button:first').data('qv-id');
		index_id = 1;	
	}
	else{
		product_nxt_id = product_nxt;
	}

	xoo_qv_animation_func(product_nxt_id,index_id,'next');
})

//Previous Product
$('.xoo-qv-panel').on('click','.xoo-qv-prev',function(){
	$('.xoo-qv-mpl').addClass('xoo-qv-pl-active');
	var qv_id = $(this).attr('qv-prev-id');
	var product_prev_find = $("[data-qv-id="+qv_id+"]").parents().prev().find('.xoo-qv-button');
	var product_prev = product_prev_find.data('qv-id');
	var index_id = $(product_prev_find).index('.xoo-qv-button') +1;
	var product_prev_id;

	if(product_prev === undefined){
		product_prev_id = $('.xoo-qv-button:last').data('qv-id');
		index_id = $('.xoo-qv-button').length;	
	}
	else{
		product_prev_id = product_prev;
	}

	xoo_qv_animation_func(product_prev_id,index_id,'prev');
})


if(xoo_qv_localize.enable_atc == 'true'){

	//Ajax add to cart go back
	$('.xoo-qv-panel').on('click','.xoo-qv-cback',function(){
		$('.xoo-qv-cart-success').removeClass('xoo-qv-cart-sactive');
		$('.xoo-qv-cartAdded').hide();
	})


	$(document).on('submit','.xoo-qv-summary form.cart',function(e){
		e.preventDefault();
		$('.xoo-qv-atcmsg').html('<i class="xoo-qv xooqv-spinner2 xoo-qv-atcpl"></i> '+xoo_qv_localize.adding_txt);
		$('.xoo-qv-atcmodal').show();

		var form = $(this);
		var atc_btn  = form.find( 'button[type="submit"]');

		var product_data = form.serializeArray();

	    product_data.push({name: 'action', value: 'xoo_qv_add_to_cart'});

	    // if button as name add-to-cart get it and add to form
	    if( atc_btn.attr('name') && atc_btn.attr('name') == 'add-to-cart' && atc_btn.attr('value') ){
	        product_data.push({ name: 'add-to-cart', value: atc_btn.attr('value') });
	    }

		add_to_cart(atc_btn,product_data);//Ajax add to cart
	})


	//Add to cart function
	function add_to_cart(atc_btn,product_data){

		// Trigger event.
		$( document.body ).trigger( 'adding_to_cart', [ atc_btn, product_data ] );

		$.ajax({
			url: xoo_qv_localize.wc_ajax_url.toString().replace( '%%endpoint%%', 'xoo_qv_add_to_cart' ),
			type: 'POST',
			data: $.param(product_data),
		    success: function(response){

				if(response.fragments){
					// Trigger event so themes can refresh other areas.
					$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, atc_btn ] );
					$('.xoo-qv-atcmsg').html('<i class="xoo-qv xooqv-checkmark"></i> '+xoo_qv_localize.added_txt);
	   				$('.xoo-qv-atcbtns').show();
	   				if(xoo_qv_localize.atc_close_popup == 'true'){
		   				setTimeout(function(){
		   					$('.xoo-qv-close').trigger('click');
		   				},1000);
		   			}
				}
				else if(response.error){
					$('.xoo-qv-atcmodal').hide();
					$('.xoo-qv-atcerror').html(response.error);
					setTimeout(function(){
						$('.xoo-qv-atcerror').hide();
					},5000)
				}
				else{
					console.log(response);
				}
		
		    }
		})
	}


}

})
