jQuery(document).ready(function($) {
	// IDX Plugin
	var sel = $('#dsidx-header').html();
	if(sel == null){
		
	}else{
		var str = sel.replace(/<\/label>([^]+)<\/td>/gm, '</label><div class="idx-notice">$1</div></td>');
		$('#dsidx-header').html(str);
	}
});