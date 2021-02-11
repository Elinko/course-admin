(function($) {
	$( ".data-picker" ).datepicker({
     changeMonth: true,
     changeYear: true,
     yearRange: "1920:2030",
		 dateFormat: 'yy-mm-dd',
		 defaultDate: 0
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
							} else if(form.hasClass('deleteCertificate')) {
								let url = window.location.origin + '/Person/update/' + form.attr('data-person')
								$('#form-success').modal('show');
								setTimeout(function() {
									location.replace(url)
								}, 2000);

							} else if(form.hasClass('deleteCompany')) {
								let url = window.location.origin + '/Company/';
								$('#form-success').modal('show');
								setTimeout(function() {
									location.replace(url)
								}, 2000);

							}
							else if(form.hasClass('logging')) {
								let url = window.location.origin + data;
								// $('#form-success').modal('show');
								setTimeout(function() {
									location.replace(url)
								}, 1000);

							} else if(form.hasClass('search')) {
								let result = JSON.parse(data)

								if( result['type'] == 'course') {
									let printWrap = $('.course-print')
									printWrap.find('.generated').html(result['today']);
									printWrap.find('.generated-until').html(result['generatedUntil']);
									console.log('date', result['generatedUntil']);
									console.log('today', result['today']);
									console.log('today', result['data']);

									$.each(result['data'], function( index, value ) {
										let courseSection = printWrap.find('.template.course-section').clone();
										courseSection.removeClass('template');
										courseSection.find('.course_name').html(value['course'])

										let a = 1;
										$.each(value['row'], function( index, person ) {

											let row = courseSection.find('.thbody tr').clone();
											row.removeClass('template');
											row.find('td:nth-child(1)').html(a);
											row.find('td:nth-child(2)').html(person['name']);
											row.find('td:nth-child(3)').html(person['birth']);
											row.find('td:nth-child(4)').html(person['company_name']);
											row.find('td:nth-child(5)').html(person['evidence_num']);
											row.find('td:nth-child(6)').html(person['types']);
											row.find('td:nth-child(7)').html(person['os']);
											row.find('td:nth-child(8)').html(person['aop']);
											$('.thbody').append(row);
											a = a + 1;
										});

									});
								}

								$('.search-result').fadeIn();
							}
							 else {
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
		if($('#add-occupation-type-input').val()){
			$("#occupation").append(new Option($('#add-occupation-type-input').val(),$('#add-occupation-type-input').val()));
			$('#add-occupation-type-input').val("")
		}
	})

	$('.to-delete-certificate').on('click', function() {
		$('#delete-certificate_id').val($(this).attr('data-id'))
	})

	// custom collapse
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var content = this.nextElementSibling;
	    if (content.style.display === "block") {
	      content.style.display = "none";
	    } else {
	      content.style.display = "block";
	    }
	  });
	}

})(jQuery);

function printDiv(divName) {
	 var printContents = document.getElementById(divName).innerHTML;
	 var originalContents = document.body.innerHTML;
	 document.body.innerHTML = printContents;
	 window.print();
	 document.body.innerHTML = originalContents;
}
