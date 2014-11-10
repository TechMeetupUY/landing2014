var tm = function($){
	var app = {

		prepareVideo : function(){
			HeaderVideo.init({
		        container     : $('.header-video-2013'),
		        header        : $('.header-video--media-2013'),
		        videoTrigger  : $(".video-trigger"),
		        autoPlayVideo : false
		    });
		},

		handleScrollTo : function(){
			$('.header-menu .scrollable').click(function(e){
				e.preventDefault();
				$.scrollTo( this.hash, 1000, { easing:'easeOutQuart' });
			});

			$('.header-button').click(function(e){
				e.preventDefault();
				$.scrollTo( '#compra', 1000, { easing:'easeOutQuart' });
			});
		},

        initialize: function () {
			app.prepareVideo();
			app.handleScrollTo();
		}
	};

	return {
		init : function(){ app.initialize(); }
	}
}(jQuery);

$(document).ready(function() {
	tm.init();
});
