//Adds a new field element as chosen through select box
function addField() {

	var fieldType = $("#fieldType option:selected").text();
	var counter = $("#counter").val();
	
	$("#counter").val(++counter);

	var field = "<div id='field" + counter + "'> <br><table id='alignTemplate'><tr><th colspan=2><u> Adding Field "+fieldType
			+"<br><br></u></th></tr>"
			+ "<input type='hidden' name='hdnfieldType' value=" + fieldType
			+ ">" + "<tr><td>Field Name/Id </td><td><input type='text' name='field" + fieldType
			+ counter + "Id' id='field" + fieldType + counter
			+ "Id' class='fieldId'> </td></tr>"
			+ "<tr><td>Field Label</td><td> <input type='text' name='field" + fieldType
			+ counter + "Label' id='field" + fieldType + counter
			+ "label' class='fieldLabel'> </td></tr><tr><td>";
	
		field +="Validation</td><td><input type='text' name='field" + fieldType
			+ counter + "Validation' id='field" + fieldType + counter
			+ "Validation' class='fieldValidation'></td></tr><tr><td>";
	if(fieldType == "Radio") {
		field += "Default Value </td><td><input type='radio' name='field"
			+ fieldType + counter + "Default' id='field" + fieldType
			+ counter + "Default' class='fieldRadioDefault'> " +
					"</td></tr><tr><td colspan=2> Put same field name if you want it in a group";
	} 
	else if (fieldType == "CheckBox") {
		field += "Default Value</td><td> <input type='checkbox' name='field"
				+ fieldType + counter + "Default' id='field" + fieldType
				+ counter + "Default' class='fieldCheckBoxDefault'> " +
						"</td></tr><tr><td colspan=2>  Put same field name if you want it in a group";
	} else {
		field += "Default Value </td><td><input type='text' name='field" + fieldType
				+ counter + "Default' id='field" + fieldType + counter
				+ "Default' class='fieldDefault'>";
	}
	field+="</td></tr>";
	if (fieldType == "ComboBox") {
		field += "<tr><td> Options in comma seperated format</td><td> <input type='text' name='field"
				+ fieldType + counter + "List' id='field" + fieldType + counter	+ "List' class='fieldList'></td></tr>";
	}
	if(fieldType == "TextArea") {
		field += "<tr><td> Dimensions(if Rows=10 and columns=15 write 10,15) </td><td> <input type='text' name='field"
			+ fieldType
			+ counter
			+ "Dimensions' id='field"
			+ fieldType
			+ counter
			+ "Dimensions' class='fieldTextAreaDimensions'></td></tr>";
	}

	
		//"<tr>DataType<td></td><td></td></tr>";
	field += "<tr><td colspan=2><button id='addField' onclick=addField();>Add another</button> " +
			" <button onclick=$($(this).closest('div')).remove();>Remove</button></td></tr></table></div>";
	
	$("#content").append(field);

}
function showError(id,error) {
	$(id).after("<i class='error'> "+error+"</i>");
}

function validate() {
	var flag=1;
	//Validation for no fields added
	if($("#counter").val()==1){
		showError('#templateName','<br>(No fields added)');
		flag=0;
	}
	//validation for template name field
	if(!$("#templateName").val().match(/^[-a-z' '0-9','"\/"'.']+$/i)) {
		showError("#templateName",'<br>(Template name Must be only letters, numbers, spaces or / or .)');
		flag=0;
	}
	
	//Validations for all input fields
	$('#content input').each(function(){
		if($(this).attr('class')=='fieldDefault' || $(this).attr('class')=='fieldRadioDefault'
			|| $(this).attr('class')=='fieldCheckBoxDefault' || $(this).attr('class')=='fieldList'
				|| $(this).attr('class')=='fieldValidation') {
			
		}else if(!$(this).val().match(/^[-a-z' '0-9','"\/"'.']+$/i)) {
			showError(this,'(Must be only letters, numbers, spaces or / or .)');
			flag=0;
		}		
	});
	//Validations for Name/id field
	$('#content .fieldId').each(function(){
		
		if($(this).val().length>20) {
			showError(this,'(Keep Maxlength under 20)');
			flag=0;
		}		
	});
	
	$('#content .fieldLabel').each(function(){
		
		if($(this).val().length>100) {
			showError(this,'(Keep Maxlength under 100)');
			flag=0;
		}		
	});
	
	$('#content .fieldDefault').each(function(){
		
		if($(this).val().length>100) {
			showError(this,'(Keep Maxlength under 100)');
			flag=0;
		}		
	});
	
	$('#content .fieldList').each(function(){
		
		if($(this).val().length>400) {
			showError(this,'(Keep Maxlength under 400)');
			flag=0;
		}		
	});
	
	$('#content .fieldTextAreaDimensions').each(function(){
		
		if($(this).val().length>9) {
			showError(this,'(You will need that much! SERIOUSLY?)');
			flag=0;
		}
		if(!$(this).val().match(/^([0-9]{1,4}),([0-9]{1,4})$/i)) {
			showError(this,'(Use given format)');
			flag=0;
		}		
		
	});
	
	
	if(flag==1) {
		return true;
	} else {
		return false;
	}
	
}
// Get input field values 
function getAllValues() {
	$('.error').remove();
	var flag=0;
	var bool=validate();
	if(bool) {
	var inputValues = [];
	$('#content div').each(function() {
		
		inputValues.push($("#templateName").val());

		$("#" + $(this).prop("id") + " input").each(function() {

			if ($(this).prop("tagName") != "counter") {

				if($(this).prop("class")=="fieldRadioDefault" ||
				$(this).prop("class")=="fieldCheckBoxDefault") {
					inputValues.push($(this).prop("checked"));
				} else {
					inputValues.push($(this).val());
				}
				
			}
		});
	
		flag=addRecord(inputValues.join('-'));
		inputValues = [];
	});
		if (flag==1) {
		
		alert("Template saved");
		} else {
		alert("Problem in saving template!");
			}
	}
	
	
	
}

// Add into table using ajax call
function addRecord(fieldInfoString) {	
	$.ajax({
		type : "POST",
		url : "index.php?controller=Controller&method=saveField",
		data : "fieldInfoString=" + fieldInfoString,
		success : function(dataReceived) {			
			dataReceived = dataReceived.charAt(0);
			
			if ($.trim(dataReceived) == "1") {
				flag= 1;
			} else {
				flag= 0;
			}
		}
	});

	return 1;
}