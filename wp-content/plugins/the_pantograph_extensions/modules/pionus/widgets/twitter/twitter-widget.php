<?php
function register_pionusnews_twitter_widget() {
    register_widget( 'Ft_tremendous_Twitter_Tweets_Widget' );
}
add_action( 'widgets_init', 'register_pionusnews_twitter_widget' );
class Ft_tremendous_Twitter_Tweets_Widget extends WP_Widget {

function __construct() {
    parent::__construct(
        'twitter-tweets-widget',
        __( 'Twitter Tweets', 'pionusnews_twitter_tweets_widget' ),
        array(
			'classname' => 'pionusnews_tweets',
            'description' => __( 'Displays latest tweets from Twitter.', 'pionusnews_twitter_tweets_widget' ),
			'customize_selective_refresh' => true,
        )
    );
}

public function widget( $args, $instance ) {
    $title                  = $instance['title'];
    $username                  = $instance['twitter_username'];
    $limit                     = $instance['update_count'];
    $oauth_access_token        = $instance['oauth_access_token'];
    $oauth_access_token_secret = $instance['oauth_access_token_secret'];
    $consumer_key              = $instance['consumer_key'];
    $consumer_secret           = $instance['consumer_secret'];
    $current_time           = $instance['current_time'];

echo $args['before_widget'];	
if ( ! empty( $title ) ) {
$title = '<span class="sh-text">'.wp_kses_post( $title ).'</span>';
}
if ( ! empty( $title ) ) { echo $args['before_title'] . $title . $args['after_title']; };
do_action( 'pionusnews_before_widget', $instance );
		
$output ='';
 if ( @fopen("http://google.com", "r") ){
    // Get the tweets.
    $timelines = $this->pionusnews_twitter_timeline( $username, $limit, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret );
 
    if ( $timelines ) {
 
        // Add links to URL and username mention in tweets.
        $patterns = array( '@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '/@([A-Za-z0-9_]{1,15})/' );
        $replace = array( '<a href="$1">$1</a>', '<a href="http://twitter.com/$1">@$1</a>' );
		$twitterlink = esc_url('https://twitter.com/'.$username);
		$output .='
	  <div class="carousel slide vertical" data-ride="carousel" id="quote-carousel">
		<a href="'.$twitterlink.'" target="_blank">
		<span class="icon-tweets"><i class="fab fa-twitter"></i></span>
		</a>';
		/*
		$output .='<ol class="carousel-indicators">';
		$datanumber = 0;
		foreach ( $timelines as $timeline ) {
		if($datanumber==0){ $class= "active";}else{ $class= "";}
		$output .='
		  <li data-target="#quote-carousel" data-slide-to="'.$datanumber.'" class="'.$class.'"></li>';
		$datanumber++;
		}
		$output .='</ol>';
	 */
	 $output .='<div class="carousel-inner">';
		  $number = 0;
		  foreach ( $timelines as $timeline ) {
          $result = preg_replace( $patterns, $replace, $timeline->text );
		  if($number==0){ $class= "active";}else{ $class= "";}
		  $output .='
		  <div class="item '.$class.'">
			  <div class="row">
				<div class="col-sm-12">
				<div class="tweet-desc">'.$result.'</div>
				  <p class="tweet-time">'.$this->pionusnews_tweet_time( $timeline->created_at ).'</p>
				</div>
			  </div>
		  </div>
		  ';
		  $number++;
		  }
		$output .='                  
	</div>
	
	<div class="slider-links"> 
	<ul class="tie-slider-nav">
	<li class="slick-arrow" style="display: list-item;"><a href="#quote-carousel" role="button" data-slide="prev"><span class="fa fa-angle-up"></span></a></li>
	<li class="slick-arrow" style="display: list-item;"><a href="#quote-carousel" role="button" data-slide="next"><span class="fa fa-angle-down"></span></a></li>
	</ul>
	<a href="'.$twitterlink.'" target="_blank" rel="nofollow" class="button">Follow Us</a> 
	</div>
	</div>';
echo $output;
    } else {
        _e( 'Error fetching feeds. Please verify the Twitter settings in the widget.', 'pionusnews_twitter_tweets_widget' );
    }
 }else{
	echo esc_html("Sorry, you must need internet connection to perform this widget.", 'pantograph');
}

do_action( 'pionusnews_after_widget', $instance );
echo $args['after_widget'];
}

public function form( $instance ) {
 
    if ( empty( $instance ) ) {
        $twitter_username = '';
        $update_count = '';
        $oauth_access_token = '';
        $oauth_access_token_secret = '';
        $consumer_key = '';
        $consumer_secret = '';
        $title = '';
        $current_time = time();
    } else {
        $title = $instance['title'];
        $twitter_username = $instance['twitter_username'];
        $update_count = isset( $instance['update_count'] ) ? $instance['update_count'] : 5;
        $oauth_access_token = $instance['oauth_access_token'];
        $oauth_access_token_secret = $instance['oauth_access_token_secret'];
        $consumer_key = $instance['consumer_key'];
        $consumer_secret = $instance['consumer_secret'];
        $current_time = $instance['current_time'];
    }
     
    ?>
	
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">
            <?php echo __( 'Title', 'pionusnews_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>">
            <?php echo __( 'Twitter Username (without @)', 'pionusnews_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" type="text" value="<?php echo esc_attr( $twitter_username ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'update_count' ); ?>">
            <?php echo __( 'Number of Tweets to Display', 'pionusnews_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'update_count' ); ?>" name="<?php echo $this->get_field_name( 'update_count' ); ?>" type="number" value="<?php echo esc_attr( $update_count ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'oauth_access_token' ); ?>">
            <?php echo __( 'OAuth Access Token', 'pionusnews_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'oauth_access_token' ); ?>" name="<?php echo $this->get_field_name( 'oauth_access_token' ); ?>" type="text" value="<?php echo esc_attr( $oauth_access_token ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'oauth_access_token_secret' ); ?>">
            <?php echo __( 'OAuth Access Token Secret', 'pionusnews_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'oauth_access_token_secret' ); ?>" name="<?php echo $this->get_field_name( 'oauth_access_token_secret' ); ?>" type="text" value="<?php echo esc_attr( $oauth_access_token_secret ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'consumer_key' ); ?>">
            <?php echo __( 'Consumer Key', 'pionusnews_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'consumer_key' ); ?>" type="text" value="<?php echo esc_attr( $consumer_key ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'consumer_secret' ); ?>">
            <?php echo __( 'Consumer Secret', 'pionusnews_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'consumer_secret' ); ?>" type="text" value="<?php echo esc_attr( $consumer_secret ); ?>" />
    </p>
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">	
		
    <?php
     
}

public function update( $new_instance, $old_instance ) {
    $instance = array();
     
    $instance['title']                      = ( ! empty( $new_instance['title'] ) )                     ? strip_tags( $new_instance['title'] ) : '';
    $instance['twitter_username']           = ( ! empty( $new_instance['twitter_username'] ) )          ? strip_tags( $new_instance['twitter_username'] ) : '';
    $instance['update_count']               = ( ! empty( $new_instance['update_count'] ) )              ? strip_tags( $new_instance['update_count'] ) : '';
    $instance['oauth_access_token']         = ( ! empty( $new_instance['oauth_access_token'] ) )        ? strip_tags( $new_instance['oauth_access_token'] ) : '';
    $instance['oauth_access_token_secret']  = ( ! empty( $new_instance['oauth_access_token_secret'] ) ) ? strip_tags( $new_instance['oauth_access_token_secret'] ) : '';
    $instance['consumer_key']               = ( ! empty( $new_instance['consumer_key'] ) )              ? strip_tags( $new_instance['consumer_key'] ) : '';
    $instance['consumer_secret']            = ( ! empty( $new_instance['consumer_secret'] ) )           ? strip_tags( $new_instance['consumer_secret'] ) : '';
    $instance['current_time']            = ( ! empty( $new_instance['current_time'] ) )           ? strip_tags( $new_instance['current_time'] ) : '';
 
    return $instance;
}

public function pionusnews_twitter_timeline( $username, $limit, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret) {
 
    /** Set access tokens here - see: https://dev.twitter.com/apps/ */
    $settings = array(
        'oauth_access_token'        => $oauth_access_token,
        'oauth_access_token_secret' => $oauth_access_token_secret,
        'consumer_key'              => $consumer_key,
        'consumer_secret'           => $consumer_secret
    );
 
    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = '?screen_name=' . $username . '&count=' . $limit;
    $request_method = 'GET';
     
    $twitter_instance = new FTTwitterAPIExchange( $settings );
     
    $query = $twitter_instance
        ->setGetfield( $getfield )
        ->buildOauth( $url, $request_method )
        ->performRequest();
     
    $timeline = json_decode($query);
 
    return $timeline;
}

public function pionusnews_tweet_time( $time ) {
    // Get current timestamp.
    $now = strtotime( 'now' );
 
    // Get timestamp when tweet created.
    $created = strtotime( $time );
	$postdate = date('d-M-Y', $created);
    return $postdate;
}
}