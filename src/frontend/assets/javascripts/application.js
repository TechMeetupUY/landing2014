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

        bindWorkshopEvents: function () {
            $('#workshop-form').submit(function () {
                var form = $(this), messageContainer = $('.messages', this);

                messageContainer.empty();

                $.ajax({
                    type: 'POST',
                    url: 'registro_workshop.php',
                    data: form.serialize(),
                    dataType: 'json'
                }).done(function (data, textStatus, jqXHR) {
                    messageContainer.text('¡Registro completo! Muchas gracias y te esperamos en los workshops.');
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    var result = $.parseJSON(jqXHR.responseText);

                    result.errors.forEach(function (error) {
                        messageContainer.append(
                            $('<div></div>').addClass('error').text(error)
                        );
                    });
                });

                return false;
            });
        },

        initialize: function () {
			app.prepareVideo();
			app.handleScrollTo();
            app.bindWorkshopEvents();
		}
	};

	return {
		init : function(){ app.initialize(); }
	}
}(jQuery);

$(document).ready(function() {
	tm.init();
});
