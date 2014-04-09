$.validity.setup({ outputMode:"label" });

function isRegisterStudentValid()
{
	
		$.validity.start();
		
		$("#fname").require("First Name is required").match(/^[A-Za-z0-9 ]{3,20}$/)
		
		$("#mname").require("Middle Name is required").match(/^[A-Za-z0-9 ]{3,20}$/)
		
		$("#lname").require("Last Name is required").match(/^[A-Za-z0-9 ]{3,20}$/)
		
		$("#id_no").require().match(/^[A-Za-z0-9 ]{3,20}$/)
		
		/*$("#email").require().match("email","Email must be formatted as abc@xyz.com.")*/
		
		$("#dateofbirth").require("Date of Birth is required").match(/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/,"Format must be dd/mm/yyyy")
		
		$("#mobile").require().match(/^\d{10}$/,"Enter 10 digit valid number.")
		
		$("#year").assert(
			isValueNull('#year'), 
    	    "Please choose a year."
		)
		$("#gender").assert(
			isValueNull('#gender'), 
    	    "Please choose a gender."
		);
		
		$("#department").assert(
			isValueNull('#department'), 
    	    "Please choose a department."
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

//Removes corresponding error labels
$('input,select,textarea').click(function(e) {
    $parent=$(this).parent();
	$parent.find('label.error').remove();
});