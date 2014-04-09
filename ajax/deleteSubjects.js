$('#subjects-display .delete').live('click',function(e){
	var url=$(this).attr('href');
	var confirm=window.confirm("Confirm Delete?");
	if(confirm==true)
	{
		subDelete(url);
		return false;
	}
	else
	{
		return false;
	}
	e.preventDefault();
});

function subDelete(url)
{
	$.ajax({
				url: url,
				type: "get",
				success: function(data){
						console.log("Subject deleted");
						subUpdate();						
				}
				
		});
		
}
