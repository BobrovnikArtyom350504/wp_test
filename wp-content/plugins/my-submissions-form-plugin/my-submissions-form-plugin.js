(function(){
	var pageNumber = 1;
	var orderBy = 'name';
	jQuery(document).ready(($) => {
		setOnSortClickListener($);
		setOnNextClickListener($);
		setOnPreviousClickListener($);
	});

	function setOnNextClickListener($) {
		$('.next-page').click((event)=>{
			event.preventDefault();
			if(pageNumber < window.plugin_data.pages_count) {
				sentPost($, pageNumber + 1, orderBy, (response)=>{
					$('.table-container').html(response);
					$('.page-number').html(++pageNumber);
				});
			}
		});
	}

	function setOnPreviousClickListener($) {
		$('.previous-page').click((event)=>{
			event.preventDefault();
			if(pageNumber > 1) {
				sentPost($, pageNumber - 1, orderBy, (response)=>{
					$('.table-container').html(response);
					$('.page-number').html(--pageNumber);
				});
			}
		});
	}

	function setOnSortClickListener($) {
		$('.table-container').on('changeTable',()=>{
			$('.submissions-table thead tr').click((event)=> {
				event.preventDefault();
				var selectedSortType = $(event.target).html();
				sentPost($, 1, selectedSortType, (response)=>{
					$('.table-container').html(response);
					orderBy = selectedSortType;
					pageNumber = 1;
					$('.page-number').html(pageNumber);
				});
			});
		});
	}

	function sentPost($, pageNumber, orderBy, onSuccess) {
		$.post(window.plugin_data.ajax_url, 
			{ 
				action: 'change_table',
				page_number: pageNumber,
				order_by: orderBy
			},
			(response)=> {
				onSuccess(response);
				$('.table-container').trigger('changeTable');
			}
		);
	}

})();