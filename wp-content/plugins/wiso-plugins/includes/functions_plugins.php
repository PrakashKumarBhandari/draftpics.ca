<?php 
/*
**
** Functions for Wiso Plugins
**
*/
 

if (!function_exists('wiso_get_twitts')) {
	function wiso_get_twitts( $user, $followers = false, $count_twitts = 3, $style = '' ) {
	    

	    $settings = array(
	        'oauth_access_token' => '701500526060560384-77sHD0m3MkfV6rIXHOUji6g3nsHHVyV',
	        'oauth_access_token_secret' => 'uIrQEnal1ZzJxdLgbTOyhhz8ssHqAAZDHcJGqY22n9L07',
	        'consumer_key' => 'Ci7s7QCVRWJzwG8tZlAgoeUSu',
	        'consumer_secret' => 'ov3ikpwwoihQCK1Ib0Q29SpqYyp8OxnvA4dXdysxwtwFWgET6h'
	    );

	    if ($followers) {
	         $url = 'https://api.twitter.com/1.1/users/show.json?';
	         $requestMethod = 'GET';
	         $getfield = '?user_id='. $user .'&amp;screen_name='. $user .'';
	         $twitter = new TwitterAPIExchange($settings);
	         
	         $data = $twitter->setGetfield($getfield)
	             ->buildOauth($url, $requestMethod)
	             ->performRequest();

	        return $data;
	    } else {
	        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	        $requestMethod = 'GET';
	        $getfield = '?screen_name='. $user .'&count='. $count_twitts .'&exclude_replies=true&skip_status=1';
	        $twitter = new TwitterAPIExchange($settings);
	        
	        $data = $twitter->setGetfield($getfield)
	            ->buildOauth($url, $requestMethod)
	            ->performRequest();

	        $twitts = json_decode( $data );
	        if( ! empty( $twitts ) && is_array( $twitts ) ) {

	            return $twitts;
	        }
	    }


	    return array();
	}
}


/**
 *
 * Instagram Widget
 *
 */
if( ! class_exists( 'WisoInstagramWidget' ) ) {
  class WisoInstagramWidget extends WP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'WisoInstagramWidget',
        'description' => 'Instagram Widget.'
      );

      parent::__construct( 'instagram_widget', 'Wiso Instagram widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      $instagram_images = wiso_get_imstagram(  $instance['insta_username'], $instance['insta_count'] ); ?>
      <div class="quze-widget-user quze-widget-border-bottom">
            <?php if(isset($instance['insta_title']) && !empty($instance['insta_title'])){ ?>
                <h3 class="insta-title"><?php echo esc_html( $instance['insta_title'] ); ?></h3>
            <?php }?>

            <div class="images-wrap clearfix">
                <?php if ( ! empty( $instagram_images ) && !empty( $instagram_images['items'])) {
                    foreach ( $instagram_images['items'] as $image ) { ?>
                        <a href="<?php echo esc_url( $image['link'] ); ?>" target="_blank" class="insta-images"><img src="<?php echo esc_url( $image['image-url'] ); ?>" class="s-img-switch img" alt=""></a>
                    <?php }
                } ?>
            </div>
			<?php if (!empty($instance['insta_username'])): ?>
			<div class="instagram-text">
                <a href="https://www.instagram.com/<?php echo esc_attr($instance['insta_username'] ); ?>">@<?php echo esc_html( $instance['insta_username'] ); ?></a>
            </div>
			<?php endif ?>

      </div>
      <?php

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance = array();
      $instance['insta_username']   = $new_instance['insta_username'];
      $instance['insta_count']    = $new_instance['insta_count'];
      $instance['insta_title'] = $new_instance['insta_title'];

      return $instance;

    }

    function form( $instance ) {

      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, array(
        'insta_username' => '',
        'insta_count' => '',
        'insta_title' => '',
      ));


      //
      // textarea field example
      // -------------------------------------------------
      $textarea_value = esc_attr( $instance['insta_title'] );
      $textarea_field = array(
        'id'    => $this->get_field_name('insta_title'),
        'name'  => $this->get_field_name('insta_title'),
        'type'  => 'text',
        'title' => 'Title',
      );

      echo cs_add_element( $textarea_field, $textarea_value );


      //
      // text field example
      // -------------------------------------------------
      $text_value = esc_attr( $instance['insta_username'] );
      $text_field = array(
        'id'    => $this->get_field_name('insta_username'),
        'name'  => $this->get_field_name('insta_username'),
        'type'  => 'text',
        'title' => 'Username instagram',
      );

      echo cs_add_element( $text_field, $text_value );

      //
      // image field example
      // -------------------------------------------------
      $upload_value = esc_attr( $instance['insta_count'] );
      $upload_field = array(
        'id'    => $this->get_field_name('insta_count'),
        'name'  => $this->get_field_name('insta_count'),
        'type'  => 'text',
        'title' => 'Count images',
      );

      echo cs_add_element( $upload_field, $upload_value );
    }
  }
}


/**
 *
 * Social Link Widget
 *
 */
if( ! class_exists( 'SocialLinkWidget' ) ) {
	class SocialLinkWidget extends WP_Widget {

		function __construct() {

			$widget_ops     = array(
				'classname'   => 'SocialLinkWidget',
				'description' => 'Footer Contact Widget.'
			);

			parent::__construct( 'wiso_socials_link_widget', 'Wiso Social Link widget', $widget_ops );

		}

		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget; ?>
            <div class="wiso-widget-social-link">
	            <?php if (!empty($instance['contact_title'])): ?>
                    <h3 class="wiso-widget-social-title"><?php echo esc_html( $instance['contact_title'] ); ?></h3>
	            <?php endif ?>

	            <?php if (!empty($instance['contact_facebook'])): ?>
                    <a href="<?php echo esc_url( $instance['contact_facebook'] ); ?>" class="fa fa-facebook"></a>
	            <?php endif ?>

				<?php if (!empty($instance['contact_twitter'])): ?>
                    <a href="<?php echo esc_url( $instance['contact_twitter'] ); ?>" class="fa fa-twitter"></a>
				<?php endif ?>

				<?php if (!empty($instance['contact_instagram'])): ?>
                    <a href="<?php echo esc_url( $instance['contact_instagram'] ); ?>" class="fa fa-instagram"></a>
				<?php endif ?>

				<?php if (!empty($instance['contact_google_plus'])): ?>
                    <a href="<?php echo esc_url( $instance['contact_google_plus'] ); ?>" class="fa fa-google-plus"></a>
				<?php endif ?>

				<?php if (!empty($instance['contact_behance'])): ?>
                    <a href="<?php echo esc_url( $instance['contact_behance'] ); ?>" class="fa fa-behance"></a>
				<?php endif ?>

				<?php if (!empty($instance['contact_linkedin'])): ?>
                    <a href="<?php echo esc_url( $instance['contact_linkedin'] ); ?>" class="fa fa-linkedin"></a>
				<?php endif ?>

				<?php if (!empty($instance['contact_dribbble'])): ?>
                    <a href="<?php echo esc_url( $instance['contact_dribbble'] ); ?>" class="fa fa-dribbble"></a>
				<?php endif ?>

	            <?php if (!empty($instance['contact_pinterest'])): ?>
                    <a href="<?php echo esc_url( $instance['contact_pinterest'] ); ?>" class="fa fa-pinterest"></a>
	            <?php endif ?>

            </div>
			<?php

			echo $after_widget;

		}

		function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['contact_title']    = $new_instance['contact_title'];
			$instance['contact_twitter']    = $new_instance['contact_twitter'];
			$instance['contact_facebook']    = $new_instance['contact_facebook'];
			$instance['contact_instagram']    = $new_instance['contact_instagram'];
			$instance['contact_google_plus']    = $new_instance['contact_google_plus'];
			$instance['contact_behance']    = $new_instance['contact_behance'];
			$instance['contact_linkedin']    = $new_instance['contact_linkedin'];
			$instance['contact_dribbble']    = $new_instance['contact_dribbble'];
			$instance['contact_pinterest']    = $new_instance['contact_pinterest'];

			return $instance;

		}

		function form( $instance ) {

			$upload_value = !empty($instance['contact_title']) ? esc_attr( $instance['contact_title'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_title'),
				'name'  => $this->get_field_name('contact_title'),
				'type'  => 'text',
				'title' => 'Title',
			);
			echo cs_add_element( $upload_field, $upload_value );


			$upload_value = !empty($instance['contact_twitter']) ? esc_attr( $instance['contact_twitter'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_twitter'),
				'name'  => $this->get_field_name('contact_twitter'),
				'type'  => 'text',
				'title' => 'Twitter URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['contact_facebook']) ? esc_attr( $instance['contact_facebook'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_facebook'),
				'name'  => $this->get_field_name('contact_facebook'),
				'type'  => 'text',
				'title' => 'Facebook URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['contact_instagram']) ? esc_attr( $instance['contact_instagram'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_instagram'),
				'name'  => $this->get_field_name('contact_instagram'),
				'type'  => 'text',
				'title' => 'Instagram URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['contact_google_plus']) ? esc_attr( $instance['contact_google_plus'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_google_plus'),
				'name'  => $this->get_field_name('contact_google_plus'),
				'type'  => 'text',
				'title' => 'Google Plus URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['contact_behance']) ? esc_attr( $instance['contact_behance'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_behance'),
				'name'  => $this->get_field_name('contact_behance'),
				'type'  => 'text',
				'title' => 'Behance URL',
			);
			echo cs_add_element( $upload_field, $upload_value );


			$upload_value = !empty($instance['contact_linkedin']) ? esc_attr( $instance['contact_linkedin'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_linkedin'),
				'name'  => $this->get_field_name('contact_linkedin'),
				'type'  => 'text',
				'title' => 'Linkedin URL',
			);
			echo cs_add_element( $upload_field, $upload_value );


			$upload_value = !empty($instance['contact_dribbble']) ? esc_attr( $instance['contact_dribbble'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_dribbble'),
				'name'  => $this->get_field_name('contact_dribbble'),
				'type'  => 'text',
				'title' => 'Dribbble URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['contact_pinterest']) ? esc_attr( $instance['contact_pinterest'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('contact_pinterest'),
				'name'  => $this->get_field_name('contact_pinterest'),
				'type'  => 'text',
				'title' => 'Pinterest URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

		}
	}
}


/**
 *
 * About Widget
 *
 */
if( ! class_exists( 'AboutWidget' ) ) {
	class AboutWidget extends WP_Widget {

		function __construct() {

			$widget_ops     = array(
				'classname'   => 'AboutWidget',
				'description' => 'About Widget.'
			);

			parent::__construct( 'wiso_about_widget', 'Wiso About widget', $widget_ops );

		}

		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			?>
            <div class="wiso-widget-about">

	            <?php if (!empty($instance['about_img'])): ?>
              <div class="img-wrap">
                    <img src="<?php echo esc_url( $instance['about_img'] ); ?>" alt="" >
              </div>
	            <?php endif ?>

				<?php if (!empty($instance['about_title'])): ?>
                    <h5 class="about_content"><?php echo esc_html( $instance['about_title'] ); ?></h5>
				<?php endif ?>

				<?php if (!empty($instance['about_content'])): ?>
                    <div class="about_content text"><?php echo esc_html( $instance['about_content'] ); ?></div>
				<?php endif ?>

            </div>
			<?php

			echo $after_widget;

		}

		function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['about_img']    = $new_instance['about_img'];
			$instance['about_title'] = $new_instance['about_title'];
			$instance['about_content']   = $new_instance['about_content'];

			return $instance;

		}

		function form( $instance ) {

			//
			// set defaults
			// -------------------------------------------------
			$instance   = wp_parse_args( $instance, array(
				'about_img' => '',
				'about_title' => '',
				'about_content' => '',
			));

			//
			// image field example
			// -------------------------------------------------
			$upload_value = !empty($instance['about_img']) ? esc_attr( $instance['about_img'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('about_img'),
				'name'  => $this->get_field_name('about_img'),
				'type'  => 'upload',
				'title' => 'Image',
			);

			echo cs_add_element( $upload_field, $upload_value );

			//
			// textarea field example
			// -------------------------------------------------
			$textarea_value = !empty($instance['about_title']) ? esc_attr( $instance['about_title'] ) : '';
			$textarea_field = array(
				'id'    => $this->get_field_name('about_title'),
				'name'  => $this->get_field_name('about_title'),
				'type'  => 'text',
				'title' => 'Title',
				'info'  => 'Some description for this field',
			);

			echo cs_add_element( $textarea_field, $textarea_value );


			//
			// text field example
			// -------------------------------------------------
			$text_value = !empty($instance['about_content']) ? esc_attr( $instance['about_content'] ) : '';
			$text_field = array(
				'id'    => $this->get_field_name('about_content'),
				'name'  => $this->get_field_name('about_content'),
				'type'  => 'textarea',
				'title' => 'Content',
			);

			echo cs_add_element( $text_field, $text_value );

		}
	}
}



/**
 *
 * Copyright Widget
 *
 */
if( ! class_exists( 'CopyrightWidget' ) ) {
	class CopyrightWidget extends WP_Widget {

		function __construct() {

			$widget_ops     = array(
				'classname'   => 'CopyrightWidget',
				'description' => 'Copyright Widget.'
			);

			parent::__construct( 'wiso_copyright_widget', 'Wiso Copyright widget', $widget_ops );

		}

		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			?>
            <div class="wiso-widget-copyright">

				<?php if (!empty($instance['widget_logo'])): ?>
                    <div class="img-wrap">
                        <img src="<?php echo esc_url( $instance['widget_logo'] ); ?>" alt="" >
                    </div>
                <?php endif;

                if ($instance['copyright_targetLink'] == 0) {
                    $target = "_blank";
                } else if ($instance['copyright_targetLink'] == 1) {
                    $target = "_self";
                }

                $socials = (!empty($instance['copyright_facebook']) || !empty($instance['copyright_twitter']) ||
                            !empty($instance['copyright_instagram']) || !empty($instance['copyright_google_plus']) ||
                            !empty($instance['copyright_behance']) || !empty($instance['copyright_linkedin']) ||
                            !empty($instance['copyright_dribbble']) || !empty($instance['copyright_pinterest'])) ? true : false ;

                if($socials){ ?>
                    <div class="socials">
		                <?php if (!empty($instance['copyright_facebook'])): ?>
                            <a href="<?php echo esc_url( $instance['copyright_facebook'] ); ?>" target="<?php echo $target?>" class="fa fa-facebook"></a>
		                <?php endif ?>

		                <?php if (!empty($instance['copyright_twitter'])): ?>
                            <a href="<?php echo esc_url( $instance['copyright_twitter'] ); ?>" target="<?php echo $target?>" class="fa fa-twitter"></a>
		                <?php endif ?>

		                <?php if (!empty($instance['copyright_instagram'])): ?>
                            <a href="<?php echo esc_url( $instance['copyright_instagram'] ); ?>" target="<?php echo $target?>" class="fa fa-instagram"></a>
		                <?php endif ?>

		                <?php if (!empty($instance['copyright_google_plus'])): ?>
                            <a href="<?php echo esc_url( $instance['copyright_google_plus'] ); ?>" target="<?php echo $target?>" class="fa fa-google-plus"></a>
		                <?php endif ?>

		                <?php if (!empty($instance['copyright_behance'])): ?>
                            <a href="<?php echo esc_url( $instance['copyright_behance'] ); ?>" target="<?php echo $target?>" class="fa fa-behance"></a>
		                <?php endif ?>

		                <?php if (!empty($instance['copyright_linkedin'])): ?>
                            <a href="<?php echo esc_url( $instance['copyright_linkedin'] ); ?>" target="<?php echo $target?>" class="fa fa-linkedin"></a>
		                <?php endif ?>

		                <?php if (!empty($instance['copyright_dribbble'])): ?>
                            <a href="<?php echo esc_url( $instance['copyright_dribbble'] ); ?>" target="<?php echo $target?>" class="fa fa-linkedin"></a>
		                <?php endif ?>

		                <?php if (!empty($instance['copyright_pinterest'])): ?>
                            <a href="<?php echo esc_url( $instance['copyright_pinterest'] ); ?>" target="<?php echo $target?>" class="fa fa-pinterest"></a>
		                <?php endif ?>
                    </div>
                <?php } ?>

				<?php if (!empty($instance['copy_content'])): ?>
                    <div class="copy_content text"><?php echo esc_html( $instance['copy_content'] ); ?></div>
				<?php endif ?>

            </div>
			<?php

			echo $after_widget;

		}

		function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['widget_logo']    = $new_instance['widget_logo'];
			$instance['copy_content']   = $new_instance['copy_content'];
			$instance['copyright_twitter']    = $new_instance['copyright_twitter'];
			$instance['copyright_facebook']    = $new_instance['copyright_facebook'];
			$instance['copyright_instagram']    = $new_instance['copyright_instagram'];
			$instance['copyright_google_plus']    = $new_instance['copyright_google_plus'];
			$instance['copyright_behance']    = $new_instance['copyright_behance'];
			$instance['copyright_linkedin']    = $new_instance['copyright_linkedin'];
			$instance['copyright_dribbble']    = $new_instance['copyright_dribbble'];
            $instance['copyright_pinterest']    = $new_instance['copyright_pinterest'];
            $instance['copyright_targetLink']    = $new_instance['copyright_targetLink'];

			return $instance;

		}

		function form( $instance ) {

			//
			// set defaults
			// -------------------------------------------------
			$instance   = wp_parse_args( $instance, array(
				'widget_logo' => '',
				'copy_content' => '',
				'copyright_twitter' => '',
				'copyright_facebook' => '',
				'copyright_instagram' => '',
				'copyright_google_plus' => '',
				'copyright_behance' => '',
				'copyright_linkedin' => '',
				'copyright_dribbble' => '',
                'copyright_pinterest' => '',
                'copyright_targetLink' => '',
			));

			//
			// image field example
			// -------------------------------------------------
			$upload_value = !empty($instance['widget_logo']) ? esc_attr( $instance['widget_logo'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('widget_logo'),
				'name'  => $this->get_field_name('widget_logo'),
				'type'  => 'upload',
				'title' => 'Logo',
			);

			echo cs_add_element( $upload_field, $upload_value );

			//
			// text field example
			// -------------------------------------------------
			$text_value = !empty($instance['copy_content']) ? esc_attr( $instance['copy_content'] ) : '';
			$text_field = array(
				'id'    => $this->get_field_name('copy_content'),
				'name'  => $this->get_field_name('copy_content'),
				'type'  => 'textarea',
				'title' => 'Text',
			);

			echo cs_add_element( $text_field, $text_value );


			$upload_value = !empty($instance['copyright_twitter']) ? esc_attr( $instance['copyright_twitter'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('copyright_twitter'),
				'name'  => $this->get_field_name('copyright_twitter'),
				'type'  => 'text',
				'title' => 'Twitter URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['copyright_facebook']) ? esc_attr( $instance['copyright_facebook'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('copyright_facebook'),
				'name'  => $this->get_field_name('copyright_facebook'),
				'type'  => 'text',
				'title' => 'Facebook URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['copyright_instagram']) ? esc_attr( $instance['copyright_instagram'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('copyright_instagram'),
				'name'  => $this->get_field_name('copyright_instagram'),
				'type'  => 'text',
				'title' => 'Instagram URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['copyright_google_plus']) ? esc_attr( $instance['copyright_google_plus'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('copyright_google_plus'),
				'name'  => $this->get_field_name('copyright_google_plus'),
				'type'  => 'text',
				'title' => 'Google Plus URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

			$upload_value = !empty($instance['copyright_behance']) ? esc_attr( $instance['copyright_behance'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('copyright_behance'),
				'name'  => $this->get_field_name('copyright_behance'),
				'type'  => 'text',
				'title' => 'Behance URL',
			);
			echo cs_add_element( $upload_field, $upload_value );


			$upload_value = !empty($instance['copyright_linkedin']) ? esc_attr( $instance['copyright_linkedin'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('copyright_linkedin'),
				'name'  => $this->get_field_name('copyright_linkedin'),
				'type'  => 'text',
				'title' => 'Linkedin URL',
			);
			echo cs_add_element( $upload_field, $upload_value );


			$upload_value = !empty($instance['copyright_dribbble']) ? esc_attr( $instance['copyright_dribbble'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('copyright_dribbble'),
				'name'  => $this->get_field_name('copyright_dribbble'),
				'type'  => 'text',
				'title' => 'Dribbble URL',
			);
			echo cs_add_element( $upload_field, $upload_value );

            $upload_value = !empty($instance['copyright_targetLink']) ? esc_attr($instance['copyright_targetLink']) : '';
            $upload_field = array(
                'id'    => $this->get_field_name('copyright_targetLink'),
                'name'  => $this->get_field_name('copyright_targetLink'),
                'type'  => 'checkbox',
                'title' => 'Open links in the same page?',
            );
            echo cs_add_element($upload_field, $upload_value);

		}
	}
}



/**
 *
 * Subscribe Widget
 *
 */
if( ! class_exists( 'SubscribeWidget' ) ) {
	class SubscribeWidget extends WP_Widget {

		function __construct() {

			$widget_ops     = array(
				'classname'   => 'SubscribeWidget',
				'description' => 'Subscribe Widget.'
			);

			parent::__construct( 'wiso_subscribe_widget', 'Wiso Subscribe widget', $widget_ops );

		}

		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			?>
            <div class="wiso-widget-subscribe">

				<?php if (!empty($instance['subscribe_title'])): ?>
                    <h3 class="wiso-widget-subscribe">
                        <?php echo esc_html( $instance['subscribe_title'] ); ?>
                    </h3>
				<?php endif ?>

				<?php if (!empty($instance['subscribe_id_form'])):
                    echo do_shortcode('[contact-form-7 id="'. $instance['subscribe_id_form'] .'"]');
				endif ?>

	            <?php if (!empty($instance['subscribe_descr'])): ?>
                    <h3 class="wiso-widget-descr">
			            <?php echo esc_html( $instance['subscribe_descr'] ); ?>
                    </h3>
	            <?php endif ?>
            </div>
			<?php

			echo $after_widget;

		}

		function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['subscribe_title']    = $new_instance['subscribe_title'];
			$instance['subscribe_id_form']   = $new_instance['subscribe_id_form'];
			$instance['subscribe_descr']   = $new_instance['subscribe_descr'];

			return $instance;

		}

		function form( $instance ) {

			//
			// set defaults
			// -------------------------------------------------
			$instance   = wp_parse_args( $instance, array(
				'subscribe_title' => '',
				'subscribe_id_form' => '',
				'subscribe_descr' => '',
			));

			//
			// image field example
			// -------------------------------------------------
			$upload_value = !empty($instance['subscribe_title']) ? esc_attr( $instance['subscribe_title'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('subscribe_title'),
				'name'  => $this->get_field_name('subscribe_title'),
				'type'  => 'text',
				'title' => 'Title',
			);

			echo cs_add_element( $upload_field, $upload_value );

			//
			// text field example
			// -------------------------------------------------
			$text_value = !empty($instance['subscribe_id_form']) ? esc_attr( $instance['subscribe_id_form'] ) : '';
			$text_field = array(
				'id'    => $this->get_field_name('subscribe_id_form'),
				'name'  => $this->get_field_name('subscribe_id_form'),
				'type'  => 'text',
				'title' => 'Form ID from Contact Form Plugin',
			);

			echo cs_add_element( $text_field, $text_value );

			//
			// text field example
			// -------------------------------------------------
			$text_value = !empty($instance['subscribe_descr']) ? esc_attr( $instance['subscribe_descr'] ) : '';
			$text_field = array(
				'id'    => $this->get_field_name('subscribe_descr'),
				'name'  => $this->get_field_name('subscribe_descr'),
				'type'  => 'text',
				'title' => 'Description',
			);

			echo cs_add_element( $text_field, $text_value );

		}
	}
}


/**
 *
 * Wiso Best Seller Widget
 *
 */
if( ! class_exists( 'WisoBestSeller' ) ) {
	class WisoBestSeller extends WP_Widget {

		function __construct() {

			$widget_ops     = array(
				'classname'   => 'WisoBestSeller',
				'description' => 'Best Seller Widget.'
			);

			parent::__construct( 'wiso_best_seller_widget', 'Wiso Best Seller Widget', $widget_ops );

		}

		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			?>
            <div class="wiso-best-seller-widget">
				<?php if (!empty($instance['title'])): ?>
                    <h5 class="title"><?php echo esc_html( $instance['title'] ); ?></h5>
				<?php endif;

				$count_posts = ( ! empty( $instance['count_posts'] ) && is_numeric( $instance['count_posts'] ) ) ? $instance['count_posts'] : 6;

                $args = array(
                        'posts_per_page' => $count_posts,
                        'post_type' => 'product',
                        'meta_key' => 'total_sales',
                        'orderby' => 'meta_value_num'
                );
				$custom_query = new WP_Query( $args );
				$posts        = $custom_query->posts;
				$slides = $count_posts >=3 ? '3' : $count_posts;

				if ( $posts ) { ?>
            <div class="swiper-container"
                 data-mouse="0" data-autoplay="0"
                 data-loop="1" data-speed="1500"
                 data-center="0"
                 data-space="0" data-responsive="responsive" data-mode="vertical" data-add-slides="<?php echo esc_attr($slides); ?>" data-lg-slides="<?php echo esc_attr($slides); ?>" data-md-slides="<?php echo esc_attr($slides); ?>" data-sm-slides="<?php echo esc_attr($slides); ?>" data-xs-slides="<?php echo esc_attr($slides); ?>">

                <div class="swiper-wrapper">
					<?php foreach ( $posts as $item ) {
						$img_url = wp_get_attachment_url( get_post_thumbnail_id( $item->ID ) ); ?>
                        <div class="swiper-slide">
							<?php if ( ! empty( $img_url ) ) { ?>
                                <div class="seller-img">
                                    <img src="<?php echo esc_url( $img_url ); ?>" alt="" class="s-img-switch">
                                </div>
							<?php } ?>
                            <div class="flex-wrap">
                                <div class="seller-text">
                                    <a href="<?php echo get_permalink( $item->ID ); ?>"><?php echo esc_html( $item->post_title ); ?></a>
                                </div>
                                <div class="seller-price">
									<?php $sell_product = wc_get_product( $item->ID );

                                    echo wp_kses_post($sell_product->get_price_html()); ?>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
            <div class="swiper-arrows">
              <div class="swiper-button-prev">
                  <i class="fa fa-angle-left"></i>
              </div>
              <div class="swiper-button-next">
                  <i class="fa fa-angle-right"></i>
              </div>
            </div>
            <?php }
            wp_reset_postdata(); ?>

            </div>
			<?php

			echo $after_widget;

		}

		function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title']       = strip_tags( $new_instance['title'] );
			$instance['count_posts'] = strip_tags( $new_instance['count_posts'] );

			return $instance;

		}

		function form( $instance ) {

			//
			// set defaults
			// -------------------------------------------------
			$instance   = wp_parse_args( $instance, array(
				'title' => '',
				'count_posts' => '',
			));

			//
			// image field example
			// -------------------------------------------------
			$upload_value = !empty($instance['title']) ? esc_attr( $instance['title'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('title'),
				'name'  => $this->get_field_name('title'),
				'type'  => 'text',
				'title' => 'Title',
				'info'  => 'Some description for this field',
			);

			echo cs_add_element( $upload_field, $upload_value );

			//
			// textarea field example
			// -------------------------------------------------
			$textarea_value = !empty($instance['count_posts']) ? esc_attr( $instance['count_posts'] ) : '';
			$textarea_field = array(
				'id'    => $this->get_field_name('count_posts'),
				'name'  => $this->get_field_name('count_posts'),
				'type'  => 'text',
				'title' => 'Count posts',
				'info'  => 'Only number. By default 6',
			);

			echo cs_add_element( $textarea_field, $textarea_value );


		}
	}
}




/**
 *
 * Wiso Sorting Products Widget
 *
 */
if( ! class_exists( 'WisoSortingProducts' ) ) {
	class WisoSortingProducts extends WP_Widget {

		function __construct() {

			$widget_ops     = array(
				'classname'   => 'WisoSortingProducts',
				'description' => 'Sorting Products Widget.'
			);

			parent::__construct( 'wiso_sorting_products_widget', 'Wiso Sorting Products Widget', $widget_ops );

		}

		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			?>
            <div class="wiso-sorting-products-widget">
				<?php if (!empty($instance['title'])): ?>
                    <h5 class="title"><?php echo esc_html( $instance['title'] ); ?></h5>
				<?php endif; ?>

                <?php
                    $orderby                 = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) ); // WPCS: sanitization ok, input var ok, CSRF ok.
                    $catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
                        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
                        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
                    ) );
                ?>

                <form class="woocommerce-ordering" method="get">
                    <select name="orderby" class="orderby">
			            <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                            <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
			            <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="paged" value="1" />
		            <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
                </form>


            </div>
			<?php

			echo $after_widget;

		}

		function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title']       = strip_tags( $new_instance['title'] );

			return $instance;

		}

		function form( $instance ) {

			//
			// set defaults
			// -------------------------------------------------
			$instance   = wp_parse_args( $instance, array(
				'title' => '',
			));

			//
			// image field example
			// -------------------------------------------------
			$upload_value = !empty($instance['title']) ? esc_attr( $instance['title'] ) : '';
			$upload_field = array(
				'id'    => $this->get_field_name('title'),
				'name'  => $this->get_field_name('title'),
				'type'  => 'text',
				'title' => 'Title',
				'info'  => 'Some description for this field',
			);

			echo cs_add_element( $upload_field, $upload_value );

		}
	}
}



if ( ! function_exists( 'wiso_widget_init' ) ) {
  function wiso_widget_init() {
    register_widget( 'WisoInstagramWidget' );
    register_widget( 'AboutWidget' );
    register_widget( 'WisoBestSeller' );
    register_widget( 'WisoSortingProducts' );
    register_widget( 'SocialLinkWidget' );
    register_widget( 'CopyrightWidget' );
    register_widget( 'SubscribeWidget' );
  }
  add_action( 'widgets_init', 'wiso_widget_init', 2 );
}

/**
 *
 * Get categories for shortcode.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'wiso_categories' ) ) {
	function wiso_categories() {

		$args = array(
			'type'     => 'post',
			'taxonomy' => 'category'
		);

		$categories = get_categories( $args );
		$list       = array();

		foreach ( $categories as $category ) {
			$list[ $category->name ] = $category->slug;
		}

		return $list;
	}
}

/**
 *
 * element values post, page, categories
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'wiso_element_values' ) ) {
	function wiso_element_values( $type = '', $query_args = array() ) {

		$options = array();

		switch ( $type ) {

			case 'pages':
			case 'page':
				$pages = get_pages( $query_args );

				if ( ! empty( $pages ) ) {
					foreach ( $pages as $page ) {
						$options[ $page->post_title ] = $page->ID;
					}
				}
				break;

			case 'posts':
			case 'post':
				$posts = get_posts( $query_args );

				if ( ! empty( $posts ) ) {
					foreach ( $posts as $post ) {
						$options[ $post->post_title ] = $post->ID  /*lcfirst( $post->post_title )*/
						;
					}
				}
				break;

			case 'tags':
			case 'tag':

				$tags = get_terms( $query_args['taxonomies'] );
				if ( ! empty( $tags ) ) {
					foreach ( $tags as $tag ) {
						$options[ $tag->name ] = $tag->slug;
					}
				}
				break;

			case 'categories':
			case 'category':

				$categories = get_categories( $query_args );

				if ( ! empty( $categories ) ) {

					if ( is_array( $categories ) ) {
						foreach ( $categories as $category ) {
							$options[ $category->name ] = $category->slug;
						}
					}

				}
				break;

			case 'post_category':

				$categories = get_categories( $query_args );

				if ( ! empty( $categories ) ) {

					if ( is_array( $categories ) ) {
						foreach ( $categories as $category ) {
							$options[ $category->slug ] = $category->name;
						}
					}

				}
				break;

			case 'custom':
			case 'callback':

				if ( is_callable( $query_args['function'] ) ) {
					$options = call_user_func( $query_args['function'], $query_args['args'] );
				}

				break;

		}

		return $options;

	}
}

/**
 * Сustom wiso menu list.
 */
if ( ! function_exists( 'wiso_get_menus' ) ) {
    function wiso_get_menus() {
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
        $array = array( 'none' => 'None' );
        foreach ( $menus as $menu ) {
            $array[ $menu->slug ] = $menu->name;
        }

        return $array;
    }
}


/**
 *
 * ION icons array.
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( ! function_exists( 'wiso_simple_line_icons' ) ) {
    function wiso_simple_line_icons() {
        return array(
            array( 'icon-arrow-1-circle-down' => 'icon-arrow-1-circle-down' ),
            array( 'icon-arrow-1-circle-left' => 'icon-arrow-1-circle-left' ),
            array( 'icon-arrow-1-circle-right' => 'icon-arrow-1-circle-right' ),
            array( 'icon-arrow-1-circle-up' => 'icon-arrow-1-circle-up' ),
            array( 'icon-arrow-1-down' => 'icon-arrow-1-down' ),
            array( 'icon-arrow-1-left' => 'icon-arrow-1-left' ),
            array( 'icon-arrow-1-right' => 'icon-arrow-1-right' ),
            array( 'icon-arrow-1-square-down' => 'icon-arrow-1-square-down' ),
            array( 'icon-arrow-1-square-left' => 'icon-arrow-1-square-left' ),
            array( 'icon-arrow-1-square-right' => 'icon-arrow-1-square-right' ),
            array( 'icon-arrow-1-square-up' => 'icon-arrow-1-square-up' ),
            array( 'icon-arrow-1-up' => 'icon-arrow-1-up' ),
            array( 'icon-arrow-2-circle-down' => 'icon-arrow-2-circle-down' ),
            array( 'icon-arrow-2-circle-left' => 'icon-arrow-2-circle-left' ),
            array( 'icon-arrow-2-circle-right' => 'icon-arrow-2-circle-right' ),
            array( 'icon-arrow-2-circle-up' => 'icon-arrow-2-circle-up' ),
            array( 'icon-arrow-2-down' => 'icon-arrow-2-down' ),
            array( 'icon-arrow-2-left' => 'icon-arrow-2-left' ),
            array( 'icon-arrow-2-right' => 'icon-arrow-2-right' ),
            array( 'icon-arrow-2-sqare-down' => 'icon-arrow-2-sqare-down' ),
            array( 'icon-arrow-2-sqare-left' => 'icon-arrow-2-sqare-left' ),
            array( 'icon-arrow-2-sqare-right' => 'icon-arrow-2-sqare-right' ),
            array( 'icon-arrow-2-sqare-up' => 'icon-arrow-2-sqare-up' ),
            array( 'icon-arrow-2-up' => 'icon-arrow-2-up' ),
            array( 'icon-arrow-3-circle-down' => 'icon-arrow-3-circle-down' ),
            array( 'icon-arrow-3-circle-left' => 'icon-arrow-3-circle-left' ),
            array( 'icon-arrow-3-circle-right' => 'icon-arrow-3-circle-right' ),
            array( 'icon-arrow-3-circle-up' => 'icon-arrow-3-circle-up' ),
            array( 'icon-arrow-3-down' => 'icon-arrow-3-down' ),
            array( 'icon-arrow-3-left' => 'icon-arrow-3-left' ),
            array( 'icon-arrow-3-right' => 'icon-arrow-3-right' ),
            array( 'icon-arrow-3-square-down' => 'icon-arrow-3-square-down' ),
            array( 'icon-arrow-3-square-left' => 'icon-arrow-3-square-left' ),
            array( 'icon-arrow-3-square-right' => 'icon-arrow-3-square-right' ),
            array( 'icon-arrow-3-square-up' => 'icon-arrow-3-square-up' ),
            array( 'icon-arrow-3-up' => 'icon-arrow-3-up' ),
            array( 'icon-back-1' => 'icon-back-1' ),
            array( 'icon-back-2' => 'icon-back-2' ),
            array( 'icon-back-3' => 'icon-back-3' ),
            array( 'icon-back-4-circle' => 'icon-back-4-circle' ),
            array( 'icon-back-4-square' => 'icon-back-4-square' ),
            array( 'icon-back-4' => 'icon-back-4' ),
            array( 'icon-back-5' => 'icon-back-5' ),
            array( 'icon-back-6' => 'icon-back-6' ),
            array( 'icon-back-7' => 'icon-back-7' ),
            array( 'icon-backward-7' => 'icon-backward-7' ),
            array( 'icon-double-arrows-1-left' => 'icon-double-arrows-1-left' ),
            array( 'icon-double-arrows-1-right' => 'icon-double-arrows-1-right' ),
            array( 'icon-fork-arrows' => 'icon-fork-arrows' ),
            array( 'icon-forward-7' => 'icon-forward-7' ),
            array( 'icon-next-1' => 'icon-next-1' ),
            array( 'icon-next-2' => 'icon-next-2' ),
            array( 'icon-next-3' => 'icon-next-3' ),
            array( 'icon-next-4-circle' => 'icon-next-4-circle' ),
            array( 'icon-next-4-square' => 'icon-next-4-square' ),
            array( 'icon-next-4' => 'icon-next-4' ),
            array( 'icon-next-5' => 'icon-next-5' ),
            array( 'icon-next-6' => 'icon-next-6' ),
            array( 'icon-next-7' => 'icon-next-7' ),
            array( 'icon-s-arrow-1' => 'icon-s-arrow-1' ),
            array( 'icon-s-arrow-2' => 'icon-s-arrow-2' ),
            array( 'icon-s-arrow-3' => 'icon-s-arrow-3' ),
            array( 'icon-answer' => 'icon-answer' ),
            array( 'icon-call-back' => 'icon-call-back' ),
            array( 'icon-call-block' => 'icon-call-block' ),
            array( 'icon-call-end' => 'icon-call-end' ),
            array( 'icon-call-hold' => 'icon-call-hold' ),
            array( 'icon-call-in' => 'icon-call-in' ),
            array( 'icon-call-logs' => 'icon-call-logs' ),
            array( 'icon-call-off' => 'icon-call-off' ),
            array( 'icon-call-out' => 'icon-call-out' ),
            array( 'icon-call' => 'icon-call' ),
            array( 'icon-chat-1' => 'icon-chat-1' ),
            array( 'icon-chat-2' => 'icon-chat-2' ),
            array( 'icon-chat-3' => 'icon-chat-3' ),
            array( 'icon-comment-1-like' => 'icon-comment-1-like' ),
            array( 'icon-comment-1' => 'icon-comment-1' ),
            array( 'icon-comment-2-hashtag' => 'icon-comment-2-hashtag' ),
            array( 'icon-comment-2-quote' => 'icon-comment-2-quote' ),
            array( 'icon-comment-2-smile' => 'icon-comment-2-smile' ),
            array( 'icon-comment-2-write-2' => 'icon-comment-2-write-2' ),
            array( 'icon-comment-2' => 'icon-comment-2' ),
            array( 'icon-comment-3-write-2' => 'icon-comment-3-write-2' ),
            array( 'icon-comment-3' => 'icon-comment-3' ),
            array( 'icon-comments-1' => 'icon-comments-1' ),
            array( 'icon-comments-2' => 'icon-comments-2' ),
            array( 'icon-comments-3' => 'icon-comments-3' ),
            array( 'icon-email-2-at' => 'icon-email-2-at' ),
            array( 'icon-email-2-letter' => 'icon-email-2-letter' ),
            array( 'icon-email-2-open' => 'icon-email-2-open' ),
            array( 'icon-email-2-search' => 'icon-email-2-search' ),
            array( 'icon-email-at' => 'icon-email-at' ),
            array( 'icon-email-ban' => 'icon-email-ban' ),
            array( 'icon-email-check' => 'icon-email-check' ),
            array( 'icon-email-close' => 'icon-email-close' ),
            array( 'icon-email-delete' => 'icon-email-delete' ),
            array( 'icon-email-edit' => 'icon-email-edit' ),
            array( 'icon-email-forward' => 'icon-email-forward' ),
            array( 'icon-email-in' => 'icon-email-in' ),
            array( 'icon-email-letter' => 'icon-email-letter' ),
            array( 'icon-email-locked' => 'icon-email-locked' ),
            array( 'icon-email-new' => 'icon-email-new' ),
            array( 'icon-email-open' => 'icon-email-open' ),
            array( 'icon-email-out' => 'icon-email-out' ),
            array( 'icon-email-refresh' => 'icon-email-refresh' ),
            array( 'icon-email-reply' => 'icon-email-reply' ),
            array( 'icon-email-search' => 'icon-email-search' ),
            array( 'icon-email-send' => 'icon-email-send' ),
            array( 'icon-email-star' => 'icon-email-star' ),
            array( 'icon-email' => 'icon-email' ),
            array( 'icon-inbox-empty' => 'icon-inbox-empty' ),
            array( 'icon-inbox-full' => 'icon-inbox-full' ),
            array( 'icon-inbox' => 'icon-inbox' ),
            array( 'icon-letter' => 'icon-letter' ),
            array( 'icon-letters' => 'icon-letters' ),
            array( 'icon-megaphone-1' => 'icon-megaphone-1' ),
            array( 'icon-megaphone-2' => 'icon-megaphone-2' ),
            array( 'icon-message-1-alert' => 'icon-message-1-alert' ),
            array( 'icon-message-1-ask' => 'icon-message-1-ask' ),
            array( 'icon-message-1-hashtag' => 'icon-message-1-hashtag' ),
            array( 'icon-message-1-heart' => 'icon-message-1-heart' ),
            array( 'icon-message-1-music-tone' => 'icon-message-1-music-tone' ),
            array( 'icon-message-1-pause' => 'icon-message-1-pause' ),
            array( 'icon-message-1-quote' => 'icon-message-1-quote' ),
            array( 'icon-message-1-smile' => 'icon-message-1-smile' ),
            array( 'icon-message-1-write' => 'icon-message-1-write' ),
            array( 'icon-message-1' => 'icon-message-1' ),
            array( 'icon-message-2-alert' => 'icon-message-2-alert' ),
            array( 'icon-message-2-ask' => 'icon-message-2-ask' ),
            array( 'icon-message-2-heart' => 'icon-message-2-heart' ),
            array( 'icon-message-2-like' => 'icon-message-2-like' ),
            array( 'icon-message-2-music-tone' => 'icon-message-2-music-tone' ),
            array( 'icon-message-2-pause' => 'icon-message-2-pause' ),
            array( 'icon-message-2-write' => 'icon-message-2-write' ),
            array( 'icon-message-2' => 'icon-message-2' ),
            array( 'icon-message-3-alert' => 'icon-message-3-alert' ),
            array( 'icon-message-3-ask' => 'icon-message-3-ask' ),
            array( 'icon-message-3-hashtag' => 'icon-message-3-hashtag' ),
            array( 'icon-message-3-heart' => 'icon-message-3-heart' ),
            array( 'icon-message-3-like' => 'icon-message-3-like' ),
            array( 'icon-message-3-music-tone' => 'icon-message-3-music-tone' ),
            array( 'icon-message-3-pause' => 'icon-message-3-pause' ),
            array( 'icon-message-3-quote' => 'icon-message-3-quote' ),
            array( 'icon-message-3-smile' => 'icon-message-3-smile' ),
            array( 'icon-message-3-write' => 'icon-message-3-write' ),
            array( 'icon-message-3' => 'icon-message-3' ),
            array( 'icon-outbox' => 'icon-outbox' ),
            array( 'icon-paper-plane-2' => 'icon-paper-plane-2' ),
            array( 'icon-phone-call-in' => 'icon-phone-call-in' ),
            array( 'icon-phone-call-out' => 'icon-phone-call-out' ),
            array( 'icon-phone-contacts' => 'icon-phone-contacts' ),
            array( 'icon-phone-message-1' => 'icon-phone-message-1' ),
            array( 'icon-phone-message-2' => 'icon-phone-message-2' ),
            array( 'icon-phone-message-3' => 'icon-phone-message-3' ),
            array( 'icon-phone-ring' => 'icon-phone-ring' ),
            array( 'icon-Q-and-A' => 'icon-Q-and-A' ),
            array( 'icon-telephone-1' => 'icon-telephone-1' ),
            array( 'icon-voicemail' => 'icon-voicemail' ),
            array( 'icon-battery-1' => 'icon-battery-1' ),
            array( 'icon-battery-2' => 'icon-battery-2' ),
            array( 'icon-battery-3' => 'icon-battery-3' ),
            array( 'icon-battery-4' => 'icon-battery-4' ),
            array( 'icon-battery-5' => 'icon-battery-5' ),
            array( 'icon-battery-charging' => 'icon-battery-charging' ),
            array( 'icon-battery-empty' => 'icon-battery-empty' ),
            array( 'icon-battery-fully-charged' => 'icon-battery-fully-charged' ),
            array( 'icon-battery-low' => 'icon-battery-low' ),
            array( 'icon-battery-warning' => 'icon-battery-warning' ),
            array( 'icon-cable-1' => 'icon-cable-1' ),
            array( 'icon-cable-2' => 'icon-cable-2' ),
            array( 'icon-CD-1' => 'icon-CD-1' ),
            array( 'icon-cd-burn' => 'icon-cd-burn' ),
            array( 'icon-charger-plug-1' => 'icon-charger-plug-1' ),
            array( 'icon-charger-plug-2' => 'icon-charger-plug-2' ),
            array( 'icon-charger-plug-3' => 'icon-charger-plug-3' ),
            array( 'icon-desktop' => 'icon-desktop' ),
            array( 'icon-diskette-1' => 'icon-diskette-1' ),
            array( 'icon-diskette-2' => 'icon-diskette-2' ),
            array( 'icon-diskette-3' => 'icon-diskette-3' ),
            array( 'icon-flashdrive' => 'icon-flashdrive' ),
            array( 'icon-gameboy' => 'icon-gameboy' ),
            array( 'icon-hdd' => 'icon-hdd' ),
            array( 'icon-imac' => 'icon-imac' ),
            array( 'icon-ipod' => 'icon-ipod' ),
            array( 'icon-iwatch' => 'icon-iwatch' ),
            array( 'icon-joystick-1' => 'icon-joystick-1' ),
            array( 'icon-joystick-2' => 'icon-joystick-2' ),
            array( 'icon-keyboard-1' => 'icon-keyboard-1' ),
            array( 'icon-keyboard-2' => 'icon-keyboard-2' ),
            array( 'icon-laptop-1' => 'icon-laptop-1' ),
            array( 'icon-laptop-2' => 'icon-laptop-2' ),
            array( 'icon-monitor' => 'icon-monitor' ),
            array( 'icon-mouse-1' => 'icon-mouse-1' ),
            array( 'icon-mouse-2' => 'icon-mouse-2' ),
            array( 'icon-mouse-3' => 'icon-mouse-3' ),
            array( 'icon-old-computer' => 'icon-old-computer' ),
            array( 'icon-old-radio-1' => 'icon-old-radio-1' ),
            array( 'icon-old-radio-2' => 'icon-old-radio-2' ),
            array( 'icon-old-radio-3' => 'icon-old-radio-3' ),
            array( 'icon-old-telephone' => 'icon-old-telephone' ),
            array( 'icon-old-tv-1' => 'icon-old-tv-1' ),
            array( 'icon-old-tv-2' => 'icon-old-tv-2' ),
            array( 'icon-outlet' => 'icon-outlet' ),
            array( 'icon-plug' => 'icon-plug' ),
            array( 'icon-printer' => 'icon-printer' ),
            array( 'icon-projector' => 'icon-projector' ),
            array( 'icon-psp' => 'icon-psp' ),
            array( 'icon-remote' => 'icon-remote' ),
            array( 'icon-router' => 'icon-router' ),
            array( 'icon-security-camera' => 'icon-security-camera' ),
            array( 'icon-shredder' => 'icon-shredder' ),
            array( 'icon-sim-1' => 'icon-sim-1' ),
            array( 'icon-sim-2' => 'icon-sim-2' ),
            array( 'icon-smart-watch' => 'icon-smart-watch' ),
            array( 'icon-smartphone-3G' => 'icon-smartphone-3G' ),
            array( 'icon-smartphone-4G' => 'icon-smartphone-4G' ),
            array( 'icon-smartphone-desktop' => 'icon-smartphone-desktop' ),
            array( 'icon-smartphone-hand-1' => 'icon-smartphone-hand-1' ),
            array( 'icon-smartphone-hand-2' => 'icon-smartphone-hand-2' ),
            array( 'icon-smartphone-landscape' => 'icon-smartphone-landscape' ),
            array( 'icon-smartphone-laptop' => 'icon-smartphone-laptop' ),
            array( 'icon-smartphone-off' => 'icon-smartphone-off' ),
            array( 'icon-smartphone-orientation' => 'icon-smartphone-orientation' ),
            array( 'icon-smartphone-rotate-left' => 'icon-smartphone-rotate-left' ),
            array( 'icon-smartphone-rotate-right' => 'icon-smartphone-rotate-right' ),
            array( 'icon-smartphone-tablet-1' => 'icon-smartphone-tablet-1' ),
            array( 'icon-smartphone-tablet-2' => 'icon-smartphone-tablet-2' ),
            array( 'icon-smartphone-tablet-desktop' => 'icon-smartphone-tablet-desktop' ),
            array( 'icon-smartphone' => 'icon-smartphone' ),
            array( 'icon-smartphones' => 'icon-smartphones' ),
            array( 'icon-switch' => 'icon-switch' ),
            array( 'icon-tablet-desktop' => 'icon-tablet-desktop' ),
            array( 'icon-tablet-landscape' => 'icon-tablet-landscape' ),
            array( 'icon-tablet-orientation-landscape' => 'icon-tablet-orientation-landscape' ),
            array( 'icon-tablet-orientation-portrait' => 'icon-tablet-orientation-portrait' ),
            array( 'icon-tablet-stylus' => 'icon-tablet-stylus' ),
            array( 'icon-tablet' => 'icon-tablet' ),
            array( 'icon-tablets' => 'icon-tablets' ),
            array( 'icon-telephone' => 'icon-telephone' ),
            array( 'icon-tv' => 'icon-tv' ),
            array( 'icon-usb-wireless' => 'icon-usb-wireless' ),
            array( 'icon-web-camera' => 'icon-web-camera' ),
            array( 'icon-auction' => 'icon-auction' ),
            array( 'icon-barcode-scan' => 'icon-barcode-scan' ),
            array( 'icon-barcode' => 'icon-barcode' ),
            array( 'icon-basket-add' => 'icon-basket-add' ),
            array( 'icon-basket-checked' => 'icon-basket-checked' ),
            array( 'icon-basket-close' => 'icon-basket-close' ),
            array( 'icon-basket-in' => 'icon-basket-in' ),
            array( 'icon-basket-out' => 'icon-basket-out' ),
            array( 'icon-basket-remove' => 'icon-basket-remove' ),
            array( 'icon-basket' => 'icon-basket' ),
            array( 'icon-cart-1-add' => 'icon-cart-1-add' ),
            array( 'icon-cart-1-cancel' => 'icon-cart-1-cancel' ),
            array( 'icon-cart-1-checked' => 'icon-cart-1-checked' ),
            array( 'icon-cart-1-in' => 'icon-cart-1-in' ),
            array( 'icon-cart-1-loaded' => 'icon-cart-1-loaded' ),
            array( 'icon-cart-1-out' => 'icon-cart-1-out' ),
            array( 'icon-cart-1-remove' => 'icon-cart-1-remove' ),
            array( 'icon-cart-1' => 'icon-cart-1' ),
            array( 'icon-cart-2-add' => 'icon-cart-2-add' ),
            array( 'icon-cart-2-cancel' => 'icon-cart-2-cancel' ),
            array( 'icon-cart-2-checked' => 'icon-cart-2-checked' ),
            array( 'icon-cart-2-in' => 'icon-cart-2-in' ),
            array( 'icon-cart-2-loaded' => 'icon-cart-2-loaded' ),
            array( 'icon-cart-2-out' => 'icon-cart-2-out' ),
            array( 'icon-cart-2-remove' => 'icon-cart-2-remove' ),
            array( 'icon-cart-2' => 'icon-cart-2' ),
            array( 'icon-cart-3-loaded' => 'icon-cart-3-loaded' ),
            array( 'icon-cart-3' => 'icon-cart-3' ),
            array( 'icon-delivery-1' => 'icon-delivery-1' ),
            array( 'icon-delivery-2' => 'icon-delivery-2' ),
            array( 'icon-delivery-3' => 'icon-delivery-3' ),
            array( 'icon-delivery-box-1' => 'icon-delivery-box-1' ),
            array( 'icon-delivery-box-2' => 'icon-delivery-box-2' ),
            array( 'icon-discount-circle' => 'icon-discount-circle' ),
            array( 'icon-discount-star' => 'icon-discount-star' ),
            array( 'icon-handbag' => 'icon-handbag' ),
            array( 'icon-list-heart' => 'icon-list-heart' ),
            array( 'icon-open-sign' => 'icon-open-sign' ),
            array( 'icon-price-tag' => 'icon-price-tag' ),
            array( 'icon-qr-code' => 'icon-qr-code' ),
            array( 'icon-shop-1' => 'icon-shop-1' ),
            array( 'icon-shop-2-location' => 'icon-shop-2-location' ),
            array( 'icon-shop-2' => 'icon-shop-2' ),
            array( 'icon-shopping-bag-add' => 'icon-shopping-bag-add' ),
            array( 'icon-shopping-bag-checked' => 'icon-shopping-bag-checked' ),
            array( 'icon-shopping-bag-close' => 'icon-shopping-bag-close' ),
            array( 'icon-shopping-bag-heart' => 'icon-shopping-bag-heart' ),
            array( 'icon-shopping-bag-remove' => 'icon-shopping-bag-remove' ),
            array( 'icon-shopping-bag' => 'icon-shopping-bag' ),
            array( 'icon-shopping-tag' => 'icon-shopping-tag' ),
            array( 'icon-shopping-tags' => 'icon-shopping-tags' ),
            array( 'icon-ticket' => 'icon-ticket' ),
            array( 'icon-wallet-1' => 'icon-wallet-1' ),
            array( 'icon-wallet-add' => 'icon-wallet-add' ),
            array( 'icon-wallet-ban' => 'icon-wallet-ban' ),
            array( 'icon-wallet-cancel' => 'icon-wallet-cancel' ),
            array( 'icon-wallet-info' => 'icon-wallet-info' ),
            array( 'icon-wallet-loaded' => 'icon-wallet-loaded' ),
            array( 'icon-wallet-locked' => 'icon-wallet-locked' ),
            array( 'icon-wallet-remove' => 'icon-wallet-remove' ),
            array( 'icon-wallet-verified' => 'icon-wallet-verified' ),
            array( 'icon-wallet1' => 'icon-wallet1' ),
            array( 'icon-abacus' => 'icon-abacus' ),
            array( 'icon-alphabet' => 'icon-alphabet' ),
            array( 'icon-blackboard-1' => 'icon-blackboard-1' ),
            array( 'icon-blackboard-2' => 'icon-blackboard-2' ),
            array( 'icon-blackboard-3' => 'icon-blackboard-3' ),
            array( 'icon-blackboard-alphabet' => 'icon-blackboard-alphabet' ),
            array( 'icon-blackboard-pointer' => 'icon-blackboard-pointer' ),
            array( 'icon-bomb' => 'icon-bomb' ),
            array( 'icon-briefcase-2' => 'icon-briefcase-2' ),
            array( 'icon-bulb-add' => 'icon-bulb-add' ),
            array( 'icon-bulb-checked' => 'icon-bulb-checked' ),
            array( 'icon-bulb-close' => 'icon-bulb-close' ),
            array( 'icon-bulb-idea' => 'icon-bulb-idea' ),
            array( 'icon-bulb-remove' => 'icon-bulb-remove' ),
            array( 'icon-bulb' => 'icon-bulb' ),
            array( 'icon-chemistry-1-test-failed' => 'icon-chemistry-1-test-failed' ),
            array( 'icon-chemistry-1-test-successful' => 'icon-chemistry-1-test-successful' ),
            array( 'icon-chemistry-1' => 'icon-chemistry-1' ),
            array( 'icon-chemistry-2' => 'icon-chemistry-2' ),
            array( 'icon-chemistry-3' => 'icon-chemistry-3' ),
            array( 'icon-chemistry-5' => 'icon-chemistry-5' ),
            array( 'icon-divider' => 'icon-divider' ),
            array( 'icon-drawers' => 'icon-drawers' ),
            array( 'icon-earth-globe' => 'icon-earth-globe' ),
            array( 'icon-formula-2' => 'icon-formula-2' ),
            array( 'icon-formula' => 'icon-formula' ),
            array( 'icon-germs' => 'icon-germs' ),
            array( 'icon-grade' => 'icon-grade' ),
            array( 'icon-graduation-cap' => 'icon-graduation-cap' ),
            array( 'icon-learning' => 'icon-learning' ),
            array( 'icon-math' => 'icon-math' ),
            array( 'icon-molecule' => 'icon-molecule' ),
            array( 'icon-nerd-glasses' => 'icon-nerd-glasses' ),
            array( 'icon-physics-1' => 'icon-physics-1' ),
            array( 'icon-physics-2' => 'icon-physics-2' ),
            array( 'icon-planet' => 'icon-planet' ),
            array( 'icon-school-bag' => 'icon-school-bag' ),
            array( 'icon-telescope' => 'icon-telescope' ),
            array( 'icon-university' => 'icon-university' ),
            array( 'icon-d-axis' => 'icon-d-axis' ),
            array( 'icon-d-axis-2' => 'icon-d-axis-2' ),
            array( 'icon-d-axis2' => 'icon-d-axis2' ),
            array( 'icon-d-cube' => 'icon-d-cube' ),
            array( 'icon-blur' => 'icon-blur' ),
            array( 'icon-bring-forward' => 'icon-bring-forward' ),
            array( 'icon-brush-1' => 'icon-brush-1' ),
            array( 'icon-brush-2' => 'icon-brush-2' ),
            array( 'icon-brush-pencil' => 'icon-brush-pencil' ),
            array( 'icon-cmyk' => 'icon-cmyk' ),
            array( 'icon-color-palette' => 'icon-color-palette' ),
            array( 'icon-crop' => 'icon-crop' ),
            array( 'icon-easel' => 'icon-easel' ),
            array( 'icon-eraser' => 'icon-eraser' ),
            array( 'icon-eyedropper-1' => 'icon-eyedropper-1' ),
            array( 'icon-eyedropper-2' => 'icon-eyedropper-2' ),
            array( 'icon-golden-spiral' => 'icon-golden-spiral' ),
            array( 'icon-graphic-tablet' => 'icon-graphic-tablet' ),
            array( 'icon-grid' => 'icon-grid' ),
            array( 'icon-layers-1' => 'icon-layers-1' ),
            array( 'icon-layers-2' => 'icon-layers-2' ),
            array( 'icon-layers-add-1' => 'icon-layers-add-1' ),
            array( 'icon-layers-add-2' => 'icon-layers-add-2' ),
            array( 'icon-layers-linked-1' => 'icon-layers-linked-1' ),
            array( 'icon-layers-linked-2' => 'icon-layers-linked-2' ),
            array( 'icon-layers-locked-1' => 'icon-layers-locked-1' ),
            array( 'icon-layers-locked-2' => 'icon-layers-locked-2' ),
            array( 'icon-layers-off-1' => 'icon-layers-off-1' ),
            array( 'icon-layers-remove-1' => 'icon-layers-remove-1' ),
            array( 'icon-layers-remove-2' => 'icon-layers-remove-2' ),
            array( 'icon-paint-bucket-1' => 'icon-paint-bucket-1' ),
            array( 'icon-paint-bucket-2' => 'icon-paint-bucket-2' ),
            array( 'icon-paint-roll' => 'icon-paint-roll' ),
            array( 'icon-pantone-charts' => 'icon-pantone-charts' ),
            array( 'icon-pathfinder-exclude' => 'icon-pathfinder-exclude' ),
            array( 'icon-pathfinder-intersect' => 'icon-pathfinder-intersect' ),
            array( 'icon-pathfinder-minus-front' => 'icon-pathfinder-minus-front' ),
            array( 'icon-pathfinder-unite' => 'icon-pathfinder-unite' ),
            array( 'icon-pen-2' => 'icon-pen-2' ),
            array( 'icon-pen-pencil' => 'icon-pen-pencil' ),
            array( 'icon-pen1' => 'icon-pen1' ),
            array( 'icon-pencil-ruler' => 'icon-pencil-ruler' ),
            array( 'icon-pencil1' => 'icon-pencil1' ),
            array( 'icon-pencil2' => 'icon-pencil2' ),
            array( 'icon-rgb' => 'icon-rgb' ),
            array( 'icon-ruler-triangle' => 'icon-ruler-triangle' ),
            array( 'icon-ruler' => 'icon-ruler' ),
            array( 'icon-scissors-2' => 'icon-scissors-2' ),
            array( 'icon-scissors' => 'icon-scissors' ),
            array( 'icon-send-backward' => 'icon-send-backward' ),
            array( 'icon-sharpener' => 'icon-sharpener' ),
            array( 'icon-smart-object' => 'icon-smart-object' ),
            array( 'icon-spiral' => 'icon-spiral' ),
            array( 'icon-spray-can' => 'icon-spray-can' ),
            array( 'icon-square-circle' => 'icon-square-circle' ),
            array( 'icon-square-triangle-circle' => 'icon-square-triangle-circle' ),
            array( 'icon-square-triangle' => 'icon-square-triangle' ),
            array( 'icon-stylus' => 'icon-stylus' ),
            array( 'icon-varnish-brush' => 'icon-varnish-brush' ),
            array( 'icon-vector-arc' => 'icon-vector-arc' ),
            array( 'icon-vector-circle' => 'icon-vector-circle' ),
            array( 'icon-vector-line' => 'icon-vector-line' ),
            array( 'icon-vector-path-1' => 'icon-vector-path-1' ),
            array( 'icon-vector-path-2' => 'icon-vector-path-2' ),
            array( 'icon-vector-path-3' => 'icon-vector-path-3' ),
            array( 'icon-vector-rectangle' => 'icon-vector-rectangle' ),
            array( 'icon-vector-triangle' => 'icon-vector-triangle' ),
            array( 'icon-agenda-1' => 'icon-agenda-1' ),
            array( 'icon-agenda-2' => 'icon-agenda-2' ),
            array( 'icon-article-2' => 'icon-article-2' ),
            array( 'icon-article-3' => 'icon-article-3' ),
            array( 'icon-article' => 'icon-article' ),
            array( 'icon-ballpen' => 'icon-ballpen' ),
            array( 'icon-bold' => 'icon-bold' ),
            array( 'icon-book-2' => 'icon-book-2' ),
            array( 'icon-book-3' => 'icon-book-3' ),
            array( 'icon-book-4' => 'icon-book-4' ),
            array( 'icon-book-5' => 'icon-book-5' ),
            array( 'icon-book-6' => 'icon-book-6' ),
            array( 'icon-book' => 'icon-book' ),
            array( 'icon-bookmark-2' => 'icon-bookmark-2' ),
            array( 'icon-bookmark-3' => 'icon-bookmark-3' ),
            array( 'icon-bookmark-4' => 'icon-bookmark-4' ),
            array( 'icon-bookmark-add' => 'icon-bookmark-add' ),
            array( 'icon-bookmark-checked' => 'icon-bookmark-checked' ),
            array( 'icon-bookmark1' => 'icon-bookmark1' ),
            array( 'icon-bookmarks' => 'icon-bookmarks' ),
            array( 'icon-character' => 'icon-character' ),
            array( 'icon-characters' => 'icon-characters' ),
            array( 'icon-clipboard-1' => 'icon-clipboard-1' ),
            array( 'icon-clipboard-2' => 'icon-clipboard-2' ),
            array( 'icon-clipboard-check' => 'icon-clipboard-check' ),
            array( 'icon-clipboard-file' => 'icon-clipboard-file' ),
            array( 'icon-cmd' => 'icon-cmd' ),
            array( 'icon-content-1' => 'icon-content-1' ),
            array( 'icon-content-2' => 'icon-content-2' ),
            array( 'icon-content-3' => 'icon-content-3' ),
            array( 'icon-copy-plain-text' => 'icon-copy-plain-text' ),
            array( 'icon-copy-styles' => 'icon-copy-styles' ),
            array( 'icon-CV-2' => 'icon-CV-2' ),
            array( 'icon-CV' => 'icon-CV' ),
            array( 'icon-document-envelope-1' => 'icon-document-envelope-1' ),
            array( 'icon-document-envelope-2' => 'icon-document-envelope-2' ),
            array( 'icon-document-pencil' => 'icon-document-pencil' ),
            array( 'icon-indent-left' => 'icon-indent-left' ),
            array( 'icon-indent-right' => 'icon-indent-right' ),
            array( 'icon-liner' => 'icon-liner' ),
            array( 'icon-list-bullets' => 'icon-list-bullets' ),
            array( 'icon-list-numbers' => 'icon-list-numbers' ),
            array( 'icon-marker' => 'icon-marker' ),
            array( 'icon-newspaper' => 'icon-newspaper' ),
            array( 'icon-nib-1' => 'icon-nib-1' ),
            array( 'icon-nib-2' => 'icon-nib-2' ),
            array( 'icon-note' => 'icon-note' ),
            array( 'icon-notebook' => 'icon-notebook' ),
            array( 'icon-office-archives' => 'icon-office-archives' ),
            array( 'icon-paper-clamp' => 'icon-paper-clamp' ),
            array( 'icon-papyrus' => 'icon-papyrus' ),
            array( 'icon-paragraph-down' => 'icon-paragraph-down' ),
            array( 'icon-paragraph-up' => 'icon-paragraph-up' ),
            array( 'icon-paragraph' => 'icon-paragraph' ),
            array( 'icon-pen-1' => 'icon-pen-1' ),
            array( 'icon-pencil-1' => 'icon-pencil-1' ),
            array( 'icon-pencil-2' => 'icon-pencil-2' ),
            array( 'icon-quill-ink-pot' => 'icon-quill-ink-pot' ),
            array( 'icon-quill' => 'icon-quill' ),
            array( 'icon-quotes' => 'icon-quotes' ),
            array( 'icon-research' => 'icon-research' ),
            array( 'icon-spell-check' => 'icon-spell-check' ),
            array( 'icon-strikethrough' => 'icon-strikethrough' ),
            array( 'icon-text-box' => 'icon-text-box' ),
            array( 'icon-text-color' => 'icon-text-color' ),
            array( 'icon-text-input' => 'icon-text-input' ),
            array( 'icon-text-italic' => 'icon-text-italic' ),
            array( 'icon-text' => 'icon-text' ),
            array( 'icon-translate' => 'icon-translate' ),
            array( 'icon-underline' => 'icon-underline' ),
            array( 'icon-user-manual-2' => 'icon-user-manual-2' ),
            array( 'icon-user-manual' => 'icon-user-manual' ),
            array( 'icon-write-2' => 'icon-write-2' ),
            array( 'icon-write-3' => 'icon-write-3' ),
            array( 'icon-write-off' => 'icon-write-off' ),
            array( 'icon-write' => 'icon-write' ),
            array( 'icon-add-notification' => 'icon-add-notification' ),
            array( 'icon-add-tab' => 'icon-add-tab' ),
            array( 'icon-airplane-mode-2' => 'icon-airplane-mode-2' ),
            array( 'icon-airplane-mode' => 'icon-airplane-mode' ),
            array( 'icon-align-bottom' => 'icon-align-bottom' ),
            array( 'icon-align-left' => 'icon-align-left' ),
            array( 'icon-align-right' => 'icon-align-right' ),
            array( 'icon-allign-top' => 'icon-allign-top' ),
            array( 'icon-backward' => 'icon-backward' ),
            array( 'icon-ban' => 'icon-ban' ),
            array( 'icon-brightness-high' => 'icon-brightness-high' ),
            array( 'icon-brightness-low' => 'icon-brightness-low' ),
            array( 'icon-cancel-circle' => 'icon-cancel-circle' ),
            array( 'icon-cancel-square-2' => 'icon-cancel-square-2' ),
            array( 'icon-check-all' => 'icon-check-all' ),
            array( 'icon-check-circle-2' => 'icon-check-circle-2' ),
            array( 'icon-check-circle' => 'icon-check-circle' ),
            array( 'icon-check-square-2' => 'icon-check-square-2' ),
            array( 'icon-check-square' => 'icon-check-square' ),
            array( 'icon-check' => 'icon-check' ),
            array( 'icon-close' => 'icon-close' ),
            array( 'icon-config-1' => 'icon-config-1' ),
            array( 'icon-config-2' => 'icon-config-2' ),
            array( 'icon-contract-2' => 'icon-contract-2' ),
            array( 'icon-contract-3' => 'icon-contract-3' ),
            array( 'icon-contract-4' => 'icon-contract-4' ),
            array( 'icon-contract' => 'icon-contract' ),
            array( 'icon-cursor-click' => 'icon-cursor-click' ),
            array( 'icon-cursor-double-click' => 'icon-cursor-double-click' ),
            array( 'icon-cursor-select' => 'icon-cursor-select' ),
            array( 'icon-cursor' => 'icon-cursor' ),
            array( 'icon-door-lock' => 'icon-door-lock' ),
            array( 'icon-double-tap' => 'icon-double-tap' ),
            array( 'icon-download-1' => 'icon-download-1' ),
            array( 'icon-download-2' => 'icon-download-2' ),
            array( 'icon-drag-1' => 'icon-drag-1' ),
            array( 'icon-drag' => 'icon-drag' ),
            array( 'icon-edit-1' => 'icon-edit-1' ),
            array( 'icon-edit-2' => 'icon-edit-2' ),
            array( 'icon-edit-3' => 'icon-edit-3' ),
            array( 'icon-expand-2' => 'icon-expand-2' ),
            array( 'icon-expand-3' => 'icon-expand-3' ),
            array( 'icon-expand-4' => 'icon-expand-4' ),
            array( 'icon-expand-horizontal' => 'icon-expand-horizontal' ),
            array( 'icon-expand-vertical' => 'icon-expand-vertical' ),
            array( 'icon-expand' => 'icon-expand' ),
            array( 'icon-eye-off' => 'icon-eye-off' ),
            array( 'icon-eye' => 'icon-eye' ),
            array( 'icon-fingerprint' => 'icon-fingerprint' ),
            array( 'icon-flash-2' => 'icon-flash-2' ),
            array( 'icon-flash-3' => 'icon-flash-3' ),
            array( 'icon-flash-4' => 'icon-flash-4' ),
            array( 'icon-flip-horizontal' => 'icon-flip-horizontal' ),
            array( 'icon-flip-vertical' => 'icon-flip-vertical' ),
            array( 'icon-forward' => 'icon-forward' ),
            array( 'icon-grid-circles' => 'icon-grid-circles' ),
            array( 'icon-grid-squares-2' => 'icon-grid-squares-2' ),
            array( 'icon-grid-squares' => 'icon-grid-squares' ),
            array( 'icon-hamburger-menu-1' => 'icon-hamburger-menu-1' ),
            array( 'icon-hamburger-menu-2' => 'icon-hamburger-menu-2' ),
            array( 'icon-hand' => 'icon-hand' ),
            array( 'icon-help-1' => 'icon-help-1' ),
            array( 'icon-help-2' => 'icon-help-2' ),
            array( 'icon-home' => 'icon-home' ),
            array( 'icon-info' => 'icon-info' ),
            array( 'icon-inside' => 'icon-inside' ),
            array( 'icon-key-1' => 'icon-key-1' ),
            array( 'icon-key-2' => 'icon-key-2' ),
            array( 'icon-label-cancel' => 'icon-label-cancel' ),
            array( 'icon-label' => 'icon-label' ),
            array( 'icon-layout-1' => 'icon-layout-1' ),
            array( 'icon-layout-2' => 'icon-layout-2' ),
            array( 'icon-layout-3' => 'icon-layout-3' ),
            array( 'icon-list-1' => 'icon-list-1' ),
            array( 'icon-list-2' => 'icon-list-2' ),
            array( 'icon-list-3' => 'icon-list-3' ),
            array( 'icon-list-4' => 'icon-list-4' ),
            array( 'icon-lock' => 'icon-lock' ),
            array( 'icon-loop' => 'icon-loop' ),
            array( 'icon-magic-wand-1' => 'icon-magic-wand-1' ),
            array( 'icon-magic-wand-2' => 'icon-magic-wand-2' ),
            array( 'icon-magnet' => 'icon-magnet' ),
            array( 'icon-magnifier-1' => 'icon-magnifier-1' ),
            array( 'icon-magnifier-2' => 'icon-magnifier-2' ),
            array( 'icon-maximize-left' => 'icon-maximize-left' ),
            array( 'icon-maximize-right' => 'icon-maximize-right' ),
            array( 'icon-menu-circle-grid' => 'icon-menu-circle-grid' ),
            array( 'icon-minus-circle' => 'icon-minus-circle' ),
            array( 'icon-minus-square' => 'icon-minus-square' ),
            array( 'icon-more-circle' => 'icon-more-circle' ),
            array( 'icon-more-circles-horizontal' => 'icon-more-circles-horizontal' ),
            array( 'icon-more-circles-vertical' => 'icon-more-circles-vertical' ),
            array( 'icon-more-squares-vertical-filled' => 'icon-more-squares-vertical-filled' ),
            array( 'icon-more-squares-vertical' => 'icon-more-squares-vertical' ),
            array( 'icon-notification-2' => 'icon-notification-2' ),
            array( 'icon-notification-off' => 'icon-notification-off' ),
            array( 'icon-notification-paused' => 'icon-notification-paused' ),
            array( 'icon-notification' => 'icon-notification' ),
            array( 'icon-outside' => 'icon-outside' ),
            array( 'icon-paper-clip' => 'icon-paper-clip' ),
            array( 'icon-paper-plane' => 'icon-paper-plane' ),
            array( 'icon-pass' => 'icon-pass' ),
            array( 'icon-phone-shake' => 'icon-phone-shake' ),
            array( 'icon-pin-1' => 'icon-pin-1' ),
            array( 'icon-pin-2' => 'icon-pin-2' ),
            array( 'icon-pin-3' => 'icon-pin-3' ),
            array( 'icon-pin-code' => 'icon-pin-code' ),
            array( 'icon-plus-circle' => 'icon-plus-circle' ),
            array( 'icon-plus-square' => 'icon-plus-square' ),
            array( 'icon-plus' => 'icon-plus' ),
            array( 'icon-pointer' => 'icon-pointer' ),
            array( 'icon-power' => 'icon-power' ),
            array( 'icon-press' => 'icon-press' ),
            array( 'icon-question' => 'icon-question' ),
            array( 'icon-refresh-2' => 'icon-refresh-2' ),
            array( 'icon-refresh-warning' => 'icon-refresh-warning' ),
            array( 'icon-refresh' => 'icon-refresh' ),
            array( 'icon-reload-checked' => 'icon-reload-checked' ),
            array( 'icon-reload' => 'icon-reload' ),
            array( 'icon-remove-tab' => 'icon-remove-tab' ),
            array( 'icon-rotate' => 'icon-rotate' ),
            array( 'icon-scroll' => 'icon-scroll' ),
            array( 'icon-search-history' => 'icon-search-history' ),
            array( 'icon-settings-2' => 'icon-settings-2' ),
            array( 'icon-settings' => 'icon-settings' ),
            array( 'icon-Shape18' => 'icon-Shape18' ),
            array( 'icon-share-1' => 'icon-share-1' ),
            array( 'icon-share-2' => 'icon-share-2' ),
            array( 'icon-share-3' => 'icon-share-3' ),
            array( 'icon-share-4' => 'icon-share-4' ),
            array( 'icon-spread' => 'icon-spread' ),
            array( 'icon-swap-horizontal' => 'icon-swap-horizontal' ),
            array( 'icon-swap-vertical' => 'icon-swap-vertical' ),
            array( 'icon-swipe-down' => 'icon-swipe-down' ),
            array( 'icon-swipe-left' => 'icon-swipe-left' ),
            array( 'icon-swipe-right' => 'icon-swipe-right' ),
            array( 'icon-swipe-up' => 'icon-swipe-up' ),
            array( 'icon-switch-off' => 'icon-switch-off' ),
            array( 'icon-switch-on' => 'icon-switch-on' ),
            array( 'icon-switches-1' => 'icon-switches-1' ),
            array( 'icon-switches-2' => 'icon-switches-2' ),
            array( 'icon-tabs-2' => 'icon-tabs-2' ),
            array( 'icon-tabs' => 'icon-tabs' ),
            array( 'icon-tap' => 'icon-tap' ),
            array( 'icon-touch' => 'icon-touch' ),
            array( 'icon-trash-recycle' => 'icon-trash-recycle' ),
            array( 'icon-trash' => 'icon-trash' ),
            array( 'icon-unlocked' => 'icon-unlocked' ),
            array( 'icon-upload-1' => 'icon-upload-1' ),
            array( 'icon-upload-2' => 'icon-upload-2' ),
            array( 'icon-warning-circle' => 'icon-warning-circle' ),
            array( 'icon-warning-hexagon' => 'icon-warning-hexagon' ),
            array( 'icon-warning-triangle' => 'icon-warning-triangle' ),
            array( 'icon-zoom-in-1' => 'icon-zoom-in-1' ),
            array( 'icon-zoom-in-2' => 'icon-zoom-in-2' ),
            array( 'icon-zoom-out-1' => 'icon-zoom-out-1' ),
            array( 'icon-zoom-out-2' => 'icon-zoom-out-2' ),
            array( 'icon-file-aep' => 'icon-file-aep' ),
            array( 'icon-file-ai' => 'icon-file-ai' ),
            array( 'icon-file-apk' => 'icon-file-apk' ),
            array( 'icon-file-archive' => 'icon-file-archive' ),
            array( 'icon-file-audio' => 'icon-file-audio' ),
            array( 'icon-file-avi' => 'icon-file-avi' ),
            array( 'icon-file-backup' => 'icon-file-backup' ),
            array( 'icon-file-bookmark' => 'icon-file-bookmark' ),
            array( 'icon-file-cdr' => 'icon-file-cdr' ),
            array( 'icon-file-clip' => 'icon-file-clip' ),
            array( 'icon-file-code' => 'icon-file-code' ),
            array( 'icon-file-copy' => 'icon-file-copy' ),
            array( 'icon-file-corrupted' => 'icon-file-corrupted' ),
            array( 'icon-file-css' => 'icon-file-css' ),
            array( 'icon-file-delete' => 'icon-file-delete' ),
            array( 'icon-file-dmg' => 'icon-file-dmg' ),
            array( 'icon-file-doc' => 'icon-file-doc' ),
            array( 'icon-file-download' => 'icon-file-download' ),
            array( 'icon-file-edit' => 'icon-file-edit' ),
            array( 'icon-file-eps' => 'icon-file-eps' ),
            array( 'icon-file-error' => 'icon-file-error' ),
            array( 'icon-file-exchange' => 'icon-file-exchange' ),
            array( 'icon-file-exe' => 'icon-file-exe' ),
            array( 'icon-file-export' => 'icon-file-export' ),
            array( 'icon-file-flv' => 'icon-file-flv' ),
            array( 'icon-file-gif' => 'icon-file-gif' ),
            array( 'icon-file-ico' => 'icon-file-ico' ),
            array( 'icon-file-image' => 'icon-file-image' ),
            array( 'icon-file-import' => 'icon-file-import' ),
            array( 'icon-file-info' => 'icon-file-info' ),
            array( 'icon-file-jpg' => 'icon-file-jpg' ),
            array( 'icon-file-linked' => 'icon-file-linked' ),
            array( 'icon-file-load' => 'icon-file-load' ),
            array( 'icon-file-locked' => 'icon-file-locked' ),
            array( 'icon-file-mov' => 'icon-file-mov' ),
            array( 'icon-file-mp3' => 'icon-file-mp3' ),
            array( 'icon-file-mpg' => 'icon-file-mpg' ),
            array( 'icon-file-new' => 'icon-file-new' ),
            array( 'icon-file-otf' => 'icon-file-otf' ),
            array( 'icon-file-pdf' => 'icon-file-pdf' ),
            array( 'icon-file-png' => 'icon-file-png' ),
            array( 'icon-file-psd' => 'icon-file-psd' ),
            array( 'icon-file-rar' => 'icon-file-rar' ),
            array( 'icon-file-raw' => 'icon-file-raw' ),
            array( 'icon-file-remove' => 'icon-file-remove' ),
            array( 'icon-file-search' => 'icon-file-search' ),
            array( 'icon-file-settings' => 'icon-file-settings' ),
            array( 'icon-file-share' => 'icon-file-share' ),
            array( 'icon-file-star' => 'icon-file-star' ),
            array( 'icon-file-svg' => 'icon-file-svg' ),
            array( 'icon-file-sync' => 'icon-file-sync' ),
            array( 'icon-file-table' => 'icon-file-table' ),
            array( 'icon-file-text' => 'icon-file-text' ),
            array( 'icon-file-tif' => 'icon-file-tif' ),
            array( 'icon-file-ttf' => 'icon-file-ttf' ),
            array( 'icon-file-txt' => 'icon-file-txt' ),
            array( 'icon-file-upload' => 'icon-file-upload' ),
            array( 'icon-file-vector' => 'icon-file-vector' ),
            array( 'icon-file-video' => 'icon-file-video' ),
            array( 'icon-file-warning' => 'icon-file-warning' ),
            array( 'icon-file-xls' => 'icon-file-xls' ),
            array( 'icon-file-xml' => 'icon-file-xml' ),
            array( 'icon-file-zip' => 'icon-file-zip' ),
            array( 'icon-file' => 'icon-file' ),
            array( 'icon-files-2' => 'icon-files-2' ),
            array( 'icon-files' => 'icon-files' ),
            array( 'icon-folder-alert' => 'icon-folder-alert' ),
            array( 'icon-folder-archive' => 'icon-folder-archive' ),
            array( 'icon-folder-audio' => 'icon-folder-audio' ),
            array( 'icon-folder-backup' => 'icon-folder-backup' ),
            array( 'icon-folder-bookmark' => 'icon-folder-bookmark' ),
            array( 'icon-folder-check' => 'icon-folder-check' ),
            array( 'icon-folder-code' => 'icon-folder-code' ),
            array( 'icon-folder-copy' => 'icon-folder-copy' ),
            array( 'icon-folder-delete' => 'icon-folder-delete' ),
            array( 'icon-folder-download' => 'icon-folder-download' ),
            array( 'icon-folder-exchange' => 'icon-folder-exchange' ),
            array( 'icon-folder-export' => 'icon-folder-export' ),
            array( 'icon-folder-file' => 'icon-folder-file' ),
            array( 'icon-folder-image' => 'icon-folder-image' ),
            array( 'icon-folder-import' => 'icon-folder-import' ),
            array( 'icon-folder-info' => 'icon-folder-info' ),
            array( 'icon-folder-linked' => 'icon-folder-linked' ),
            array( 'icon-folder-locked' => 'icon-folder-locked' ),
            array( 'icon-folder-new' => 'icon-folder-new' ),
            array( 'icon-folder-open' => 'icon-folder-open' ),
            array( 'icon-folder-search' => 'icon-folder-search' ),
            array( 'icon-folder-share' => 'icon-folder-share' ),
            array( 'icon-folder-star' => 'icon-folder-star' ),
            array( 'icon-folder-sync' => 'icon-folder-sync' ),
            array( 'icon-folder-text' => 'icon-folder-text' ),
            array( 'icon-folder-upload' => 'icon-folder-upload' ),
            array( 'icon-folder-video' => 'icon-folder-video' ),
            array( 'icon-folder' => 'icon-folder' ),
            array( 'icon-alcohol' => 'icon-alcohol' ),
            array( 'icon-apple-1' => 'icon-apple-1' ),
            array( 'icon-apple-2' => 'icon-apple-2' ),
            array( 'icon-apple-3' => 'icon-apple-3' ),
            array( 'icon-avocado' => 'icon-avocado' ),
            array( 'icon-banana' => 'icon-banana' ),
            array( 'icon-barbecue' => 'icon-barbecue' ),
            array( 'icon-beer-mug' => 'icon-beer-mug' ),
            array( 'icon-beverage' => 'icon-beverage' ),
            array( 'icon-blender' => 'icon-blender' ),
            array( 'icon-bottle-beer' => 'icon-bottle-beer' ),
            array( 'icon-bottle-milk' => 'icon-bottle-milk' ),
            array( 'icon-bottle-wine' => 'icon-bottle-wine' ),
            array( 'icon-bowl' => 'icon-bowl' ),
            array( 'icon-bread-1' => 'icon-bread-1' ),
            array( 'icon-bread-2' => 'icon-bread-2' ),
            array( 'icon-butcher-knife' => 'icon-butcher-knife' ),
            array( 'icon-cake' => 'icon-cake' ),
            array( 'icon-candy' => 'icon-candy' ),
            array( 'icon-capcake' => 'icon-capcake' ),
            array( 'icon-carrot' => 'icon-carrot' ),
            array( 'icon-champagne' => 'icon-champagne' ),
            array( 'icon-checken' => 'icon-checken' ),
            array( 'icon-cheese' => 'icon-cheese' ),
            array( 'icon-chef-hat-1' => 'icon-chef-hat-1' ),
            array( 'icon-chef-hat-2' => 'icon-chef-hat-2' ),
            array( 'icon-chef-knife' => 'icon-chef-knife' ),
            array( 'icon-cherry' => 'icon-cherry' ),
            array( 'icon-coconut' => 'icon-coconut' ),
            array( 'icon-coffee-bean' => 'icon-coffee-bean' ),
            array( 'icon-coffee-cup' => 'icon-coffee-cup' ),
            array( 'icon-coffee-machine' => 'icon-coffee-machine' ),
            array( 'icon-coffee-mug' => 'icon-coffee-mug' ),
            array( 'icon-cookie-1' => 'icon-cookie-1' ),
            array( 'icon-cookie-2' => 'icon-cookie-2' ),
            array( 'icon-cooking-pan' => 'icon-cooking-pan' ),
            array( 'icon-cooking-pot' => 'icon-cooking-pot' ),
            array( 'icon-cooking-timer-1' => 'icon-cooking-timer-1' ),
            array( 'icon-cooking-timer-2' => 'icon-cooking-timer-2' ),
            array( 'icon-cooking-timer-3' => 'icon-cooking-timer-3' ),
            array( 'icon-cooking-timer-4' => 'icon-cooking-timer-4' ),
            array( 'icon-cooking-timer-5' => 'icon-cooking-timer-5' ),
            array( 'icon-cooking-timer-6' => 'icon-cooking-timer-6' ),
            array( 'icon-cooking-timer-7' => 'icon-cooking-timer-7' ),
            array( 'icon-cooking-timer-8' => 'icon-cooking-timer-8' ),
            array( 'icon-corkscrew' => 'icon-corkscrew' ),
            array( 'icon-croissant' => 'icon-croissant' ),
            array( 'icon-egg' => 'icon-egg' ),
            array( 'icon-fast-food' => 'icon-fast-food' ),
            array( 'icon-fire' => 'icon-fire' ),
            array( 'icon-fork-knife-1' => 'icon-fork-knife-1' ),
            array( 'icon-fork-knife-2' => 'icon-fork-knife-2' ),
            array( 'icon-fork-spoon-knife' => 'icon-fork-spoon-knife' ),
            array( 'icon-fork-spoon' => 'icon-fork-spoon' ),
            array( 'icon-fork' => 'icon-fork' ),
            array( 'icon-fridge' => 'icon-fridge' ),
            array( 'icon-fried-egg' => 'icon-fried-egg' ),
            array( 'icon-fries' => 'icon-fries' ),
            array( 'icon-glass-beer-1' => 'icon-glass-beer-1' ),
            array( 'icon-glass-beer-2' => 'icon-glass-beer-2' ),
            array( 'icon-glass-champagme-1' => 'icon-glass-champagme-1' ),
            array( 'icon-glass-champagme-2' => 'icon-glass-champagme-2' ),
            array( 'icon-glass-cocktail-1' => 'icon-glass-cocktail-1' ),
            array( 'icon-glass-cocktail-2' => 'icon-glass-cocktail-2' ),
            array( 'icon-glass-water' => 'icon-glass-water' ),
            array( 'icon-glass-wine-1' => 'icon-glass-wine-1' ),
            array( 'icon-glass-wine-2' => 'icon-glass-wine-2' ),
            array( 'icon-glass-wine-3' => 'icon-glass-wine-3' ),
            array( 'icon-grapes' => 'icon-grapes' ),
            array( 'icon-grinder' => 'icon-grinder' ),
            array( 'icon-hamburger' => 'icon-hamburger' ),
            array( 'icon-ice-cream-1' => 'icon-ice-cream-1' ),
            array( 'icon-ice-cream-2' => 'icon-ice-cream-2' ),
            array( 'icon-ice-cream-3' => 'icon-ice-cream-3' ),
            array( 'icon-jam-jar' => 'icon-jam-jar' ),
            array( 'icon-kitchen-glove' => 'icon-kitchen-glove' ),
            array( 'icon-kitchen-sclae' => 'icon-kitchen-sclae' ),
            array( 'icon-knife' => 'icon-knife' ),
            array( 'icon-ladle' => 'icon-ladle' ),
            array( 'icon-lemon' => 'icon-lemon' ),
            array( 'icon-lollipop-1' => 'icon-lollipop-1' ),
            array( 'icon-lollipop-2' => 'icon-lollipop-2' ),
            array( 'icon-meal-time' => 'icon-meal-time' ),
            array( 'icon-meal' => 'icon-meal' ),
            array( 'icon-microwave' => 'icon-microwave' ),
            array( 'icon-mushroom' => 'icon-mushroom' ),
            array( 'icon-pear-1' => 'icon-pear-1' ),
            array( 'icon-pear-2' => 'icon-pear-2' ),
            array( 'icon-pear-apple' => 'icon-pear-apple' ),
            array( 'icon-pepper' => 'icon-pepper' ),
            array( 'icon-pitcher' => 'icon-pitcher' ),
            array( 'icon-pizza' => 'icon-pizza' ),
            array( 'icon-pretzel' => 'icon-pretzel' ),
            array( 'icon-recipe' => 'icon-recipe' ),
            array( 'icon-sausage' => 'icon-sausage' ),
            array( 'icon-shake' => 'icon-shake' ),
            array( 'icon-skewer' => 'icon-skewer' ),
            array( 'icon-spoon' => 'icon-spoon' ),
            array( 'icon-strawberry' => 'icon-strawberry' ),
            array( 'icon-sushi-1' => 'icon-sushi-1' ),
            array( 'icon-sushi-2' => 'icon-sushi-2' ),
            array( 'icon-tea-cup' => 'icon-tea-cup' ),
            array( 'icon-tea-mug' => 'icon-tea-mug' ),
            array( 'icon-teapot-1' => 'icon-teapot-1' ),
            array( 'icon-teapot-2' => 'icon-teapot-2' ),
            array( 'icon-togo-cup-1' => 'icon-togo-cup-1' ),
            array( 'icon-water-can' => 'icon-water-can' ),
            array( 'icon-watermelon' => 'icon-watermelon' ),
            array( 'icon-K' => 'icon-K' ),
            array( 'icon-album-2' => 'icon-album-2' ),
            array( 'icon-album' => 'icon-album' ),
            array( 'icon-albums' => 'icon-albums' ),
            array( 'icon-aperture' => 'icon-aperture' ),
            array( 'icon-aspect-ratio' => 'icon-aspect-ratio' ),
            array( 'icon-audiobook-2' => 'icon-audiobook-2' ),
            array( 'icon-audiobook' => 'icon-audiobook' ),
            array( 'icon-boombox-1' => 'icon-boombox-1' ),
            array( 'icon-boombox-2' => 'icon-boombox-2' ),
            array( 'icon-camcorder' => 'icon-camcorder' ),
            array( 'icon-camera-focus' => 'icon-camera-focus' ),
            array( 'icon-camera-off' => 'icon-camera-off' ),
            array( 'icon-camera-reverse' => 'icon-camera-reverse' ),
            array( 'icon-camera-swap' => 'icon-camera-swap' ),
            array( 'icon-camera-tripod' => 'icon-camera-tripod' ),
            array( 'icon-camera' => 'icon-camera' ),
            array( 'icon-cassette' => 'icon-cassette' ),
            array( 'icon-CD' => 'icon-CD' ),
            array( 'icon-clapperboard' => 'icon-clapperboard' ),
            array( 'icon-closed-caption' => 'icon-closed-caption' ),
            array( 'icon-director-chair' => 'icon-director-chair' ),
            array( 'icon-earphones-1' => 'icon-earphones-1' ),
            array( 'icon-earphones-2' => 'icon-earphones-2' ),
            array( 'icon-earphones-3' => 'icon-earphones-3' ),
            array( 'icon-eject-circle' => 'icon-eject-circle' ),
            array( 'icon-eject' => 'icon-eject' ),
            array( 'icon-end-circle' => 'icon-end-circle' ),
            array( 'icon-end' => 'icon-end' ),
            array( 'icon-exposure' => 'icon-exposure' ),
            array( 'icon-external-flash' => 'icon-external-flash' ),
            array( 'icon-film-1' => 'icon-film-1' ),
            array( 'icon-film-l' => 'icon-film-l' ),
            array( 'icon-film-reel' => 'icon-film-reel' ),
            array( 'icon-flash-auto' => 'icon-flash-auto' ),
            array( 'icon-flash-off' => 'icon-flash-off' ),
            array( 'icon-flash' => 'icon-flash' ),
            array( 'icon-forward-2' => 'icon-forward-2' ),
            array( 'icon-forward-circle' => 'icon-forward-circle' ),
            array( 'icon-frame' => 'icon-frame' ),
            array( 'icon-HD' => 'icon-HD' ),
            array( 'icon-headphones-1' => 'icon-headphones-1' ),
            array( 'icon-headphones-2' => 'icon-headphones-2' ),
            array( 'icon-loop-1' => 'icon-loop-1' ),
            array( 'icon-loop-2' => 'icon-loop-2' ),
            array( 'icon-loop-all' => 'icon-loop-all' ),
            array( 'icon-macro' => 'icon-macro' ),
            array( 'icon-media-player' => 'icon-media-player' ),
            array( 'icon-mic-2' => 'icon-mic-2' ),
            array( 'icon-microphone-off' => 'icon-microphone-off' ),
            array( 'icon-microphone' => 'icon-microphone' ),
            array( 'icon-moviecamera' => 'icon-moviecamera' ),
            array( 'icon-music-tone-1-off' => 'icon-music-tone-1-off' ),
            array( 'icon-music-tone-1' => 'icon-music-tone-1' ),
            array( 'icon-music-tone-2-off' => 'icon-music-tone-2-off' ),
            array( 'icon-music-tone-2' => 'icon-music-tone-2' ),
            array( 'icon-mute' => 'icon-mute' ),
            array( 'icon-panorama' => 'icon-panorama' ),
            array( 'icon-pause-circle' => 'icon-pause-circle' ),
            array( 'icon-pause' => 'icon-pause' ),
            array( 'icon-photo-add' => 'icon-photo-add' ),
            array( 'icon-photo-album' => 'icon-photo-album' ),
            array( 'icon-photo' => 'icon-photo' ),
            array( 'icon-photos' => 'icon-photos' ),
            array( 'icon-play-circle' => 'icon-play-circle' ),
            array( 'icon-play' => 'icon-play' ),
            array( 'icon-playlist-1' => 'icon-playlist-1' ),
            array( 'icon-playlist-add' => 'icon-playlist-add' ),
            array( 'icon-playlist-audio' => 'icon-playlist-audio' ),
            array( 'icon-playlist-video' => 'icon-playlist-video' ),
            array( 'icon-podcast' => 'icon-podcast' ),
            array( 'icon-rec-circle' => 'icon-rec-circle' ),
            array( 'icon-retro-camera' => 'icon-retro-camera' ),
            array( 'icon-rewind-circle' => 'icon-rewind-circle' ),
            array( 'icon-rewind' => 'icon-rewind' ),
            array( 'icon-rotate-left' => 'icon-rotate-left' ),
            array( 'icon-rotate-right' => 'icon-rotate-right' ),
            array( 'icon-SD' => 'icon-SD' ),
            array( 'icon-shuffle' => 'icon-shuffle' ),
            array( 'icon-slideshow-1' => 'icon-slideshow-1' ),
            array( 'icon-slideshow-2' => 'icon-slideshow-2' ),
            array( 'icon-soundwave' => 'icon-soundwave' ),
            array( 'icon-speaker-1' => 'icon-speaker-1' ),
            array( 'icon-speaker-2' => 'icon-speaker-2' ),
            array( 'icon-start-circle' => 'icon-start-circle' ),
            array( 'icon-start' => 'icon-start' ),
            array( 'icon-stereo-1' => 'icon-stereo-1' ),
            array( 'icon-stereo-2' => 'icon-stereo-2' ),
            array( 'icon-stop-circle' => 'icon-stop-circle' ),
            array( 'icon-stop' => 'icon-stop' ),
            array( 'icon-turntable' => 'icon-turntable' ),
            array( 'icon-video-camera-2' => 'icon-video-camera-2' ),
            array( 'icon-video-camera-off' => 'icon-video-camera-off' ),
            array( 'icon-video-camera' => 'icon-video-camera' ),
            array( 'icon-volume-1' => 'icon-volume-1' ),
            array( 'icon-volume-2' => 'icon-volume-2' ),
            array( 'icon-volume-off' => 'icon-volume-off' ),
            array( 'icon-vumeter' => 'icon-vumeter' ),
            array( 'icon-7-support-1' => 'icon-7-support-1' ),
            array( 'icon-7-support-2' => 'icon-7-support-2' ),
            array( 'icon-h-calls' => 'icon-h-calls' ),
            array( 'icon-ATM-1' => 'icon-ATM-1' ),
            array( 'icon-ATM-2' => 'icon-ATM-2' ),
            array( 'icon-balance' => 'icon-balance' ),
            array( 'icon-bank' => 'icon-bank' ),
            array( 'icon-banknote-1' => 'icon-banknote-1' ),
            array( 'icon-banknote-2' => 'icon-banknote-2' ),
            array( 'icon-banknote-coins' => 'icon-banknote-coins' ),
            array( 'icon-banknotes-1' => 'icon-banknotes-1' ),
            array( 'icon-banknotes-2' => 'icon-banknotes-2' ),
            array( 'icon-bar-chart-board' => 'icon-bar-chart-board' ),
            array( 'icon-bar-chart-down' => 'icon-bar-chart-down' ),
            array( 'icon-bar-chart-search' => 'icon-bar-chart-search' ),
            array( 'icon-bar-chart-stats-down' => 'icon-bar-chart-stats-down' ),
            array( 'icon-bar-chart-stats-up' => 'icon-bar-chart-stats-up' ),
            array( 'icon-bar-chart-up' => 'icon-bar-chart-up' ),
            array( 'icon-bar-chart' => 'icon-bar-chart' ),
            array( 'icon-bill-1' => 'icon-bill-1' ),
            array( 'icon-bill-2' => 'icon-bill-2' ),
            array( 'icon-bitcoin' => 'icon-bitcoin' ),
            array( 'icon-briefcase' => 'icon-briefcase' ),
            array( 'icon-btcoin-circle' => 'icon-btcoin-circle' ),
            array( 'icon-calculator' => 'icon-calculator' ),
            array( 'icon-calendar-money' => 'icon-calendar-money' ),
            array( 'icon-cent-circle' => 'icon-cent-circle' ),
            array( 'icon-cent' => 'icon-cent' ),
            array( 'icon-coins-1' => 'icon-coins-1' ),
            array( 'icon-coins-2' => 'icon-coins-2' ),
            array( 'icon-coins-3' => 'icon-coins-3' ),
            array( 'icon-coins-4' => 'icon-coins-4' ),
            array( 'icon-credit-card-2' => 'icon-credit-card-2' ),
            array( 'icon-credit-card' => 'icon-credit-card' ),
            array( 'icon-currency-exchange' => 'icon-currency-exchange' ),
            array( 'icon-donut-chart-1' => 'icon-donut-chart-1' ),
            array( 'icon-donut-chart-2' => 'icon-donut-chart-2' ),
            array( 'icon-EUR-circle' => 'icon-EUR-circle' ),
            array( 'icon-EUR' => 'icon-EUR' ),
            array( 'icon-GBP-circle' => 'icon-GBP-circle' ),
            array( 'icon-GBP' => 'icon-GBP' ),
            array( 'icon-gold-1' => 'icon-gold-1' ),
            array( 'icon-gold-2' => 'icon-gold-2' ),
            array( 'icon-graph-2' => 'icon-graph-2' ),
            array( 'icon-graph-chart-board-down' => 'icon-graph-chart-board-down' ),
            array( 'icon-graph-chart-board-up' => 'icon-graph-chart-board-up' ),
            array( 'icon-graph-chart-board' => 'icon-graph-chart-board' ),
            array( 'icon-graph-down' => 'icon-graph-down' ),
            array( 'icon-graph-money' => 'icon-graph-money' ),
            array( 'icon-graph-up' => 'icon-graph-up' ),
            array( 'icon-graph' => 'icon-graph' ),
            array( 'icon-hand-banknote' => 'icon-hand-banknote' ),
            array( 'icon-hand-banknotes' => 'icon-hand-banknotes' ),
            array( 'icon-hand-bill-1' => 'icon-hand-bill-1' ),
            array( 'icon-hand-bill-2' => 'icon-hand-bill-2' ),
            array( 'icon-hand-coin' => 'icon-hand-coin' ),
            array( 'icon-hand-coins' => 'icon-hand-coins' ),
            array( 'icon-hand-credit-card' => 'icon-hand-credit-card' ),
            array( 'icon-JPY-circle' => 'icon-JPY-circle' ),
            array( 'icon-JPY' => 'icon-JPY' ),
            array( 'icon-money-bag-coins' => 'icon-money-bag-coins' ),
            array( 'icon-money-bag' => 'icon-money-bag' ),
            array( 'icon-money-bubble' => 'icon-money-bubble' ),
            array( 'icon-money-hierarchy' => 'icon-money-hierarchy' ),
            array( 'icon-networking' => 'icon-networking' ),
            array( 'icon-pie-chart-1' => 'icon-pie-chart-1' ),
            array( 'icon-pie-chart-2' => 'icon-pie-chart-2' ),
            array( 'icon-pie-chart-3' => 'icon-pie-chart-3' ),
            array( 'icon-pie-chart-board' => 'icon-pie-chart-board' ),
            array( 'icon-piggy-bank' => 'icon-piggy-bank' ),
            array( 'icon-presentation' => 'icon-presentation' ),
            array( 'icon-safe' => 'icon-safe' ),
            array( 'icon-search-money' => 'icon-search-money' ),
            array( 'icon-search-stats-1' => 'icon-search-stats-1' ),
            array( 'icon-send-money' => 'icon-send-money' ),
            array( 'icon-shacking-hands' => 'icon-shacking-hands' ),
            array( 'icon-stamp' => 'icon-stamp' ),
            array( 'icon-support' => 'icon-support' ),
            array( 'icon-target-1' => 'icon-target-1' ),
            array( 'icon-target-2' => 'icon-target-2' ),
            array( 'icon-target-3' => 'icon-target-3' ),
            array( 'icon-target-4' => 'icon-target-4' ),
            array( 'icon-target-money' => 'icon-target-money' ),
            array( 'icon-tasks-1' => 'icon-tasks-1' ),
            array( 'icon-tasks-2' => 'icon-tasks-2' ),
            array( 'icon-tasks-3' => 'icon-tasks-3' ),
            array( 'icon-tasks-checked' => 'icon-tasks-checked' ),
            array( 'icon-tie' => 'icon-tie' ),
            array( 'icon-time-money' => 'icon-time-money' ),
            array( 'icon-USD-circle' => 'icon-USD-circle' ),
            array( 'icon-USD' => 'icon-USD' ),
            array( 'icon-voucher' => 'icon-voucher' ),
            array( 'icon-workflow' => 'icon-workflow' ),
            array( 'icon-write-check' => 'icon-write-check' ),
            array( 'icon-airplay' => 'icon-airplay' ),
            array( 'icon-antena-1' => 'icon-antena-1' ),
            array( 'icon-antena-2' => 'icon-antena-2' ),
            array( 'icon-antena-3' => 'icon-antena-3' ),
            array( 'icon-bluetooth' => 'icon-bluetooth' ),
            array( 'icon-broadcast' => 'icon-broadcast' ),
            array( 'icon-cloud-backup' => 'icon-cloud-backup' ),
            array( 'icon-cloud-check' => 'icon-cloud-check' ),
            array( 'icon-cloud-download' => 'icon-cloud-download' ),
            array( 'icon-cloud-edit' => 'icon-cloud-edit' ),
            array( 'icon-cloud-error-2' => 'icon-cloud-error-2' ),
            array( 'icon-cloud-error' => 'icon-cloud-error' ),
            array( 'icon-cloud-help' => 'icon-cloud-help' ),
            array( 'icon-cloud-hosting' => 'icon-cloud-hosting' ),
            array( 'icon-cloud-locked' => 'icon-cloud-locked' ),
            array( 'icon-cloud-minus' => 'icon-cloud-minus' ),
            array( 'icon-cloud-music' => 'icon-cloud-music' ),
            array( 'icon-cloud-off' => 'icon-cloud-off' ),
            array( 'icon-cloud-plus' => 'icon-cloud-plus' ),
            array( 'icon-cloud-search' => 'icon-cloud-search' ),
            array( 'icon-cloud-settings' => 'icon-cloud-settings' ),
            array( 'icon-cloud-share' => 'icon-cloud-share' ),
            array( 'icon-cloud-sync' => 'icon-cloud-sync' ),
            array( 'icon-cloud-upload' => 'icon-cloud-upload' ),
            array( 'icon-cloud' => 'icon-cloud' ),
            array( 'icon-database-backup' => 'icon-database-backup' ),
            array( 'icon-database-check' => 'icon-database-check' ),
            array( 'icon-database-edit' => 'icon-database-edit' ),
            array( 'icon-database-error' => 'icon-database-error' ),
            array( 'icon-database-firewall' => 'icon-database-firewall' ),
            array( 'icon-database-locked' => 'icon-database-locked' ),
            array( 'icon-database-plus' => 'icon-database-plus' ),
            array( 'icon-database-refresh' => 'icon-database-refresh' ),
            array( 'icon-database-remove' => 'icon-database-remove' ),
            array( 'icon-database-search' => 'icon-database-search' ),
            array( 'icon-database-settings' => 'icon-database-settings' ),
            array( 'icon-database' => 'icon-database' ),
            array( 'icon-internet-block' => 'icon-internet-block' ),
            array( 'icon-internet-location' => 'icon-internet-location' ),
            array( 'icon-internet-lock' => 'icon-internet-lock' ),
            array( 'icon-internet-refresh' => 'icon-internet-refresh' ),
            array( 'icon-internet-search' => 'icon-internet-search' ),
            array( 'icon-internet-settings' => 'icon-internet-settings' ),
            array( 'icon-internet-time' => 'icon-internet-time' ),
            array( 'icon-internet' => 'icon-internet' ),
            array( 'icon-mobile-hotspot' => 'icon-mobile-hotspot' ),
            array( 'icon-network-desktop' => 'icon-network-desktop' ),
            array( 'icon-network-laptop' => 'icon-network-laptop' ),
            array( 'icon-network-smartphone' => 'icon-network-smartphone' ),
            array( 'icon-network' => 'icon-network' ),
            array( 'icon-satelite-signal' => 'icon-satelite-signal' ),
            array( 'icon-satelite' => 'icon-satelite' ),
            array( 'icon-server-backup' => 'icon-server-backup' ),
            array( 'icon-server-check' => 'icon-server-check' ),
            array( 'icon-server-edit' => 'icon-server-edit' ),
            array( 'icon-server-error' => 'icon-server-error' ),
            array( 'icon-server-firewall' => 'icon-server-firewall' ),
            array( 'icon-server-locked' => 'icon-server-locked' ),
            array( 'icon-server-plus' => 'icon-server-plus' ),
            array( 'icon-server-refresh' => 'icon-server-refresh' ),
            array( 'icon-server-remove' => 'icon-server-remove' ),
            array( 'icon-server-search' => 'icon-server-search' ),
            array( 'icon-server-settings' => 'icon-server-settings' ),
            array( 'icon-server' => 'icon-server' ),
            array( 'icon-signal-1' => 'icon-signal-1' ),
            array( 'icon-signal-2' => 'icon-signal-2' ),
            array( 'icon-signal-4' => 'icon-signal-4' ),
            array( 'icon-usb-1' => 'icon-usb-1' ),
            array( 'icon-usb-2' => 'icon-usb-2' ),
            array( 'icon-wifi-locked' => 'icon-wifi-locked' ),
            array( 'icon-wifi-tethering-off' => 'icon-wifi-tethering-off' ),
            array( 'icon-wifi-tethering' => 'icon-wifi-tethering' ),
            array( 'icon-wifi' => 'icon-wifi' ),
            array( 'icon-D-glasses' => 'icon-D-glasses' ),
            array( 'icon-armchair' => 'icon-armchair' ),
            array( 'icon-balloons' => 'icon-balloons' ),
            array( 'icon-baseball-1' => 'icon-baseball-1' ),
            array( 'icon-baseball-2' => 'icon-baseball-2' ),
            array( 'icon-basketball-2' => 'icon-basketball-2' ),
            array( 'icon-basketball' => 'icon-basketball' ),
            array( 'icon-binoculars' => 'icon-binoculars' ),
            array( 'icon-bow-arrow' => 'icon-bow-arrow' ),
            array( 'icon-bowling-1' => 'icon-bowling-1' ),
            array( 'icon-bowling-2' => 'icon-bowling-2' ),
            array( 'icon-chess-1' => 'icon-chess-1' ),
            array( 'icon-chess-2' => 'icon-chess-2' ),
            array( 'icon-couch' => 'icon-couch' ),
            array( 'icon-cutter' => 'icon-cutter' ),
            array( 'icon-diamond-1' => 'icon-diamond-1' ),
            array( 'icon-diamond-2' => 'icon-diamond-2' ),
            array( 'icon-diamond-ring' => 'icon-diamond-ring' ),
            array( 'icon-do-not-disturb' => 'icon-do-not-disturb' ),
            array( 'icon-dress' => 'icon-dress' ),
            array( 'icon-duck-toy' => 'icon-duck-toy' ),
            array( 'icon-fireworks' => 'icon-fireworks' ),
            array( 'icon-fishing' => 'icon-fishing' ),
            array( 'icon-fitness' => 'icon-fitness' ),
            array( 'icon-flashlight' => 'icon-flashlight' ),
            array( 'icon-football' => 'icon-football' ),
            array( 'icon-funnel' => 'icon-funnel' ),
            array( 'icon-gift' => 'icon-gift' ),
            array( 'icon-golf' => 'icon-golf' ),
            array( 'icon-guitar' => 'icon-guitar' ),
            array( 'icon-hammer' => 'icon-hammer' ),
            array( 'icon-hanger-1' => 'icon-hanger-1' ),
            array( 'icon-hanger-2' => 'icon-hanger-2' ),
            array( 'icon-hat-1' => 'icon-hat-1' ),
            array( 'icon-hat-2' => 'icon-hat-2' ),
            array( 'icon-hipster-glasses' => 'icon-hipster-glasses' ),
            array( 'icon-iron' => 'icon-iron' ),
            array( 'icon-kg' => 'icon-kg' ),
            array( 'icon-kite' => 'icon-kite' ),
            array( 'icon-lamp-1' => 'icon-lamp-1' ),
            array( 'icon-lamp-2' => 'icon-lamp-2' ),
            array( 'icon-lego-1' => 'icon-lego-1' ),
            array( 'icon-lego-2' => 'icon-lego-2' ),
            array( 'icon-magic-wand-3' => 'icon-magic-wand-3' ),
            array( 'icon-magic-wand-4' => 'icon-magic-wand-4' ),
            array( 'icon-origami-1' => 'icon-origami-1' ),
            array( 'icon-origami-2' => 'icon-origami-2' ),
            array( 'icon-pants' => 'icon-pants' ),
            array( 'icon-pingpong' => 'icon-pingpong' ),
            array( 'icon-pool' => 'icon-pool' ),
            array( 'icon-puzzle' => 'icon-puzzle' ),
            array( 'icon-razor' => 'icon-razor' ),
            array( 'icon-ribbon-bow' => 'icon-ribbon-bow' ),
            array( 'icon-safety-pin' => 'icon-safety-pin' ),
            array( 'icon-saw' => 'icon-saw' ),
            array( 'icon-screwdriver' => 'icon-screwdriver' ),
            array( 'icon-scuba' => 'icon-scuba' ),
            array( 'icon-shirt' => 'icon-shirt' ),
            array( 'icon-shoes' => 'icon-shoes' ),
            array( 'icon-shovel' => 'icon-shovel' ),
            array( 'icon-soccer-shoe' => 'icon-soccer-shoe' ),
            array( 'icon-soccer' => 'icon-soccer' ),
            array( 'icon-swimsuit' => 'icon-swimsuit' ),
            array( 'icon-swiss-knife' => 'icon-swiss-knife' ),
            array( 'icon-t-shirt' => 'icon-t-shirt' ),
            array( 'icon-umbrella-open' => 'icon-umbrella-open' ),
            array( 'icon-underwear' => 'icon-underwear' ),
            array( 'icon-volleyball' => 'icon-volleyball' ),
            array( 'icon-watering-can' => 'icon-watering-can' ),
            array( 'icon-wedding-rings' => 'icon-wedding-rings' ),
            array( 'icon-whistle' => 'icon-whistle' ),
            array( 'icon-wrench-1' => 'icon-wrench-1' ),
            array( 'icon-wrench-2' => 'icon-wrench-2' ),
            array( 'icon-wrench-3' => 'icon-wrench-3' ),
            array( 'icon-wrench-hammer' => 'icon-wrench-hammer' ),
            array( 'icon-wrench-screwdriver-1' => 'icon-wrench-screwdriver-1' ),
            array( 'icon-wrench-screwdriver-2' => 'icon-wrench-screwdriver-2' ),
            array( 'icon-gag' => 'icon-gag' ),
            array( 'icon-px' => 'icon-px' ),
            array( 'icon-after-effects' => 'icon-after-effects' ),
            array( 'icon-aim' => 'icon-aim' ),
            array( 'icon-airbnb' => 'icon-airbnb' ),
            array( 'icon-amazon' => 'icon-amazon' ),
            array( 'icon-android' => 'icon-android' ),
            array( 'icon-apple' => 'icon-apple' ),
            array( 'icon-audition' => 'icon-audition' ),
            array( 'icon-bebo' => 'icon-bebo' ),
            array( 'icon-behance' => 'icon-behance' ),
            array( 'icon-blogger' => 'icon-blogger' ),
            array( 'icon-bridge' => 'icon-bridge' ),
            array( 'icon-chrome' => 'icon-chrome' ),
            array( 'icon-codepen' => 'icon-codepen' ),
            array( 'icon-creativecloud' => 'icon-creativecloud' ),
            array( 'icon-creativemarket' => 'icon-creativemarket' ),
            array( 'icon-delicious' => 'icon-delicious' ),
            array( 'icon-deviantart' => 'icon-deviantart' ),
            array( 'icon-digg' => 'icon-digg' ),
            array( 'icon-dreamweaver' => 'icon-dreamweaver' ),
            array( 'icon-dribbble' => 'icon-dribbble' ),
            array( 'icon-drive' => 'icon-drive' ),
            array( 'icon-dropbox' => 'icon-dropbox' ),
            array( 'icon-envato' => 'icon-envato' ),
            array( 'icon-facebook-messanger' => 'icon-facebook-messanger' ),
            array( 'icon-facebook' => 'icon-facebook' ),
            array( 'icon-finder' => 'icon-finder' ),
            array( 'icon-firefox' => 'icon-firefox' ),
            array( 'icon-flash2' => 'icon-flash2' ),
            array( 'icon-flicr' => 'icon-flicr' ),
            array( 'icon-forrst' => 'icon-forrst' ),
            array( 'icon-foursquare' => 'icon-foursquare' ),
            array( 'icon-git' => 'icon-git' ),
            array( 'icon-google-play-1' => 'icon-google-play-1' ),
            array( 'icon-google-play-2' => 'icon-google-play-2' ),
            array( 'icon-google-plus' => 'icon-google-plus' ),
            array( 'icon-hangouts' => 'icon-hangouts' ),
            array( 'icon-illustrator' => 'icon-illustrator' ),
            array( 'icon-inbox2' => 'icon-inbox2' ),
            array( 'icon-indesign' => 'icon-indesign' ),
            array( 'icon-inspect' => 'icon-inspect' ),
            array( 'icon-instagram' => 'icon-instagram' ),
            array( 'icon-kickstarter' => 'icon-kickstarter' ),
            array( 'icon-lastfm' => 'icon-lastfm' ),
            array( 'icon-linkedin' => 'icon-linkedin' ),
            array( 'icon-opera' => 'icon-opera' ),
            array( 'icon-osx' => 'icon-osx' ),
            array( 'icon-paypal' => 'icon-paypal' ),
            array( 'icon-penterest' => 'icon-penterest' ),
            array( 'icon-photoshop' => 'icon-photoshop' ),
            array( 'icon-picasa' => 'icon-picasa' ),
            array( 'icon-prelude' => 'icon-prelude' ),
            array( 'icon-premiere-pro' => 'icon-premiere-pro' ),
            array( 'icon-rdio' => 'icon-rdio' ),
            array( 'icon-reddit' => 'icon-reddit' ),
            array( 'icon-rss' => 'icon-rss' ),
            array( 'icon-safari' => 'icon-safari' ),
            array( 'icon-skype' => 'icon-skype' ),
            array( 'icon-soundcloud' => 'icon-soundcloud' ),
            array( 'icon-spotify' => 'icon-spotify' ),
            array( 'icon-squarespace' => 'icon-squarespace' ),
            array( 'icon-stumble-upon' => 'icon-stumble-upon' ),
            array( 'icon-tumblr' => 'icon-tumblr' ),
            array( 'icon-twitter' => 'icon-twitter' ),
            array( 'icon-vimeo-1' => 'icon-vimeo-1' ),
            array( 'icon-vimeo-2' => 'icon-vimeo-2' ),
            array( 'icon-vk' => 'icon-vk' ),
            array( 'icon-watsup' => 'icon-watsup' ),
            array( 'icon-wikipedia' => 'icon-wikipedia' ),
            array( 'icon-windows' => 'icon-windows' ),
            array( 'icon-wordpress' => 'icon-wordpress' ),
            array( 'icon-xing' => 'icon-xing' ),
            array( 'icon-yahoo' => 'icon-yahoo' ),
            array( 'icon-youtube' => 'icon-youtube' ),
            array( 'icon-zerply' => 'icon-zerply' ),
            array( 'icon-alarm-add' => 'icon-alarm-add' ),
            array( 'icon-alarm-off' => 'icon-alarm-off' ),
            array( 'icon-alarm-on' => 'icon-alarm-on' ),
            array( 'icon-alarm' => 'icon-alarm' ),
            array( 'icon-calendar-2' => 'icon-calendar-2' ),
            array( 'icon-calendar-check' => 'icon-calendar-check' ),
            array( 'icon-calendar-date-2' => 'icon-calendar-date-2' ),
            array( 'icon-calendar-date' => 'icon-calendar-date' ),
            array( 'icon-calendar-time' => 'icon-calendar-time' ),
            array( 'icon-calendar' => 'icon-calendar' ),
            array( 'icon-clock-2' => 'icon-clock-2' ),
            array( 'icon-clock' => 'icon-clock' ),
            array( 'icon-compass-2' => 'icon-compass-2' ),
            array( 'icon-compass' => 'icon-compass' ),
            array( 'icon-direction' => 'icon-direction' ),
            array( 'icon-directions-1' => 'icon-directions-1' ),
            array( 'icon-directions-2' => 'icon-directions-2' ),
            array( 'icon-distance-1' => 'icon-distance-1' ),
            array( 'icon-distance-2' => 'icon-distance-2' ),
            array( 'icon-fast-delivery' => 'icon-fast-delivery' ),
            array( 'icon-gps-location' => 'icon-gps-location' ),
            array( 'icon-history' => 'icon-history' ),
            array( 'icon-hourglass-1' => 'icon-hourglass-1' ),
            array( 'icon-hourglass-2' => 'icon-hourglass-2' ),
            array( 'icon-hourglass-reverse' => 'icon-hourglass-reverse' ),
            array( 'icon-infinite-loop' => 'icon-infinite-loop' ),
            array( 'icon-infinite' => 'icon-infinite' ),
            array( 'icon-location-1-off' => 'icon-location-1-off' ),
            array( 'icon-location-1-on' => 'icon-location-1-on' ),
            array( 'icon-location-1-search' => 'icon-location-1-search' ),
            array( 'icon-location-2-add' => 'icon-location-2-add' ),
            array( 'icon-location-2-check' => 'icon-location-2-check' ),
            array( 'icon-location-2-delete' => 'icon-location-2-delete' ),
            array( 'icon-location-2-off' => 'icon-location-2-off' ),
            array( 'icon-location-2-remove' => 'icon-location-2-remove' ),
            array( 'icon-location-2' => 'icon-location-2' ),
            array( 'icon-location-3' => 'icon-location-3' ),
            array( 'icon-location-4' => 'icon-location-4' ),
            array( 'icon-map-2' => 'icon-map-2' ),
            array( 'icon-map-location-1' => 'icon-map-location-1' ),
            array( 'icon-map-location-2' => 'icon-map-location-2' ),
            array( 'icon-map-location-3' => 'icon-map-location-3' ),
            array( 'icon-map-location-4' => 'icon-map-location-4' ),
            array( 'icon-map-timezone' => 'icon-map-timezone' ),
            array( 'icon-map' => 'icon-map' ),
            array( 'icon-navigation-1' => 'icon-navigation-1' ),
            array( 'icon-navigation-2' => 'icon-navigation-2' ),
            array( 'icon-phone-location' => 'icon-phone-location' ),
            array( 'icon-street-location' => 'icon-street-location' ),
            array( 'icon-street-view' => 'icon-street-view' ),
            array( 'icon-timer-1' => 'icon-timer-1' ),
            array( 'icon-timer-2' => 'icon-timer-2' ),
            array( 'icon-wind-direction' => 'icon-wind-direction' ),
            array( 'icon-wrist-watch' => 'icon-wrist-watch' ),
            array( 'icon-anchor' => 'icon-anchor' ),
            array( 'icon-bicycle' => 'icon-bicycle' ),
            array( 'icon-bicycling' => 'icon-bicycling' ),
            array( 'icon-boat-1' => 'icon-boat-1' ),
            array( 'icon-boat-2' => 'icon-boat-2' ),
            array( 'icon-bus-wifi' => 'icon-bus-wifi' ),
            array( 'icon-bus' => 'icon-bus' ),
            array( 'icon-cable-ski' => 'icon-cable-ski' ),
            array( 'icon-car-2' => 'icon-car-2' ),
            array( 'icon-car-battery' => 'icon-car-battery' ),
            array( 'icon-car-key' => 'icon-car-key' ),
            array( 'icon-car-parking' => 'icon-car-parking' ),
            array( 'icon-car-service' => 'icon-car-service' ),
            array( 'icon-car-wash' => 'icon-car-wash' ),
            array( 'icon-car-wifi' => 'icon-car-wifi' ),
            array( 'icon-car' => 'icon-car' ),
            array( 'icon-cog' => 'icon-cog' ),
            array( 'icon-construction-barricade' => 'icon-construction-barricade' ),
            array( 'icon-construction-cone' => 'icon-construction-cone' ),
            array( 'icon-directions' => 'icon-directions' ),
            array( 'icon-elevator-1' => 'icon-elevator-1' ),
            array( 'icon-elevator-2' => 'icon-elevator-2' ),
            array( 'icon-escalator-down' => 'icon-escalator-down' ),
            array( 'icon-escalator-up' => 'icon-escalator-up' ),
            array( 'icon-flight-land' => 'icon-flight-land' ),
            array( 'icon-flight-takeoff' => 'icon-flight-takeoff' ),
            array( 'icon-forklift' => 'icon-forklift' ),
            array( 'icon-fuel' => 'icon-fuel' ),
            array( 'icon-garage' => 'icon-garage' ),
            array( 'icon-gas-station' => 'icon-gas-station' ),
            array( 'icon-gearbox' => 'icon-gearbox' ),
            array( 'icon-helicopter' => 'icon-helicopter' ),
            array( 'icon-helmet-1' => 'icon-helmet-1' ),
            array( 'icon-helmet-2' => 'icon-helmet-2' ),
            array( 'icon-kids-scooter' => 'icon-kids-scooter' ),
            array( 'icon-motorcycle' => 'icon-motorcycle' ),
            array( 'icon-off-roader' => 'icon-off-roader' ),
            array( 'icon-pickup-truck' => 'icon-pickup-truck' ),
            array( 'icon-racing-flag' => 'icon-racing-flag' ),
            array( 'icon-road' => 'icon-road' ),
            array( 'icon-rudder' => 'icon-rudder' ),
            array( 'icon-scooter' => 'icon-scooter' ),
            array( 'icon-ship' => 'icon-ship' ),
            array( 'icon-speedometer' => 'icon-speedometer' ),
            array( 'icon-stairs-down' => 'icon-stairs-down' ),
            array( 'icon-stairs-up' => 'icon-stairs-up' ),
            array( 'icon-supercar' => 'icon-supercar' ),
            array( 'icon-taxi-1' => 'icon-taxi-1' ),
            array( 'icon-taxi-2' => 'icon-taxi-2' ),
            array( 'icon-tractor' => 'icon-tractor' ),
            array( 'icon-traffic-light' => 'icon-traffic-light' ),
            array( 'icon-trailer' => 'icon-trailer' ),
            array( 'icon-train-1' => 'icon-train-1' ),
            array( 'icon-train-2' => 'icon-train-2' ),
            array( 'icon-train-wifi' => 'icon-train-wifi' ),
            array( 'icon-tram' => 'icon-tram' ),
            array( 'icon-truck' => 'icon-truck' ),
            array( 'icon-van' => 'icon-van' ),
            array( 'icon-wagon' => 'icon-wagon' ),
            array( 'icon-aids' => 'icon-aids' ),
            array( 'icon-ambulance' => 'icon-ambulance' ),
            array( 'icon-bandage-1' => 'icon-bandage-1' ),
            array( 'icon-bandage-2' => 'icon-bandage-2' ),
            array( 'icon-blood-1' => 'icon-blood-1' ),
            array( 'icon-blood-2' => 'icon-blood-2' ),
            array( 'icon-brain' => 'icon-brain' ),
            array( 'icon-cardio' => 'icon-cardio' ),
            array( 'icon-cross-circle' => 'icon-cross-circle' ),
            array( 'icon-cross-rectangle' => 'icon-cross-rectangle' ),
            array( 'icon-DNA' => 'icon-DNA' ),
            array( 'icon-drugs' => 'icon-drugs' ),
            array( 'icon-emergency-call' => 'icon-emergency-call' ),
            array( 'icon-emergency' => 'icon-emergency' ),
            array( 'icon-first-aid' => 'icon-first-aid' ),
            array( 'icon-fitness-app' => 'icon-fitness-app' ),
            array( 'icon-handicap' => 'icon-handicap' ),
            array( 'icon-healthcare' => 'icon-healthcare' ),
            array( 'icon-heart-beat' => 'icon-heart-beat' ),
            array( 'icon-hospital-building' => 'icon-hospital-building' ),
            array( 'icon-hospital-circle' => 'icon-hospital-circle' ),
            array( 'icon-hospital-home' => 'icon-hospital-home' ),
            array( 'icon-hospital-square' => 'icon-hospital-square' ),
            array( 'icon-medical-book' => 'icon-medical-book' ),
            array( 'icon-medical-folder' => 'icon-medical-folder' ),
            array( 'icon-medical-tests' => 'icon-medical-tests' ),
            array( 'icon-microscope' => 'icon-microscope' ),
            array( 'icon-ointment' => 'icon-ointment' ),
            array( 'icon-paramedic' => 'icon-paramedic' ),
            array( 'icon-pharmacy' => 'icon-pharmacy' ),
            array( 'icon-pill-2' => 'icon-pill-2' ),
            array( 'icon-pill-3' => 'icon-pill-3' ),
            array( 'icon-pill' => 'icon-pill' ),
            array( 'icon-pulse' => 'icon-pulse' ),
            array( 'icon-spermatosoid' => 'icon-spermatosoid' ),
            array( 'icon-stethoscope' => 'icon-stethoscope' ),
            array( 'icon-stretcher' => 'icon-stretcher' ),
            array( 'icon-surgical-knife' => 'icon-surgical-knife' ),
            array( 'icon-surgical-scissors' => 'icon-surgical-scissors' ),
            array( 'icon-syringe' => 'icon-syringe' ),
            array( 'icon-teeth-care' => 'icon-teeth-care' ),
            array( 'icon-test-tube-2' => 'icon-test-tube-2' ),
            array( 'icon-test-tube' => 'icon-test-tube' ),
            array( 'icon-thermometer-1' => 'icon-thermometer-1' ),
            array( 'icon-toilet-paper' => 'icon-toilet-paper' ),
            array( 'icon-tooth' => 'icon-tooth' ),
            array( 'icon-weight' => 'icon-weight' ),
            array( 'icon-alien' => 'icon-alien' ),
            array( 'icon-biohazard' => 'icon-biohazard' ),
            array( 'icon-bird' => 'icon-bird' ),
            array( 'icon-birdhouse' => 'icon-birdhouse' ),
            array( 'icon-butterfly' => 'icon-butterfly' ),
            array( 'icon-casino-chip' => 'icon-casino-chip' ),
            array( 'icon-coffin' => 'icon-coffin' ),
            array( 'icon-controller-1' => 'icon-controller-1' ),
            array( 'icon-controller-2' => 'icon-controller-2' ),
            array( 'icon-controller-3' => 'icon-controller-3' ),
            array( 'icon-crossed-bones' => 'icon-crossed-bones' ),
            array( 'icon-day-night' => 'icon-day-night' ),
            array( 'icon-death' => 'icon-death' ),
            array( 'icon-dice' => 'icon-dice' ),
            array( 'icon-dream-house' => 'icon-dream-house' ),
            array( 'icon-eco-house' => 'icon-eco-house' ),
            array( 'icon-emoticon-grin' => 'icon-emoticon-grin' ),
            array( 'icon-emoticon-smile' => 'icon-emoticon-smile' ),
            array( 'icon-emoticon' => 'icon-emoticon' ),
            array( 'icon-exit' => 'icon-exit' ),
            array( 'icon-fence' => 'icon-fence' ),
            array( 'icon-fir-tree-1' => 'icon-fir-tree-1' ),
            array( 'icon-fir-tree-2' => 'icon-fir-tree-2' ),
            array( 'icon-fire-1' => 'icon-fire-1' ),
            array( 'icon-ghost' => 'icon-ghost' ),
            array( 'icon-hanging' => 'icon-hanging' ),
            array( 'icon-happy-mask' => 'icon-happy-mask' ),
            array( 'icon-hipster-1' => 'icon-hipster-1' ),
            array( 'icon-hipster-2' => 'icon-hipster-2' ),
            array( 'icon-house-fire' => 'icon-house-fire' ),
            array( 'icon-house-lightening' => 'icon-house-lightening' ),
            array( 'icon-house-search' => 'icon-house-search' ),
            array( 'icon-incognito' => 'icon-incognito' ),
            array( 'icon-labyrinth-1' => 'icon-labyrinth-1' ),
            array( 'icon-labyrinth-2' => 'icon-labyrinth-2' ),
            array( 'icon-leaf' => 'icon-leaf' ),
            array( 'icon-lighthouse' => 'icon-lighthouse' ),
            array( 'icon-love' => 'icon-love' ),
            array( 'icon-middle-finger' => 'icon-middle-finger' ),
            array( 'icon-moon' => 'icon-moon' ),
            array( 'icon-moustache' => 'icon-moustache' ),
            array( 'icon-no-smoking' => 'icon-no-smoking' ),
            array( 'icon-pacman' => 'icon-pacman' ),
            array( 'icon-plant' => 'icon-plant' ),
            array( 'icon-playing-cards' => 'icon-playing-cards' ),
            array( 'icon-poison' => 'icon-poison' ),
            array( 'icon-pong' => 'icon-pong' ),
            array( 'icon-poo' => 'icon-poo' ),
            array( 'icon-pool-1' => 'icon-pool-1' ),
            array( 'icon-radioactive' => 'icon-radioactive' ),
            array( 'icon-recycle' => 'icon-recycle' ),
            array( 'icon-robot-1' => 'icon-robot-1' ),
            array( 'icon-robot-2' => 'icon-robot-2' ),
            array( 'icon-rock' => 'icon-rock' ),
            array( 'icon-run' => 'icon-run' ),
            array( 'icon-sad-mask' => 'icon-sad-mask' ),
            array( 'icon-scythe' => 'icon-scythe' ),
            array( 'icon-shooting-star' => 'icon-shooting-star' ),
            array( 'icon-skull' => 'icon-skull' ),
            array( 'icon-smoking' => 'icon-smoking' ),
            array( 'icon-snowflake' => 'icon-snowflake' ),
            array( 'icon-snowman' => 'icon-snowman' ),
            array( 'icon-steps' => 'icon-steps' ),
            array( 'icon-sun' => 'icon-sun' ),
            array( 'icon-tetris' => 'icon-tetris' ),
            array( 'icon-theatre-masks' => 'icon-theatre-masks' ),
            array( 'icon-tombstone' => 'icon-tombstone' ),
            array( 'icon-tree' => 'icon-tree' ),
            array( 'icon-ufo' => 'icon-ufo' ),
            array( 'icon-unicorn' => 'icon-unicorn' ),
            array( 'icon-vigilante' => 'icon-vigilante' ),
            array( 'icon-wall' => 'icon-wall' ),
            array( 'icon-wheat' => 'icon-wheat' ),
            array( 'icon-account-book-1' => 'icon-account-book-1' ),
            array( 'icon-account-book-female' => 'icon-account-book-female' ),
            array( 'icon-account-book-male' => 'icon-account-book-male' ),
            array( 'icon-contacts' => 'icon-contacts' ),
            array( 'icon-female-sign' => 'icon-female-sign' ),
            array( 'icon-head-brainstorming' => 'icon-head-brainstorming' ),
            array( 'icon-head-idea' => 'icon-head-idea' ),
            array( 'icon-head-money' => 'icon-head-money' ),
            array( 'icon-head-question' => 'icon-head-question' ),
            array( 'icon-head-search' => 'icon-head-search' ),
            array( 'icon-head-settings' => 'icon-head-settings' ),
            array( 'icon-head-speech' => 'icon-head-speech' ),
            array( 'icon-head-time' => 'icon-head-time' ),
            array( 'icon-head' => 'icon-head' ),
            array( 'icon-ID-card' => 'icon-ID-card' ),
            array( 'icon-male-sign' => 'icon-male-sign' ),
            array( 'icon-people-female' => 'icon-people-female' ),
            array( 'icon-people-idea' => 'icon-people-idea' ),
            array( 'icon-people-male' => 'icon-people-male' ),
            array( 'icon-people-money' => 'icon-people-money' ),
            array( 'icon-people-question' => 'icon-people-question' ),
            array( 'icon-people-speech-1' => 'icon-people-speech-1' ),
            array( 'icon-people-speech-2' => 'icon-people-speech-2' ),
            array( 'icon-people-target' => 'icon-people-target' ),
            array( 'icon-people-time' => 'icon-people-time' ),
            array( 'icon-people' => 'icon-people' ),
            array( 'icon-public-speaking' => 'icon-public-speaking' ),
            array( 'icon-rolodex-2' => 'icon-rolodex-2' ),
            array( 'icon-rolodex' => 'icon-rolodex' ),
            array( 'icon-team-1' => 'icon-team-1' ),
            array( 'icon-team-2' => 'icon-team-2' ),
            array( 'icon-team-3' => 'icon-team-3' ),
            array( 'icon-team-hierarchy' => 'icon-team-hierarchy' ),
            array( 'icon-useer-female-picture' => 'icon-useer-female-picture' ),
            array( 'icon-useer-male-picture' => 'icon-useer-male-picture' ),
            array( 'icon-user-add' => 'icon-user-add' ),
            array( 'icon-user-check' => 'icon-user-check' ),
            array( 'icon-user-circle' => 'icon-user-circle' ),
            array( 'icon-user-delete' => 'icon-user-delete' ),
            array( 'icon-user-female-add' => 'icon-user-female-add' ),
            array( 'icon-user-female-check' => 'icon-user-female-check' ),
            array( 'icon-user-female-circle' => 'icon-user-female-circle' ),
            array( 'icon-user-female-delete' => 'icon-user-female-delete' ),
            array( 'icon-user-female-edit' => 'icon-user-female-edit' ),
            array( 'icon-user-female-options' => 'icon-user-female-options' ),
            array( 'icon-user-female-picture-add' => 'icon-user-female-picture-add' ),
            array( 'icon-user-female-pictures' => 'icon-user-female-pictures' ),
            array( 'icon-user-female-portrait' => 'icon-user-female-portrait' ),
            array( 'icon-user-female-profile' => 'icon-user-female-profile' ),
            array( 'icon-user-female-settings' => 'icon-user-female-settings' ),
            array( 'icon-user-female-speech-1' => 'icon-user-female-speech-1' ),
            array( 'icon-user-female-speech-2' => 'icon-user-female-speech-2' ),
            array( 'icon-user-female' => 'icon-user-female' ),
            array( 'icon-user-male-add' => 'icon-user-male-add' ),
            array( 'icon-user-male-check' => 'icon-user-male-check' ),
            array( 'icon-user-male-circle' => 'icon-user-male-circle' ),
            array( 'icon-user-male-delete' => 'icon-user-male-delete' ),
            array( 'icon-user-male-edit' => 'icon-user-male-edit' ),
            array( 'icon-user-male-options' => 'icon-user-male-options' ),
            array( 'icon-user-male-picture-add' => 'icon-user-male-picture-add' ),
            array( 'icon-user-male-pictures' => 'icon-user-male-pictures' ),
            array( 'icon-user-male-portrait' => 'icon-user-male-portrait' ),
            array( 'icon-user-male-profile' => 'icon-user-male-profile' ),
            array( 'icon-user-male-settings' => 'icon-user-male-settings' ),
            array( 'icon-user-male-speech-1' => 'icon-user-male-speech-1' ),
            array( 'icon-user-male-speech-2' => 'icon-user-male-speech-2' ),
            array( 'icon-user-male' => 'icon-user-male' ),
            array( 'icon-user-picture-1' => 'icon-user-picture-1' ),
            array( 'icon-user-picture-2' => 'icon-user-picture-2' ),
            array( 'icon-user-picture-add' => 'icon-user-picture-add' ),
            array( 'icon-user-profile-1' => 'icon-user-profile-1' ),
            array( 'icon-user-profile-2' => 'icon-user-profile-2' ),
            array( 'icon-user-search-2' => 'icon-user-search-2' ),
            array( 'icon-user-target' => 'icon-user-target' ),
            array( 'icon-user' => 'icon-user' ),
            array( 'icon-users-male-female' => 'icon-users-male-female' ),
            array( 'icon-users-male' => 'icon-users-male' ),
            array( 'icon-users' => 'icon-users' ),
            array( 'icon-VIP-card' => 'icon-VIP-card' ),
            array( 'icon-badge-1' => 'icon-badge-1' ),
            array( 'icon-badge-2' => 'icon-badge-2' ),
            array( 'icon-crown' => 'icon-crown' ),
            array( 'icon-diploma-1' => 'icon-diploma-1' ),
            array( 'icon-diploma-2' => 'icon-diploma-2' ),
            array( 'icon-diploma-3' => 'icon-diploma-3' ),
            array( 'icon-flag-1' => 'icon-flag-1' ),
            array( 'icon-flag-2' => 'icon-flag-2' ),
            array( 'icon-flag-3' => 'icon-flag-3' ),
            array( 'icon-flag-4' => 'icon-flag-4' ),
            array( 'icon-heart-broken' => 'icon-heart-broken' ),
            array( 'icon-heart' => 'icon-heart' ),
            array( 'icon-hearts' => 'icon-hearts' ),
            array( 'icon-like-2' => 'icon-like-2' ),
            array( 'icon-like' => 'icon-like' ),
            array( 'icon-medal-1' => 'icon-medal-1' ),
            array( 'icon-medal-2' => 'icon-medal-2' ),
            array( 'icon-medal-3' => 'icon-medal-3' ),
            array( 'icon-medal-4' => 'icon-medal-4' ),
            array( 'icon-medal-5' => 'icon-medal-5' ),
            array( 'icon-medal-6' => 'icon-medal-6' ),
            array( 'icon-olympic-torch' => 'icon-olympic-torch' ),
            array( 'icon-podium' => 'icon-podium' ),
            array( 'icon-star-circle' => 'icon-star-circle' ),
            array( 'icon-star-plus' => 'icon-star-plus' ),
            array( 'icon-star' => 'icon-star' ),
            array( 'icon-trophy-1' => 'icon-trophy-1' ),
            array( 'icon-trophy-2' => 'icon-trophy-2' ),
            array( 'icon-trophy-3' => 'icon-trophy-3' ),
            array( 'icon-unlike-2' => 'icon-unlike-2' ),
            array( 'icon-unlike' => 'icon-unlike' ),
            array( 'icon-verification' => 'icon-verification' ),
            array( 'icon-votes-2' => 'icon-votes-2' ),
            array( 'icon-votes' => 'icon-votes' ),
            array( 'icon-binary-code' => 'icon-binary-code' ),
            array( 'icon-bug-fixed' => 'icon-bug-fixed' ),
            array( 'icon-bug-search' => 'icon-bug-search' ),
            array( 'icon-bug' => 'icon-bug' ),
            array( 'icon-code-1' => 'icon-code-1' ),
            array( 'icon-code-2' => 'icon-code-2' ),
            array( 'icon-code-3' => 'icon-code-3' ),
            array( 'icon-CPU-overclock' => 'icon-CPU-overclock' ),
            array( 'icon-CPU' => 'icon-CPU' ),
            array( 'icon-firewall-1' => 'icon-firewall-1' ),
            array( 'icon-firewall-allert' => 'icon-firewall-allert' ),
            array( 'icon-firewall-block' => 'icon-firewall-block' ),
            array( 'icon-firewall-disable' => 'icon-firewall-disable' ),
            array( 'icon-firewall-done' => 'icon-firewall-done' ),
            array( 'icon-firewall-help' => 'icon-firewall-help' ),
            array( 'icon-firewall-refresh' => 'icon-firewall-refresh' ),
            array( 'icon-firewall-star' => 'icon-firewall-star' ),
            array( 'icon-firewall' => 'icon-firewall' ),
            array( 'icon-hierarchy-structure-1' => 'icon-hierarchy-structure-1' ),
            array( 'icon-hierarchy-structure-2' => 'icon-hierarchy-structure-2' ),
            array( 'icon-hierarchy-structure-3' => 'icon-hierarchy-structure-3' ),
            array( 'icon-hierarchy-structure-4' => 'icon-hierarchy-structure-4' ),
            array( 'icon-hierarchy-structure-5' => 'icon-hierarchy-structure-5' ),
            array( 'icon-hierarchy-structure-6' => 'icon-hierarchy-structure-6' ),
            array( 'icon-html-5' => 'icon-html-5' ),
            array( 'icon-link-1-add' => 'icon-link-1-add' ),
            array( 'icon-link-1-broken' => 'icon-link-1-broken' ),
            array( 'icon-link-1-remove' => 'icon-link-1-remove' ),
            array( 'icon-link-1' => 'icon-link-1' ),
            array( 'icon-link-2-broken' => 'icon-link-2-broken' ),
            array( 'icon-link-2' => 'icon-link-2' ),
            array( 'icon-link-3-broken' => 'icon-link-3-broken' ),
            array( 'icon-link-3' => 'icon-link-3' ),
            array( 'icon-search-stats' => 'icon-search-stats' ),
            array( 'icon-window-404' => 'icon-window-404' ),
            array( 'icon-window-binary-code' => 'icon-window-binary-code' ),
            array( 'icon-window-bookmark' => 'icon-window-bookmark' ),
            array( 'icon-window-code' => 'icon-window-code' ),
            array( 'icon-window-console' => 'icon-window-console' ),
            array( 'icon-window-content' => 'icon-window-content' ),
            array( 'icon-window-cursor' => 'icon-window-cursor' ),
            array( 'icon-window-edit' => 'icon-window-edit' ),
            array( 'icon-window-layout' => 'icon-window-layout' ),
            array( 'icon-window-loading' => 'icon-window-loading' ),
            array( 'icon-window-lock' => 'icon-window-lock' ),
            array( 'icon-window-refresh' => 'icon-window-refresh' ),
            array( 'icon-window-search' => 'icon-window-search' ),
            array( 'icon-window-settings' => 'icon-window-settings' ),
            array( 'icon-window-user' => 'icon-window-user' ),
            array( 'icon-window' => 'icon-window' ),
            array( 'icon-windows-open' => 'icon-windows-open' ),
        );
    }
}