<?php
/*
 * Creation Log 
 * File Name - Container.php 
 * Description - View Created Templates and use them Version - 1.0 
 * Created by - Anirudh Pandita 
 * Created on - April 17, 2013
*****************************************************************
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Use Template</title>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery/jquery.js"> </script>

<link type="text/css" rel="stylesheet"	href="<?php echo SITE_URL;?>/assets/style/EngineView.css">

<script type="text/javascript"	src="<?php echo SITE_URL;?>/assets/js/TemplateView.js"> </script>

</head>

<body>
<div id="main">

<div id="head">
<a href="<?php echo SITE_URL; ?>/index.php">Back To Creation</a><br>

Select Template <select id='selTemplate'>
			<?php foreach($templateNames as $key=>$value)  {?>
			<option><?php echo $value["template_name"]; ?></option>
			<?php }?>		
			</select>
			<br><br>
			<button id="showTemplate" onclick=showTemplate();>Show Template</button>
		
			
		</div>
		</div>
		
</body>
</html>