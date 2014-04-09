
$('.displayTable a.edit').live('click',function(e) {
	
	$parentRow=$(this).closest('tr');
	
	$parentRow.addClass('inline-edit');
	
	$parentRow.find('td').each(function(index, element) {
		
		$(this).not('.department,.sem,.gender,.editCell,.deleteCell,.id_no').html("<input type='text' name="+$(this).attr('class')+" data-originalvalue="+$(this).text()+" value="+$(this).text()+">");
		
		
	});
	
	$parentRow.find('.gender').html(
			'<select name="gender" id="gender" data-originalvalue='+$parentRow.find('.gender').text()+'><option value='+$parentRow.find('.gender').text()+'>Choose</option><option>Male</option><option>Female</option></select>'
		)
	
	$('.tipsy').remove();
	
	$parentRow.find('.editCell .edit').hide();
	
	if($parentRow.find('.editCell .submit-edit').length<1)
	{
		$parentRow.find('.editCell').append('<a href="#" class="submit-edit" title="Submit"><img src="images/submit-tiny.png" alt="Submit"></a>');
		$parentRow.find('.editCell').append('<a href="#" class="submit-close" title="Close Inline Edit"><img src="images/cross2.png" alt="Close Inline Edit"></a>');
	}
	else
	{
		$parentRow.find('.submit-edit,.submit-close').show();
	}
	
	$('a[title]').tipsy({live: true,fade: true});
	
	return false;
});


$('.submit-close').live('click',function(e){
	
	$parentRow=$(this).closest('tr');
	
	$parentRow.find('td').not('.department,.sem,.gender,.editCell,.deleteCell,.id_no').each(function(index, element) {
		$input=$(this).find('input');
		$(this).html($input.data('originalvalue'));
	});
	
	$parentRow.find('.gender').html($('.inline-edit .gender select').data('originalvalue'));
	
	$('.tipsy').remove();
	$('a[title]').tipsy({live: true,fade: true});
	
	$parentRow.find('.edit').show();
	
	$parentRow.find('.submit-edit').hide();
	
	$(this).hide();
	
	return false;
});


$('#displayStudent .submit-edit').live('click',function(e){
	$parentRow=$(this).closest('tr');
	
	
	var dataString=$parentRow.find(':input,select').serialize();
	dataString+="&department="+$parentRow.find('.department').text()+"&id_no="+$parentRow.find('.id_no').text()+"&ajax=1";
	
	$.ajax({
		url: "forms/processEditStudent.php",
		type: "get",
		data: dataString,
		beforeSend: function(){
						$studentList=$('#studentList');
						$studentList.find('.loader-success').hide();
						$studentList.find('.loader-img').show();	
					},
		success: function(data){
					displayStudent();
					$studentList=$('#studentList');					
					if($studentList.find('.loader-success').length<=0){
						$studentList.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
					}
					$studentList.find('.loader-img').hide();
					$studentList.find('.loader img:not(.loader-img)').show();
					$studentList.find('.loader img').delay(1000).fadeOut();
					$('#displayStudent').html(data);
					console.log("Page Loaded");
					$('.tipsy').remove();
					$('a[title]').tipsy({live: true,fade: true});
					
				},
		error: function(jqXHR, textStatus, errorThrown){
					console.log(
						"The following occured:"+
						textStatus +" "+ errorThrown
					);
				}
	});
	
	return false;
});

$('#displayProfessor .submit-edit').live('click',function(e){
	$parentRow=$(this).closest('tr');
	
	
	var dataString=$parentRow.find(':input,select').serialize();
	dataString+="&department="+$parentRow.find('.department').text()+"&id_no="+$parentRow.find('.id_no').text()+"&ajax=1";
	
	$.ajax({
		url: "forms/processEditProfessor.php",
		type: "get",
		data: dataString,
		beforeSend: function(){
						$professorList=$('#professorList');
						$professorList.find('.loader-success').hide();
						$professorList.find('.loader-img').show();	
					},
		success: function(data){
					displayProfessor();
					$professorList=$('#professorList');					
					if($professorList.find('.loader-success').length<=0){
						$professorList.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
					}
					$professorList.find('.loader-img').hide();
					$professorList.find('.loader img:not(.loader-img)').show();
					$professorList.find('.loader img').delay(1000).fadeOut();
					$('#displayProfessor').html(data);
					console.log("Page Loaded");
					$('.tipsy').remove();
					$('a[title]').tipsy({live: true,fade: true});
				},
		error: function(jqXHR, textStatus, errorThrown){
					console.log(
						"The following occured:"+
						textStatus +" "+ errorThrown
					);
				}
	});
	
	return false;
});