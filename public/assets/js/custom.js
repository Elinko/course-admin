(function($) {
	$( ".data-picker" ).datepicker({
     changeMonth: true,
     changeYear: true,
     yearRange: "1930:2020",
		 dateFormat: 'yy-mm-dd'
 });

	$('.myform').submit(function (e) {
	    let form = $(this)
	    e.preventDefault()
	    form.addClass('validated')

	    if (form[0].checkValidity()) {
	      $.ajax({
	          url: form.attr("action"),
	          type: 'POST',
	          data: form.serialize(),
	          success: function (data) {
							form.removeClass('validated');
							$('#form-success').modal('show');
							if(form.hasClass('update')){
								setTimeout(function() {
									location.reload();
								}, 2000);
							} else if(form.hasClass('delete')) {
								let url = window.location.origin + '/Person/update/' + form.attr('data-person')
								$('#form-success').modal('show');
								setTimeout(function() {
									location.replace(url)
								}, 2000);

							} else {
								form[0].reset();
							}
	          },
	          error: function (data) {
							$('#form-failed').modal('show');
	            console.log(data.message)
	          }
	      });
	    }else {
	      $('html, body').animate({
	        scrollTop: $("input:invalid").offset().top - 100 ,
	      }, 300);
	    }

	});

	$('#add-occupation-type').on('click', function() {
		$("#occupation").append(new Option($('#add-occupation-type-input').val(),$('#add-occupation-type-input').val()));
		$('#add-occupation-type-input').val("")
	})

	$('.to-delete-certificate').on('click', function() {
		$('#delete-certificate_id').val($(this).attr('data-id'))

	})


})(jQuery);
