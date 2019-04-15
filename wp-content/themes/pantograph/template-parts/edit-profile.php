<?php
/**
 * Template Name: Edit Profile
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_old'){
get_header();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
}
$success_basic = '';
$error_update = '';
$full_name = $username = $email = $password = '';

global $wpdb, $PasswordHash, $current_user, $user_ID;

$pre_first_name = get_user_meta( $current_user->ID, 'first_name', true ); 
$pre_last_name = get_user_meta( $current_user->ID, 'last_name', true ); 
$pre_address = get_user_meta( $current_user->ID, 'address', true ); 
$pre_state = get_user_meta( $current_user->ID, 'state', true ); 
$pre_city = get_user_meta( $current_user->ID, 'city', true ); 
$pre_zip = get_user_meta( $current_user->ID, 'zip', true ); 
$pre_country = get_user_meta( $current_user->ID, 'country', true ); 
$pre_username = $current_user->user_login ; 
$pre_email = $current_user->user_email; 

if(isset($_POST['update'])) {
	$first_name = esc_sql(trim($_POST['first_name']));
	$last_name = esc_sql(trim($_POST['last_name']));
	$address = esc_sql(trim($_POST['address']));
	$state = esc_sql(trim($_POST['state']));
	$city = esc_sql(trim($_POST['city']));
	$zip = esc_sql(trim($_POST['zip']));
	$country = esc_sql(trim($_POST['country']));

	if((($first_name!=''))) {
	$userdata = array(
		'ID' => $current_user->ID,
		'first_name'  =>  $first_name,
		'last_name'  =>  $last_name,
		'address'   =>  $address,
		'state'   =>  $state,
		'city'   =>  $city,
		'zip'   =>  $zip,
		'country'   =>  $country
	);   
         
	foreach($userdata as $key => $value) {
		$status = update_user_meta( $current_user->ID, $key, $value );
	}
		
	if ( ! is_wp_error( $status ) ) {
		$success_basic = '<b style="color:green;margin-bottom:10px;display:block;">'.esc_html__('You have successfully updated your profile', 'pantograph').'</b>';
		echo "<script type='text/javascript'>setTimeout(function () { window.location='' }, 5000);</script>"; 
	}else{
		$error_update = '<b style="color:red;margin-bottom:10px;display:block;">'.esc_html__('Error on update', 'pantograph').'</b>';
	}

	}else{
		$error_update = '<b style="color:red;margin-bottom:10px;display:block;">'.esc_html__('Error on update, Enter required information', 'pantograph').'</b>';
	}

}
?>
<div class="inner-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="well"><?php echo get_the_title(); ?></h1>
				<?php echo $success_basic; //escaped before already ?>
				<?php echo $error_update; //escaped before already ?>
				<div class="col-lg-12 well">
				<div class="row">
					<form action="" method="post">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6 form-group">
									<label><?php esc_html_e('First Name*', 'pantograph'); ?></label>
									<input type="text" name="first_name" placeholder="<?php esc_attr_e('Enter First Name Here..', 'pantograph'); ?>" class="form-control" value="<?php echo esc_attr($pre_first_name); ?>">
								</div>
								<div class="col-sm-6 form-group">
									<label><?php esc_html_e('Last Name', 'pantograph'); ?></label>
									<input type="text" name="last_name" placeholder="<?php esc_attr_e('Enter Last Name Here..', 'pantograph'); ?>" class="form-control" value="<?php echo esc_attr($pre_last_name); ?>">
								</div>
							</div>					
							<div class="form-group">
								<label><?php esc_html_e('Address', 'pantograph'); ?></label>
								<textarea placeholder="<?php esc_attr_e('Enter Address Here..', 'pantograph'); ?>" name="address" rows="3" class="form-control"><?php echo esc_attr($pre_address); ?></textarea>
							</div>	
							<div class="row">
								<div class="col-sm-4 form-group">
									<label><?php esc_html_e('City', 'pantograph'); ?></label>
									<input type="text" name="city" placeholder="<?php esc_attr_e('Enter City Name Here..', 'pantograph'); ?>" class="form-control" value="<?php echo esc_attr($pre_city); ?>">
								</div>	
								<div class="col-sm-4 form-group">
									<label><?php esc_html_e('State', 'pantograph'); ?></label>
									<input type="text" placeholder="<?php esc_attr_e('Enter State Name Here..', 'pantograph'); ?>" name="state" class="form-control" value="<?php echo esc_attr($pre_state); ?>">
								</div>	
								<div class="col-sm-4 form-group">
									<label><?php esc_html_e('Zip', 'pantograph'); ?></label>
									<input type="text" placeholder="<?php esc_attr_e('Enter Zip Code Here..', 'pantograph'); ?>" name="zip" class="form-control" value="<?php echo esc_attr($pre_zip); ?>">
								</div>		
							</div>						
						<div class="form-group">
							<label><?php esc_html_e('Country', 'pantograph'); ?></label>
							<input type="text" placeholder="<?php esc_attr_e('Enter Country Here..', 'pantograph'); ?>" name="country" class="form-control" value="<?php echo esc_attr($pre_country); ?>">
						</div>	
						
						<div class="form-group">
							<label><?php esc_html_e('User Name', 'pantograph'); ?></label>
							<input type="text" placeholder="<?php esc_attr_e('Enter User Name Here..', 'pantograph'); ?>" name="username" class="form-control" value="<?php echo esc_attr($pre_username); ?>" readonly>
						</div>	
						
						<div class="form-group">
							<label><?php esc_html_e('Email Address', 'pantograph'); ?></label>
							<input type="text" placeholder="<?php esc_attr_e('Enter Email Address Here..', 'pantograph'); ?>" name="email" class="form-control" value="<?php echo esc_attr($pre_email); ?>" readonly>
						</div>	
						<button type="submit" name="update" class="btn btn-lg btn-info"><?php esc_html_e('Update Profile', 'pantograph'); ?></button>					
						</div>
					</form> 
					</div>
				</div>
			</div>
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php 
if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
}
?>