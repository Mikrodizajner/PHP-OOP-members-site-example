$(document).ready(function(){
	$('#loginForm').submit(function(e){
		removeFeedback();
		var errors = validateForm();

		if (errors == "") {
			return true;
		}else{
			provideFeedback(errors);
			e.preventDefault();
			return false;
		}
	});

	function validateForm(){
		var errorFields = new Array();

		//check required fields if they have something in em
		if ($('#email').val() == "") {
			errorFields.push('email');
		}

		//very basic email check
		if (!($('#email').val().indexOf(".") > 2) && ($('#email').val().indexOf("@"))) {
			errorFields.push('email');
		}

		return errorFields;
	}//end function validate form

	function provideFeedback(incomingErrors){
		for (var i = 0, i < incomingErrors.length; i++) {
			$("#"+incomingErrors[i]).addClass("errorClass");
			$("#"+incomingErrors[i] + "Error").removeClass("errorFeedback");
		}

		$("#errorDiv").html("Errors encountered!");
	}//end function provideFeedback

	function removeFeedback(){
		$('#errorDiv').html("");
		$('input').each(function(){
			$(this).removeClass("errorClass");
		});
		$('#errorSpan').each(function(){
			$(this).addClass("errorFeedback");
		});
	}//end function remove feedback
});