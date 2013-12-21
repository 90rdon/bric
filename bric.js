function init() {
	//IP Header
	alignHeader();
	jQuery(window).resize(alignHeader);
	
	//About Page Columnizer
	jQuery('.page-about .text-content').columnize({
		columns:2
	});
	
	//SEO template H1 styler
	jQuery(".seo-template .main-column h1").each( function(index,value) {
		jQuery(this).html( "<span style='display:inline-block' class='text'>" + jQuery(this).html() +"</span>");
		var lineWidth = jQuery(this).width() - ( jQuery(this).find(".text").width() + 5);
		jQuery(this).append("<span style='width:"+lineWidth+"px' class='line-span'></span>");
	});
	
	//Cufon
	Cufon.replace("#top-menu > li > a", {
		fontFamily:"Questrial"
	});
	
	Cufon.replace("#area-links h2", {
		fontFamily:"Questrial"
	});
	
	//Encapsulate results
	jQuery("#IDX-googleMap").after("<div class='IDX-result-wrap'></div>");
	jQuery(".IDX-resultsCell").each( function(i,v) {
		jQuery(v).clone().appendTo(".IDX-result-wrap");
		jQuery(v).remove();
	});
}

function onLoad() {
	//Scrollpane
	if ( jQuery().jScrollPane ) {
		jQuery(".IDX-result-wrap").jScrollPane({
			contentWidth: '534px',
			verticalDragMinHeight: 103,
			verticalDragMaxHeight: 103
		});
	}
	
	//Hide IDX source
	jQuery("#IDX-main > div:last-child").hide();
	
	//Move location data in IDX details page
	var str = jQuery(".IDX-detailsAdvancedLeft").html();
	var location = origLocation = sliceString(str,"<strong>Location</strong>:", "<br>",true);
	if ( location == "" ) {
		location = origLocation = sliceString(str,"<STRONG>Location</STRONG>:", "<BR>",true);
	}
	location += "<";
	location = sliceString(location,":","<",false);
	
	var locationStr = '<div class="IDX-detailsAddressBox">';
	locationStr += '<div class="IDX-detailsLabel">Location:</div>';
	locationStr += '<div class="IDX-detailsValue">' + location + '</div>';
	locationStr += '</div>'; 
	
	jQuery(".IDX-detailsPrice").after(locationStr);
	
	jQuery(".IDX-detailsAdvancedLeft").html( jQuery(".IDX-detailsAdvancedLeft").html().replace( origLocation +"<br>", "") );
	jQuery(".IDX-detailsAdvancedLeft").html( jQuery(".IDX-detailsAdvancedLeft").html().replace( origLocation +"<BR>", "") );
}

function alignHeader() {
	var windowW = jQuery(window).width();
	var minW = 1130;
	var logoW = 408;
	var originalTnW = 722;
	var offset = ( windowW - minW ) / 2;
	
	if ( windowW > minW ) {
		jQuery("#hp-header #logo").css({"margin-left":offset+"px"});
		
		var tnW = windowW - (offset + logoW);
		jQuery("#top-navigation").css({
			'width':tnW+'px',
			'margin-left':(offset+logoW)+'px'
		});
	}
	else {
		jQuery("#hp-header #logo").css({"margin-left":"0px"});
		jQuery("#top-navigation").css({
			'width':originalTnW+'px',
			'margin-left':(logoW)+'px'
		});
	}
}

function sliceString(str,start,end,includeStart){
	var startIndex = str.indexOf(start);
	var endIndex = str.indexOf(end,startIndex);
	
	return str.slice(includeStart ? startIndex : startIndex+1, endIndex);
}