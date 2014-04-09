function displayAnnouncement()
{
	$.ajax({
			url: "forms/displayAnnouncement.php",
			type: "get",
			data: $('#displayProfessor #pagination .active a').attr('href'),
			success: function(data){
					$('#displayAnnouncement').html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
					console.log(
						"The following occured:"+
						textStatus +" "+ errorThrown
					);
				}
	});
}
