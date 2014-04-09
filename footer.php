<footer>
        
        </footer>
        
        
		
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/visualize.jQuery.js"></script>
        <script type="text/javascript" src="js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="js/jQuery.validity.min.js"></script>
		<script type="text/javascript" src="js/validate.js"></script>
        <script type="text/javascript" src="ajax/addDepartment.js"></script>
        <script type="text/javascript" src="ajax/displayDepartment.js"></script>
        <script type="text/javascript" src="ajax/displayDepartmentIndex.js"></script>
        <script type="text/javascript" src="ajax/deleteDepartment.js"></script>
		<script type="text/javascript" src="ajax/registerStudent.js"></script>
		<script type="text/javascript" src="ajax/displayStudent.js"></script>
        <script type="text/javascript" src="ajax/deleteStudent.js"></script>
		<script type="text/javascript" src="ajax/registerProfessor.js"></script>
        <script type="text/javascript" src="ajax/displayProfessor.js"></script>
        <script type="text/javascript" src="ajax/deleteProfessor.js"></script>
		<script type="text/javascript" src="ajax/editStudentandProfessor.js"></script>
        <script type="text/javascript" src="ajax/paginationAjax.js"></script>
        <script type="text/javascript" src="ajax/addSubjects.js"></script>
        <script type="text/javascript" src="ajax/deleteSubjects.js"></script>
        <script type="text/javascript" src="ajax/displaySubjects.js"></script>
        <script type="text/javascript" src="ajax/addMarks.js"></script>
		<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="ajax/timeTable.js"></script>
        <script type="text/javascript" src="ajax/assignProfessor.js"></script>
        <script type="text/javascript" src="ajax/displayProfesorAssigned.js"></script>
        <script type="text/javascript" src="js/datepicker.js"></script>
        <script type="text/javascript" src="ajax/makeAnnouncements.js"></script>
        <script type="text/javascript" src="ajax/displayAnnouncements.js"></script>   
        <script type="text/javascript" src="ajax/deleteAnnouncements.js"></script>     
        <script type="text/javascript">
				
				/*===
							Stretch Sidebar Height
				==*/
				function sidebarHeight()
				{
					var mainHeight=$('#main').height();
					var sidebarHeight=$('#sidebar').height();
					if(mainHeight>sidebarHeight)
					{
						$('#sidebar').height(mainHeight);
					}
				}
				
				/*===
							Reset Form Fields on load
				==*/
				function resetForm(form) {
					$('input:not(input[type=submit],input[type=button])').each(function(index, element) {
	
							var $defaultValue=$(this).data('dafaultvalue');
							
                    		if($defaultValue!="")
							{
								$(this).val($defaultValue);
							}
							else
							{
								$(this).val('');
							}    
                    });
					
					$(form).find('select').val('');
					$(form).find('input:radio, input:checkbox')
						 .removeAttr('checked').removeAttr('selected');
				}
				
				//resetForm("form");

				
				$(document).ready(function(e) {
					
					/*===
							Ajax Config
					==*/
					$.ajaxSetup ({
						 cache: false,
						 complete: function() {
										$('a[title]').tipsy({fade: true,live: true});
								 }
	  				});
					
					var isAppended=false;
					
					$('input[type=submit]').on('click',function(e){
						
						$this=$(this);
						
						$this.ajaxStart(function() {
								
								var $parent=$this.parent();
								
								$parent.find('.loader img').hide();
								$parent.find('.loader-img').show();
								
							});
							
							$this.ajaxSuccess(function() {
								
								var $parent=$this.parent();
								
								if($parent.find('.loader-success').length<=0){
									$parent.find('.loader').append('<img src="images/tick.png" class="loader-success" alt="Success">');
								}
								
								isAppended=true;
								$parent.find('.loader-img').hide();
								$parent.find('.loader img:not(.loader-img)').show();
								$parent.find('.loader img').delay(1000).fadeOut();
								
							});
							
							$this.ajaxError(function() {
								
								var $parent=$this.parent();
								
								if($parent.find('.loader-success').length<=0){
									$parent.find('.loader').append('<img src="images/cross.png" class="loader-success" alt="Failure">');
								}
								
								isAppended=true;
								$parent.find('.loader-img').hide();
								$parent.find('.loader img:not(.loader-img)').show();
								$parent.find('.loader img').delay(1000).fadeOut();
							});
							
					});
					
					
					
					
					/*===
							Default Value Validation
					==*/
					$('input[type=submit]').click(function(e) {
                        $(this).parent().find('input[type=text]').each(function(index, element) {
                            $currentValue=$(this).val();
							$defaultValue=$(this).data('dafaultvalue');
							
							if($currentValue==$defaultValue)
							{
								alert("Please enter a department name");
								e.preventDefault();
							}
							
                        });
                    });
					
					/*===
							Placeholder Manipulation
					==*/
					$('input[type=text]').focus(function(e) {
                        $currentValue=$(this).val();
						$defaultValue=$(this).data('dafaultvalue');
						if($currentValue==$defaultValue)
						{
							$(this).val('');
						}
                    });
					$('input[type=text]').blur(function(e) {
                        $currentValue=$(this).val();
						$defaultValue=$(this).data('dafaultvalue');
						if($currentValue==""||$currentValue==null)
						{
							$(this).val($defaultValue);
						}
                    });
					
					/*===
							Adding an active class to clicked inputs
					===*/
					$('input,select,textarea').on('blur',function(e) {
                        $currentValue=$(this).val();
						if($currentValue!="" && $currentValue!=null)
						{
							$(this).addClass('active');
						}
						else
						{
							$(this).removeClass('active');
						}
					
                    });
					
					
					/*===
							Page Title Manipulation
					==*/
					
					var $documentTitle=$(this).attr('title');
					
					$documentTitle=$documentTitle.replace("Critical Table Administration | ","");
					
					$('#dashboard-options li a').each(function(index, element) {
				
                        if($(this).attr("href")=="?page="+$documentTitle)
						{
							$('#dashboard-options li a').removeClass('active');
							$(this).addClass('active');
						}
                    });
					
					
					/*===
							Dashboard Animation
					==*/
					
					var dashboardHeight=$('#dashboard').height();
					
                    $('.dashboard-toggle-on').live('click',function(e) {
						$('#dashboard-toggle').removeClass('dashboard-toggle-on');
                        $('#dashboard .container,#dashboard').animate({'height':0});
						$('#dashboard div:not(.container)').slideUp('fast');
						$('#dashboard-toggle').addClass('dashboard-toggle-off');
						return false;
                    });
					$('.dashboard-toggle-off').live('click',function(e) {
						$('#dashboard-toggle').removeClass('dashboard-toggle-off');
                        $('#dashboard .container,#dashboard').animate({'height':dashboardHeight});
						$('#dashboard div:not(.container)').slideDown('fast');
						$(this).addClass('dashboard-no-display');
						$('#dashboard-toggle').addClass('dashboard-toggle-on');
						return false;
                    });
					
					
					/*===
							Charts Generation
					==*/
					
					$('table.pie').visualize({type: 'pie', pieMargin: 20,width: '560px'});
					$('table.line').visualize({type: 'line',width: '560px'});
					$('table.area').visualize({type: 'area',width: '560px'});
					$('table.bar').visualize({type: 'bar', barDirection: 'vertical',width: '560px'});
					
					//$('.pie,.line,.area,.bar').hide();
					
					/*===
							jQuery Tipsy Tooltip
					==*/
					$('a[title]').tipsy({live: true,fade: true});
					
					
                });
				
				/* Update datepicker plugin so that MM/DD/YYYY format is used. */
					  $.extend($.fn.datepicker.defaults, {
						parse: function (string) {
						  var matches;
						  if ((matches = string.match(/^(\d{2,2})\/(\d{2,2})\/(\d{4,4})$/))) {
							return new Date(matches[3], matches[1] - 1, matches[2]);
						  } else {
							return null;
						  }
						},
						format: function (date) {
						  var
							month = (date.getMonth() + 1).toString(),
							dom = date.getDate().toString();
						  if (month.length === 1) {
							month = "0" + month;
						  }
						  if (dom.length === 1) {
							dom = "0" + dom;
						  }
						  return dom + "/" + month + "/" + date.getFullYear();
						}
					  });  
				
		</script>
</body>

</html>