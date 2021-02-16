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
	          type: 'GET',
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

							}else if(form.hasClass('addPerson')) {
								$('#form-success').modal('show');
								let href = $('#form-success .update-person').attr('href');
								href = href+data;
								$('#form-success .update-person').attr('href', href)
								$('#form-success .add-company').hide();
								$('#form-success .add-person').hide();
								$('#form-success .update-person').show();
								form[0].reset();

							} else if(form.hasClass('search')) {
								let result = JSON.parse(data)
								$('.course-print').hide();
								$('.person-print').hide();


								$('.course-section:not(.template)').remove();

								if( result['type'] == 'course') {
									let printWrap = $('.course-print')
									printWrap.find('.generated').html(result['today']);
									printWrap.find('.generated-until').html(result['generatedUntil']);

									$.each(result['data'], function( index, value ) {
										// console.log('row1 ', index)

										let courseSection = printWrap.find('.template.course-section').clone();
										courseSection.removeClass('template');
										courseSection.find('.course_name').html(value['course'] + '<span>(OS:' +value['os_time'] + ', AOP:'+ value['aop_time']+ ')</span>' )

										let a = 1;
										$.each(value['row'], function( index2, person ) {
											let row = courseSection.find('.template.personRow').clone();
											console.log('row ', row)
											courseSection.removeClass('template');
											row.removeClass('template');
											row.find('td:nth-child(1)').html(a);
											row.find('td.name').html(person['name']);
											row.find('td.birth').html(person['birth']);
											// row.find('td.company_name').html(person['company_name']);
											row.find('td.evidence_num').html(person['evidence_num']);
											row.find('td.types').html(person['types']);
											row.find('td.os').html(person['os']);
											row.find('td.aop').html(person['aop']);
											row.find('.no-print a').attr('href', '/Certificate/update/'+ person['certificate_id']);
											courseSection.find('.thbody').append(row);
											a = a + 1;
										});

										printWrap.append(courseSection)

									});
									printWrap.show();
								} else {

									let printWrap = $('.person-print');
									printWrap.find('.generated').html(result['today']);
									printWrap.find('.generated-until').html(result['generatedUntil']);
									// console.log('date', result['generatedUntil']);
									// console.log('today', result['today']);
									// console.log('today', result['data']);

									$.each(result['data'], function( index, value ) {
										// console.log('row1 ', index)

										let courseSection = printWrap.find('.template.course-section').clone();
										courseSection.removeClass('template');
										courseSection.find('.course_name').html(value['person'])

										let a = 1;
										$.each(value['row'], function( index2, person ) {
											let row = courseSection.find('.template.personRow').clone();
											console.log('row ', row)
											courseSection.removeClass('template');
											row.removeClass('template');
											row.find('td:nth-child(1)').html(a);
											row.find('td.course').html(person['course_name']+ '<span>(OS:' +value['os_time'] + ', AOP:'+ value['aop_time']+ ')</span>');
											row.find('td.birth').html(person['birth']);
											// row.find('td.company_name').html(person['company_name']);
											row.find('td.evidence_num').html(person['evidence_num']);
											row.find('td.types').html(person['types']);
											row.find('td.os').html(person['os']);
											row.find('td.aop').html(person['aop']);
											row.find('.no-print a').attr('href', '/Certificate/update/'+ person['certificate_id']);
											courseSection.find('.thbody').append(row);
											a = a + 1;
										});

										printWrap.append(courseSection)
									});
									printWrap.show();

								}
								if( result['count_company']==1) {
									// console.log('vvv ', result['data'][0]['row'][0]['company_name'])
									$('#ifCompany').html('<h2>Firma: '+ result['data'][0]['row'][0]['company_name'] +'</h2>')
								} else {
									$('#ifCompany').html('')

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

	$('.search .primary').on('click', function() {
		$('html, body').animate({
			 scrollTop: $("#search-scroll").offset().top
		}, 1000);
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
