function displayStudent()
{
	$.ajax({
			url: "forms/displayStudent.php",
			type: "get",
			data: $('#displayStudent #pagination .active a').attr('href'),
			success: function(data){
					$('#displayStudent').html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
					console.log(
						"The following occured:"+
						textStatus +" "+ errorThrown
					);
				}
	});
}
