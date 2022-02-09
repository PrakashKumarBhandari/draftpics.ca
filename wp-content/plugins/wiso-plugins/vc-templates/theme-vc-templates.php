<?php

function wiso_reset_default_templates( $data ) {
	return array();
}
add_filter( 'vc_load_default_templates', 'wiso_reset_default_templates' );

function wiso_vc_templates(){

	$templates = array();

	//Category Headings
//	Headings (Text with link)
	$data = array();
	$data['name'] = esc_html__( 'Headings (Text with link)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/headings/heading-text-with-link.jpg' );
	$data['sort_name'] = 'Headings';
	$data['custom_class'] = 'general headings';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-105b" desctop_md_mb="margin-md-80b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-40b"][vc_column][wiso_headings title="OUR PHILOSOPHY" subtitle="We are fine-art, wedding &amp; portrait film photographers from Oregon, with a special love for natural light,
medium format film cameras &amp; redheads with freckles. With over 5 years of experience, numerous workshops and features in top wedding publications, I capture beauty in the most subtle." image="3236" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact%2F|title:get%20in%20touch||"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Headings
//  Headings (Classic)
	$data = array();
	$data['name'] = esc_html__( 'Headings (Classic)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/headings/classic.jpg' );
	$data['sort_name'] = 'Headings';
	$data['custom_class'] = 'general headings';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1525347828777{background-color: #fcf9f6 !important;}"][vc_column desctop_mt="margin-lg-65t" desctop_mb="margin-lg-50b" tablets_mt="margin-sm-45t" tablets_mb="margin-sm-30b" mobile_mt="margin-xs-15t" mobile_mb="margin-xs-10b"][wiso_headings style="classic_text" title="EXQUISITE ELEGANCE" subtitle="Engagements, Weddings, Elopments" image="3239"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Headings
//  Headings (Text with button (simple))
	$data = array();
	$data['name'] = esc_html__( 'Headings (Text with button (simple))', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/headings/text-with-button-simple.jpg' );
	$data['sort_name'] = 'Headings';
	$data['custom_class'] = 'general headings';
	$data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-125t" desctop_mb="margin-lg-125b" desctop_md_mt="margin-md-100t" desctop_md_mb="margin-md-100b" tablets_mt="margin-sm-80t" tablets_mb="margin-sm-80b" mobile_mt="margin-xs-60t" mobile_mb="margin-xs-60b"][vc_column][wiso_headings style="text_button" title="about us" subtitle="My greatest ambition is to create powerful images that commemorate, across generations, the people we love and the good times we have had. Creativity, hard work and experience" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact%2F|title:contact%20us||"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Headings
//  Headings (Text with button (modern))
	$data = array();
	$data['name'] = esc_html__( 'Headings (Text with button (modern))', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/headings/text-with-button-modern.jpg' );
	$data['sort_name'] = 'Headings';
	$data['custom_class'] = 'general headings';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-95b" desctop_md_mb="margin-md-80b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-30b"][vc_column video_bg_url="https://www.youtube.com/watch?v=lMJXxhRFO1k" parallax_speed_video="1.5" parallax_speed_bg="1.5" width="1/1" desctop_mt="none" desctop_mb="none" desctop_md_mt="none" desctop_md_mb="none" tablets_mt="none" tablets_mb="margin-sm-80b" mobile_mt="none" mobile_mb="margin-xs-60b" desctop_lg_pt="none" desctop_lg_pb="none" desctop_pt="none" desctop_pb="none" tablets_pt="none" tablets_pb="none" mobile_pt="none" mobile_pb="none" offset="vc_col-md-12"][wiso_headings style="text_button_modern" title="Blog updated" subtitle="With over 5 years of experience, numerous workshops and features in top wedding publications." btn_style="a-btn-3" button="url:%23|title:read%20the%20blog||"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;





	//Category Headings
//  Headings (Text center align)
	$data = array();
	$data['name'] = esc_html__( 'Headings (Text center align)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/headings/text-center-align.jpg' );
	$data['sort_name'] = 'Headings';
	$data['custom_class'] = 'general headings';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-100b" desctop_md_mb="margin-md-80b" tablets_mb="margin-sm-55b" mobile_mb="margin-xs-35b"][vc_column][wiso_headings style="text_center" title="Creativity, hard work and experience for your ideas" subtitle="shop photos"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Headings
//  Headings (Text left with button)
	$data = array();
	$data['name'] = esc_html__( 'Headings (Text left with button)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/headings/text-left-with-button.jpg' );
	$data['sort_name'] = 'Headings';
	$data['custom_class'] = 'general headings';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" enable_ovarlay="true" desctop_mb="margin-lg-95b" desctop_md_mb="margin-md-55b" tablets_mb="margin-sm-50b" mobile_mb="margin-xs-20b" css=".vc_custom_1526293628338{background-image: url(http://w4.foxthemes.me/wiso/wp-content/uploads/2018/05/ian-schneider-108618-unsplash.jpg?id=3523) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column desctop_mt="margin-lg-90t" desctop_mb="margin-lg-90b" tablets_mt="margin-sm-70t" tablets_mb="margin-sm-70b" css=".vc_custom_1526293112573{padding-top: 0px !important;}"][wiso_headings style="text_left" title="Wanna promote your brand?" btn_style="a-btn-2" button="url:%23|title:contact||"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Headings
//  Headings (Simple)
	$data = array();
	$data['name'] = esc_html__( 'Headings (Simple)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/headings/simple.jpg' );
	$data['sort_name'] = 'Headings';
	$data['custom_class'] = 'general headings';
	$data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-105t" desctop_mb="margin-lg-120b" desctop_md_mt="margin-md-70t" desctop_md_mb="margin-md-90b" tablets_mt="margin-sm-60t" tablets_mb="margin-sm-70b" mobile_mt="margin-xs-30t" mobile_mb="margin-xs-50b"][vc_column css=".vc_custom_1525961139882{padding-top: 0px !important;}"][wiso_headings style="simple" title="Tile Masonry" subtitle="See our best fine-art, wedding &amp; portrait photos Oregon"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;





	//Category About
//  About (Simple)
	$data = array();
	$data['name'] = esc_html__( 'About (Simple)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/about/Simple.jpg' );
	$data['sort_name'] = 'About';
	$data['custom_class'] = 'general about';
	$data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-50t" desctop_lg_pb="padding-lg-60b" desctop_pt="padding-md-30t" desctop_pb="padding-md-40b" mobile_pt="padding-xs-10t"][vc_column width="1/2" offset="vc_col-lg-4 vc_col-md-6 vc_hidden-xs"][vc_single_image image="4495" img_size="full"][/vc_column][vc_column width="1/2" offset="vc_col-lg-8 vc_col-md-6"][wiso_about style="simple" title="WISO photography" subtitle="HI THERE, I AM" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact-us%2F|title:Contact%20Us|target:%20_blank|"]During your engagement shoot or portrait session I will assist and direct you through posing and expression to get you and your fiancée/partner comfortable in front of the camera so we can incorporate both posed and natural moments on your special day.
<blockquote>From a fashion-forward shoot to a more reserved traditional style, I am here for you.</blockquote>
Vestibulum sed lacinia diam. Morbi varius augue quis fringilla molestie. Etiam eget mattis dolor. Pellentesque porta metus dolor, eu pretium felis sagittis ac. Phasellus tortor nunc, porttitor viverra lobortis ac, tincidunt nec ligula. Suspendisse potenti. Aliquam quis sapien pellentesque dui accumsan ultrices non eget velit.[/wiso_about][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category About
//  About (Slider)
	$data = array();
	$data['name'] = esc_html__( 'About (Slider)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/about/Slider.jpg' );
	$data['sort_name'] = 'About';
	$data['custom_class'] = 'general about';
	$data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-45t" desctop_lg_pb="padding-lg-80b" tablets_pt="padding-sm-15t" tablets_pb="padding-sm-50b" css=".vc_custom_1527170933728{background-color: #fcf9f6 !important;}"][vc_column][wiso_about style="slider" slider_items="%5B%7B%22image_id%22%3A%223103%22%2C%22title%22%3A%22Fact%20%231%3A%20I%20have%20a%20guitar%22%2C%22description%22%3A%22Sed%20ut%20perspiciatis%20unde%20omnis%20iste%20natus%20error%20sit%20voluptatem%20accusantium%20doloremque%20laudantium%2C%20totam%20rem%20aperiam%22%7D%2C%7B%22image_id%22%3A%223054%22%2C%22title%22%3A%22Fact%20%232%3A%20I%20love%20a%20horse%22%2C%22description%22%3A%22Sed%20ut%20perspiciatis%20unde%20omnis%20iste%20natus%20error%20sit%20voluptatem%20accusantium%20doloremque%20laudantium%2C%20totam%20rem%20aperiam%22%7D%2C%7B%22image_id%22%3A%223055%22%2C%22title%22%3A%22Fact%20%233%3A%20I%20like%20to%20travel%22%2C%22description%22%3A%22Sed%20ut%20perspiciatis%20unde%20omnis%20iste%20natus%20error%20sit%20voluptatem%20accusantium%20doloremque%20laudantium%2C%20totam%20rem%20aperiam%22%7D%5D"][/wiso_about][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  Banner (Simple)
	$data = array();
	$data['name'] = esc_html__( 'Image Banner (Simple)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/Simple.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_banner style="center_content" overlay="yes" title="3D Cover" image="4297"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  Banner (Modern)
	$data = array();
	$data['name'] = esc_html__( 'Image Banner (Modern)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/modern.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-90b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-45b"][vc_column][wiso_banner style_banner="modern" height="full" btn_style="a-btn-2" overlay="yes" title="I'm influencer" image="3515" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact%2F|title:contact%20me||" subtitle="POWERFUL IMAGES"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;





	//Category Banner
//  Banner (Classic)
	$data = array();
	$data['name'] = esc_html__( 'Image Banner (Classic)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/Classic.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_banner style_banner="classic" title="Welcome to Lucia Wedding Photography! We're glad you're here. " image="3093" bg_color="#222222"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;





	//Category Banner
//  Banner Slider (Myro)
	$data = array();
	$data['name'] = esc_html__( 'Banner Slider (Myro)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/banner-slider-myro.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][banner_slider type_slider="myro" autoplay="5" speed="1500"][banner_slider_items option_style="myro" subtitle="fashion photography" title="impressure" btn_style="a-btn-2" image="3100" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fvertical-slider%2F|title:view%20portfolio||"][banner_slider_items option_style="myro" subtitle="nature photography" title="interdum" btn_style="a-btn-2" image="3050" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fdisortion%2F|title:view%20portfolio||"][banner_slider_items option_style="myro" subtitle="weekend photography" title="night light" btn_style="a-btn-2" image="3433" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fparallax-showcase%2F|title:view%20portfolio||"][/banner_slider][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  Banner Slider (Urban)
	$data = array();
	$data['name'] = esc_html__( 'Banner Slider (Urban)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/Banner-slider-urban.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][banner_slider type_slider="urban"][banner_slider_items option_style="urban" subtitle="subtitle" title="Title" text="Text" image="4296"][banner_slider_items option_style="urban" subtitle="subtitle" title="Title" text="Text" image="4296"][banner_slider_items option_style="urban" subtitle="subtitle" title="Title" text="Text" image="4296"][banner_slider_items option_style="urban" subtitle="subtitle" title="Title" text="Text" image="4296"][/banner_slider][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;





	//Category Banner
//  Banner Slider (Andra)
	$data = array();
	$data['name'] = esc_html__( 'Banner Slider (Andra)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/banner-slider-andra.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mt="margin-lg-10t" desctop_mb="margin-lg-90b" tablets_mt="margin-sm-0t" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-50b"][vc_column][banner_slider autoplay="5" speed="1500"][banner_slider_items image="3104"][banner_slider_items image="3088"][banner_slider_items image="3094"][banner_slider_items image="3083"][/banner_slider][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;





	//Category Banner
//  Banner Slider (Vertical)
	$data = array();
	$data['name'] = esc_html__( 'Banner Slider (Vertical)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/banner-slider-vertical.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][banner_slider type_slider="vertical"][banner_slider_items option_style="vertical" title="Friends" pagination_title="Friends" image="4511"][banner_slider_items option_style="vertical" title="Sea" pagination_title="Sea" image="4509"][banner_slider_items option_style="vertical" title="Rapper" pagination_title="Rapper" image="4512"][/banner_slider][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;





	//Category Clients
//  Clients
	$data = array();
	$data['name'] = esc_html__( 'Clients', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/clients/clients.jpg' );
	$data['sort_name'] = 'Clients';
	$data['custom_class'] = 'general clients';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-105b" desctop_md_mb="margin-md-80b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-45b"][vc_column css=".vc_custom_1525961139882{padding-top: 0px !important;}"][wiso_headings style="text_center" title="CLIENT ARCHIVE" subtitle="Checkout our happy clients"][/vc_column][/vc_row][vc_row desctop_mb="margin-lg-145b" desctop_md_mb="margin-md-130b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-45b"][vc_column][wiso_clients clients="amanda-carson,annie-herrera,gabriel-campbell,lula-klein,robin-ellis,shari-santos" columns_number="col-xs-12 col-sm-6 col-md-4"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Contacts
//  Contacts (Content with parallax)
	$data = array();
	$data['name'] = esc_html__( 'Contacts (Content with parallax)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/contacts/content-with-parallax.jpg' );
	$data['sort_name'] = 'Contacts';
	$data['custom_class'] = 'general contacts';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_contacts style="parallax_content" image="3517"]
<h3>About Me</h3>
During your engagement shoot or portrait session I will assist and direct you through posing and expression to get you and your fiancée / partner comfortable in front of the camera so we can incorporate both posed and natural moments on your special day. From a fashion forward shoot to a more reserved traditional style, I am here for you.
<blockquote>It takes a lot of imagination to be a good photographer. Everything is so ordinary..</blockquote>
I love trying creative things in a fast paced environment. I adapt to any given situation and try to bring the beauty out that is already there. This is your day, lets have fun with it and make memories.

I have won a boatload of awards for my work, and I’m grateful for every single one of them, but I’ve always been unsure of whether I earned them or whether the jury was rigged.<span class="Apple-converted-space">  By now I am literally addicted to making photos…for which there is no known cure, except to make more.</span>
<div class="gridable gridable--row">
<div class="gridable--col col-6">
<h6>Client List</h6>
<span class="Apple-converted-space">Able Jeans, Ann Taylor, Bloomingdale’s, Cole Haan, Emanuel Ungaro, Lord &amp; Taylor, Nexxus, Nike, Nordstrom, Pantene, Target, Theory, Tommy Bahama and Tory Burch.</span></div>
<div class="gridable--col col-6">
<h6>Editorial Includes</h6>
Grazia, Harper’s Bazaar KZ, L’Officiel (ME, Ukraine), Marie Claire, No Tofu, Schön!, Sportswear International, Vanity Fair Italia, Vman and Vogue Nippon.</div>
</div>
[/wiso_contacts][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Contacts
//  Contacts (Custom info)
	$data = array();
	$data['name'] = esc_html__( 'Contacts (Custom info)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/contacts/custom-info.jpg' );
	$data['sort_name'] = 'Contacts';
	$data['custom_class'] = 'general contacts';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_contacts style="custom_info" address_info="%5B%7B%22address%22%3A%22Via%20Cesare%20Rosaroll%20st.%20118%2C%2080139%20Sofia%22%7D%5D" email_info="%5B%7B%22email%22%3A%22iso%40info.com%22%7D%5D" phone_info="%5B%7B%22phone%22%3A%22%2B759%20933%2043%2045%22%7D%5D"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque facilisis elementum laoreet. Vivamus vestibulum facilisis tortor non pellentesque. Etiam porttitor augue a iaculis bibendum. Nulla vitae metus non orci porta auctor nec eu ipsum.

In vitae feugiat mauris. Cras placerat dolor sed leo dictum, id sodales felis vestibulum. Ut imperdiet pharetra neque vitae sodales. Curabitur at magna pulvinar, porta odio in.[/wiso_contacts][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Contacts
//  Contacts (Info with parallax)
	$data = array();
	$data['name'] = esc_html__( 'Contacts (Info with parallax)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/contacts/info-with-parallax.jpg' );
	$data['sort_name'] = 'Contacts';
	$data['custom_class'] = 'general contacts';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_contacts style="parallax_info" title="Contact me" form="3290" image="3045" text="Are you interested in working together? Do you have any questions or just want to say hi? "][/wiso_contacts][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Contacts
//  Contacts (Info with form)
	$data = array();
	$data['name'] = esc_html__( 'Contacts (Info with form)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/contacts/info-with-form.jpg' );
	$data['sort_name'] = 'Contacts';
	$data['custom_class'] = 'general contacts';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-110b" tablets_mb="margin-sm-60b" mobile_mb="margin-xs-40b"][vc_column css_animation="none"][wiso_contacts address_info="%5B%7B%22address%22%3A%2214%20Tottenham%20Road%2C%20%5CnLondon%2C%20England%22%7D%5D" form="3290"]<a href="mailto:info@yourdomain.comain.com">info@yourdomain.com</a>

<a href="tel:(+68) 12004509">(+68) 12004509</a>[/wiso_contacts][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Contacts
//  Contacts (Info list)
	$data = array();
	$data['name'] = esc_html__( 'Contacts (Info list)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/contacts/info-list.jpg' );
	$data['sort_name'] = 'Contacts';
	$data['custom_class'] = 'general contacts';
	$data['content'] = <<<CONTENT
[vc_row][vc_column][wiso_contacts style="info_list" items="%5B%7B%22icon%22%3A%22icon-email%22%2C%22icon_color%22%3A%22%23222222%22%2C%22items_child%22%3A%22%255B%257B%2522title%2522%253A%2522Main%2520office%2522%252C%2522email%2522%253A%2522hello%2540iso.studio%2522%257D%252C%257B%2522title%2522%253A%2522Support%2522%252C%2522email%2522%253A%2522hello%2540iso.architecture%2522%257D%255D%22%7D%2C%7B%22icon%22%3A%22icon-telephone-1%22%2C%22icon_color%22%3A%22%23222222%22%2C%22items_child%22%3A%22%255B%257B%2522title%2522%253A%2522Our%2520phone%2522%252C%2522phone%2522%253A%2522(043)%2520568%2520456%2520902%2522%257D%252C%257B%2522title%2522%253A%2522Our%2520fax%2522%252C%2522text%2522%253A%2522(043)%2520568%2520456%2520902%2522%257D%255D%22%7D%2C%7B%22icon%22%3A%22icon-map-location-1%22%2C%22icon_color%22%3A%22%23222222%22%2C%22items_child%22%3A%22%255B%257B%2522title%2522%253A%2522%2520New%2520york%252C%2520usa%2522%252C%2522text%2522%253A%25222005%2520stokes%2520isle%2520apt.%2520896%252C%2520venaville%252C%2520new%2520york%252010010%2522%257D%255D%22%7D%5D"][/wiso_contacts][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Coming Soon
//  Coming Soon
	$data = array();
	$data['name'] = esc_html__( 'Coming Soon', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/coming_soon/coming-soon.jpg' );
	$data['sort_name'] = 'Coming Soon';
	$data['custom_class'] = 'general coming-soon';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" full_height="yes" content_placement="middle" enable_ovarlay="true" desctop_lg_pt="padding-lg-80t" desctop_lg_pb="padding-lg-80b" tablets_pt="padding-sm-0t" tablets_pb="padding-sm-0b" css=".vc_custom_1527171713409{background-image: url(http://w4.foxthemes.me/wiso/wp-content/uploads/2018/05/ian-schneider-108618-unsplash.jpg?id=3523) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][wiso_coming_soon title="Something awesome in the works." subtitle="You can subscribe us to get when our website is ready." date="2018/12/31 00:00" btn_style="btn-style-2" days="Days" hours="Hours" minutes="Minutes" seconds="Seconds" days_mobile="D" hours_mobile="H" minutes_mobile="Min" seconds_mobile="Sec" form="5086"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Gallery
//  Disortion Gallery (Style1)
	$data = array();
	$data['name'] = esc_html__( 'Disortion Gallery (Style1)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/gallery/disortion-gallery-style1.jpg' );
	$data['sort_name'] = 'Gallery';
	$data['custom_class'] = 'general gallery';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_disortion images="3098,3061,3318"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Events
//  Events (Events List)
	$data = array();
	$data['name'] = esc_html__( 'Events (Events List)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/events/events-list.jpg' );
	$data['sort_name'] = 'Events';
	$data['custom_class'] = 'general events';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_lg_pb="padding-lg-70b" desctop_pb="padding-md-45b" mobile_pb="padding-xs-10b" css=".vc_custom_1527010120430{background-color: #fcf9f6 !important;}"][vc_column desctop_mt="margin-lg-20t" mobile_mt="margin-xs-0t" css=".vc_custom_1527010085340{padding-top: 0px !important;}"][wiso_events_list count="6"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio (Exhibition Portfolio)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio (Exhibition Portfolio)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/exhibition-portfolio.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_exhibition cats="albums"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Gallery
//  Full screen slider (Zoom)
	$data = array();
	$data['name'] = esc_html__( 'Full screen slider (Zoom)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/gallery/full-screen-slider-zoom.jpg' );
	$data['sort_name'] = 'Gallery';
	$data['custom_class'] = 'general gallery';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][full_screen_slider slider_type="kenburn_slider" autoplay="5000" speed="1500" loop="true" sound_autoplay="true" images="3032,3517,3518,3049" iso_file="http://w4.foxthemes.me/wiso/wp-content/uploads/2018/05/preview-2.mp3"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Gallery
//  Wiso gallery (Galerry masonry)
	$data = array();
	$data['name'] = esc_html__( 'Wiso gallery (Galerry masonry)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/gallery/wiso-gallery-masonry.jpg' );
	$data['sort_name'] = 'Gallery';
	$data['custom_class'] = 'general gallery';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_lg_pt="padding-lg-65t" desctop_lg_pb="padding-lg-100b" desctop_pt="padding-md-45t" desctop_pb="padding-md-80b" mobile_pt="padding-xs-0t" mobile_pb="padding-xs-30b" css=".vc_custom_1527081348872{background-color: #000000 !important;}"][vc_column][wiso_gallery type="masonry" images="3050,3520,3517,3526,3514,3433"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Gallery
//  Wiso gallery (Glitch gallery)
	$data = array();
	$data['name'] = esc_html__( 'Wiso gallery (Glitch gallery)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/gallery/wiso-gallery-glitch.jpg' );
	$data['sort_name'] = 'Gallery';
	$data['custom_class'] = 'general gallery';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_gallery type="glitch" images="4511,4512,4503,4504,4510,4506,4509,4508,4507"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Gallery
//  Wiso Gallery (Modern slider)
	$data = array();
	$data['name'] = esc_html__( 'Wiso Gallery (Modern slider)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/gallery/wiso-gallery-modern-slider.jpg' );
	$data['sort_name'] = 'Gallery';
	$data['custom_class'] = 'general gallery';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content"][vc_column][wiso_gallery type="modern_slider" images="4765,4764,4763"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Gallery
//  Wiso Gallery (Slider transition)
	$data = array();
	$data['name'] = esc_html__( 'Wiso Gallery (Slider transition)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/gallery/wiso-gallery-slider-transition.jpg' );
	$data['sort_name'] = 'Gallery';
	$data['custom_class'] = 'general gallery';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_gallery type="slider_transition" images="3032,3031,3417,3418"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Gallery
//  Wiso Gallery (Fullscreen with thumbnail)
	$data = array();
	$data['name'] = esc_html__( 'Wiso Gallery (Fullscreen with thumbnail)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/gallery/wiso-gallery-fullscreen-with-thumbnail.jpg' );
	$data['sort_name'] = 'Gallery';
	$data['custom_class'] = 'general gallery';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_gallery images="3050,3427,3430,3433,3514,3520,3527,3526,3524,3533,3513,3515,3529,3530,3522,3531,3517,3521,3100,3518"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Instagram
//  Instagram (List style)
	$data = array();
	$data['name'] = esc_html__( 'Instagram (List style)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/instagram/list-style.jpg' );
	$data['sort_name'] = 'Instagram';
	$data['custom_class'] = 'general instagram';
	$data['content'] = <<<CONTENT
[vc_row][vc_column][wiso_instagram style="style2" username="iso.phototheme"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Instagram
//  Instagram (Big gallery style)
	$data = array();
	$data['name'] = esc_html__( 'Instagram (Big gallery style)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/instagram/big-gallery-style.jpg' );
	$data['sort_name'] = 'Instagram';
	$data['custom_class'] = 'general instagram';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-100b" desctop_md_mb="margin-md-80b" tablets_mb="margin-sm-55b" mobile_mb="margin-xs-35b"][vc_column][wiso_headings style="text_center" title="My greatest ambition is to create powerful images" subtitle="instagram photos"][/vc_column][/vc_row][vc_row desctop_mb="margin-lg-130b" desctop_md_mb="margin-md-90b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-0b"][vc_column][wiso_instagram username="iso.besttheme" count="6"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Instagram
//  Instagram (Big gallery style)
	$data = array();
	$data['name'] = esc_html__( 'Instagram (Big gallery style)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/instagram/big-gallery-style.jpg' );
	$data['sort_name'] = 'Instagram';
	$data['custom_class'] = 'general instagram';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-100b" desctop_md_mb="margin-md-80b" tablets_mb="margin-sm-55b" mobile_mb="margin-xs-35b"][vc_column][wiso_headings style="text_center" title="My greatest ambition is to create powerful images" subtitle="instagram photos"][/vc_column][/vc_row][vc_row desctop_mb="margin-lg-130b" desctop_md_mb="margin-md-90b" tablets_mb="margin-sm-80b" mobile_mb="margin-xs-0b"][vc_column][wiso_instagram username="iso.besttheme" count="6"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  KenBurns slider (Fade effect)
	$data = array();
	$data['name'] = esc_html__( 'KenBurns slider (Fade effect)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/kenBurns-slider-fade-effect.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][ken_burns_slider type="fade-effect" hide_title="true" sound_autoplay="true" images="3050,3526,3514" iso_file="http://w4.foxthemes.me/wiso/wp-content/uploads/2018/05/preview-2.mp3"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  KenBurns slider (Zoom effect)
	$data = array();
	$data['name'] = esc_html__( 'KenBurns slider (Zoom effect)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/kenBurns-slider-zoom-effect.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][ken_burns_slider sound_autoplay="true" images="3527,3514,3533,3049" iso_file="http://w4.foxthemes.me/wiso/wp-content/uploads/2018/05/preview-2.mp3"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Line_of_images
//  Line_of_images (Logos with link style1)
	$data = array();
	$data['name'] = esc_html__( 'Line of images (Logos with link style1)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/line_of_images/logos-with-link-style1.jpg' );
	$data['sort_name'] = 'Line of images';
	$data['custom_class'] = 'general line-of-images';
	$data['content'] = <<<CONTENT
[vc_row][vc_column css=".vc_custom_1526998407225{padding-top: 0px !important;}"][wiso_line_of_images logos="%5B%7B%22image%22%3A%224642%22%2C%22url%22%3A%22%23%22%7D%2C%7B%22image%22%3A%224641%22%2C%22url%22%3A%22%23%22%7D%2C%7B%22image%22%3A%224640%22%2C%22url%22%3A%22%23%22%7D%2C%7B%22image%22%3A%224639%22%2C%22url%22%3A%22%23%22%7D%2C%7B%22image%22%3A%224638%22%2C%22url%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Line_of_images
//  Line_of_images (Only images)
	$data = array();
	$data['name'] = esc_html__( 'Line of images (Only images)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/line_of_images/only-images.jpg' );
	$data['sort_name'] = 'Line of images';
	$data['custom_class'] = 'general line-of-images';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_line_of_images style="images" count="4" images="3519,3032,3517,3418"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Line_of_images
//  Line_of_images (Logos with link style2)
	$data = array();
	$data['name'] = esc_html__( 'Line of images (Logos with link style2)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/line_of_images/logos-with-link-style2.jpg' );
	$data['sort_name'] = 'Line of images';
	$data['custom_class'] = 'general line-of-images';
	$data['content'] = <<<CONTENT
[vc_row desctop_lg_pb="padding-lg-130b" desctop_pb="padding-md-80b" tablets_pb="padding-sm-65b" mobile_pb="padding-xs-40b"][vc_column][wiso_headings style="text_center" title="Partners and friends we've meton our journey " title_color="#ffffff" subtitle="our awards"][/vc_column][/vc_row][vc_row desctop_lg_pb="padding-lg-105b" desctop_pb="padding-md-70b" mobile_pb="padding-xs-40b"][vc_column][wiso_line_of_images style="logos2" logos="%5B%7B%22image%22%3A%224648%22%7D%2C%7B%22image%22%3A%224649%22%7D%2C%7B%22image%22%3A%224650%22%7D%2C%7B%22image%22%3A%224651%22%7D%2C%7B%22image%22%3A%224652%22%7D%2C%7B%22image%22%3A%224653%22%7D%2C%7B%22image%22%3A%224654%22%7D%2C%7B%22image%22%3A%224655%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Pages
//  Pages gallery
	$data = array();
	$data['name'] = esc_html__( 'Pages gallery', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/pages/pages-gallery.jpg' );
	$data['sort_name'] = 'Pages';
	$data['custom_class'] = 'general pages';
	$data['content'] = <<<CONTENT
[vc_row][vc_column][wiso_headings style="classic_text" title="EXQUISITE ELEGANCE" subtitle="Engagements, Weddings, Elopments"][/vc_column][/vc_row][vc_row][vc_column][wiso_pages_gallery pages="%5B%7B%22image%22%3A%223029%22%2C%22button%22%3A%22url%3Ahttp%253A%252F%252Fdev.viewdemo.co%252Fwp%252Fiso%252Fshowcase%252F%7Ctitle%3Aportfolio%7C%7C%22%7D%2C%7B%22image%22%3A%223091%22%2C%22button%22%3A%22url%3Ahttp%253A%252F%252Fdev.viewdemo.co%252Fwp%252Fiso%252Fblog%252F%253Fblog_style%253Dmasonry%7Ctitle%3Ablog%7C%7C%22%7D%2C%7B%22image%22%3A%223069%22%2C%22button%22%3A%22url%3Ahttp%253A%252F%252Fdev.viewdemo.co%252Fwp%252Fiso%252Fabout%252F%7Ctitle%3Aabout%7C%7C%22%7D%2C%7B%22image%22%3A%223028%22%2C%22button%22%3A%22url%3Ahttp%253A%252F%252Fdev.viewdemo.co%252Fwp%252Fiso%252Feditorial%252Fwhat-your-friends-think-about-photographer%252F%7Ctitle%3Adetails%7C%7C%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  Physics banner (Decori)
	$data = array();
	$data['name'] = esc_html__( 'Physics banner (Decori)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/physics-banner-decori.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_physics_banner type="decori" style="a-btn-4" enable_btn="true" title="Amazing" subtitle="photography" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact-us%2F|title:Contact%20Us|target:%20_blank|"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  Physics banner (Linira)
	$data = array();
	$data['name'] = esc_html__( 'Physics banner (Linira)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/physics-banner-linira.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_physics_banner type="linira" style="a-btn-4" enable_btn="true" title="WISO" subtitle="photography" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact-us%2F|title:Contact%20Us|target:%20_blank|"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  Physics banner (Fizio)
	$data = array();
	$data['name'] = esc_html__( 'Physics banner (Fizio)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/physics-banner-fizio.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_physics_banner enable_btn="true" title="Photography" subtitle="Sed quia consequuntur" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact-us%2F|title:Contact%20Us||" title_color="#222222" subtitle_color="#222222" animation_color="#222222" bg_color="#fcf9f6" button_color="#222222"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio list (Little fragment)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio list (Little fragment)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-list-little-fragment.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row][vc_column][wiso_portfolio_list cats="ideas,tiramila"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio list (Parallax Showcase)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio list (Parallax Showcase)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-list-parallax-showcase.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_portfolio_list style="parallax_showcase" cats="ideas,tiramila" orderby="date" order="ASC" btn_style="a-btn-2" count="5"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio list (Glitch)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio list (Glitch)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-list-glitch.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row][vc_column][wiso_portfolio_list style="glitch" cats="ideas"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;





	//Category Portfolio
//  Portfolio sliders (Centered swiper)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Centered swiper)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-centered-swiper.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_portfolio_sliders style="album_swiper" cats="ideas,tiramila" title="Hello" descr="During your engagement shoot or portrait session I will assist and direct you through posing"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio sliders (Slider classic)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Slider classic)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-slider-classic.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" mobile_mb="margin-xs-10b"][vc_column][wiso_portfolio_sliders style="slider_classic" cats="ideas" btn_style="a-btn-2"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio sliders (Interactive Links)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Interactive Links)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-interactive-links.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_portfolio_sliders cats="ideas" orderby="date" order="ASC"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio sliders (Landing Split)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Landing Split)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-landing-split.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_portfolio_sliders style="landing_split" cats="albums,creative,destination"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio sliders (Full Showcase slider)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Full Showcase slider)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-full-showcase-slider.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1527240768924{padding-top: 0px !important;}"][vc_column][wiso_portfolio_sliders style="full_showcase_slider" cats="ideas,tiramila" count="5"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio sliders (Showcase slider)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Showcase slider)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-showcase-slider.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-60t" desctop_mb="margin-lg-110b" tablets_mt="margin-sm-30t" tablets_mb="margin-sm-80b" mobile_mt="margin-xs-20t" mobile_mb="margin-xs-50b"][vc_column css=".vc_custom_1527235134311{padding-top: 0px !important;}"][wiso_portfolio_sliders style="showcase_slider" cats="ideas,tiramila" order="ASC"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio sliders (Split slider)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Split slider)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-split-slider.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_portfolio_sliders style="split_slider" cats="tiramila" color1="#fcf9f6" color2="#fcf9f6" color3="#fcf9f6" color4="#fcf9f6"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio sliders (Urban slider)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Urban slider)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-urban-slider.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" desctop_mb="margin-lg-70b" tablets_mb="margin-sm-40b"][vc_column][wiso_portfolio_sliders style="urban_slider" cats="ideas,tiramila"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Portfolio
//  Portfolio sliders (Vertical slider)
	$data = array();
	$data['name'] = esc_html__( 'Portfolio sliders (Vertical slider)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/portfolio/portfolio-sliders-vertical-slider.jpg' );
	$data['sort_name'] = 'Portfolio';
	$data['custom_class'] = 'general portfolio';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][wiso_portfolio_sliders style="vertical_slider" cats="behind,indoor" order="ASC" count="3"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Post
//  Post slider
	$data = array();
	$data['name'] = esc_html__( 'Post slider', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/posts/post-slider.jpg' );
	$data['sort_name'] = 'Posts';
	$data['custom_class'] = 'general posts';
	$data['content'] = <<<CONTENT
[vc_row][vc_column][wiso_post_slider cats="creative,editorial,impressure"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Services
//  Services (Center)
	$data = array();
	$data['name'] = esc_html__( 'Services (Center)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/services/center.jpg' );
	$data['sort_name'] = 'Services';
	$data['custom_class'] = 'general services';
	$data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-120t" desctop_lg_pb="padding-lg-120b" desctop_pt="padding-md-90t" desctop_pb="padding-md-90b" tablets_pt="padding-sm-65t" tablets_pb="padding-sm-65b" mobile_pt="padding-xs-35t" mobile_pb="padding-xs-35b"][vc_column width="1/2" offset="vc_col-md-4"][wiso_services style="center" icon="icon-pencil1" title="digital solutions" text="Proin ultricies augue libero, faucibus elit elementum sed dolor felis, cursus non diam non, finibus feugiat dui, a facilisis urna a ex magna"][/vc_column][vc_column width="1/2" offset="vc_col-md-4"][wiso_services style="center" icon="icon-color-palette" title="creative strategy" text="Fusce auctor lacinia nunc, quis pellentesque dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubili"][/vc_column][vc_column width="1/2" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-3"][wiso_services style="center" icon="icon-pencil-ruler" title="integrated marketing" text="Proin ultricies augue libero, quis faucibus elit elementum sed dolor felis, cursus non diam non, finibus interdum posuere tempus non nulla"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Services
//  Services (Classic)
	$data = array();
	$data['name'] = esc_html__( 'Services (Classic)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/services/classic.jpg' );
	$data['sort_name'] = 'Services';
	$data['custom_class'] = 'general services';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-75b" desctop_md_mb="margin-md-55b" tablets_mb="margin-sm-35b" mobile_mb="margin-xs-5b"][vc_column][wiso_headings title="Welcome to Wiso studio" subtitle="We are fine-art, wedding &amp; portrait film photographers from Oregon, with a special love for natural light,
medium format film cameras &amp; redheads with freckles. With over 5 years of experience, numerous workshops and features in top wedding publications, I capture beauty in the most subtle." image="3236"][/vc_column][/vc_row][vc_row desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-90b" tablets_mb="margin-sm-20b"][vc_column width="1/3" tablets_mb="margin-sm-30b"][wiso_services style="classic" title="Vision" image="3038" text="Phasellus faucibus venenatis dolor. In elit ligula, maximus vel tincidunt ut, rhoncus et."][/vc_column][vc_column width="1/3" tablets_mb="margin-sm-30b"][wiso_services style="classic" title="Missing" image="3100" text="Phasellus faucibus venenatis dolor. In elit ligula, maximus vel tincidunt ut, rhoncus et."][/vc_column][vc_column width="1/3" tablets_mb="margin-sm-30b"][wiso_services style="classic" title="History" image="3081" text="Phasellus faucibus venenatis dolor. In elit ligula, maximus vel tincidunt ut, rhoncus et."][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Services
//  Services (Accordion)
	$data = array();
	$data['name'] = esc_html__( 'Services (Accordion)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/services/accordion.jpg' );
	$data['sort_name'] = 'Services';
	$data['custom_class'] = 'general services';
	$data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-120t" desctop_lg_pb="padding-lg-120b" desctop_pt="padding-md-90t" desctop_pb="padding-md-90b" tablets_pt="padding-sm-75t" tablets_pb="padding-sm-60b" mobile_pt="padding-xs-0t" mobile_pb="padding-xs-40b"][vc_column][wiso_headings style="text_center" title="Step by step make incredible " subtitle="how we work"][/vc_column][/vc_row][vc_row desctop_lg_pb="padding-lg-120b" desctop_pb="padding-md-90b" mobile_pb="padding-xs-45b"][vc_column][wiso_services style="accordion" items_accordion="%5B%7B%22number%22%3A%2201.%22%2C%22title%22%3A%22Story%20%26%20Concept%22%2C%22text%22%3A%22A%20wonderful%20serenity%20has%20taken%20possession%20of%20my%20entire%20soul%2C%20like%20these%20sweet%20mornings%20of%20spring%20which%20and%20feel%20the%20charm%22%7D%2C%7B%22number%22%3A%2202.%20%22%2C%22title%22%3A%22Style%20%26%20Makeup%22%2C%22text%22%3A%22Aenean%20elementum%20maximus%20erat%2C%20id%20tincidunt%20nibh%20faucibus%20vel.%20Suspendisse%20eu%20maximus%20quam.%20Aliquam%20pulvinar%20lacinia%20odio.%20%22%7D%2C%7B%22number%22%3A%2203.%20%22%2C%22title%22%3A%22Shooting%20%26%20Retush%22%2C%22text%22%3A%22Donec%20libero%20ex%2C%20tincidunt%20sed%20risus%20in%2C%20ornare%20consectetur%20turpis.%20Mauris%20magna%20tellus%2C%20auctor%20ut%20ligula%20vel%2C%20varius%20congue%20magna.%20%22%7D%5D" image="3515"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Services
//  Services list
	$data = array();
	$data['name'] = esc_html__( 'Services list', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/services/services-list.jpg' );
	$data['sort_name'] = 'Services';
	$data['custom_class'] = 'general services';
	$data['content'] = <<<CONTENT
[vc_row][vc_column][wiso_services_list cats="art" desc_column="4" count="6"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Skills
//  Skills
	$data = array();
	$data['name'] = esc_html__( 'Skills', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/skills/skills.jpg' );
	$data['sort_name'] = 'Skills';
	$data['custom_class'] = 'general skills';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" desctop_lg_pt="padding-lg-120t" desctop_lg_pb="padding-lg-120b" desctop_pt="padding-md-100t" desctop_pb="padding-md-100b" tablets_pt="padding-sm-70t" tablets_pb="padding-sm-70b" mobile_pt="padding-xs-40t" mobile_pb="padding-xs-50b" css=".vc_custom_1526999076124{background-color: #fcf9f6 !important;}"][vc_column css=".vc_custom_1525879022987{padding-top: 0px !important;}"][wiso_skills linear_skills="%5B%7B%22title%22%3A%22Photoshop%22%2C%22number%22%3A%2290%22%2C%22line_color%22%3A%22%23222222%22%7D%2C%7B%22title%22%3A%22Lightroom%22%2C%22number%22%3A%2292%22%2C%22line_color%22%3A%22%23222222%22%7D%2C%7B%22title%22%3A%22illustration%22%2C%22number%22%3A%2290%22%2C%22line_color%22%3A%22%23222222%22%7D%5D" title="Culture science" text="We are fine-art, wedding &amp; portrait film photographers from Oregon, with a special love for natural light, medium format film cameras &amp; redheads with freckles. With over 5 years of experience, numerous workshops and features in top wedding publications, I capture beauty in the most subtle."][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Teams
//  Team (Slider modern)
	$data = array();
	$data['name'] = esc_html__( 'Team (Slider modern)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/teams/slider-modern.jpg' );
	$data['sort_name'] = 'Teams';
	$data['custom_class'] = 'general teams';
	$data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-90t" desctop_mb="margin-lg-75b" desctop_md_mt="margin-md-80t" desctop_md_mb="margin-md-65b" tablets_mt="margin-sm-60t" tablets_mb="margin-sm-45b" mobile_mt="margin-xs-40t" mobile_mb="margin-xs-35b"][vc_column css=".vc_custom_1526999097754{padding-top: 0px !important;}"][wiso_headings style="text_button_modern" text_align="text-center" title="Amazing team"][/vc_column][/vc_row][vc_row][vc_column][wiso_team team_style="slider_modern" autoplay="5" loop="true" team_members="%5B%7B%22image_id%22%3A%223356%22%2C%22name%22%3A%22frankie%20kao%22%2C%22position%22%3A%22Creative%20Director%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%253Flang%253Den%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-dribbble%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fdribbble.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223358%22%2C%22name%22%3A%22selena%20gomez%22%2C%22position%22%3A%22Designer%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%253Flang%253Den%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-dribbble%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fdribbble.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223350%22%2C%22name%22%3A%22jessica%20jung%22%2C%22position%22%3A%22Creative%20Director%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%253Flang%253Den%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-dribbble%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fdribbble.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223362%22%2C%22name%22%3A%22justin%20biber%22%2C%22position%22%3A%22Accounter%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%253Flang%253Den%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-dribbble%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fdribbble.com%252F%2522%257D%255D%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Teams
//  Team (Slider modern)
	$data = array();
	$data['name'] = esc_html__( 'Team (Slider modern)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/teams/slider-modern.jpg' );
	$data['sort_name'] = 'Teams';
	$data['custom_class'] = 'general teams';
	$data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-90t" desctop_mb="margin-lg-75b" desctop_md_mt="margin-md-80t" desctop_md_mb="margin-md-65b" tablets_mt="margin-sm-60t" tablets_mb="margin-sm-45b" mobile_mt="margin-xs-40t" mobile_mb="margin-xs-35b"][vc_column css=".vc_custom_1526999097754{padding-top: 0px !important;}"][wiso_headings style="text_button_modern" text_align="text-center" title="Amazing team"][/vc_column][/vc_row][vc_row][vc_column][wiso_team team_style="slider_modern" autoplay="5" loop="true" team_members="%5B%7B%22image_id%22%3A%223356%22%2C%22name%22%3A%22frankie%20kao%22%2C%22position%22%3A%22Creative%20Director%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%253Flang%253Den%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-dribbble%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fdribbble.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223358%22%2C%22name%22%3A%22selena%20gomez%22%2C%22position%22%3A%22Designer%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%253Flang%253Den%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-dribbble%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fdribbble.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223350%22%2C%22name%22%3A%22jessica%20jung%22%2C%22position%22%3A%22Creative%20Director%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%253Flang%253Den%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-dribbble%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fdribbble.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223362%22%2C%22name%22%3A%22justin%20biber%22%2C%22position%22%3A%22Accounter%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%253Flang%253Den%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-dribbble%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fdribbble.com%252F%2522%257D%255D%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Teams
//  Team (Inline)
	$data = array();
	$data['name'] = esc_html__( 'Team (Inline)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/teams/inline.jpg' );
	$data['sort_name'] = 'Teams';
	$data['custom_class'] = 'general teams';
	$data['content'] = <<<CONTENT
[vc_row desctop_lg_pt="padding-lg-140t" desctop_lg_pb="padding-lg-100b" desctop_pt="padding-md-100t" desctop_pb="padding-md-80b" tablets_pt="padding-sm-75t" tablets_pb="padding-sm-65b" mobile_pt="padding-xs-55t" mobile_pb="padding-xs-35b"][vc_column][wiso_headings style="text_center" title="WE PRESENT OUR TEAM" subtitle="our team"][/vc_column][/vc_row][vc_row desctop_lg_pb="padding-lg-120b" desctop_pb="padding-md-85b" mobile_pb="padding-xs-45b"][vc_column][wiso_team col_numb="col-3 col-xs-12 col-sm-6 col-md-4" team_members="%5B%7B%22image_id%22%3A%223358%22%2C%22name%22%3A%22Abigel%20Chiunda%22%2C%22position%22%3A%22Kinfio%2C%20designer%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%224463%22%2C%22name%22%3A%22Alisa%20Roso%22%2C%22position%22%3A%22Droby%2C%20photographer%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223356%22%2C%22name%22%3A%22Blanche%20Fields%22%2C%22position%22%3A%22Google%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223350%22%2C%22name%22%3A%22Martina%20Ross%22%2C%22position%22%3A%22Nettix%2C%20CEO%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223362%22%2C%22name%22%3A%22David%20Copiled%22%2C%22position%22%3A%22Pixel%2C%20Designer%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%224464%22%2C%22name%22%3A%22Dorroty%20Kao%22%2C%22position%22%3A%22Finik%2C%20manages%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook-square%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%5D" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact-us%2F|title:Contact%20Us|target:%20_blank|"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Teams
//  Team (Chess Tile)
	$data = array();
	$data['name'] = esc_html__( 'Team (Chess Tile)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/teams/chess-tile.jpg' );
	$data['sort_name'] = 'Teams';
	$data['custom_class'] = 'general teams';
	$data['content'] = <<<CONTENT
[vc_row desctop_mt="margin-lg-105t" desctop_mb="margin-lg-120b" desctop_md_mt="margin-md-70t" desctop_md_mb="margin-md-90b" tablets_mt="margin-sm-60t" tablets_mb="margin-sm-70b" mobile_mt="margin-xs-30t" mobile_mb="margin-xs-50b"][vc_column css=".vc_custom_1525961139882{padding-top: 0px !important;}"][wiso_headings style="simple" title="MEET THE TEAM" subtitle="We are fine-art, wedding &amp; portrait film photographers from Oregon"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" desctop_mt="margin-lg-25t" desctop_mb="margin-lg-120b" desctop_md_mb="margin-md-90b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-50b"][vc_column][wiso_team team_style="chess_tile" team_members="%5B%7B%22image_id%22%3A%223350%22%2C%22name%22%3A%22Alisa%20Torky%22%2C%22position%22%3A%22Photographer%22%2C%22text%22%3A%22Lorem%20ipsum%20dolor%20sit%20amet%2C%20consectetur%20adipiscing%20elit.%20Duis%20volutpat%20ipsum%20odio%2C%20nec%20pulvinar%20erat%20efficitur%20ac.%20Vivamus%20aliquam%20sed%20risus%20sed%20aliquet.%20%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223356%22%2C%22name%22%3A%22Mark%20Rifer%22%2C%22position%22%3A%22Assistant%22%2C%22text%22%3A%22In%20volutpat%20posuere%20feugiat.%20Etiam%20condimentum%20quam%20nec%20velit%20tincidunt%20sollicitudin%20nec%20at%20dui.%20Pellentesque%20ac%20tristique%20enim.%20%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223358%22%2C%22name%22%3A%22Melisa%20Gride%22%2C%22position%22%3A%22Manager%22%2C%22text%22%3A%22Class%20aptent%20taciti%20sociosqu%20ad%20litora%20torquent%20per%20conubia%20nostra%2C%20per%20inceptos%20himenaeos.%20Donec%20at%20fringilla%20mauris.%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%2C%7B%22image_id%22%3A%223362%22%2C%22name%22%3A%22Oliver%20Naory%22%2C%22position%22%3A%22Stylist%22%2C%22text%22%3A%22Mauris%20imperdiet%20tempor%20ex%20quis%20consectetur.%20Morbi%20rhoncus%20velit%20non%20orci%20viverra%2C%20ac%20sollicitudin%20orci%20pellentesque.%20%22%2C%22socials%22%3A%22%255B%257B%2522icon%2522%253A%2522fa%2520fa-facebook%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.facebook.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-twitter%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Ftwitter.com%252F%2522%257D%252C%257B%2522icon%2522%253A%2522fa%2520fa-instagram%2522%252C%2522social_url%2522%253A%2522https%253A%252F%252Fwww.instagram.com%252F%2522%257D%255D%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Testimonials
//  Testimonials
	$data = array();
	$data['name'] = esc_html__( 'Testimonials', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/testimonials/testimonial.jpg' );
	$data['sort_name'] = 'Testimonial';
	$data['custom_class'] = 'general testimonial';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" enable_ovarlay="true" desctop_mt="margin-lg-120t" desctop_md_mt="margin-md-100t" tablets_mt="margin-sm-80t" mobile_mt="margin-xs-50t" css=".vc_custom_1526999261506{background-image: url(http://w4.foxthemes.me/wiso/wp-content/uploads/2018/04/heather-miller-330204.jpg?id=3057) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column css=".vc_custom_1526999427237{padding-top: 0px !important;}"][wiso_testimonial autoplay="5" loop="true" color="#ffffff"][wiso_testimonial_items author="Justin Gorgio" position="Manager, Iva Studio" logo_image="3356"]“ Sed nunc massa, pellentesque imperdiet leo ac, viverra gravida purus. Morbi vel aliquam dolor. Suspendisse scelerisque egestas vulputate pellentesque imperdiet“[/wiso_testimonial_items][wiso_testimonial_items author="Anna Brondo" position="Photographer, Frandin" logo_image="3358"]“ Aliquam pellentesque, nibh fermentum imperdiet ornare, tellus arcu aliquet ipsum, a fermentum elit tortor sed nisi fermentum imperdiet“[/wiso_testimonial_items][wiso_testimonial_items author="Rick Surento" position="Accounter, Hordioni" logo_image="3362"]“ Ut hendrerit tellus nec diam pretium, vel dapibus leo sagittis. Aenean ultricies posuere augue, a tempus sapien lobortis vel diam pretium“[/wiso_testimonial_items][/wiso_testimonial][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Banner
//  Banner (Video banner)
	$data = array();
	$data['name'] = esc_html__( 'Banner (Video banner)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/banner/video-banner.jpg' );
	$data['sort_name'] = 'Banner';
	$data['custom_class'] = 'general banner';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][video_banner video_link="https://www.youtube.com/watch?v=wN8_eb3l0mw" title="Amazing story" autoplay="on" start="10" preview="3514"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Button
//  Button (Video button)
	$data = array();
	$data['name'] = esc_html__( 'Button (Video button)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/buttons/video-button.jpg' );
	$data['sort_name'] = 'Button';
	$data['custom_class'] = 'general buttons';
	$data['content'] = <<<CONTENT
[vc_row desctop_lg_pb="padding-lg-120b" desctop_pb="padding-md-90b" mobile_pb="padding-xs-45b"][vc_column][video_button_shortcode video_link="https://www.youtube.com/watch?time_continue=2&amp;v=YMurlapfouo"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Services
//  Services (Tile)
	$data = array();
	$data['name'] = esc_html__( 'Services (Tile)', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/services/tile.jpg' );
	$data['sort_name'] = 'Services';
	$data['custom_class'] = 'general services';
	$data['content'] = <<<CONTENT
[vc_row desctop_mb="margin-lg-130b" desctop_md_mb="margin-md-100b" tablets_mb="margin-sm-70b" mobile_mb="margin-xs-50b"][vc_column][wiso_services items_tile="%5B%7B%22icon%22%3A%22icon-sun%22%2C%22title%22%3A%22Natural%20Photos%22%2C%22subtitle%22%3A%22Phasellus%20faucibus%20venenatis%20dolor.%20%22%2C%22text%22%3A%22Phasellus%20faucibus%20venenatis%20dolor.%20In%20elit%20ligula%2C%20maximus%20vel%20tincidunt%20ut%2C%20rhoncus%20et%20turpis%20Phasellus%20faucibus%20venenatis%20dolor.%20%22%2C%22image%22%3A%223040%22%7D%2C%7B%22icon%22%3A%22icon-diamond-ring%22%2C%22title%22%3A%22Wedding%20Photos%22%2C%22subtitle%22%3A%22Phasellus%20faucibus%20venenatis%20dolor.%20%22%2C%22text%22%3A%22Phasellus%20faucibus%20venenatis%20dolor.%20In%20elit%20ligula%2C%20maximus%20vel%20tincidunt%20ut%2C%20rhoncus%20et%20turpis%20Phasellus%20faucibus%20venenatis%20dolor.%20%22%2C%22image%22%3A%223054%22%7D%2C%7B%22icon%22%3A%22icon-planet%22%2C%22title%22%3A%22Travel%20Photos%22%2C%22subtitle%22%3A%22Phasellus%20faucibus%20venenatis%20dolor.%20%22%2C%22text%22%3A%22Phasellus%20faucibus%20venenatis%20dolor.%20In%20elit%20ligula%2C%20maximus%20vel%20tincidunt%20ut%2C%20rhoncus%20et%20turpis%20Phasellus%20faucibus%20venenatis%20dolor.%20%22%2C%22image%22%3A%223062%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;




	//Category Pricing
//  Pricing
	$data = array();
	$data['name'] = esc_html__( 'Pricing', 'wiso' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  EF_URL . '/admin/assets/images/wiso_templates/pricing/pricing.jpg' );
	$data['sort_name'] = 'Pricing';
	$data['custom_class'] = 'general pricing';
	$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" full_height="yes" equal_height="yes" content_placement="middle" video_bg="yes" video_bg_url="https://www.youtube.com/watch?v=xaRbgmOvnqI" enable_ovarlay="true" desctop_lg_pt="padding-lg-65t" desctop_lg_pb="padding-lg-100b" tablets_pt="padding-sm-25t" tablets_pb="padding-sm-60b" css=".vc_custom_1527008037318{background-image: url(http://w4.foxthemes.me/wiso/wp-content/uploads/2018/05/annie-spratt-133932-unsplash.jpg?id=4296) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/2" desctop_mt="margin-lg-30t" desctop_mb="margin-lg-30b" desctop_md_mb="margin-md-15b" tablets_mt="margin-sm-30t" mobile_mt="margin-xs-15t" mobile_mb="margin-xs-0b" offset="vc_col-lg-4 vc_col-md-6"][vc_pricing title="INDIVIDUAL" subtitle="STARTING FROM $70" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact-us%2F|title:ORDER%20PLAN||"]
<ul>
    <li>1 hours on location</li>
    <li>2 outfit changes</li>
    <li>20 images</li>
    <li>Lo-res images for web</li>
    <li>Hi-res images on CD</li>
</ul>
[/vc_pricing][/vc_column][vc_column width="1/2" desctop_mt="margin-lg-30t" desctop_mb="margin-lg-30b" desctop_md_mt="margin-md-15t" desctop_md_mb="margin-md-15b" tablets_mt="margin-sm-30t" mobile_mt="margin-xs-10t" mobile_mb="margin-xs-10b" offset="vc_col-lg-4 vc_col-md-6"][vc_pricing title="CORPORATE" subtitle="STARTING FROM $200" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact-us%2F|title:ORDER%20PLAN||"]
<ul>
    <li>4 hours on location</li>
    <li>2 photographers</li>
    <li>80 images</li>
    <li>Lo-res images for web</li>
    <li>Hi-res images on CD</li>
</ul>
[/vc_pricing][/vc_column][vc_column width="1/2" desctop_mt="margin-lg-30t" desctop_mb="margin-lg-30b" desctop_md_mt="margin-md-15t" desctop_md_mb="margin-md-30b" mobile_mt="margin-xs-0t" mobile_mb="margin-xs-15b" offset="vc_col-lg-offset-0 vc_col-lg-4 vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-3"][vc_pricing title="WEDDING" subtitle="STARTING FROM $500" button="url:http%3A%2F%2Fw4.foxthemes.me%2Fwiso%2Fcontact-us%2F|title:ORDER%20PLAN||"]
<ul>
    <li>all day on location</li>
    <li>3 photographers</li>
    <li>200 images</li>
    <li>Hi-res images for web</li>
    <li>Hi-res images on CD</li>
</ul>
[/vc_pricing][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;


	return $templates;
}

function wiso_add_default_templates() {
	$templates = wiso_vc_templates();
	return array_map( 'vc_add_default_templates', $templates );
}
wiso_add_default_templates();
