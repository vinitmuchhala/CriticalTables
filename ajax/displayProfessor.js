function displayProfessor()
{
	$.ajax({
			url: "forms/displayProfessor.php",
			type: "get",
			data: $('#displayProfessor #pagination .active a').attr('href'),
			success: function(data){
					$('#displayProfessor').html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
					console.log(
						"The following occured:"+
						textStatus +" "+ errorThrown
					);
				}
	});
}
