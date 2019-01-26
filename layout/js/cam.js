'use strict';

let width = 320;
let height = 240;

let video = null;
let canvas = null;
let video_div = null;
let put_file_div = null;
let snapshotButton = null;
let overlay = null;
let backgroundSelect = null;
let select_filter = null;
let overlay_btn = null;

function start()
{
	snapshotButton = document.querySelector('button#shot');
	video = window.video = document.querySelector('#video_launch');
	canvas = window.canvas = document.querySelector('#canvas');
	put_file_div = document.querySelector('.put_file');
	video_div = document.querySelector('.video');
	backgroundSelect = document.querySelector('div#background');
	overlay = document.querySelector('img#overlay_img');
	select_filter = document.querySelector("#select_filter");

	canvas.width = width;
	canvas.height = height;
	snapshotButton.disabled = true;
	snapshotButton.className = 'btn disabled';

	if (!navigator.mediaDevices.getUserMedia) {
		console.log("getUserMedia() not supported.");
		return;
	}

	navigator.mediaDevices.getUserMedia({ audio: false, video: { width: { min: 320 }, height: { min: 240 }  }})
	.then(
		function (stream) {
			if (navigator.mozGetUserMedia) {
				video.mozSrcObject = stream;
			} else {
				let vendorURL = window.URL || window.webkitURL;
				video.src = vendorURL.createObjectURL(stream);
			}
	})
	.catch(
		function (error) {
			console.log(error);
			console.log("An error occured : " + error.message);
		}
	);

	backgroundSelect.addEventListener('click', function(e) {
		e.preventDefault();
		let nodes = this.childNodes;
		let filter_img = document.querySelector("#filter_img");
		for (let i = 0; i < nodes.length; i++)
		{
			nodes[i].className = "";
			select_filter.src = "";
			select_filter.style.display = "none";
			filter_img.value = "";
		}
		if (e.target.localName === 'img')
		{
			e.target.className = "selected";
			if (video_div.className.search("hide") == -1)
			{
				select_filter.style.display = "block";
				if (select_filter.src.search("/pages\/index.php/i")) {
					select_filter.src = select_filter.src.replace("pages/index.php", "layout/img/");
				}
				if (select_filter.src.search("/pages/i")) {
					select_filter.src = select_filter.src.replace("pages/", "layout/img/");
				}
				console.log(select_filter.src);
				select_filter.src += e.target.id + ".png";
				filter_img.value = e.target.id + ".png";
			}
			snapshotButton.disabled = false;
			snapshotButton.className = 'btn';
		}
	});

	snapshotButton.addEventListener('click', function (e) {
		create_photo();
		e.preventDefault();
	}, false);
}

function create_photo()
{
	let context = canvas.getContext('2d');

	if (width && height)
	{
		context.width = width;
		context.height = height;
		context.drawImage(video, 0, 0, context.width, context.height);
		let data = canvas.toDataURL('image/png');
		document.querySelector("#img_background").value = data;
		document.querySelector("#filter_form").submit();
	}

}

window.addEventListener('load', start, false);