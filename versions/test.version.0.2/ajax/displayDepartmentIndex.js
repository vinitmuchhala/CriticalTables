function deptIndexUpdate()
{
	$.ajax({
				url: "forms/getDepartmentIndex.php",
				type: "get",
				success: function(data){
						$('#department').html(data);
						$('.tipsy').hide();
						$('a[title]').tipsy({fade: true});
						console.log("Department Select Box updated!");
				}
		});
}