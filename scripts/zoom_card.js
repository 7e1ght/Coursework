$(document).ready(
	function() {
		out_click();
	}
);

function out_click() {
	$(document).mouseup(
		function(event) {
			var div = $(".full_card");

			if(!div.is(event.target) && !$(".cards").is(event.target)) {
				div.fadeOut(500);
			}

		}
	);
}