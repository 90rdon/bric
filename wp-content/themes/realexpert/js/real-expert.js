jQuery(document).ready(function($) {
    // $() will work as an alias for jQuery() inside of this function
	
	/*-----------------------------------------------------------------------------------*/
    /*	Flexslider
    /*-----------------------------------------------------------------------------------*/
	 $(window).load(function(){
		// Homepage Slider
		$('.flexslider').flexslider({
			animation: "fade",
			slideshow: slide.start,
			slideshowSpeed: slide.interval,
			controlNav: false,
			directionNav: true,
			controlsContainer: '.flex-container',
			start: function(slider){
			  $('body').removeClass('loading');
			}
		});


		/*-----------------------------------------------------------------------------------*/
		/*	Cap Rate Adjustments
		/*-----------------------------------------------------------------------------------*/
		$('#management-fees-table').on({
	    shown: function(){
        $(this).css('overflow','visible', 'important');
	    },
	    hide: function(){
        $(this).css('overflow','hidden');
	    }
		});

		$('#calculate-cap-rate').click(function() {
			$(this).text(function(i, old) {
				if (old=="Open Investor's Toolbox") {
					CalculateWithFees();
					DisplayFees();
					return "Close Investor's Toolbox";
				} else {
					CalculateWithOutFees();
					HideFees();
					return "Open Investor's Toolbox";
				}
			});
		});

		$('.search-select').change(function(){
			CalculateWithFees();
		});

		function DisplayFees() {
			$('#management-fee-row').show();
			$('#maintainence-reserve-row').show();
		}

		function HideFees() {
			$('#management-fee-row').hide();	
			$('#maintainence-reserve-row').hide();	
		}

		function CalculateWithFees() {
			var price = parseInt($('#property-price').first().contents().filter(function() {
			    return this.nodeType == 3;
			}).text().replace(',', ''));
			var manFeeRate = parseFloat($('#property-management-fee').val());
			var vacRate = parseFloat($('#vacancy-rate').val());
			var mainRes = parseFloat($('#maintainence-reserve').val());

			if ($('#rent').length != 0 && $('#hoa').length != 0 && $('#tax').length != 0) {
				var rent = parseInt($('#rent').html().replace(/\D/g,''));
				var hoa = parseInt($('#hoa').html().replace(/\D/g,''));
				var tax = parseInt($('#tax').html().replace(/\D/g,''));
			};

			var manFee = rent * manFeeRate;
			var goi = rent - (rent * vacRate) - manFee;
			var noi = ((goi - hoa - tax) * 12) - mainRes;
			var caprate = 0;
			if (noi != 0)
				caprate = Math.round(((noi / price) * 100) * 2) / 2;

			$('.investment-cap-rate').html('Cap Rate: ' + caprate + '%');
			$('#noi').html('<h6>' + noi + '</h6>').currency({ decimals: 0 });
			$('#management-fee-rate').html(manFee).currency({ decimals: 0 });
			$('#maintainence-reserve-rate').html(mainRes).currency({ decimals: 0 });
		}

		function CalculateWithOutFees() {
			var price = parseInt($('#property-price').first().contents().filter(function() {
			    return this.nodeType == 3;
			}).text().replace(',', ''));
			var rent = parseInt($('#rent').html().replace(/\D/g,''));
			var hoa = parseInt($('#hoa').html().replace(/\D/g,''));
			var tax = parseInt($('#tax').html().replace(/\D/g,''));

			var noi = (rent - hoa - tax) * 12;
			var caprate = 0;
			if (noi != 0)
				caprate = Math.round(((noi / price) * 100) * 2) / 2;

			$('.investment-cap-rate').html('Cap Rate: ' + caprate + '%');
			$('#noi').html('<h6>' + noi + '</h6>').currency({ decimals: 0 });
			$('#management-fee-rate').html(0).currency({ decimals: 0 });
			$('#maintainence-reserve-rate').html(0).currency({ decimals: 0 });
		}
		
		/*-----------------------------------------------------------------------------------*/
		/*	jCarousel
		/*-----------------------------------------------------------------------------------*/
		$(function() { // Recent Property
			$('.jcarousel').jcarousel({
				list:'.jcontainer',
				item:'.span3',
				animation:1000,
				wrap:'circular',
			});
			
			$('.jcarousel').jcarouselAutoscroll({
				target:'+=1',
				interval:5000,
			});
			
			$('.jcarousel-control-prev').jcarouselControl({
				target:'-=1',
			});
			$('.jcarousel-control-next').jcarouselControl({
				target:'+=1',
			});
		});
		
		$(function(){	// Partners Carousel
			$('.partners-logo-wrapper').jcarousel({
				list:'.partner-list',
				item:'.partner-item',
				animation:600,
			});
			
			$('.partner-prev').jcarouselControl({
				target:'-=1',
			});
			$('.partner-next').jcarouselControl({
				target:'+=1',
			});
		});
		
	})
	
	/*-----------------------------------------------------------------------------------*/
    /*	Select Box
    /*-----------------------------------------------------------------------------------*/
	if(jQuery().selectbox){
        $('.search-select').selectbox();
    }
	
	/*-----------------------------------------------------------------------------------*/
    /*	Max and Min Price Related JavaScript - to show red outline of min is bigger than max
    /*-----------------------------------------------------------------------------------*/
    $('#select-min-price,#select-max-price').change(function(obj, e){
        var min_text_val = $('#select-min-price').val();
        var min_int_val = (isNaN(min_text_val))?0:parseInt(min_text_val);

        var max_text_val = $('#select-max-price').val();
        var max_int_val = (isNaN(max_text_val))?0:parseInt(max_text_val);

        if( (min_int_val >= max_int_val) && (min_int_val != 0) && (max_int_val != 0)){
            $('#select-max-price_input,#select-min-price_input').css('outline','2px solid red');
        }else{
            $('#select-max-price_input,#select-min-price_input').css('outline','none');
        }
    });
	
	//map
	$(function() { $('.map').maphilight({
		stroke : false
	}); });

	/*----------------------------------------------------------------------*/
	/*	JQuery Placeholder	*/
	/*----------------------------------------------------------------------*/
	$('input, textarea').placeholder();
	
/*--------------------------------------------------------------------*/
/*	Ajax Form Submit	*/
/*--------------------------------------------------------------------*/
	$('#contact-agent-form').ajaxForm(function() { 
		alert("Thank you for your message, We'll get in touch soon!");
		$('#contactAgent').modal('hide');
	});
	$('#contact-page-form').ajaxForm(function() { 
		alert("Thank you for your comment!");
		
	});
	
}); // JQuery Wrapper, Don't Delete This Line !!!!