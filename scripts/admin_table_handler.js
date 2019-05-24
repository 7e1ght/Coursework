$(document).ready(function() {

	$('.tab_content').on('click', 'input:checkbox', function() {
		if($(this).attr('id') == 'all') {

			if($(this).prop('checked')) {	
				$(".body_checkbox").prop('checked', true);
			} else {
				$(".body_checkbox").prop('checked', !$(".body_checkbox").prop('checked'));
			}

		} else {
			if($('#all').prop('checked')) {
				$('#all').prop('checked', false);
			}
		}

	});

});