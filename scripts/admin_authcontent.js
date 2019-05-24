$(document).ready(function() {

	$('.tab_name').click(function() {
		var id = $(this).attr('id').match(/\d+/);
		set_content(id);
	});



	$('.but').click(function() {
		var but_id = $(this).attr('id');
		if (but_id == 'insert') {
			set_content(get_active_content_id(), 1, get_cells());
		} else if (but_id == 'delete') {
			set_content(get_active_content_id(),  2, get_checked());
		} else if (but_id == 'save') {
			// var curr_id = get_active_content_id();
			// var selector = '#tab_content_'+ curr_id + ' table tbody tr';
			// var main = [];
			// // alert(selector);
			// $(selector).each(function() { //tr
			// 	var temp = [];
			// 	$(this).children().each(function() { //td

			// 		$(this).children().each(function() { //input:text, p
			// 			var pp = $(this).prop('tagName');

			// 			if(pp == "P") {
			// 				// alert($(this).text());
			// 				temp.push($(this).text());
			// 			} else if(pp == "INPUT" && $(this).attr('type') == 'text') {
			// 				// alert($(this).val());
			// 				temp.push($(this).val());
			// 			}

			// 		});

			// 	});
			// 	// alert(temp);
			// 	main.push(temp);
			// });
			// main.push({action_id: 3});
			set_content(get_active_content_id(), 3, get_cells());
		}
	});

});

function get_cells() {
	var curr_id = get_active_content_id();
	var selector = '#tab_content_'+ curr_id + ' table tbody tr';
	var main = [];
	// alert(selector);
	$(selector).each(function() { //tr
		var temp = [];
		$(this).children().each(function() { //td

			$(this).children().each(function() { //input:text, p
				var pp = $(this).prop('tagName');

				if(pp == "P") {
					// alert($(this).text());
					temp.push($(this).text());
				} else if(pp == "INPUT" && $(this).attr('type') == 'text') {
					// alert($(this).val());
					temp.push($(this).val());
				}

			});

		});
		// alert(temp);
		main.push(temp);
	});

	return main;
}

function get_active_content_id() {
	var id;

	$('.tab_name').each(function() {
		// if ($(this).hasClass('active_tab_name')) {return $(this).attr('id').match(/\d+$/)}
		if ($(this).hasClass('active_tab_name')) {
			id = $(this).attr('id').match(/\d+/);
			return false;
		}

	});

	return id;
}

function set_content(id, action_id=null, args=''){
	$.get('pages/templates/admin_table_handler.php', Object.assign({tab_id:id}, {action_id:action_id}, {data:args}), function(data) {
		$('#tab_content_'+id).html(data);
	});
}

function get_checked() {
	var checkedbox = [];
	var selection = '#tab_content_'+get_active_content_id()+' input:checked';
	$(selection).each(
		function() {
			if($(this).attr('id') != 'all') {
				checkedbox.push($(this).attr('id').match(/\d+/));
			}
		}
	);

	return checkedbox;
}