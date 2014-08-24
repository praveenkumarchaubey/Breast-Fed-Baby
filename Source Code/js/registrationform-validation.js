jQuery(document).ready(function($){

	// hide messages 
	$("#error").hide();
	$("#sent-form-msg").hide();
	
	// on submit...
	$("#contactForm #submit").submit(function() {
		$("#error").hide();
		
		//required:
		
		//name
		var name = $("input#mother_name").val();
		if(name == ""){
			$("#error").fadeIn().text("Name Required.");
			$("input#mother_name").focus();
			return false;
		}

		//mother_dob
		var mother_dob = $("input#datepicker").val();
		if(mother_dob == ""){
			$("#error").fadeIn().text("Date Required.");
			$("input#datepicker").focus();
			return false;
		}

        //delivery date
		var del_date = $("input#del_date").val();
		if(del_date == ""){
			$("#error").fadeIn().text("Date Required.");
			$("input#del_date").focus();
			return false;
		}

        //state
		var state = $("input#state").val();
		if(state == ""){
			$("#error").fadeIn().text("State Required.");
			$("input#state").focus();
			return false;
		}

        //city
		var city = $("input#currentcity").val();
		if(city == ""){
			$("#error").fadeIn().text("City Required.");
			$("input#currentcity").focus();
			return false;
		}


		//area
		var area = $("input#area").val();
		if(area == ""){
			$("#error").fadeIn().text("Area Required.");
			$("input#area").focus();
			return false;
		}

		//mobile
		var mobile = $("input#mobile").val();
		if(pincode == ""){
			$("#error").fadeIn().text("Mobile Required.");
			$("input#mobile").focus();
			return false;
		}

		// email
		var email = $("input#mail").val();
		if(email == ""){
			$("#error").fadeIn().text("Email Required");
			$("input#mail").focus();
			return false;
		}
		
		
	});  
	// on success...
	 function success(){
	 	$("#sent-form-msg").fadeIn();
	 	$("#contactForm").fadeOut();
	 }
	
	
    return false;
});

