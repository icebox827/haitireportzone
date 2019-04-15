<?php
/*************************
Start subscription widget
*************************/
class pantograph_subscription_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'PantoGraph_subscription', // Base ID
      esc_html__('PantoGraph Subscription', 'pantograph'), // Name
      array( 'description' => esc_html__( 'Displays PantoGraph subscription', 'pantograph' ), ) // Args
    );
  }


      /*-------------------------------------------------------
       *        Front-end display of widget
       *-------------------------------------------------------*/


  public function widget( $args, $instance ) {
	  extract($args);
	  $title = isset($instance['title']) ? $instance['title'] : '';
      $widget_title_color = isset($instance['widget_title_color']) ? $instance['widget_title_color'] : '';
	  $widget_title_background_color = isset($instance['widget_title_background_color']) ? $instance['widget_title_background_color'] : '';
	  $subscription_bg = isset($instance['subscription_bg']) ? $instance['subscription_bg'] : '';
      $margintop = isset($instance['margintop']) ? $instance['margintop'] : '';
	  $marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '';
      $current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
  ?>
  <div class="side-widget subscription<?php echo esc_attr($current_time); ?>" style="<?php if($margintop != ''){ echo 'margin-top:'.esc_attr($margintop).';'; } if($marginbottom != ''){ echo 'margin-bottom:'.esc_attr($marginbottom).';'; } ?>">
  <?php if($title){ ?>
  <h4><span class="sh-text"><?php echo esc_attr($title); ?></span></h4>
  <?php } ?>
  <div class="side-newsletter text-center">
		<p><?php esc_html_e("Get the best viral stories straight into your inbox!", "pantograph");?></p>
  <?php if(pantograph_get_option('ft_aweber_listid') != '') { ?>
  <form method="post" action="https://www.aweber.com/scripts/addlead.pl">
		<input type="hidden" name="redirect" value="<?php esc_url( pantograph_get_option('aweber_redirectpage') ) ?>" />
		<input type="hidden" name="meta_redirect_onlist" value="<?php esc_url( pantograph_get_option('aweber_redirectpage_old') ) ?>" />
		<input type="hidden" name="meta_message" value="<?php esc_html_e('1', 'pantograph');?>" /> 
		<input type="hidden" name="meta_required" value="<?php esc_html_e('email', 'pantograph');?>" />
		<input name="email" class="e-mail" id="samplees" placeholder="<?php esc_html_e('Your email address', 'pantograph');?>" type="text" required />
		<button type="submit"><?php esc_html_e('Sign up', 'pantograph');?></button>
  </form>
  <?php } elseif (pantograph_get_option('mailchimp_apikey') != ''){ ?>
  <form id="footer_signup" action="<?php echo get_template_directory_uri();?>/subscribe/subscribe.php" method="post">
		<input name="email" class="e-mail" id="email" placeholder="<?php esc_html_e('Your email address', 'pantograph');?>" type="email" required />
		<button type="submit"><?php esc_html_e('Sign up', 'pantograph');?></button>
	  <div id="footer_response" class="result"></div>
	</form>
	
  <?php } else { ?>
 <form method="post" action="#">
		<input type="hidden" name="redirect" value="<?php esc_url( pantograph_get_option('aweber_redirectpage') ) ?>" />
		<input type="hidden" name="meta_redirect_onlist" value="<?php esc_url( pantograph_get_option('aweber_redirectpage_old') ) ?>" />
		<input type="hidden" name="meta_message" value="<?php esc_html_e('1', 'pantograph');?>" /> 
		<input type="hidden" name="meta_required" value="<?php esc_html_e('email', 'pantograph');?>" />
		<input name="email" class="e-mail" id="samplees" placeholder="<?php esc_html_e('Your email address', 'pantograph');?>" type="email" required />
		<button type="submit"><?php esc_html_e('Sign up', 'pantograph');?></button>
  </form>
  <?php } ?>
		<span><?php esc_html_e("Don't worry we don't spam", "pantograph");?></span>
	</div>
  </div>
		<style>
		<?php if($subscription_bg){ ?>
		.subscription<?php echo esc_attr($current_time); ?> .side-newsletter{
			background: <?php echo esc_attr($subscription_bg); ?>!important;
		}
		<?php } ?>
		<?php 
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		if(($widget_title_color) || ($widget_title_background_color)){
		$custom_css="";
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.subscription$current_time h4{
					color: {$widget_title_color}!important;
					border: 1px solid {$widget_title_background_color}!important;
				}
				.subscription$current_time h4 span.sh-text:before{
					background: {$widget_title_background_color}!important;
				}
				.subscription$current_time h4:before:before{
					background: {$widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.subscription$current_time h4{
					color: {$widget_title_color}!important;
					border-bottom: 4px solid  {$widget_title_background_color}!important;
				}
				
				.sh-text a.rsswidget:hover {
					color: {$widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.subscription$current_time h4{
					color: {$widget_title_color}!important;
					background-color: {$widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.subscription$current_time h4{
					color: {$widget_title_color}!important;
					border-top: 4px solid {$widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.subscription$current_time h4 span.sh-text{
					color: {$widget_title_color}!important;
					background-color: {$widget_title_background_color}!important;
				}
				.subscription$current_time h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				.subscription$current_time h4 span.sh-text{
					color: {$widget_title_color}!important;
					background-color: {$widget_title_background_color}!important;
				}
				.subscription$current_time h4 {
					border-top: 3px solid {$widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.subscription$current_time h4 span.sh-text{
					color: {$widget_title_color}!important;
					background-color: {$widget_title_background_color}!important;
				}
				.subscription$current_time h4 span.sh-text:after {
					border-bottom: 31px solid {$widget_title_background_color}!important;
				}
				.subscription$current_time h4{
					border-bottom: 3px solid {$widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.subscription$current_time .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.subscription$current_time h4 span.sh-text {
					    background-color: {$widget_title_background_color}!important;
						color: {$widget_title_color}!important;
				}
				.subscription$current_time h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.subscription$current_time h4 span.sh-text{
					color: {$widget_title_color}!important;
					background-color: {$widget_title_background_color}!important;
				}
				.subscription$current_time h4 span.sh-text:before {
					border-top-color: {$widget_title_background_color}!important;
					border-top: 10px solid {$widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.subscription$current_time h4 span.sh-text{
					color: {$widget_title_color}!important;
					background-color: {$widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.subscription$current_time h4 span.sh-text{
					 border-bottom: 2px solid {$widget_title_background_color}!important;
					 color: {$widget_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				.subscription$current_time h4 span.sh-text {
					color: {$widget_title_color}!important;
				}
				.subscription$current_time h4:after {
					background: {$widget_title_background_color}!important;
				}
				.subscription$current_time h4:before {
					border-top-color: {$widget_title_background_color}!important;
					border-top: 5px solid {$widget_title_background_color}!important;
				}
				";
		}else{}
		
		print $custom_css;		
		}
		
		?>
		</style>
	<div class="clearfix"></div>
	<?php
  }
  
  
  function update( $new_instance, $old_instance ){

    $instance = $old_instance;
    $instance['title']                = strip_tags( $new_instance['title'] );
    $instance['widget_title_color']                = strip_tags( $new_instance['widget_title_color'] );
    $instance['widget_title_background_color']                = strip_tags( $new_instance['widget_title_background_color'] );
    $instance['subscription_bg']                = strip_tags( $new_instance['subscription_bg'] );
    $instance['margintop']            = strip_tags( $new_instance['margintop'] );
    $instance['marginbottom']            = strip_tags( $new_instance['marginbottom'] );
    $instance['current_time']            = strip_tags( $new_instance['current_time'] );
    return $instance;

  }


  function form($instance){
    $defaults = array( 
      'title'               => '',
      'widget_title_color'     => '',
      'widget_title_background_color'     => '',
      'subscription_bg'     => '',
      'margintop'           => '',
      'marginbottom'           => '',
      'current_time'           => time()
    );
    $instance = wp_parse_args( (array) $instance, $defaults );
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'title ' )); ?>"><?php esc_html_e('Heading', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widget_title_color' )); ?>" class="widefat widget_title_color" value="<?php echo esc_attr($instance['widget_title_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.widget_title_background_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widget_title_background_color' )); ?>" class="widefat widget_title_background_color" value="<?php echo esc_attr($instance['widget_title_background_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.subscription_bg_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'subscription_bg ' )); ?>"><?php esc_html_e('Subscription Form Background', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'subscription_bg' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'subscription_bg' )); ?>" class="widefat subscription_bg_color" value="<?php echo esc_attr($instance['subscription_bg']); ?>">
    </p>
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>"><?php esc_html_e('Margin Top', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'margintop' )); ?>" class="widefat" value="<?php echo esc_attr($instance['margintop']); ?>">
	  <?php esc_html_e( 'Example: 10px', 'pantograph' ); ?>
	</p> 
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'marginbottom ' )); ?>"><?php esc_html_e('Margin Bottom', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'marginbottom' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'marginbottom' )); ?>" class="widefat" value="<?php echo esc_attr($instance['marginbottom']); ?>">
      <?php esc_html_e( 'Example: 10px', 'pantograph' ); ?>
	</p>
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">

  <?php
  }

}//end of class

// register pantograph_subscription_widget widget
if ( ! function_exists( 'pantograph_register_subscription_Widget' ) ) {
function pantograph_register_subscription_Widget() {
  register_widget( 'pantograph_subscription_widget' );  // Class Name
}
add_action( 'widgets_init', 'pantograph_register_subscription_Widget' );
}

/*************************
Start Featured Post widget
*************************/
class pantograph_featured_posts_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'PantoGraph_featured_posts', // Base ID
      esc_html__('PantoGraph Featured Posts', 'pantograph'), // Name
      array( 'description' => esc_html__( 'Displays PantoGraph Featured Posts', 'pantograph' ), ) // Args
    );
  }


      /*-------------------------------------------------------
       *        Front-end display of widget
       *-------------------------------------------------------*/


  public function widget( $args, $instance ) {
	  extract($args);
	  $title = isset($instance['title']) ? $instance['title'] : '';
	  $post_limit = isset($instance['post_limit']) ? $instance['post_limit'] : '';
	  $load_more = isset($instance['load_more']) ? $instance['load_more'] : '';
	  $featuredposts_widget_title_color = isset($instance['featuredposts_widget_title_color']) ? $instance['featuredposts_widget_title_color'] : '';
	  $featuredposts_widget_title_background_color = isset($instance['featuredposts_widget_title_background_color']) ? $instance['featuredposts_widget_title_background_color'] : '';
      $margintop = isset($instance['margintop']) ? $instance['margintop'] : '';
	  $marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '';
      $current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
  ?>
  <div class="side-widget featuredposts<?php echo esc_attr($current_time); ?>" style="<?php if($margintop != ''){ echo 'margin-top:'.esc_attr($margintop).';'; } if($marginbottom != ''){ echo 'margin-bottom:'.esc_attr($marginbottom).';'; } ?>">
  <?php if($title){ ?>
  <h4><span class="sh-text"><?php echo esc_attr($title); ?></span></h4>
  <?php } ?>
  <div class="featured-posts<?php echo esc_attr($current_time); ?> featured-posts-widget">
  <?php
	$the_query = new WP_Query( array(
	'posts_per_page' => $post_limit, 
	'ignore_sticky_posts' => 1,
	'meta_query'  => array(
		array(
			'key' => 'featured_posts',
			'value' => '1'
		)
    ),
	'orderby' => 'comment_count'
	));
	$totalpostcount = $the_query->found_posts;
	$showloadmore = $totalpostcount - $post_limit;
	while ($the_query->have_posts()) : $the_query->the_post(); 
	$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
	if($featured_img){
		$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'medium');
	}else{
		$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
	}
	?>
	<article class="style4">
		<div class="post-thumb">
			<div class="small-title cat"><?php the_category(', '); ?></div>
			<div class="post-excerpt">
				<div class="meta">
					<span class="date"><?php the_time(get_option('date_format')); ?></span>
				</div>
				<h3 class="text-white"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			</div>
			<div class="overlay overlay-02"></div>
			<div class="beforegeneralstyle">
				<div class="generalstyle bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
	<?php if($totalpostcount<1){ echo esc_html__( 'There is no featured posts, Just make a post featured from Post editor right side Meta Box', 'pantograph' ); } ?>
	</div>
	<?php 
	if($instance['load_more']==1){ 
	if($showloadmore >= 1){
	?>
	<div class="featured_posts_loadmore<?php echo esc_attr($current_time); ?> loadmorebtn"><?php esc_html_e('Load More', 'pantograph'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
	<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
	var page = 2;
	jQuery(function($) {
	$('body').on('click', '.featured_posts_loadmore<?php echo esc_attr($current_time); ?>', function() {
		var data = {
			'action': 'load_featured_posts_by_ajax',
			'page': page,
			'security': '<?php echo wp_create_nonce("load_more_featured_posts"); ?>'
		};

		$.post(ajaxurl, data, function(response) {
			if(response != '') {
			$('.featured-posts<?php echo esc_attr($current_time); ?>').append(response);
			page++;
			} else {
			$('.featured_posts_loadmore<?php echo esc_attr($current_time); ?>').hide();
			}
		});
	});
	});
	</script>
	<?php } } ?>
	</div>
	<style>
		<?php 
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		if(($featuredposts_widget_title_color) || ($featuredposts_widget_title_background_color)){
		$custom_css="";
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.featuredposts$current_time h4{
					color: {$featuredposts_widget_title_color}!important;
					border: 1px solid {$featuredposts_widget_title_background_color}!important;
				}
				.featuredposts$current_time h4 span.sh-text:before{
					background: {$featuredposts_widget_title_background_color}!important;
				}
				.featuredposts$current_time h4:before:before{
					background: {$featuredposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.featuredposts$current_time h4{
					color: {$featuredposts_widget_title_color}!important;
					border-bottom: 4px solid  {$featuredposts_widget_title_background_color}!important;
				}
				
				.sh-text a.rsswidget:hover {
					color: {$featuredposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.featuredposts$current_time h4{
					color: {$featuredposts_widget_title_color}!important;
					background-color: {$featuredposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.featuredposts$current_time h4{
					color: {$featuredposts_widget_title_color}!important;
					border-top: 4px solid {$featuredposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.featuredposts$current_time h4 span.sh-text{
					color: {$featuredposts_widget_title_color}!important;
					background-color: {$featuredposts_widget_title_background_color}!important;
				}
				.featuredposts$current_time h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				.featuredposts$current_time h4 span.sh-text{
					color: {$featuredposts_widget_title_color}!important;
					background-color: {$featuredposts_widget_title_background_color}!important;
				}
				.featuredposts$current_time h4 {
					border-top: 3px solid {$featuredposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.featuredposts$current_time h4 span.sh-text{
					color: {$featuredposts_widget_title_color}!important;
					background-color: {$featuredposts_widget_title_background_color}!important;
				}
				.featuredposts$current_time h4 span.sh-text:after {
					border-bottom: 31px solid {$featuredposts_widget_title_background_color}!important;
				}
				.featuredposts$current_time h4{
					border-bottom: 3px solid {$featuredposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.featuredposts$current_time .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.featuredposts$current_time h4 span.sh-text {
					    background-color: {$featuredposts_widget_title_background_color}!important;
						color: {$featuredposts_widget_title_color}!important;
				}
				.featuredposts$current_time h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.featuredposts$current_time h4 span.sh-text{
					color: {$featuredposts_widget_title_color}!important;
					background-color: {$featuredposts_widget_title_background_color}!important;
				}
				.featuredposts$current_time h4 span.sh-text:before {
					border-top-color: {$featuredposts_widget_title_background_color}!important;
					border-top: 10px solid {$featuredposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.featuredposts$current_time h4 span.sh-text{
					color: {$featuredposts_widget_title_color}!important;
					background-color: {$featuredposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.featuredposts$current_time h4 span.sh-text{
					 border-bottom: 2px solid {$featuredposts_widget_title_background_color}!important;
					 color: {$featuredposts_widget_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				.featuredposts$current_time h4 span.sh-text {
					color: {$featuredposts_widget_title_color}!important;
				}
				.featuredposts$current_time h4:after {
					background: {$featuredposts_widget_title_background_color}!important;
				}
				.featuredposts$current_time h4:before {
					border-top-color: {$featuredposts_widget_title_background_color}!important;
					border-top: 5px solid {$featuredposts_widget_title_background_color}!important;
				}
				";
		}else{}
		
		print $custom_css;		
		}
		
		?>
		</style>
	<div class="clearfix"></div>
	<?php
  }
  
  
  function update( $new_instance, $old_instance ){

    $instance = $old_instance;
    $instance['title']                = strip_tags( $new_instance['title'] );
    $instance['post_limit']            = strip_tags( $new_instance['post_limit'] );
    $instance['load_more']            = strip_tags( $new_instance['load_more'] );
	$instance['featuredposts_widget_title_color']                = strip_tags( $new_instance['featuredposts_widget_title_color'] );
    $instance['featuredposts_widget_title_background_color']                = strip_tags( $new_instance['featuredposts_widget_title_background_color'] );
    $instance['margintop']            = strip_tags( $new_instance['margintop'] );
    $instance['marginbottom']            = strip_tags( $new_instance['marginbottom'] );
    $instance['current_time']            = strip_tags( $new_instance['current_time'] );
    return $instance;

  }


  function form($instance){
    $defaults = array( 
      'title'               => '',
      'post_limit'           => 3,
      'load_more'           => 0,
	  'featuredposts_widget_title_color'     => '',
	  'featuredposts_widget_title_background_color'     => '',
      'margintop'           => '',
      'marginbottom'           => '',
      'current_time'           => time()
    );
    $instance = wp_parse_args( (array) $instance, $defaults );
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'title ' )); ?>"><?php esc_html_e('Heading', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'post_limit ' )); ?>"><?php esc_html_e('Post Limit', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'post_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_limit' )); ?>" class="widefat" value="<?php echo esc_attr($instance['post_limit']); ?>">
    </p>
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'load_more ' )); ?>"><?php esc_html_e('Do you want Load More?', 'pantograph'); ?></label><br/>
      <?php if($instance['load_more']==1){ ?>
	  <?php esc_html_e('Yes', 'pantograph'); ?> <input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'load_more' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'load_more' )); ?>" class="widefat" value="<?php echo esc_attr($instance['load_more']); ?>" checked>
	  <?php }else{ ?>
	  <?php esc_html_e('Yes', 'pantograph'); ?><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'load_more' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'load_more' )); ?>" class="widefat" value="<?php esc_html_e('1', 'pantograph');?>">
	  <?php } ?>
	</p>
	
	<script>
		jQuery(document).ready(function($){
			$('.featuredposts_widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'featuredposts_widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'featuredposts_widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'featuredposts_widget_title_color' )); ?>" class="widefat featuredposts_widget_title_color" value="<?php echo esc_attr($instance['featuredposts_widget_title_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.featuredposts_widget_title_background_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'featuredposts_widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'featuredposts_widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'featuredposts_widget_title_background_color' )); ?>" class="widefat featuredposts_widget_title_background_color" value="<?php echo esc_attr($instance['featuredposts_widget_title_background_color']); ?>">
    </p>	

	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>"><?php esc_html_e('Margin Top', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'margintop' )); ?>" class="widefat" value="<?php echo esc_attr($instance['margintop']); ?>">
	  <?php esc_html_e( 'Example: 10px', 'pantograph' ); ?>
	</p> 
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'marginbottom ' )); ?>"><?php esc_html_e('Margin Bottom', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'marginbottom' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'marginbottom' )); ?>" class="widefat" value="<?php echo esc_attr($instance['marginbottom']); ?>">
      <?php esc_html_e( 'Example: 10px', 'pantograph' ); ?>
	</p>
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">

  <?php
  }

}//end of class

// register pantograph_featured_posts_widget widget
if ( ! function_exists( 'pantograph_register_featured_posts_Widget' ) ) {
function pantograph_register_featured_posts_Widget() {
  register_widget( 'pantograph_featured_posts_widget' );  // Class Name
}
add_action( 'widgets_init', 'pantograph_register_featured_posts_Widget' );
}

/*************************
Start Popular Post widget
*************************/
class pantograph_popular_posts_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'PantoGraph_popular_posts', // Base ID
      esc_html__('PantoGraph Popular Posts', 'pantograph'), // Name
      array( 'description' => esc_html__( 'Displays PantoGraph Popular Posts', 'pantograph' ), ) // Args
    );
  }


      /*-------------------------------------------------------
       *        Front-end display of widget
       *-------------------------------------------------------*/


  public function widget( $args, $instance ) {
	  extract($args);
      $title = isset($instance['title']) ? $instance['title'] : '';
	  $post_limit = isset($instance['post_limit']) ? $instance['post_limit'] : '';
	  $load_more = isset($instance['load_more']) ? $instance['load_more'] : '';
	  $popularposts_widget_title_color = isset($instance['popularposts_widget_title_color']) ? $instance['popularposts_widget_title_color'] : '';
	  $popularposts_widget_title_background_color = isset($instance['popularposts_widget_title_background_color']) ? $instance['popularposts_widget_title_background_color'] : '';
      $margintop = isset($instance['margintop']) ? $instance['margintop'] : '';
	  $marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '';
      $current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
  ?>
  <div class="side-widget popularposts<?php echo esc_attr($current_time); ?>" style="<?php if($margintop != ''){ echo 'margin-top:'.esc_attr($margintop).';'; } if($marginbottom != ''){ echo 'margin-bottom:'.esc_attr($marginbottom).';'; } ?>">
  <?php if($title){ ?>
  <h4><span class="sh-text"><?php echo esc_attr($title); ?></span></h4>
  <?php } ?>
	<div class="popular-posts<?php echo esc_attr($current_time); ?> mini-posts">
  <?php
	$the_query = new WP_Query( array('posts_per_page' => $post_limit, 'ignore_sticky_posts' => 1, 'paged' => 1, 'orderby' => 'comment_count'));
	$recent_post_num = 1;
	$video_allowed_html_array = array(
				'div' => array(
					'class' => array(),
					'id' => array(),
					'style' => array()
				),
				'img' => array(
					'class' => array(),
					'src' => array(),
					'alt' => array(),
					'style' => array()
				),
				'a' => array(
					'class' => array(),
					'href' => array(),
					'title' => array()
				));
	while ($the_query->have_posts()) : $the_query->the_post(); 
	$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
	if($featured_img){
		if ( !wp_is_mobile() ) {
		$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
		} else {
		$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
	}else{
		$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
	}
	if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
	?>
	<article class="style2">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<?php echo wp_kses($videoicon, $video_allowed_html_array); ?>
				<a href="<?php the_permalink(); ?>">
					<div class="beforethumbnail">
						<div class="thumbnail bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
					</div>
				</a>
			</div>
			<div class="col-md-8 col-sm-8">
				<div class="post-excerpt no-padding">
					<div class="meta">
						<span><?php the_time(get_option('date_format')); ?></span>
					</div>
					<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
					<?php if(get_comments_number()>0){ ?>
					<div class="meta">
						<span class="comment">
						<a href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
						</span>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
	</div>
	<?php if($instance['load_more']==1){ ?>
	<div class="popular_posts_loadmore<?php echo esc_attr($current_time); ?> loadmorebtn"><?php esc_html_e('Load More', 'pantograph'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
	<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
	var page = 2;
	jQuery(function($) {
	$('body').on('click', '.popular_posts_loadmore<?php echo esc_attr($current_time); ?>', function() {
		var data = {
			'action': 'load_popular_posts_by_ajax',
			'page': page,
			'security': '<?php echo wp_create_nonce("load_more_popular_posts"); ?>'
		};

		$.post(ajaxurl, data, function(response) {
			if(response != '') {
			$('.popular-posts<?php echo esc_attr($current_time); ?>').append(response);
			page++;
			} else {
			$('.popular_posts_loadmore<?php echo esc_attr($current_time); ?>').hide();
			}
		});
	});
	});
	</script>
	<?php } ?>
	</div>
	<style>
		<?php 
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		if(($popularposts_widget_title_color) || ($popularposts_widget_title_background_color)){
		$custom_css="";
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.popularposts$current_time h4{
					color: {$popularposts_widget_title_color}!important;
					border: 1px solid {$popularposts_widget_title_background_color}!important;
				}
				.popularposts$current_time h4 span.sh-text:before{
					background: {$popularposts_widget_title_background_color}!important;
				}
				.popularposts$current_time h4:before:before{
					background: {$popularposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.popularposts$current_time h4{
					color: {$popularposts_widget_title_color}!important;
					border-bottom: 4px solid  {$popularposts_widget_title_background_color}!important;
				}
				
				.sh-text a.rsswidget:hover {
					color: {$popularposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.popularposts$current_time h4{
					color: {$popularposts_widget_title_color}!important;
					background-color: {$popularposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.popularposts$current_time h4{
					color: {$popularposts_widget_title_color}!important;
					border-top: 4px solid {$popularposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.popularposts$current_time h4 span.sh-text{
					color: {$popularposts_widget_title_color}!important;
					background-color: {$popularposts_widget_title_background_color}!important;
				}
				.popularposts$current_time h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				.popularposts$current_time h4 span.sh-text{
					color: {$popularposts_widget_title_color}!important;
					background-color: {$popularposts_widget_title_background_color}!important;
				}
				.popularposts$current_time h4 {
					border-top: 3px solid {$popularposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.popularposts$current_time h4 span.sh-text{
					color: {$popularposts_widget_title_color}!important;
					background-color: {$popularposts_widget_title_background_color}!important;
				}
				.popularposts$current_time h4 span.sh-text:after {
					border-bottom: 31px solid {$popularposts_widget_title_background_color}!important;
				}
				.popularposts$current_time h4{
					border-bottom: 3px solid {$popularposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.popularposts$current_time .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.popularposts$current_time h4 span.sh-text {
					    background-color: {$popularposts_widget_title_background_color}!important;
						color: {$popularposts_widget_title_color}!important;
				}
				.popularposts$current_time h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.popularposts$current_time h4 span.sh-text{
					color: {$popularposts_widget_title_color}!important;
					background-color: {$popularposts_widget_title_background_color}!important;
				}
				.popularposts$current_time h4 span.sh-text:before {
					border-top-color: {$popularposts_widget_title_background_color}!important;
					border-top: 10px solid {$popularposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.popularposts$current_time h4 span.sh-text{
					color: {$popularposts_widget_title_color}!important;
					background-color: {$popularposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.popularposts$current_time h4 span.sh-text{
					 border-bottom: 2px solid {$popularposts_widget_title_background_color}!important;
					 color: {$popularposts_widget_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
				if($popularposts_widget_title_color){
				$custom_css .= "
				.popularposts$current_time h4 span.sh-text {
					color: {$popularposts_widget_title_color}!important;
				}
				";
				}
				if($popularposts_widget_title_background_color){
				$custom_css .= "
				.popularposts$current_time h4:after {
					background: {$popularposts_widget_title_background_color}!important;
				}
				.popularposts$current_time h4:before {
					border-top-color: {$popularposts_widget_title_background_color}!important;
					border-top: 5px solid {$popularposts_widget_title_background_color}!important;
				}
				";
				}
		}else{}
		
		print $custom_css;		
		}
		
		?>
		</style>
	<div class="clearfix"></div>
	<?php
  }
  
  
  function update( $new_instance, $old_instance ){

    $instance = $old_instance;
    $instance['title']                = strip_tags( $new_instance['title'] );
    $instance['post_limit']            = strip_tags( $new_instance['post_limit'] );
    $instance['load_more']            = strip_tags( $new_instance['load_more'] );
	$instance['popularposts_widget_title_color']                = strip_tags( $new_instance['popularposts_widget_title_color'] );
    $instance['popularposts_widget_title_background_color']                = strip_tags( $new_instance['popularposts_widget_title_background_color'] );
    $instance['margintop']            = strip_tags( $new_instance['margintop'] );
    $instance['marginbottom']            = strip_tags( $new_instance['marginbottom'] );
    $instance['current_time']            = strip_tags( $new_instance['current_time'] );
    return $instance;

  }


  function form($instance){
    $defaults = array( 
      'title'               => '',
      'post_limit'           => '',
      'load_more'           => 0,
	  'popularposts_widget_title_color'     => '',
	  'popularposts_widget_title_background_color'     => '',
      'margintop'           => '',
      'marginbottom'           => '',
      'current_time'           => time()
    );
    $instance = wp_parse_args( (array) $instance, $defaults );
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Heading', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'post_limit' )); ?>"><?php esc_html_e('Post Limit', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'post_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_limit' )); ?>" class="widefat" value="<?php echo esc_attr($instance['post_limit']); ?>">
    </p>
		
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'load_more ' )); ?>"><?php esc_html_e('Do you want Load More?', 'pantograph'); ?></label><br/>
      <?php if($instance['load_more']==1){ ?>
	  <?php esc_html_e('Yes', 'pantograph'); ?><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'load_more' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'load_more' )); ?>" class="widefat" value="<?php echo esc_attr($instance['load_more']); ?>" checked>
	  <?php }else{ ?>
	  <?php esc_html_e('Yes', 'pantograph'); ?><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'load_more' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'load_more' )); ?>" class="widefat" value="<?php esc_html_e('1', 'pantograph');?>">
	  <?php } ?>
	</p>
	
	<script>
		jQuery(document).ready(function($){
			$('.popularposts_widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'popularposts_widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'popularposts_widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'popularposts_widget_title_color' )); ?>" class="widefat popularposts_widget_title_color" value="<?php echo esc_attr($instance['popularposts_widget_title_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.popularposts_widget_title_background_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'popularposts_widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'popularposts_widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'popularposts_widget_title_background_color' )); ?>" class="widefat popularposts_widget_title_background_color" value="<?php echo esc_attr($instance['popularposts_widget_title_background_color']); ?>">
    </p>	  
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>"><?php esc_html_e('Margin Top', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'margintop' )); ?>" class="widefat" value="<?php echo esc_attr($instance['margintop']); ?>">
      <?php esc_html_e( 'Example: 10px', 'pantograph' ); ?>
	</p>  
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'marginbottom ' )); ?>"><?php esc_html_e('Margin Bottom', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'marginbottom' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'marginbottom' )); ?>" class="widefat" value="<?php echo esc_attr($instance['marginbottom']); ?>">
      <?php esc_html_e( 'Example: 10px', 'pantograph' ); ?>
	</p>
		
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">


  <?php
  }

}//end of class

// register pantograph_popular_posts_widget widget
if ( ! function_exists( 'pantograph_register_popular_posts_Widget' ) ) {
function pantograph_register_popular_posts_Widget() {
  register_widget( 'pantograph_popular_posts_widget' );  // Class Name
}
add_action( 'widgets_init', 'pantograph_register_popular_posts_Widget' );
}

/*************************
Start Tab Post widget
*************************/
class pantograph_tab_posts_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'PantoGraph_tab_posts', // Base ID
      esc_html__('PantoGraph Tab Posts', 'pantograph'), // Name
      array( 'description' => esc_html__( 'Displays PantoGraph Tab Posts', 'pantograph' ), ) // Args
    );
  }


      /*-------------------------------------------------------
       *        Front-end display of widget
       *-------------------------------------------------------*/


  public function widget( $args, $instance ) {
	  extract($args);
	  $pantograph_tab_widget_title = isset($instance['pantograph_tab_widget_title']) ? $instance['pantograph_tab_widget_title'] : '';
	  $pantograph_popular_title = isset($instance['pantograph_popular_title']) ? $instance['pantograph_popular_title'] : '';
	  $pantograph_commented_title = isset($instance['pantograph_commented_title']) ? $instance['pantograph_commented_title'] : '';
	  $commentedpost_limit = isset($instance['commentedpost_limit']) ? $instance['commentedpost_limit'] : '';
	  $pantograph_viewed_title = isset($instance['pantograph_viewed_title']) ? $instance['pantograph_viewed_title'] : '';
	  $viewd_post_limit = isset($instance['viewd_post_limit']) ? $instance['viewd_post_limit'] : '';
	  $popular_post_limit = isset($instance['popular_post_limit']) ? $instance['popular_post_limit'] : '';
	  $load_more = isset($instance['load_more']) ? $instance['load_more'] : '';
	  $tabposts_widget_title_color = isset($instance['tabposts_widget_title_color']) ? $instance['tabposts_widget_title_color'] : '';
	  $tabposts_widget_title_background_color = isset($instance['tabposts_widget_title_background_color']) ? $instance['tabposts_widget_title_background_color'] : '';
      $margintop = isset($instance['margintop']) ? $instance['margintop'] : '';
		$marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '';
      $current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
  ?>
  <div class="side-widget tabposts<?php echo esc_attr($current_time); ?>" style="<?php if($margintop != ''){ echo 'margin-top:'.esc_attr($margintop).';'; } if($marginbottom != ''){ echo 'margin-bottom:'.esc_attr($marginbottom).';'; } ?>">
		<?php if($pantograph_tab_widget_title){ ?>
		<h4><span class="sh-text"><?php echo esc_attr($pantograph_tab_widget_title); ?></span></h4>
		<?php } ?>
		<div role="tabpanel" class="thetabpanel">
			<!-- Nav tabs -->
			<?php if(($pantograph_popular_title !='') || ($pantograph_commented_title !='') || ($pantograph_viewed_title !='') ) { ?>
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active">
					<a href="#popular<?php echo esc_attr($current_time); ?>" aria-controls="popular<?php echo esc_attr($current_time); ?>" role="tab" data-toggle="tab"><?php echo esc_attr($pantograph_popular_title); ?></a>
				</li>
				<li role="presentation">
					<a href="#commented<?php echo esc_attr($current_time); ?>" aria-controls="commented<?php echo esc_attr($current_time); ?>" role="tab" data-toggle="tab"><?php echo esc_attr($pantograph_commented_title); ?></a>
				</li>
				<li role="presentation">
					<a href="#viewed<?php echo esc_attr($current_time); ?>" aria-controls="viewed<?php echo esc_attr($current_time); ?>" role="tab" data-toggle="tab"><?php echo esc_attr($pantograph_viewed_title); ?></a>
				</li>
			</ul>
			<?php } ?>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active fade in" id="popular<?php echo esc_attr($current_time); ?>">
				<?php
					$the_query = new WP_Query(array('posts_per_page' => 1, 'ignore_sticky_posts' => 1, 'orderby' => 'comment_count'));
					$recent_post_num = 1;	
					$post_array_new = array();	
					$video_allowed_html_array = array(
						'div' => array(
							'class' => array(),
							'id' => array(),
							'style' => array()
						),
						'img' => array(
							'class' => array(),
							'src' => array(),
							'alt' => array(),
							'style' => array()
						),
						'a' => array(
							'class' => array(),
							'href' => array(),
							'title' => array()
						));
					while ($the_query->have_posts()) : $the_query->the_post(); 
					$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
					if($featured_img){
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'large');
					}else{
						$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$post_array_new[] = get_the_ID();	
					?>
					<article class="style4">
						<div class="post-thumb">
							<div class="small-title cat"><?php the_category(', '); ?></div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date"><?php the_time(get_option('date_format')); ?></span>
								</div>
								<h3 class="text-white"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<?php echo wp_kses($videoicon, $video_allowed_html_array); ?>
							<div class="beforegeneralstyle">
								<div class="generalstyle bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
							</div>
						</div>
					</article>
					<div class="popular-tab-posts<?php echo esc_attr($current_time); ?> mini-posts">				
					<?php
					endwhile; 
					$arr1 = $post_array_new;
					$ar = array_merge($arr1);
					$showpost_item = $popular_post_limit - 1;
					$the_query = new WP_Query( array('posts_per_page' => $showpost_item, 'ignore_sticky_posts' => 1, 'post__not_in' => $ar, 'orderby' => 'comment_count'));
					$recent_post_num = 1;		
					while ($the_query->have_posts()) : $the_query->the_post(); 
					$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
					if($featured_img){
						if ( !wp_is_mobile() ) {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						} else {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					?>
						<article class="style2">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<?php echo wp_kses($videoicon, $video_allowed_html_array); ?>
									<a href="<?php the_permalink(); ?>">
										<div class="beforethumbnail">
											<div class="thumbnail bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
										</div>
									</a>
								</div>
								<div class="col-md-8 col-sm-8">
									<div class="post-excerpt no-padding">
										<div class="meta">
											<span><?php the_time(get_option('date_format')); ?></span>
										</div>
										<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
										<?php if(get_comments_number()>0){ ?>
										<div class="meta">
											<span class="comment">
											<a href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
											</span>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</article>
						<?php endwhile; ?>
						
					</div>
					<?php if($instance['load_more']==1){ ?>
					<div class="popular_tab_posts_loadmore<?php echo esc_attr($current_time); ?> loadmorebtn"><?php esc_html_e('Load More', 'pantograph'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
					<script type="text/javascript">
						var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
						var page = 2;
						jQuery(function($) {
						$('body').on('click', '.popular_tab_posts_loadmore<?php echo esc_attr($current_time); ?>', function() {
							var data = {
								'action': 'load_popular_tab_posts_by_ajax',
								'page': page,
								'security': '<?php echo wp_create_nonce("load_more_popular_tab_posts"); ?>'
							};

							$.post(ajaxurl, data, function(response) {
								if(response != '') {
								$('.popular-tab-posts<?php echo esc_attr($current_time); ?>').append(response);
								page++;
								} else {
								$('.popular_tab_posts_loadmore<?php echo esc_attr($current_time); ?>').hide();
								}
							});
						});
						});
					</script>
					<?php } ?>
				</div>

				<div role="tabpanel" class="tab-pane fade in" id="commented<?php echo esc_attr($current_time); ?>">
				<?php
					$the_query = new WP_Query(array('posts_per_page' => 1, 'ignore_sticky_posts' => 1, 'orderby' => 'comment_count', 'order' => 'desc'));
					$post_array_new = array();	
					while ($the_query->have_posts()) : $the_query->the_post(); 
					$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
					if($featured_img){
						if ( !wp_is_mobile() ) {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						} else {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$post_array_new[] = get_the_ID();	
					?>
					<article class="style4">
						<div class="post-thumb">
							<div class="small-title cat"><?php the_category(', '); ?></div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date"><?php the_time(get_option('date_format')); ?></span>
								</div>
								<h3 class="text-white"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<?php echo wp_kses($videoicon, $video_allowed_html_array); ?>
							<div class="beforegeneralstyle">
								<div class="generalstyle bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
							</div>
						</div>
					</article>
					<div class="comment-tab-posts<?php echo esc_attr($current_time); ?> mini-posts">				
					<?php
					endwhile; 
					$arr1 = $post_array_new;
					$ar = array_merge($arr1);
					$showpost_item = $commentedpost_limit - 1;
					$the_query = new WP_Query( array('posts_per_page' => $showpost_item, 'post__not_in' => $ar, 'ignore_sticky_posts' => 1, 'orderby' => 'comment_count', 'order' => 'desc'));
					$recent_post_num = 1;		
					while ($the_query->have_posts()) : $the_query->the_post(); 
					$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
					if($featured_img){
						if ( !wp_is_mobile() ) {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						} else {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					?>
						<article class="style2">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<a href="<?php the_permalink(); ?>">
										<div class="beforethumbnail">
											<div class="thumbnail bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
										</div>
									</a>
								</div>
								<div class="col-md-8 col-sm-8">
									<div class="post-excerpt no-padding">
										<div class="meta">
											<span><?php the_time(get_option('date_format')); ?></span>
										</div>
										<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
										<?php if(get_comments_number()>0){ ?>
										<div class="meta">
											<span class="comment">
											<a href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
											</span>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</article>
						<?php endwhile; ?>
					</div>
					<?php if($instance['load_more']==1){ ?>
					<div class="comment_tab_posts_loadmore<?php echo esc_attr($current_time); ?> loadmorebtn"><?php esc_html_e('Load More', 'pantograph'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
					<script type="text/javascript">
						var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
						var page = 2;
						jQuery(function($) {
						$('body').on('click', '.comment_tab_posts_loadmore<?php echo esc_attr($current_time); ?>', function() {
							var data = {
								'action': 'load_comment_tab_posts_by_ajax',
								'page': page,
								'security': '<?php echo wp_create_nonce("load_more_comment_tab_posts"); ?>'
							};

							$.post(ajaxurl, data, function(response) {
								if(response != '') {
								$('.comment-tab-posts<?php echo esc_attr($current_time); ?>').append(response);
								page++;
								} else {
								$('.comment_tab_posts_loadmore<?php echo esc_attr($current_time); ?>').hide();
								}
							});
						});
						});
					</script>
					<?php } ?>
				</div>

				<div role="tabpanel" class="tab-pane fade in" id="viewed<?php echo esc_attr($current_time); ?>">
					<?php
					$the_query = new WP_Query( array( 'posts_per_page' => 1, 'ignore_sticky_posts' => 1, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
					$recent_post_num = 1;	
					$post_array_new = array();	
					while ($the_query->have_posts()) : $the_query->the_post(); 
					$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
					if($featured_img){
						if ( !wp_is_mobile() ) {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						} else {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$post_array_new[] = get_the_ID();	
					?>
					<article class="style4">
						<div class="post-thumb">
							<div class="small-title cat"><?php the_category(', '); ?></div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date"><?php the_time(get_option('date_format')); ?></span>
								</div>
								<h3 class="text-white"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<?php echo wp_kses($videoicon, $video_allowed_html_array); ?>
							<div class="beforegeneralstyle">
								<div class="generalstyle bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
							</div>
						</div>
					</article>
					<div class="viewed-tab-posts<?php echo esc_attr($current_time); ?> mini-posts">				
					<?php
					endwhile; 
					$arr1 = $post_array_new;
					$ar = array_merge($arr1);
					$showpost_item = $viewd_post_limit - 1;
					$the_query = new WP_Query( array( 'posts_per_page' => $showpost_item, 'post__not_in' => $ar, 'ignore_sticky_posts' => 1, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );	
					while ($the_query->have_posts()) : $the_query->the_post(); 
					$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
					if($featured_img){
						if ( !wp_is_mobile() ) {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						} else {
						$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					?>
						<article class="style2">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<a href="<?php the_permalink(); ?>">
										<div class="beforethumbnail">
											<div class="thumbnail bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
										</div>
									</a>
								</div>
								<div class="col-md-8 col-sm-8">
									<div class="post-excerpt no-padding">
										<div class="meta">
											<span><?php the_time(get_option('date_format')); ?></span>
										</div>
										<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
										<?php if(get_comments_number()>0){ ?>
										<div class="meta">
											<span class="comment">
											<a href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
											</span>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</article>
						<?php endwhile; ?>
					</div>
					<?php if($instance['load_more']==1){ ?>
					<div class="viewed_tab_posts_loadmore<?php echo esc_attr($current_time); ?> loadmorebtn"><?php esc_html_e('Load More', 'pantograph'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
					<script type="text/javascript">
						var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
						var page = 2;
						jQuery(function($) {
						$('body').on('click', '.viewed_tab_posts_loadmore<?php echo esc_attr($current_time); ?>', function() {
							var data = {
								'action': 'load_viewed_tab_posts_by_ajax',
								'page': page,
								'security': '<?php echo wp_create_nonce("load_more_viewed_tab_posts"); ?>'
							};

							$.post(ajaxurl, data, function(response) {
								if(response != '') {
								$('.viewed-tab-posts<?php echo esc_attr($current_time); ?>').append(response);
								page++;
								} else {
								$('.viewed_tab_posts_loadmore<?php echo esc_attr($current_time); ?>').hide();
								}
							});
						});
						});
					</script>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- TABS -->
		<style>
		<?php 
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		if(($tabposts_widget_title_color) || ($tabposts_widget_title_background_color)){
		$custom_css="";
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.tabposts$current_time h4{
					color: {$tabposts_widget_title_color}!important;
					border: 1px solid {$tabposts_widget_title_background_color}!important;
				}
				.tabposts$current_time h4 span.sh-text:before{
					background: {$tabposts_widget_title_background_color}!important;
				}
				.tabposts$current_time h4:before:before{
					background: {$tabposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.tabposts$current_time h4{
					color: {$tabposts_widget_title_color}!important;
					border-bottom: 4px solid  {$tabposts_widget_title_background_color}!important;
				}
				
				.sh-text a.rsswidget:hover {
					color: {$tabposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.tabposts$current_time h4{
					color: {$tabposts_widget_title_color}!important;
					background-color: {$tabposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.tabposts$current_time h4{
					color: {$tabposts_widget_title_color}!important;
					border-top: 4px solid {$tabposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.tabposts$current_time h4 span.sh-text{
					color: {$tabposts_widget_title_color}!important;
					background-color: {$tabposts_widget_title_background_color}!important;
				}
				.tabposts$current_time h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				.tabposts$current_time h4 span.sh-text{
					color: {$tabposts_widget_title_color}!important;
					background-color: {$tabposts_widget_title_background_color}!important;
				}
				.tabposts$current_time h4 {
					border-top: 3px solid {$tabposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.tabposts$current_time h4 span.sh-text{
					color: {$tabposts_widget_title_color}!important;
					background-color: {$tabposts_widget_title_background_color}!important;
				}
				.tabposts$current_time h4 span.sh-text:after {
					border-bottom: 31px solid {$tabposts_widget_title_background_color}!important;
				}
				.tabposts$current_time h4{
					border-bottom: 3px solid {$tabposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.tabposts$current_time .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.tabposts$current_time h4 span.sh-text {
					    background-color: {$tabposts_widget_title_background_color}!important;
						color: {$tabposts_widget_title_color}!important;
				}
				.tabposts$current_time h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.tabposts$current_time h4 span.sh-text{
					color: {$tabposts_widget_title_color}!important;
					background-color: {$tabposts_widget_title_background_color}!important;
				}
				.tabposts$current_time h4 span.sh-text:before {
					border-top-color: {$tabposts_widget_title_background_color}!important;
					border-top: 10px solid {$tabposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.tabposts$current_time h4 span.sh-text{
					color: {$tabposts_widget_title_color}!important;
					background-color: {$tabposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.tabposts$current_time h4 span.sh-text{
					 border-bottom: 2px solid {$tabposts_widget_title_background_color}!important;
					 color: {$tabposts_widget_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				.tabposts$current_time h4 span.sh-text {
					color: {$tabposts_widget_title_color}!important;
				}
				.tabposts$current_time h4:after {
					background: {$tabposts_widget_title_background_color}!important;
				}
				.tabposts$current_time h4:before {
					border-top-color: {$tabposts_widget_title_background_color}!important;
					border-top: 5px solid {$tabposts_widget_title_background_color}!important;
				}
				";
		}else{}
		
		print $custom_css;		
		}
		
		?>
		</style>
</div>
	<div class="clearfix"></div>
	<?php
  }
  function update( $new_instance, $old_instance ){

    $instance = $old_instance;
    $instance['pantograph_tab_widget_title']  = strip_tags( $new_instance['pantograph_tab_widget_title'] );
    $instance['pantograph_popular_title']  = strip_tags( $new_instance['pantograph_popular_title'] );
    $instance['popular_post_limit']            = strip_tags( $new_instance['popular_post_limit'] );
	$instance['pantograph_commented_title']  = strip_tags( $new_instance['pantograph_commented_title'] );
    $instance['commentedpost_limit']            = strip_tags( $new_instance['commentedpost_limit'] );
	$instance['pantograph_viewed_title']                = strip_tags( $new_instance['pantograph_viewed_title'] );
    $instance['viewd_post_limit']            = strip_tags( $new_instance['viewd_post_limit'] );
    $instance['load_more']            = strip_tags( $new_instance['load_more'] );
	$instance['tabposts_widget_title_color'] = strip_tags( $new_instance['tabposts_widget_title_color'] );
    $instance['tabposts_widget_title_background_color'] = strip_tags( $new_instance['tabposts_widget_title_background_color'] );
    $instance['margintop']            = strip_tags( $new_instance['margintop'] );
    $instance['marginbottom']            = strip_tags( $new_instance['marginbottom'] );
    $instance['current_time']            = strip_tags( $new_instance['current_time'] );
    return $instance;

  }


  function form($instance){
    $defaults = array( 
      'pantograph_tab_widget_title'               => '',
      'pantograph_popular_title'               => '',
      'popular_post_limit'           => 3,
	  'pantograph_commented_title'               => '',
      'commentedpost_limit'           => 3,
	  'pantograph_viewed_title'               => '',
      'viewd_post_limit'           => 3,
      'load_more'           => 0,
	  'tabposts_widget_title_color'     => '',
	  'tabposts_widget_title_background_color'     => '',
      'margintop'           => '',
      'marginbottom'           => '',
      'current_time'           => time()
    );
    $instance = wp_parse_args( (array) $instance, $defaults );
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'pantograph_tab_widget_title ' )); ?>"><?php esc_html_e('Widget Heading', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'pantograph_tab_widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pantograph_tab_widget_title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['pantograph_tab_widget_title']); ?>">
    </p>
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'pantograph_popular_title ' )); ?>"><?php esc_html_e('Popular Tab Heading', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'pantograph_popular_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pantograph_popular_title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['pantograph_popular_title']); ?>">
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'popular_post_limit ' )); ?>"><?php esc_html_e('Popular Post Limit', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'popular_post_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'popular_post_limit' )); ?>" class="widefat" value="<?php echo esc_attr($instance['popular_post_limit']); ?>">
    </p> 

	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'pantograph_commented_title' )); ?>"><?php esc_html_e('Commented Tab Heading', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'pantograph_commented_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pantograph_commented_title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['pantograph_commented_title']); ?>">
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'commentedpost_limit' )); ?>"><?php esc_html_e('Commented Post Limit', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'commentedpost_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'commentedpost_limit' )); ?>" class="widefat" value="<?php echo esc_attr($instance['commentedpost_limit']); ?>">
    </p> 
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'pantograph_viewed_title' )); ?>"><?php esc_html_e('Viewed Tab Heading', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'pantograph_viewed_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pantograph_viewed_title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['pantograph_viewed_title']); ?>">
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'viewd_post_limit' )); ?>"><?php esc_html_e('Viewed Post Limit', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'viewd_post_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'viewd_post_limit' )); ?>" class="widefat" value="<?php echo esc_attr($instance['viewd_post_limit']); ?>">
    </p>
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'load_more ' )); ?>"><?php esc_html_e('Do you want Load More?', 'pantograph'); ?></label><br/>
      <?php if($instance['load_more']==1){ ?>
	  <?php esc_html_e('Yes', 'pantograph'); ?><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'load_more' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'load_more' )); ?>" class="widefat" value="<?php echo esc_attr($instance['load_more']); ?>" checked>
	  <?php }else{ ?>
	  <?php esc_html_e('Yes', 'pantograph'); ?><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'load_more' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'load_more' )); ?>" class="widefat" value="<?php esc_html_e('1', 'pantograph');?>">
	  <?php } ?>
	</p>
	
	<script>
		jQuery(document).ready(function($){
			$('.tabposts_widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'tabposts_widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'tabposts_widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tabposts_widget_title_color' )); ?>" class="widefat tabposts_widget_title_color" value="<?php echo esc_attr($instance['tabposts_widget_title_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.tabposts_widget_title_background_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'tabposts_widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'tabposts_widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tabposts_widget_title_background_color' )); ?>" class="widefat tabposts_widget_title_background_color" value="<?php echo esc_attr($instance['tabposts_widget_title_background_color']); ?>">
    </p>	

	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>"><?php esc_html_e('Margin Top', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'margintop' )); ?>" class="widefat" value="<?php echo esc_attr($instance['margintop']); ?>">
      <?php esc_html_e( 'Example: 10px', 'pantograph' ); ?>
	</p>  
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'marginbottom' )); ?>"><?php esc_html_e('Margin Bottom', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'marginbottom' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'marginbottom' )); ?>" class="widefat" value="<?php echo esc_attr($instance['marginbottom']); ?>">
      <?php esc_html_e( 'Example: 10px', 'pantograph' ); ?>
	</p>
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">


  <?php
  }

}//end of class

// register pantograph_tab_posts_widget widget
if ( ! function_exists( 'pantograph_register_tab_posts_Widget' ) ) {
function pantograph_register_tab_posts_Widget() {
  register_widget( 'pantograph_tab_posts_widget' );  // Class Name
}
add_action( 'widgets_init', 'pantograph_register_tab_posts_Widget' );
}

/*************************
Start Video Post widget
*************************/
class pantograph_video_posts_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'PantoGraph_video_posts', // Base ID
      esc_html__('PantoGraph Video Posts', 'pantograph'), // Name
      array( 'description' => esc_html__( 'Displays PantoGraph Video Posts', 'pantograph' ), ) // Args
    );
  }


      /*-------------------------------------------------------
       *        Front-end display of widget
       *-------------------------------------------------------*/


  public function widget( $args, $instance ) {
	  extract($args);
	  $title = isset($instance['title']) ? $instance['title'] : '';
	  $post_limit = isset($instance['post_limit']) ? $instance['post_limit'] : '';
      $load_more = isset($instance['load_more']) ? $instance['load_more'] : '';
	  $videoposts_widget_title_color = isset($instance['videoposts_widget_title_color']) ? $instance['videoposts_widget_title_color'] : '';
	  $videoposts_widget_title_background_color = isset($instance['videoposts_widget_title_background_color']) ? $instance['videoposts_widget_title_background_color'] : '';
      $margintop = isset($instance['margintop']) ? $instance['margintop'] : '';
		$marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '';
      $current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
  ?>
  <div class="side-widget videoposts<?php echo esc_attr($current_time); ?>" style="<?php if($margintop != ''){ echo 'margin-top:'.esc_attr($margintop).';'; } if($marginbottom != ''){ echo 'margin-bottom:'.esc_attr($marginbottom).';'; } ?>">
  <?php if($title){ ?>
  <h4><span class="sh-text"><?php echo esc_attr($title); ?></span></h4>
  <?php } ?>
  <div class="video-posts<?php echo esc_attr($current_time); ?>">
  <?php
	$the_query = new WP_Query( array(
	'posts_per_page' => $post_limit,
	'tax_query' => array( array(
		'taxonomy' => 'post_format',
		'field' => 'slug',
		'terms' => array('post-format-video')
	   ) ),
	'ignore_sticky_posts' => 1
	));
	$totalpostcount = $the_query->found_posts;
	$showloadmore = $totalpostcount - $post_limit;
	while ($the_query->have_posts()) : $the_query->the_post();
	$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
	if($featured_img){
		$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'large');
	}else{
		$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
	}
	?>
	
	<article class="article-home margin-bottom-20">
		<a href="<?php the_permalink(); ?>">
			<div class="article-thumbnew">
				<div class="play" style="background:none;"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri().'/img/video.png'; ?>" alt="" style="width:48px;height:48px;" /></a></div>
				<div class="beforegeneralstyle">
					<div class="generalstyle bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
				</div>
			</div>
		</a>
		<div class="post-excerpt">
			<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			<div class="meta">
				<span><?php esc_html_e( 'by', 'pantograph' ); ?> <?php echo get_the_author_link(); ?></span>
				<span><?php esc_html_e( 'on', 'pantograph' ); ?> <?php the_time(get_option('date_format')); ?></span>
				<span class="comment"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></span>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
	<?php if($totalpostcount<1){ echo esc_html__( 'There is no video posts, Please choose "Video" post format from Post Editor right sidebar.', 'pantograph' ); } ?>
	</div>
	<?php if(($instance['load_more']==1)){ 
	if($showloadmore >= 1){ 
	?>
	<div class="video_posts_loadmore<?php echo esc_attr($current_time); ?> loadmorebtn"><?php esc_html_e('Load More', 'pantograph'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
	<script type="text/javascript">
		var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
		var page = 2;
		jQuery(function($) {
		$('body').on('click', '.video_posts_loadmore<?php echo esc_attr($current_time); ?>', function() {
			var data = {
				'action': 'load_video_posts_by_ajax',
				'page': page,
				'security': '<?php echo wp_create_nonce("load_more_video_posts"); ?>'
			};

			$.post(ajaxurl, data, function(response) {
				if(response != '') {
				$('.video-posts<?php echo esc_attr($current_time); ?>').append(response);
				page++;
				} else {
				$('.video_posts_loadmore<?php echo esc_attr($current_time); ?>').hide();
				}
			});
		});
		});
	</script>
	<?php }} ?>
	</div>
	<style>
		<?php 
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		if(($videoposts_widget_title_color) || ($videoposts_widget_title_background_color)){
		$custom_css="";
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.videoposts$current_time h4{
					color: {$videoposts_widget_title_color}!important;
					border: 1px solid {$videoposts_widget_title_background_color}!important;
				}
				.videoposts$current_time h4 span.sh-text:before{
					background: {$videoposts_widget_title_background_color}!important;
				}
				.videoposts$current_time h4:before:before{
					background: {$videoposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.videoposts$current_time h4{
					color: {$videoposts_widget_title_color}!important;
					border-bottom: 4px solid  {$videoposts_widget_title_background_color}!important;
				}
				
				.sh-text a.rsswidget:hover {
					color: {$videoposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.videoposts$current_time h4{
					color: {$videoposts_widget_title_color}!important;
					background-color: {$videoposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.videoposts$current_time h4{
					color: {$videoposts_widget_title_color}!important;
					border-top: 4px solid {$videoposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.videoposts$current_time h4 span.sh-text{
					color: {$videoposts_widget_title_color}!important;
					background-color: {$videoposts_widget_title_background_color}!important;
				}
				.videoposts$current_time h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				.videoposts$current_time h4 span.sh-text{
					color: {$videoposts_widget_title_color}!important;
					background-color: {$videoposts_widget_title_background_color}!important;
				}
				.videoposts$current_time h4 {
					border-top: 3px solid {$videoposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.videoposts$current_time h4 span.sh-text{
					color: {$videoposts_widget_title_color}!important;
					background-color: {$videoposts_widget_title_background_color}!important;
				}
				.videoposts$current_time h4 span.sh-text:after {
					border-bottom: 31px solid {$videoposts_widget_title_background_color}!important;
				}
				.videoposts$current_time h4{
					border-bottom: 3px solid {$videoposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.videoposts$current_time .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.videoposts$current_time h4 span.sh-text {
					    background-color: {$videoposts_widget_title_background_color}!important;
						color: {$videoposts_widget_title_color}!important;
				}
				.videoposts$current_time h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.videoposts$current_time h4 span.sh-text{
					color: {$videoposts_widget_title_color}!important;
					background-color: {$videoposts_widget_title_background_color}!important;
				}
				.videoposts$current_time h4 span.sh-text:before {
					border-top-color: {$videoposts_widget_title_background_color}!important;
					border-top: 10px solid {$videoposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.videoposts$current_time h4 span.sh-text{
					color: {$videoposts_widget_title_color}!important;
					background-color: {$videoposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.videoposts$current_time h4 span.sh-text{
					 border-bottom: 2px solid {$videoposts_widget_title_background_color}!important;
					 color: {$videoposts_widget_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				.videoposts$current_time h4 span.sh-text {
					color: {$videoposts_widget_title_color}!important;
				}
				.videoposts$current_time h4:after {
					background: {$videoposts_widget_title_background_color}!important;
				}
				.videoposts$current_time h4:before {
					border-top-color: {$videoposts_widget_title_background_color}!important;
					border-top: 5px solid {$videoposts_widget_title_background_color}!important;
				}
				";
		}else{}
		
		print $custom_css;		
		}
		
		?>
		</style>
	<div class="clearfix"></div>
	<?php
  }
  
  
  function update( $new_instance, $old_instance ){

    $instance = $old_instance;
    $instance['title']                = strip_tags( $new_instance['title'] );
    $instance['post_limit']            = strip_tags( $new_instance['post_limit'] );
    $instance['load_more']            = strip_tags( $new_instance['load_more'] );
	$instance['videoposts_widget_title_color']                = strip_tags( $new_instance['videoposts_widget_title_color'] );
    $instance['videoposts_widget_title_background_color']                = strip_tags( $new_instance['videoposts_widget_title_background_color'] );
    $instance['margintop']            = strip_tags( $new_instance['margintop'] );
    $instance['marginbottom']            = strip_tags( $new_instance['marginbottom'] );
    $instance['current_time']            = strip_tags( $new_instance['current_time'] );
    return $instance;

  }


  function form($instance){
    $defaults = array( 
      'title'               => '',
      'post_limit'           => 3,
      'load_more'           => 0,
	  'videoposts_widget_title_color'     => '',
	  'videoposts_widget_title_background_color'     => '',
      'margintop'           => '',
      'marginbottom'           => '',
      'current_time'           => time()
    );
    $instance = wp_parse_args( (array) $instance, $defaults );
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'title ' )); ?>"><?php esc_html_e('Heading', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'post_limit ' )); ?>"><?php esc_html_e('Post Limit', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'post_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_limit' )); ?>" class="widefat" value="<?php echo esc_attr($instance['post_limit']); ?>">
    </p>
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'load_more ' )); ?>"><?php esc_html_e('Do you want Load More?', 'pantograph'); ?></label><br/>
      <?php if($instance['load_more']==1){ ?>
	  <?php esc_html_e('Yes', 'pantograph'); ?><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'load_more' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'load_more' )); ?>" class="widefat" value="<?php echo esc_attr($instance['load_more']); ?>" checked>
	  <?php }else{ ?>
	  <?php esc_html_e('Yes', 'pantograph'); ?><input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'load_more' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'load_more' )); ?>" class="widefat" value="<?php esc_html_e('1', 'pantograph');?>">
	  <?php } ?>
	</p>
	
	<script>
		jQuery(document).ready(function($){
			$('.videoposts_widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'videoposts_widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'videoposts_widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'videoposts_widget_title_color' )); ?>" class="widefat videoposts_widget_title_color" value="<?php echo esc_attr($instance['videoposts_widget_title_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.videoposts_widget_title_background_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'videoposts_widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'videoposts_widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'videoposts_widget_title_background_color' )); ?>" class="widefat videoposts_widget_title_background_color" value="<?php echo esc_attr($instance['videoposts_widget_title_background_color']); ?>">
    </p>

	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>"><?php esc_html_e('Margin Top', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'margintop' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'margintop' )); ?>" class="widefat" value="<?php echo esc_attr($instance['margintop']); ?>">
	  <small><?php esc_html_e( 'Example: 10px', 'pantograph' ); ?></small>
	</p> 
	
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'marginbottom ' )); ?>"><?php esc_html_e('Margin Bottom', 'pantograph'); ?></label>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'marginbottom' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'marginbottom' )); ?>" class="widefat" value="<?php echo esc_attr($instance['marginbottom']); ?>">
      <small><?php esc_html_e( 'Example: 10px', 'pantograph' ); ?></small>
	</p>
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">	

  <?php
  }

}//end of class

if ( ! function_exists( 'pantograph_register_video_posts_Widget' ) ) {
// register pantograph_video_posts_widget widget
function pantograph_register_video_posts_Widget() {
  register_widget( 'pantograph_video_posts_widget' );  // Class Name
}
add_action( 'widgets_init', 'pantograph_register_video_posts_Widget' );
}

/*************************
Start Include Category widget
*************************/
class pantograph_include_category_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'pantograph_include_category', // Base ID
      esc_html__('PantoGraph Category', 'pantograph'), // Name
      array( 'description' => esc_html__( 'Displays PantoGraph Category only for included IDs', 'pantograph' ), ) // Args
    );
  }


      /*-------------------------------------------------------
       *        Front-end display of widget
       *-------------------------------------------------------*/

function widget( $args, $instance ) {
        extract( $args );
		$show_child_item = '';
		$title = isset($instance['title']) ? $instance['title'] : '';
        $category_widget_title_color = isset($instance['category_widget_title_color']) ? $instance['category_widget_title_color'] : '';
	    $category_widget_title_background_color = isset($instance['category_widget_title_background_color']) ? $instance['category_widget_title_background_color'] : '';
		$show_child_item = isset($instance['show_child_item']) ? $instance['show_child_item'] : '';
		$show_post_count_item = isset($instance['show_post_count_item']) ? $instance['show_post_count_item'] : '';
        $current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
{
			
?>
		<div class="side-widget category<?php echo esc_attr($current_time); ?>">
		<?php if($title){ ?>
		<h4><span class="sh-text"><?php echo esc_attr($title); ?></span></h4>
		<?php } ?>
        <ul id="toggle-view">
<?php
	//get only parents
	$includetext = trim($instance['text'],',');
	if($includetext){$include = trim($instance['text'],',');}else {$include = '1';}
	$args = array('orderby' => 'name','order' => 'ASC', 'include' => $include, 'parent' => 0);
	$Parent_categories = get_categories($args);

	foreach($Parent_categories as $category) {
		echo '<li>';
		$args = array('parent' => $category->cat_ID, 'include' => $include);
		$categories_cnt = count(get_categories( $args ));
		if($show_child_item==1 && $categories_cnt!=0){
		echo '<h3>'.$category->category_nicename.'</h3>
		<span class="fa fa-angle-down"></span>
		<div class="toggle-panel">';
			//get all children of this category
			$args = array('orderby' => 'name','order' => 'ASC', 'include' => $include, 'parent' => $category->term_id);
			$Child_categories = get_categories($args);
			$i=0;
			foreach ($Child_categories as $c){
				++$i;
			if($i==1){
				echo '<div>';
				echo '<a href="'.esc_url(get_category_link( $c->term_id )).'">'.esc_attr($c->name).'</a>';
			}
			if($i==2){
				echo '<a href="'.esc_url(get_category_link( $c->term_id )).'">'.esc_attr($c->name).'</a>';
				echo '</div>';
				$i=0;
			}
			}
			echo '
		</div>';
		}else{
			echo '<a href="'.esc_url(get_category_link( $category->term_id )).'">'.esc_attr($category->name).'</a>';
			if($show_post_count_item==1){
			echo '<a class="catpostitem" href="'.esc_url(get_category_link( $category->term_id )).'">'.esc_attr($category->category_count).'</a>';
			}
		}
		echo '</li>';
			
	}
?>
        </ul>
		<style>
		<?php 
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		if(($category_widget_title_color) || ($category_widget_title_background_color)){
		$custom_css="";
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.category$current_time h4{
					color: {$category_widget_title_color}!important;
					border: 1px solid {$category_widget_title_background_color}!important;
				}
				.category$current_time h4 span.sh-text:before{
					background: {$category_widget_title_background_color}!important;
				}
				.category$current_time h4:before:before{
					background: {$category_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.category$current_time h4{
					color: {$category_widget_title_color}!important;
					border-bottom: 4px solid  {$category_widget_title_background_color}!important;
				}
				
				.sh-text a.rsswidget:hover {
					color: {$category_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.category$current_time h4{
					color: {$category_widget_title_color}!important;
					background-color: {$category_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.category$current_time h4{
					color: {$category_widget_title_color}!important;
					border-top: 4px solid {$category_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.category$current_time h4 span.sh-text{
					color: {$category_widget_title_color}!important;
					background-color: {$category_widget_title_background_color}!important;
				}
				.category$current_time h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				.category$current_time h4 span.sh-text{
					color: {$category_widget_title_color}!important;
					background-color: {$category_widget_title_background_color}!important;
				}
				.category$current_time h4 {
					border-top: 3px solid {$category_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.category$current_time h4 span.sh-text{
					color: {$category_widget_title_color}!important;
					background-color: {$category_widget_title_background_color}!important;
				}
				.category$current_time h4 span.sh-text:after {
					border-bottom: 31px solid {$category_widget_title_background_color}!important;
				}
				.category$current_time h4{
					border-bottom: 3px solid {$category_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.category$current_time .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.category$current_time h4 span.sh-text {
					    background-color: {$category_widget_title_background_color}!important;
						color: {$category_widget_title_color}!important;
				}
				.category$current_time h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.category$current_time h4 span.sh-text{
					color: {$category_widget_title_color}!important;
					background-color: {$category_widget_title_background_color}!important;
				}
				.category$current_time h4 span.sh-text:before {
					border-top-color: {$category_widget_title_background_color}!important;
					border-top: 10px solid {$category_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.category$current_time h4 span.sh-text{
					color: {$category_widget_title_color}!important;
					background-color: {$category_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.category$current_time h4 span.sh-text{
					 border-bottom: 2px solid {$category_widget_title_background_color}!important;
					 color: {$category_widget_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				.category$current_time h4 span.sh-text {
					color: {$category_widget_title_color}!important;
				}
				.category$current_time h4:after {
					background: {$category_widget_title_background_color}!important;
				}
				.category$current_time h4:before {
					border-top-color: {$category_widget_title_background_color}!important;
					border-top: 5px solid {$category_widget_title_background_color}!important;
				}
				";
		}else{}
		
		print $custom_css;		
		}
		
		?>
		</style>
		</div>
<?php
        }
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['category_widget_title_color'] = strip_tags( $new_instance['category_widget_title_color'] );
		$instance['category_widget_title_background_color']  = strip_tags( $new_instance['category_widget_title_background_color'] );
		$instance['text'] =  strip_tags(preg_replace("/[^0-9,.]/", "",trim($new_instance['text'])));
        $instance['show_child_item'] = strip_tags($new_instance['show_child_item']);
        $instance['show_post_count_item'] = strip_tags($new_instance['show_post_count_item']);
        $instance['current_time'] = strip_tags($new_instance['current_time']);
		return $instance;
    }

    function form( $instance ) {
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 
		'title' => '', 
		'category_widget_title_color' => '', 
		'category_widget_title_background_color' => '', 
		'text' => '', 
		'show_child_item' => 0,
		'show_post_count_item' => 0,
		'current_time' => time()
		) );
        $title = $instance['title'];
		$category_widget_title_color     = $instance['category_widget_title_color'];
        $category_widget_title_background_color     = $instance['category_widget_title_background_color'];
        $text = $instance['text'];
        $show_child_item = $instance['show_child_item'];
        $show_post_count_item = $instance['show_post_count_item'];
        $current_time = $instance['current_time'];
?>
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html_e( 'Title:', 'pantograph' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php echo esc_html_e( 'Include Category Id:', 'pantograph' ); ?></label>
			<textarea class="widefat" rows="4" cols="20" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" style="resize:none"><?php echo esc_attr($instance['text']); ?></textarea>
		</p>
		<p><?php esc_html_e('Write category ids with (,) separate for including categories', 'pantograph');?></p>
		<p>
		  <label for="<?php echo esc_attr($this->get_field_id( 'show_child_item ' )); ?>"><?php esc_html_e('Do you want to show child items?', 'pantograph'); ?></label><br/>
		  <?php if($instance['show_child_item']==1){ ?>
		  <?php esc_html_e('Yes', 'pantograph'); ?> <input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'show_child_item' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_child_item' )); ?>" class="widefat" value="<?php echo esc_attr($instance['show_child_item']); ?>" checked>
		  <?php }else{ ?>
		  <?php esc_html_e('Yes', 'pantograph'); ?> <input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'show_child_item' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_child_item' )); ?>" class="widefat" value="<?php esc_html_e('1', 'pantograph');?>">
		  <?php } ?>
		</p>
		<p>
		  <label for="<?php echo esc_attr($this->get_field_id( 'show_post_count_item ' )); ?>"><?php esc_html_e('Do you want to show post count items?', 'pantograph'); ?></label><br/>
		  <?php if($instance['show_post_count_item']==1){ ?>
		  <?php esc_html_e('Yes', 'pantograph'); ?> <input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'show_post_count_item' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_count_item' )); ?>" class="widefat" value="<?php echo esc_attr($instance['show_post_count_item']); ?>" checked>
		  <?php }else{ ?>
		  <?php esc_html_e('Yes', 'pantograph'); ?> <input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'show_post_count_item' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_count_item' )); ?>" class="widefat" value="<?php esc_html_e('1', 'pantograph');?>">
		  <?php } ?>
		</p>
		<script>
		jQuery(document).ready(function($){
			$('.category_widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'category_widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'category_widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'category_widget_title_color' )); ?>" class="widefat category_widget_title_color" value="<?php echo esc_attr($instance['category_widget_title_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.category_widget_title_background_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'category_widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'category_widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'category_widget_title_background_color' )); ?>" class="widefat category_widget_title_background_color" value="<?php echo esc_attr($instance['category_widget_title_background_color']); ?>">
    </p>
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">	
			
<?php
    }
  

}//end of class

// register pantograph_include_category_widget widget
if ( ! function_exists( 'pantograph_register_include_category_Widget' ) ) {
function pantograph_register_include_category_Widget() {
  register_widget( 'pantograph_include_category_widget' );  // Class Name
}
add_action( 'widgets_init', 'pantograph_register_include_category_Widget' );
}