function displayStudent()
{
	$.ajax({
			url: "forms/displayStudent.php",
			type: "get",
			success: function(data){
					$('#displayStudent').html(data);
			}
	});
}
