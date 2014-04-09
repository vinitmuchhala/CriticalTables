$.validity.setup({ outputMode:"label" });

function isRegisterValid()
{
	
		$.validity.start();
		
		$("#fname").require("First Name is required").match(/^[A-Za-z0-9 ]{3,20}$/,"Invalid Format")
		
		$("#mname").require("Middle Name is required").match(/^[A-Za-z0-9 ]{3,20}$/,"Invalid Format")
		
		$("#lname").require("Last Name is required").match(/^[A-Za-z0-9 ]{3,20}$/,"Invalid Format")
		
		$("#id_no").require().match(/^[A-Za-z0-9 ]{3,20}$/,"Invalid Format")
		
		$("#subject").require("Subject Name is required").match(/^[A-Za-z0-9 ]{3,100}$/,"Invalid Format")
		
		/*$("#email").require().match("email","Email must be formatted as abc@xyz.com.")*/
		
		$("#dateofbirth").require("Date of Birth is required").match(/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/,"Format must be dd/mm/yyyy")
		
		$("#mobile").require("Mobile Number is required").match(/^\d{10}$/,"Enter 10 digit number")
		
		$("#totalMarks").require("Total Marks required").match("number","Enter a three digit number")
		
		$("#days").require("No of Days required").match(/^[0-6 ]{1,1}$/,"Enter a single digit less than 7 ")
		
		$('#breakNo').require("Number of breaks required").match(/^[0-9 ]{1,1}$/,"Enter a single digit number")
		
		$('#sTime,#eTime').require("Time is required").match(/^[0-9 ]{1,4}$/,"4 digits - Format: HHMM")
		
		$('#durLec').require("Duration is required").match(/^[0-9 ]{1,3}$/,"Enter upto 3 digits")
		
		$('.generatedBreak input').require().match("number","Must be a number")
		
		$('.generatedBreakDuration input').require().match("number","Must be a number")
		
		$('#date').require("Expiry date is required").match(/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/,"Invalid. Format is dd/mm/yyyy");
		
		$('#title').require("Announcement Title Required")
		
		$('#message').require("Announcement Message Required")
		
		$("#year").assert(
			isValueNull('#year'), 
    	    "Please choose a year"
		)
		$("#gender").assert(
			isValueNull('#gender'), 
    	    "Please choose a gender"
		)		
		$("#userType").assert(
			isValueNull('#userType'), 
    	    "Please choose a User Type"
		)		
		$("#department").assert(
			isValueNull('#department'), 
    	    "Please choose a department"
		)
		$("#semester").assert(
			isValueNull('#semester'), 
    	    "Please choose a semester"
		);
		
		var result = $.validity.end();
		
		return result.valid;
}

//Checks if value is null or not
function isValueNull(selector)
{
	if($(selector).val()==""||$(selector).val()==null)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function isAssignProfessorValid()
{
	
	$.validity.start();
		
	$("#professorList").assert(
		isValueNull('#professorList'), 
		"Please choose a Professor"
	);
	
	$("#professorSubjectList").assert(
		isValueNull('#professorSubjectList'), 
		"Please choose a Subject"
	);
	
	var result = $.validity.end();
		
	return result.valid;
}

//Removes error labels
$('input,select,textarea').click(function(e) {
    $parent=$(this).closest('form');
	$parent.find('label.error').remove();
});