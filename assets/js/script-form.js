// 
//	jQuery Validate example script
//
//	Prepared by David Cochran
//	
//	Free for your use -- No warranties, no guarantees!
//

$(document).ready(function(){

	// Validate
	// http: //bassistance.de/jquery-plugins/jquery-plugin-validation/
	// http: //docs.jquery.com/Plugins/Validation/
	// http: //docs.jquery.com/Plugins/Validation/validate#toptions
	
		$('#contact-form').validate({
	    rules: {
	      username: {
	        minlength: 4,
	        required: true
	      },
	      password_news: {
	        minlength: 4,
	        required: true
	      },
	      name: {
	        minlength: 2,
	        required: true
	      },
	      link_web: {
	        minlength: 5,
	        required: true
	      },
	       title: {
	        minlength: 2,
	        required: true
	      },
	      title_en: {
	        minlength: 2,
	        required: true
	      },
	       title_th: {
	        minlength: 2,
	        required: true
	      },
	      detail: {
	        minlength: 2,
	        required: true
	      },
	       detail_th: {
	        minlength: 2,
	        required: true
	      },
	      detail_th2: {
	        minlength: 2,
	        required: true
	      },
	       detail_en: {
	        minlength: 2,
	        required: true
	      },
	       captcha: {
	        minlength: 1,
	        required: true
	      },
	      old_pwd: {
	        minlength: 2,
	        required: true
	      },
	      new_pwd1: {
	        minlength: 2,
	        required: true
	      },
	       new_pwd2: {
	        minlength: 2,
	        required: true
	      },
	      pass: {
	        minlength: 2,
	        required: true
	      },
	      price: {
	        digits: true,
	        required: true
	      },
	       tel: {
	        digits: true,
	        minlength: 9,
	        maxlength: 10,
	        required: true
	      },
	       group_work: {
	        required: true
	      },
	      type:{
	       required: true
	      },
	       year_car: {
	        required: true
	      },
	       group: {
	        required: true
	      },
	        email: {
	        required: true,
	        email: true
	      },
	      email_forgot: {
	        required: true,
	        email: true
	      },
	       subject: {
	      	minlength: 2,
	        required: true
	      },
	      website_link: {
	      	minlength: 4,
	        url: true
	      },
	      message: {
	        minlength: 5,
	        required: true
	      }
	      
	    },
        
	   highlight: function(element) {
				$(element).closest('.input-control').removeClass('success').addClass('error');
			},
			success: function(element) {
				
				//.text('OK!').addClass('valid')
				$(element).closest('.input-control').removeClass('error').addClass('success');
	    }
	  });
	  
}); // end document.ready