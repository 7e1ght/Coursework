$(document).ready(
	function() {
		out_click();
	}
);

function out_click() {
	$(document).mouseup(
		function(event) {
			var div = $(".full_card");
// !$(".cards").is(event.target)
			if(!div.is(event.target) && div.has(event.target).length === 0) {
				div.fadeOut(500);
			}

		}
	);
}