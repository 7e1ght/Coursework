$(document).ready(function() {

	$('.tab_content').on('click', '.selector', function() {
		// if($(this).attr('id') == 'all') {
		// 	if($(this).prop('checked')) {	
		// 		$(".body_checkbox").prop('checked', true);
		// 	} else {
		// 		$(".body_checkbox").prop('checked', false);
		// 	}
		// } else {
		// 	if($('#all').prop('checked')) {
		// 		$('#all').prop('checked', false);
		// 	}
		// }

		var a = $(this);
		var s = $("#tab_content_"+get_active_content_id()+" thead tr th #all");

		if(a.attr('id') == 'all') {
			if(a.prop('checked')) {
				$("#tab_content_"+get_active_content_id()+" .body_checkbox").prop('checked', true);
			} else {
				$("#tab_content_"+get_active_content_id()+" .body_checkbox").prop('checked', false);
			}
		} else {

			if(s.prop('checked')) {
				s.prop('checked', false);
			}
		}
	});

	$('.tab_content').on('click', '.checkbox_column_header', function() {
		var orderby_column_array = [];
		var selector = '#tab_content_'+get_active_content_id()+' .checkbox_column_header:checked';

		$(selector).each(function() {
			orderby_column_array.push($(this).attr('id'));
		});

		set_content(get_active_content_id(), 'orderby', orderby_column_array, $(this));

	});

});

// function set_back(obj) {
// 	var v = obj.closest('th');
// 	var id = obj.closest('th').attr('id').match(/\d+/);
	
// 	// v.toggleClass('orderby_column');
// 	alert(v.attr('id'));
	
// 	var selector = "#tab_content_"+get_active_content_id()+" tbody tr .table_data";
// 	// alert(selector);

// 	$(selector).each(function() {
// 		var c_id =$(this).attr('id').match(/\d+/);


// 		if (parseInt(c_id) == parseInt(id)) {
// 			// alert("Here we go again");
// 			$(this).toggleClass('orderby_column');
// 		}
// 		alert( $(this).attr('id').match(/\d+/) ) ;
// 	});
// }
