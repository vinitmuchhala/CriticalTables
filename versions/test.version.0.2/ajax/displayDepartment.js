function deptUpdate()
{
	$.ajax({
				url: "forms/displayDepartment.php",
				type: "get",
				success: function(data){
						$('#department-display ul,#department-display p').remove();
						$('#department-display h4').after(data);
						$('.tipsy').hide();
						$('a[title]').tipsy({fade: true});
						console.log("Department list updated!");
				}
		});
}