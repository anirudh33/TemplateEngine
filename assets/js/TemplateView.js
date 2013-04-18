function showTemplate()
{
	
	var templateName=$("#selTemplate option:selected").text();

	$.ajax({ 
	     type: "POST",
	     url: 'index.php?controller=Controller&method=onShowTemplateClick',          
	     data: "templateName="+templateName,                        
	     success: function(dataReceived){
	         //alert(dataReceived);
          
	          $("#main").replaceWith(dataReceived);
	          
	       }
	   });
}

function showError(id,error) {
	$(id).after("<i class='error'> "+error+"</i>");
}

function validate()
{
	var flag = 1;

	// Validations for all input fields
	$('#content .required').each(function(){
						if (!$(this).val().match(/^[-a-z' '0-9','"\/"'.']+$/i)) {
							showError(this,'(Must be only letters, numbers, spaces or / or .)');
							flag = 0;
						}
					});

	if (flag == 1) {

		return true;
	} else {
		return false;
	}

}
function submitForm()
{
	$(".error").remove();
	$bool = validate();
	if ($bool) {
		$(
				"#frm").submit();
	} else {
		$(
				"#frm").submit(
				function(
						e)
				{
					e.preventDefault();
				});
	}

}
