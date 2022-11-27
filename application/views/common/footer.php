	<script src="<?php echo base_url().'assets/js/bootstrap.bundle.min.js' ?>" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
	<script src="<?php echo base_url().'assets/js/intlTelInput.js' ?>"></script>
	<script>
		$("#register_form").validate({
			rules: {
				first_name: {
					required: true,
					minlength: 2
				},
				middle_name: {
					required: true,
				},
				last_name: {
					required: true,
				},
				course: {
					required: true
				},
				gender: {
					required: true
				},
				mobile: {
					required: true,
					number: true,
					minlength:8,
			        maxlength:12,
				},
				address: {
					required: true
				},
				email: {
					required: true,
					email: true,
				},
				password: {
					required: true,
					minlength: 5
				},
				password2: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
			},
			messages: {
				first_name: {
					required: "Please enter first name",
					minlength: "Your first name must consist of at least 2 characters"
				},
				middle_name: {
					required: "Please enter middle name",
				},
				last_name: {
					required: "Please enter last name",
				},
				course: {
					required: "Please select course"
				},
				gender: {
					required: "Please choose gender"
				},
				mobile: {
					required: "Please enter mobile no",
					number: "Value must be in numbers",
					minlength:"Your last name must consist of at least 8 numbers",
			        maxlength:"maximum 12 numbers",
				},
				address: {
					required: "Please enter address",
				},
				email: {
					required: "Please enter email",
					email: "Invalid email",
				},
				password: {
					required: "Please enter password",
					minlength: "Your last name must consist of at least 5 characters",
				},
				password2: {
					required: "Please enter password again",
					minlength: "Your last name must consist of at least 5 characters",
					equalTo: "Please enter the same password as above"
				},
			},
			submitHandler: function(form) {
			    form.submit();
			}
		});
	</script>	
	<script>
	    var input = document.querySelector("#mobile");
	    window.intlTelInput(input, {
	    	initialCountry: "auto",
	      // allowDropdown: false,
	      // autoHideDialCode: false,
	      // autoPlaceholder: "off",
	      // dropdownContainer: document.body,
	      // excludeCountries: ["us"],
	      // formatOnDisplay: false,
	      geoIpLookup: function(callback) {
	        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
	          var countryCode = (resp && resp.country) ? resp.country : "";
	          callback(countryCode);
	        });
	      },
	      hiddenInput: "full_number",
	      // initialCountry: "auto",
	      // localizedCountries: { 'de': 'Deutschland' },
	      // nationalMode: false,
	      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
	      placeholderNumberType: "MOBILE",
	      // preferredCountries: ['cn', 'jp'],
	      separateDialCode: true,
	      utilsScript: "<?php echo base_url().'assets/js/utils.js' ?>",
	    });
	</script>
	<script>
		$(".iti__flag-container").focusout(function(){
			if(document.querySelector('.iti__selected-dial-code') != ''){
				var call_code = document.querySelector('.iti__selected-dial-code').innerHTML;
				document.querySelector('input[name=call_code]').value = call_code;
			}
		});
	</script>
	<script>
		$("#email").focusout(function(){
		  var getEmail = $('#email').val();
		  $('.ac_email_res').css('display', 'none');
		  $('.ac_email_res-main').css('display', 'none');
		  // console.log('hg', getEmail);
		  if (getEmail) {
		    $.ajax({
		      url: '<?php echo base_url().'emailCheck' ?>',
		      method: 'POST',
		      data: {
		        email: getEmail
		      },
		      dataType: 'json',
		      success: function(response) {
		      	console.log('res', response);
		        if (response['code'] == 0) {

		        } else {
		          $('#email').val('');
		          $('.ac_email_res-main').css('display', 'flex');
		          $('.ac_email_res').css('display', 'block');
		          $('.ac_email_res').css('color', 'red');
		          $('.ac_email_res').html(response['msg']);
		        }
		      }
		    });
		  }
		});
	</script>
	<script>
		$("#login_form").validate({
			rules: {
				email: {
					required: true,
					email: true,
				},
				password: {
					required: true,
				}
			},
			messages: {
				email: {
					required: "Please enter email",
					email: "Invalid email",
				},
				password: {
					required: "Please enter password",
				}
			},
			submitHandler: function(form) {
			    form.submit();
			}
		});
	</script>
	<script>
		$("#up_form").validate({
			rules: {
				first_name: {
					required: true,
					minlength: 2
				},
				middle_name: {
					required: true,
				},
				last_name: {
					required: true,
				},
				course: {
					required: true
				},
				gender: {
					required: true
				},
				mobile: {
					required: true,
					number: true,
					minlength:8,
			        maxlength:12,
				},
				address: {
					required: true
				},
				email: {
					required: true,
					email: true,
				}
			},
			messages: {
				first_name: {
					required: "Please enter first name",
					minlength: "Your first name must consist of at least 2 characters"
				},
				middle_name: {
					required: "Please enter middle name",
				},
				last_name: {
					required: "Please enter last name",
				},
				course: {
					required: "Please select course"
				},
				gender: {
					required: "Please choose gender"
				},
				mobile: {
					required: "Please enter mobile no",
					number: "Value must be in numbers",
					minlength:"Your last name must consist of at least 8 numbers",
			        maxlength:"maximum 12 numbers",
				},
				address: {
					required: "Please enter address",
				},
				email: {
					required: "Please enter email",
					email: "Invalid email",
				},
			},
			submitHandler: function(form) {
			    form.submit();
			}
		});
	</script>
</body>
</html>