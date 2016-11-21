<h1>ADMIN SUBMISSIONS PLUGIN PAGE</h1>
<div class='page-controller'>
	<a class='previous-page' href='#'> <- </a>
		<span class='page-number'>1</span>
	<a href='#' class='next-page'> -> </a>
</div>
<div class="table-container">
</div>

<?php

	add_action( 'admin_footer', 'admin_open_javascript' );

	function admin_open_javascript() { ?>
		<script type="text/javascript" >
		jQuery(document).ready(function($) {
			var changeTableEvent = new Event('changeTable');
			var data = {
				action: 'admin_open',
				page_number: 1,
				order_by: "name"
			};
			jQuery.post(ajaxurl, data, (response) => {
				$('.table-container').html(response);
				$('.table-container').trigger('changeTable');
			});
		});
		</script> <?php
	}
