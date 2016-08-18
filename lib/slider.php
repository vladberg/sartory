<style type="text/css">
			.iosSlider {
				width: 100%;
				height: 300px;

			}
			
			.iosSlider .slider {
				width: 100%;
				height: 100%;
			}
			
			.iosSlider .slider .item {
				position: relative;
				top: 0;
				left: 0;
				width: 100%;
				height: 300px;
				background: #fff;
				margin: 0 0 0 0;
			}
			
			.iosSlider .slider #item1 {
				background: url(./banners/BANNER1.jpg) no-repeat 50% 0;
			}
			
			
			.iosSlider .slider .item .text1 {
				position: absolute;
				top: 30px;
				right: 150px;
				opacity: 0;
				filter: alpha(opacity:0);
				background: #000;
			}
			
			.iosSlider .slider .item .text1 span {
				color: #fff;
				font: bold 50px/60px "Helvetica Neue",Helvetica,Arial,sans-serif;
				padding: 0 8px;
			}
			
			
			
			
			.iosSliderButtons {
				position: absolute;
				bottom: 10px;
				left: 10px;
				width: 200px;
				height: 10px;
			}
			
			.iosSliderButtons .button {
				float: left;
				width: 9px;
				height: 9px;
				background: #999;
				margin: 0 10px 0 0;
				opacity: 0.25;
				filter: alpha(opacity:25);
				border: 1px solid #000;
			}
			
			.iosSliderButtons .selected {
				background: #000;
				opacity: 1;
				filter: alpha(opacity:100);
			}
		</style>
		
		<!-- jQuery library -->
		<script type="text/javascript" src = "ios/jquery-1.4.min.js"></script>
		<script type="text/javascript" src = "ios/jquery.easing-1.3.js"></script>
		
		<!-- iosSlider plugin -->
		<script src = "ios/jquery.iosslider.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
			
				$('.iosSlider').iosSlider({
					scrollbar: true,
					snapToChildren: true,
					desktopClickDrag: true,
					scrollbarLocation: 'top',
					scrollbarMargin: '10px 10px 0 10px',
					scrollbarBorderRadius: '0',
					responsiveSlideWidth: true,
					navSlideSelector: $('.iosSliderButtons .button'),
					infiniteSlider: true,
					startAtSlide: '2',
					onSlideChange: slideContentChange,
					onSlideComplete: slideContentComplete,
					onSliderLoaded: slideContentLoaded,
					autoSlide: false
				});
				
				function slideContentChange(args) {
					
					/* indicator */
					$(args.sliderObject).parent().find('.iosSliderButtons .button').removeClass('selected');
					$(args.sliderObject).parent().find('.iosSliderButtons .button:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
					
				}
				
				function slideContentComplete(args) {
					
					if(!args.slideChanged) return false;
					
					/* animation */
					$(args.sliderObject).find('.text1, .text2').attr('style', '');
					
					$(args.currentSlideObject).children('.text1').animate({
						right: '100px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					
					$(args.currentSlideObject).children('.text2').delay(200).animate({
						right: '50px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					
				}
				
				function slideContentLoaded(args) {
					
					/* animation */
					$(args.sliderObject).find('.text1, .text2').attr('style', '');
					
					$(args.currentSlideObject).children('.text1').animate({
						right: '100px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					
					$(args.currentSlideObject).children('.text2').delay(200).animate({
						right: '50px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					
					/* indicator */
					$(args.sliderObject).parent().find('.iosSliderButtons .button').removeClass('selected');
					$(args.sliderObject).parent().find('.iosSliderButtons .button:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
					
				}
				
			});
		</script>
		
		<div class = 'iosSlider' align="center">
		
			<div class = 'slider'>
			
				<div class = 'item' id = 'item1' align="center">
					
					<div class = 'text1'><span>Touch Me.</span></div>
					
					<div class = 'text2'><span>Hardware accelerated using<br />CSS3 for supported iOS,<br />Android and WebKit</span></div>
					
				</div>
				
				
			
			</div>
			
			<div class = 'iosSliderButtons'>
				<div class = 'button'></div>
				<div class = 'button'></div>
				<div class = 'button'></div>
				<div class = 'button'></div>
			</div>
		
		</div>	