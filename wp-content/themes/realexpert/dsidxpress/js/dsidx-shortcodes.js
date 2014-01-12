jQuery(document).ready(function($) {
	//Regex ShortCodes
	var sxl = $('#idx-single-content').html();
	if( sxl == null){

	}else{
		var rest = sxl.replace(/<p>([^]+)<\/p>\n<table/gm, '<h3 class="table-title">$1</h3><table');
		$('#idx-single-content').html(rest);
	}

	var w = $('.dsidx-prop-summary img').outerWidth();
	$('.dsidx-prop-summary .dsidx-prop-title').css('left',w+'px');

	var th = $('.dsidx-prop-title').outerHeight();
	$('.dsidx-prop-features').css('margin-top', th+5+'px');
});