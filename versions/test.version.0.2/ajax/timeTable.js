var days,$duration,$durationString,department,sem,$noOfBreaks,$lectureDuration;
$(document).ready(function(e) {
	/*$.ajax({
		url:"forms/createTimeTable.php",
		data:"department=Information+Technology&days=5&semester=6&breakNo=1&breakTime1=1230&durBreak1=60&durLec=60&sTime=830&eTime=1630",
		success:function(data){
			$('#timeTable').html(data);
			draggable();
			sidebarHeight();
			days=parseInt($('#days').val());
			$('#createTimeTable').hide();
		}
	});*/

    function draggable()
	{
		$('.timeTableLeft .item').draggable({
					revert:true,
					proxy:'clone'
				});
		$('.timeTableRight td.drop').droppable({
			onDragEnter:function(){
				$(this).addClass('over');
			},
			onDragLeave:function(){
				$(this).removeClass('over');
			},
			onDrop:function(e,source){
				$(this).removeClass('over');
				if ($(source).hasClass('assigned')){
					$(this).append(source);
				} else {
					var c = $(source).clone().addClass('assigned');
					$(this).empty().append(c);
					c.draggable({
						revert:true
					});
				}
			}
		});
	};
	
	$('.break').bind('keyup',function(){
		$('.generatedBreak').remove();
		var breakNo=$(this).val();
		i=breakNo;
		$('.generatedBreakDuration,.generatedBreak').remove();
		if(!isNaN(i) && i>0)
		{
			while(i)
			{
				$(this).parent().after("<p class='generatedBreakDuration'><label id=break"+i+">Enter the duration of break "+i+"(Minutes)</label><input type='text' class='break break-duration' name='durBreak"+i+"' id='durBreak"+i+"'/></p>");
				$(this).parent().after("<p class='generatedBreak'><label id=breakt"+i+">Enter the timing of break "+i+"(HHMM)</label><input type='text' class='break break-time' name='breakTime"+i+"' id='breakTime"+i+"'/></p>");
				i--;
			}
		}
		
		
	});
	
	
	$("#createTimeTable").submit(function(event){
		
		days=parseInt($('#days').val());
		department=$('#createTimeTable #department').val();
		semester=$('#createTimeTable #semester').val();
		
		isRegisterValid();
		
		$id="";
		
		$noOfBreaks=parseInt($('#breakNo').val());
		$lectureDuration=parseInt($('#durLec').val());
		
		$('.generatedBreak').each(function(index, element) {
			$duration=$(this).find('input[type=text]');
			$durationString+=$duration.attr('id')+"="+$duration.val()+"&";
		});
		
		if(isRegisterValid())
		{
			var $form = $(this),
			// let's select and cache all the fields
			$inputs = $form.find("input, select, button, textarea"),
			// serialize the data in the form
			serializedData = $form.serialize();
			
			alert(serializedData);
			
			$.ajax({
				url:"forms/createTimeTable.php",
				data:serializedData,
				success:function(data){
					$('#timeTable').html(data);
					draggable();
					timeTable();
					sidebarHeight();
					$('#createTimeTable').slideUp('slow');
					return false;
				}
			});
			
		}
	
		return false;
		
	});	
		
});


function timeTable()
{	
	days=$('.title').length;
	var timeTable=new Array(15);
	
	for (var k = 0; k < 15; k++) {
		timeTable[k] = new Array(30);
	}
	  
	table();
	
	function table()
	{
		var i=1;
	
		$('.timeTableRight .title').each(function(index, value){
			timeTable[0][i]=$(this).text();
			i++;
		});
		
	
		i=1,j=0;
	
		$('.timeTableRight .time').each(function(index, value){
			if($(this).parent().find('.lunch').length<=0)
			{
				timeTable[i][0]=$(this).text();
			}
			else
			{
				i--;
			}
			i++;
		});
		
	
		i=1,j=1;
			
		$('.timeTableRight .droppable').each(function(index,value){

			timeTable[i][j]=$(this).text();
			
			if(j==parseInt(days))
			{
				i++;
				j=0;
			}
			j++;
		});
	
	}
	
	$totalRows=$('.timeTableRight tr').length;
	
	$lunchRows=$('.timeTableRight .lunchRow').length;
	
	$columns=days;
	
	$columns+=1;
	
	var timeTableDataString="";
	var arrayContent;
	
	
	for(var l=0;l<($totalRows-$lunchRows);l++)
	{
		for(var m=0;m<$columns;m++)
		{		
		
			if(l==0&&m==0)
			{
			}else if(timeTable[l][m]!="")
			{
				arrayContent=timeTable[l][m];
				timeTableDataString+="timeTable"+l+m+"="+arrayContent+"&";
			}
		}
	}
	
	//alert(timeTableDataString);
	return timeTableDataString;

}

$("#submitTimeTable").live('click',function(e){
	
	$noOfBreaks;
	
	$durationString=$durationString.replace('undefined','');		
	
	timeTableStringReturned=timeTable();

	timeTableStringReturned+="rows="+($totalRows-$lunchRows)+"&columns="+$columns+"&department="+department+"&semester="+semester+"&"+$durationString+"noOfBreaks="+$noOfBreaks+"&lectureDuration="+$lectureDuration;
	
	//alert(timeTableStringReturned);
	
	$.ajax({
		url:"forms/insertTimeTable.php",
		type:"post",
		data:timeTableStringReturned,
		success:function(data){
			//alert(data);
		}
	});
	
	return false;
});
