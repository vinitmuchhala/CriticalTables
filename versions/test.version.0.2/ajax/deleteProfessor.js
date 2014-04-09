$("#displayProfessor .delete").live('click',function(e) {
    var url=$(this).attr('href');
	console.log(url);
	var confirm=window.confirm("Really Delete?");
	if(confirm==true)
	{
		deleteProfessor(url);
		return false;
	}
	else
	{
		return false;
	}
});

function deleteProfessor(url)
{
	$.ajax({
			url: url,
			success: function(data){
					alert(data);
					displayProfessor();
			}
	});
}
