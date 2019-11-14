<?php
$subscribefile = plugins_url() .'/the_pantograph_extensions/modules/pionus/subscribe/subscribe.php'; ?>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			// jQuery Validation
			$("#footer_signup").validate({
				// if valid, post data via AJAX
				submitHandler: function() {
					var subscribefile="<?php echo esc_url( $subscribefile ); ?>";
					$.post(subscribefile, { email: $("#email").val() }, function(data) {
						$('#footer_response').html(data);
					});
				},
				// all fields are required
				rules: {
					email: {
						required: false,
						email: false
					}
				}
			});
			
			$("#sidebar_signup").validate({
				// if valid, post data via AJAX
				submitHandler: function() {
					var subscribefile="<?php echo esc_url( $subscribefile ); ?>";
					$.post(subscribefile, { email: $("#email_address").val() }, function(data) {
						$('#sidebar_response').html(data);
					});
				},
				// all fields are required
				rules: {
					email: {
						required: false,
						email: false
					}
				}
			});
		});
</script>