$("#makeAnnouncement").submit(function(event){
	
	isRegisterValid();

	if(isRegisterValid())
	{
			var $form = $(this),
				// let's select and cache all the fields
				$inputs = $form.find("input, select, button, textarea"),
				// serialize the data in the form
				serializedData = $form.serialize();
				
				if ($(".dbResponseSuccess").length <= 0){
					$form.prepend('<div class="dbResponseSuccess ajaxResponse successfulResponse"><span class="success"></span>Announcement Added Successfully</div>');
					$form.prepend('<div class="dbResponseFailure ajaxResponse failedResponse"><span class="failure"></span>Announcement Addition Failed</div>');
					$form.prepend('<div class="AjaxResponseFailure ajaxResponse failedResponse"><span class="failure"></span>Something went wrong with your request. Check your database connection</div>');
					$('.dbResponseSuccess,.dbResponseFailure,.AjaxResponseFailure').hide();
				}
			
			// let's disable the inputs for the duration of the ajax request
			$inputs.attr("disabled", "disabled");
			
			// fire off the request to /form.php
			$.ajax({
				url: "forms/makeAnnouncement.php",
				type: "post",
				beforeSend:function(){
					$('.ajaxResponse:not(#makeAnnouncement .ajaxResponse)').remove();
				},
				data: serializedData,
				// callback handler that will be called on success
				success: function(data){
					// log a message to the console
					$success=data;
					if($success=="success")
					{
						$(".dbResponseSuccess").slideDown();
						$(".dbResponseSuccess").delay(1500).slideUp();
						displayAnnouncement();
						console.log("Hooray, it worked!");
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
					$(".AjaxResponseFailure").slideDown();
					$(".AjaxResponseFailure").delay(1500).slideUp();
					console.log(
						"The following error occured: "+
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
			
		event.preventDefault();
	}
	else
	{
		event.preventDefault();
	}

});