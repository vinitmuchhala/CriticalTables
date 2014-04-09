$("#add-departments").submit(function(event){
	var $form = $(this),
		// let's select and cache all the fields
		$inputs = $form.find("input, select, button, textarea"),
		// serialize the data in the form
		serializedData = $form.serialize();
		
		if ($(".dbResponseSuccess").length <= 0){
			$form.after('<div class="dbResponseSuccess ajaxResponse successfulResponse"><span class="success"></span>Department Added Successfully</div>');
			$form.after('<div class="dbResponseFailure ajaxResponse failedResponse"><span class="failure"></span>Department Addition Failed</div>');
			$form.after('<div class="AjaxResponseFailure ajaxResponse failedResponse"><span class="failure"></span>Something went wrong. Check the browser console.</div>');
			$('.dbResponseSuccess,.dbResponseFailure,.AjaxResponseFailure').hide();
		}
	
	// let's disable the inputs for the duration of the ajax request
	$inputs.attr("disabled", "disabled");
	
	// fire off the request to /form.php
	$.ajax({
		url: "forms/departments.php",
		type: "get",
		data: serializedData,
		// callback handler that will be called on success
		success: function(data){
			// log a message to the console
			$success=data;
			if($success=="success")
			{
				$(".dbResponseSuccess").slideDown();
				$(".dbResponseSuccess").delay(1500).slideUp();
				deptUpdate();
				console.log("Department Added!");
			}
			else
			{
				$(".dbResponseFailure").slideDown();
				$(".dbResponseFailure").delay(1500).slideUp();
				console.log("Hooray, it worked but the input is empty!");
			}
		},
		// callback handler that will be called on error
		error: function(jqXHR, textStatus, errorThrown){
			// log the error to the console
			$(".AjaxResponseFailure").fadeIn();
			$(".AjaxResponseFailure").delay(1500).slideUp();
			console.log(
				"The following error occured:\t"+
				textStatus, errorThrown
			);
		},
		// callback handler that will be called on completion
		// which means, either on success or error
		complete: function(){
			// enable the inputs
			$inputs.removeAttr("disabled");
		}
	});
	
	// prevent default posting of form
	event.preventDefault();
	
});
