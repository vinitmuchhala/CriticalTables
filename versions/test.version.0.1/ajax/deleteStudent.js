$("#displayStudent .delete").live('click',function(e) {
    var url=$(this).attr('href');
	console.log(url);
	var confirm=window.confirm("Really Delete?");
	if(confirm==true)
	{
		deleteStudent(url);
		return false;
	}
	else
	{
		return false;
	}
});

function deleteStudent(url)
{
	$.ajax({
			url: url,
			success: function(data){
					alert(data);
					displayStudent();
			}
	});
}
