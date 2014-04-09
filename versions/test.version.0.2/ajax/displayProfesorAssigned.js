function displayProfessorAssigned()
{
	$.ajax({
			url: "forms/displayProfessorAssigned.php",
			type: "get",
			success: function(data){
					$('.displayProfessorAssigned').html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
					console.log(
						"The following occured:"+
						textStatus +" "+ errorThrown
					);
				}
	});
}
