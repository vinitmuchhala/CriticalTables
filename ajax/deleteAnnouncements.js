$("#displayAnnouncement .delete").live('click',function(e) {
    var url=$(this).attr('href');
	console.log(url);
	var confirm=window.confirm("Really Delete?");
	if(confirm==true)
	{
		deleteAnnouncement(url);
		return false;
	}
	else
	{
		return false;
	}
});

function deleteAnnouncement(url)
{
	$.ajax({
			url: url,
			success: function(data){
					alert(data);
					displayAnnouncement();
			}
	});
}
