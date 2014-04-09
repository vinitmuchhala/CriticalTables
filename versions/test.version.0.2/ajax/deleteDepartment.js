$('#department-display .delete').live('click',function(e){
	var url=$(this).attr('href');
	var confirm=window.confirm("Really Delete?");
	if(confirm==true)
	{
		deptDelete(url);
		return false;
	}
	else
	{
		return false;
	}
	e.preventDefault();
});

function deptDelete(url)
{
	$.ajax({
				url: url,
				type: "get",
				success: function(data){
						console.log("Department deleted");
						deptUpdate();
						deptIndexUpdate()						
				}
				
		});
		
}
