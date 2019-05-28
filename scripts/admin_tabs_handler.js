//.toggleClass("class1 class2");
$(document).ready(function() {
	show_tab(1);
	var tab_name_now = 1;

	$('.tab_name').click(function() {
		var tab_name_id = parseInt($(this).attr('id').match(/\d+/));

		if(tab_name_id != tab_name_now) {
			show_tab(tab_name_id);
			tab_name_now = tab_name_id;
		}

	});		
	
});


function show_tab(tab_id) {
	$('.tab_content').each(function() {
		tab_id = parseInt(tab_id);
		var tab_content_id = parseInt($(this).attr('id').match(/\d+/));

		var temp_tab_name = $('#tab_name_' + tab_content_id);

		// if(temp_tab_name.hasClass('active_tab_name')) {
		// 	temp_tab_name.toggleClass('inactive_tab_name active_tab_name');
		// }

		if(tab_content_id == tab_id) {
			$(this).show();
			temp_tab_name.toggleClass('inactive_tab_name active_tab_name');
		} else {
			$(this).hide();
			if(temp_tab_name.hasClass('active_tab_name')) {
				temp_tab_name.toggleClass('inactive_tab_name active_tab_name');
			}
		}

	});
}