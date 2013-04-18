<?php
/*
 * Creation Log File Name - EngineView.php Description - Designing templates using this master Version - 1.0 Created by - Anirudh Pandita Created on - April 15, 2013 *****************************************************************
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Template Engine</title>

<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/jquery/jquery.js"> </script>

<link type="text/css" rel="stylesheet"
	href="<?php echo SITE_URL;?>/assets/style/EngineView.css">

<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/EngineView.js"> </script>

</head>

<body>

	<div id="main">
		<div id="header">

		<h1>Template Creation Engine</h1>
		(Add all required Fields first, it will be easier)
		<br><br>
			<input type="hidden" value=1 id="counter" name="counter"> 
			Choose Field Type
			<select id='fieldType'>
				<option>TextBox</option>
				<option>TextArea</option>
				<option>CheckBox</option>
				<option>ComboBox</option>
				<option>Radio</option>
				<option>File</option>
			</select> 
			<button id="addField" onclick=addField();>Add Field</button>
			<br> <br>
			Template name<input type="text" name="templateName" id="templateName"> 
			<br><br>
		</div>
		<div id="content"></div>
		<div id="footer">
			<button id="saveTemplate" onClick=getAllValues();>Save Template</button>
			<a href="<?php echo SITE_URL;?>/index.php?controller=Controller&method=onViewTemplateClick">Use
				Template</a>
		</div>

	</div>

</body>
</html>