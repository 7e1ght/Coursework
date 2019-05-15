window.onload = function() {
	resize();

	document.getElementsByClassName("flying_text")[0].className += " active";
};

function resize() {
	document.getElementsByClassName("content_wrapper")[0].style.marginTop = document.body.clientHeight+"px";

	var ft = document.getElementsByClassName("flying_text")[0];
	ft.style.top = (document.body.clientHeight/3)+"px";
	ft.style.left = (document.body.clientWidth-ft.offsetWidth)/2+"px";
}