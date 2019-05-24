var creater_url = "pages/templates/sorted_page_creater.php";

$(document).ready(
	function() {


		$.ajax( {
			url: creater_url,
			success: function(data) {
				$(".catalog").html(data);
			}
		});


		//set_sort();
		set_click();
	}
);

//Заготовка для сортировки
function set_sort() {
	$(".sort_block input:radio").click(function () {
		var id = $(this).attr('id');

		$.ajax( {
			url: creater_url,
			data: "sort_id="+id,
			type: "get",
			success: function(data) {
				$(".catalog").fadeOut(1000, function() {
					$(".catalog").html(data);
				});
				$(".catalog").fadeIn(1000);
			}
		});	

		// $.ajax ({
		// 	url: "sorted_page_creater.php",
		// 	// data: "sort_type="+sort_type,
		// 	// type: "get",
		// 	success: function (data) {
		// 		$(".test").html(data);
		// 	}	
		// });

	});
};

function set_click() {
	$(".catalog").on("click", ".cards",
		function() {

			var id = $(this).attr("id");//.substr(-1);
			id = id.match(/[0-9]+/);
			$.ajax({
				url: "pages/templates/zoom_card_creater.php",
				data: "card_id="+id,
				type: "GET",
				success: function(data) {
					$(".full_card").fadeOut(500, 
						function() {
							$(".full_card").html(data).fadeIn(500)
						}
					);
				}
			});
		}
	);
}