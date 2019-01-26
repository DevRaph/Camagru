let btn_left = document.querySelector("#btn-left");
let btn_top = document.querySelector("#btn-top");
let btn_right = document.querySelector("#btn-right");
let btn_bottom = document.querySelector("#btn-bottom");
let zoom_up = document.querySelector("#zoom-up");
let zoom_down = document.querySelector("#zoom-down");

let x = document.querySelector('#filter_x_coord');
let y = document.querySelector('#filter_y_coord');
let size = document.querySelector('#filter_size');
let filter = document.querySelector('#select_filter');

if (btn_left)
{
	btn_left.addEventListener('click', function (e) {
		x.value--;
    	filter.style.left = x.value+"%";
		e.preventDefault();
	})
}

if (btn_top)
{
	btn_top.addEventListener('mousedown', function (e) {
		y.value--;
		filter.style.top = y.value+"%";
		e.preventDefault();
	})
}

if (btn_right)
{
	btn_right.addEventListener('mousedown', function (e) {;
		x.value++;
		filter.style.left = x.value+"%";
		e.preventDefault();
	})
}

if (btn_bottom)
{
	btn_bottom.addEventListener('mousedown', function (e) {
		y.value++;
		filter.style.top = y.value+"%";		e.preventDefault();
	})
}

if (zoom_up)
{
	zoom_up.addEventListener('mousedown', function (e) {
		size.value++;
		filter.style.width = size.value+"%";
		e.preventDefault();
	})
}

if (zoom_down)
{
	zoom_down.addEventListener('mousedown', function (e) {
		size.value--;
		filter.style.width = size.value+"%";
		e.preventDefault();
	})
}

window.addEventListener("keydown", function (e) {
	e.preventDefault();
	// up
	if (e.keyCode == "38") {
	    y.value--;
	    filter.style.top = y.value+"%";
	}
	//down
	if (e.keyCode == "40") {
		y.value++;
		filter.style.top = y.value+"%";
	}
	// left
	if (e.keyCode == "37") {
	    x.value--;
	    filter.style.left = x.value+"%";
	}
	// right
	if (e.keyCode == "39") {
	    x.value++;
	    filter.style.left = x.value+"%";
	}
	// zoom up
	if (e.keyCode == "107") {
	    size.value++;
	    filter.style.width = size.value+"%";
	}
	// zoom down
	if (e.keyCode == "109") {
	    size.value--;
	    filter.style.width = size.value+"%";
	}
}, false);
