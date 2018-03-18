function hapus() {
	if (confirm("Anda Yakin akan menghapus Data ini?")) {
		return true;
	} else {
		return false;
	}
}// JavaScript Document

function approve() {
	if (confirm("Anda yakin akan approve data ini?")) {
		return true;
	} else {
		return false;
	}
}// JavaScript Document

function PopupCenter(pageURL, title, w, h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

// Read image from input file
function readImage(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#viewimage')
				.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}