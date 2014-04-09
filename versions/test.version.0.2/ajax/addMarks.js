$.ajax({
		url:"forms/addMarks.php?department=Information Technology&semester=6",
		success:function(data){
			//alert(data);
			displayMarksList(data);
		}
	});


$('#marksList #semester').change(function(e) {
	
	$department=$('#marksList #department').val();
    $semester=$(this).val();
	
	$.ajax({
		url:"forms/addMarks.php?department="+$department+"&semester="+$semester,
		success:function(data){
			displayMarksList(data);
		}
	});
});

function displayMarksList($marksMarkup)
{
	$('#addMarks').html($marksMarkup);
}

$(document).ready(function(e) {
   
$('#addMarks .last-word').each(function() {
	//alert($(this).text());
	text=$(this).text();
	 var last_word = $.trim(text).replace(/^[\s\S]*\b(\w+)\b[\W]*$/i, '$1');

}); 
});
/*
$div=$('.last-word');
//alert($div.html());
$div.html($div.text().replace(/(\w+?)$/, '<span>$1</span>'));*/
