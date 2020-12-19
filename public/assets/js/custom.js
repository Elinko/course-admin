(function($) {
	$( ".data-picker" ).datepicker();

	$('.myform').submit(function (e) {
	    let form = $(this)
	    e.preventDefault()
	    form.addClass('validated')

	    if (form[0].checkValidity()) {
	      $.ajax({
	          url: window.location.href + '/req',
	          type: 'POST',
	          data: form.serialize(),
	          success: function (data) {
							form.removeClass('validated');
							$('#form-success').modal('show');
							form[0].reset();
	          },
	          error: function (data) {
	            console.log(data.message)
	          }
	      });
	    }else {
	      $('html, body').animate({
	        scrollTop: $("input:invalid").offset().top - 100 ,
	      }, 300);
	    }

	});


})(jQuery);
