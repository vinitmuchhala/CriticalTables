function subUpdate()
{
	$.ajax({
				url: "forms/displaySubject.php",
				type: "get",
				success: function(data){
						$('#subjects-display').html('');
						$('#subjects-display').html('<br><h4>Subjects List - Click to Delete</h4>'+data);
						$('.tipsy').hide();
						$('a[title]').tipsy({fade: true});
						console.log("Subject list updated!");
				}
		});
}