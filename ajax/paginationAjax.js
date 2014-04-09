$('#displayStudent #pagination a').live('click',function(e) {
	
	var $pageUrl=$(this).attr('href');
	
	$.ajax({
		
		url: "forms/displayStudent.php",
		data:$pageUrl,
		global:false,
		beforeSend: function(){
						$studentList=$('#studentList');
						$studentList.find('.loader-success').hide();
						$studentList.find('.loader-img').show();	
					},
		success: function(data){
					$studentList=$('#studentList');					
					if($studentList.find('.loader-success').length<=0){
						$studentList.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
					}
					$studentList.find('.loader-img').hide();
					$studentList.find('.loader img:not(.loader-img)').show();
					$studentList.find('.loader img').delay(1000).fadeOut();
					$('#displayStudent').html(data);
					console.log("Page Loaded");
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

$('#displayProfessor #pagination a').live('click',function(e) {
	
	var $pageUrl=$(this).attr('href');
	
	$.ajax({
		
		url: "forms/displayProfessor.php",
		data:$pageUrl,
		global:false,
		beforeSend: function(){
						$professorList=$('#professorList');
						$professorList.find('.loader-success').hide();
						$professorList.find('.loader-img').show();	
					},
		success: function(data){
					$professorList=$('#professorList');					
					if($professorList.find('.loader-success').length<=0){
						$professorList.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
					}
					$professorList.find('.loader-img').hide();
					$professorList.find('.loader img:not(.loader-img)').show();
					$professorList.find('.loader img').delay(1000).fadeOut();
					$('#displayProfessor').html(data);
					console.log("Page Loaded");
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

$('#addMarks #pagination a').live('click',function(e) {
	
	var $pageUrl=$(this).attr('href');
	
	$.ajax({
		
		url: "forms/addMarks.php",
		data:$pageUrl,
		global:false,
		beforeSend: function(){
						$marksList=$('#marksList');
						$marksList.find('.loader-success').hide();
						$marksList.find('.loader-img').show();	
					},
		success: function(data){
					$marksList=$('#marksList');					
					if($marksList.find('.loader-success').length<=0){
						$marksList.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
					}
					$marksList.find('.loader-img').hide();
					$marksList.find('.loader img:not(.loader-img)').show();
					$marksList.find('.loader img').delay(1000).fadeOut();
					$('#displayProfessor').html(data);
					console.log("Page Loaded");
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


$('#displayAnnouncement #pagination a').live('click',function(e) {
	
	var $pageUrl=$(this).attr('href');
	
	$.ajax({
		
		url: "forms/displayAnnouncement.php",
		data:$pageUrl,
		global:false,
		beforeSend: function(){
						$marksList=$('#announcementList');
						$marksList.find('.loader-success').hide();
						$marksList.find('.loader-img').show();	
					},
		success: function(data){
					$marksList=$('#announcementList');					
					if($marksList.find('.loader-success').length<=0){
						$marksList.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
					}
					$marksList.find('.loader-img').hide();
					$marksList.find('.loader img:not(.loader-img)').show();
					$marksList.find('.loader img').delay(1000).fadeOut();
					$('#displayAnnouncement').html(data);
					console.log("Page Loaded");
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