<?php
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pantograph_get_option('global_white_conainter');
	$pantograph_body_bg_img = get_post_meta(get_the_ID(), 'pantograph_body_bg_img', true);
?>
<header class="header header7">
<!-- Fixed navbar -->
<nav class="navbar navbar-default<?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if($pantograph_body_bg_img){ ?> navstyle-for-bg<?php } } ?>">
		
  <div class="container">
  <div class="search-bar">
			<form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			  <input type="text" placeholder="<?php esc_attr_e('Type search text here...', 'pantograph'); ?>" class="form-control" name="s">
			</form>
		<div class="search-close"><i class="fa fa-times"></i></div>
	</div>
	
    <div class="navbar-header">
      <ul class="nav navbar-nav leftside">
	  <?php
			if (has_nav_menu('pantograph_left_menu')) {
			wp_nav_menu(array(
			'theme_location' 	=>'pantograph_left_menu', 'depth' => 1, 'container' => false, 'items_wrap' => '%3$s'
			)); 
			}
		?>
      <li class="dropdown">
        <a href="#" class="searchicon">
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </a>
      </li>
    </ul>
    </div>
	
<?php
	if (has_nav_menu('pantograph_right_menu')) {
	wp_nav_menu( array(
		'theme_location'    => 'pantograph_right_menu',
		'container'     => false,
		'container_id'      => '',
		'conatiner_class'   => '',
		'menu_class'        => 'nav navbar-nav navbar-right hidden-xs', 
		'echo'          => true,
		'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'         => 10
	) );
	}
?>
</div>
<div class="container">
<div class="col-md-12">
	<div class="row">
		<div class="navbar-brand mw33">
			  <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
				<?php pantograph_the_custom_logo(); ?>
			  <?php else: ?>
			  <?php if(pantograph_get_option('logo_url') != '') { ?>
			  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>" src="<?php echo esc_url( pantograph_get_option('logo_url') ); ?>"></a> 
			  <?php } else { ?>
			  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ).'/img/logo.png'; ?>" alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>"/></a>
			  <?php } ?>
			  <?php endif; ?>
		</div>
		<div class="browseallicon hidden-sm hidden-md hidden-lg hidden-xl">
			<a class="btn-open" href="#"> </a>
		</div>
		<div class="add_block_hdefault pull-right">
			<?php 
			if ( is_active_sidebar( 'header_right_add_widgets' ) ) { 
			dynamic_sidebar( 'header_right_add_widgets' ); 
			}
			?>
		</div>
		</div>
	<?php
	if (has_nav_menu('pantograph_right_menu')) {
	wp_nav_menu( array(
		'theme_location'    => 'pantograph_right_menu',
		'container'     => false,
		'container_id'      => '',
		'conatiner_class'   => '',
		'menu_class'        => 'nav navbar-nav navbar-right hidden-sm hidden-md hidden-lg hidden-xl', 
		'echo'          => true,
		'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'         => 10
	) );
	}
?>	
</div>
</div>
<div class="newmenu">
<div class="container">
<div class="collapse navbar-collapse navbar-ex1-collapse main-navigation">
<?php
	if (has_nav_menu('pantograph_primary_menu')) {
	wp_nav_menu( array(
		'theme_location'    => 'pantograph_primary_menu',
		'container'     => false,
		'container_id'      => '',
		'conatiner_class'   => '',
		'menu_class'        => 'nav navbar-nav mainnavblock mainnavblock7', 
		'echo'          => true,
		'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'         => 10, 
		'walker'        => new pantograph_walker_nav_menu
	) );
	}
?>
</div>

<div class="browseallicon hidden-xs">
	<a class="btn-open" href="#"><span class="hidden-xs hidden-sm"><?php esc_html_e( 'Browse All Sections', 'pantograph' ); ?></span></a>
</div>
</div>
</div>
<div class="browseallmenu container">
	<div class="wrap">
		<ul class="wrap-nav">
		<?php 
			$args = array('orderby' => 'name','order' => 'ASC', 'parent' => 0);
			$Parent_categories = get_categories($args);
			foreach($Parent_categories as $category) {
		?>
			<li class="main_menu_item">
			<a class="main_menu_title" href="<?php echo esc_url(get_category_link( $category->term_id )); ?>"><?php echo esc_attr($category->category_nicename); ?></a>
			<ul>
				<?php
					$Childargs = array('orderby' => 'name','order' => 'ASC', 'parent' => $category->term_id);
					$Child_categories = get_categories($Childargs);
					foreach ($Child_categories as $c){
				?>
				<li class="ballmenu-li"><a href="<?php echo esc_url(get_category_link( $c->term_id )); ?>"><?php echo esc_attr($c->name) ?></a></li>
				<?php } ?>
			</ul>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
</nav>
</header>