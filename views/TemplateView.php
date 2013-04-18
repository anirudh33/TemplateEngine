<?php

/*
 * Creation Log File Name - TemplateView.php Description - View Created Templates and use them Version - 1.0 Created by - Anirudh Pandita Created on - April 15, 2013 *****************************************************************
 */

?>
<div id="content">
	<a
		href="<?php echo SITE_URL; ?>/index.php?controller=Controller&method=onViewTemplateClick">Back</a><br>
	<form id="frm"
		action="<?php echo SITE_URL; ?>/index.php?controller=Controller&method=onSubmitTemplate"
		method="post">
		
			Your template:
			<?php
			if (isset ( $templateFields ) && ! empty ( $templateFields )) {
				?>
				<table id="alignTemplate">
			<tr>
				<th colspan=2>Welcome to <?php echo $templateFields[0]["template_name"];?> template</th>
			</tr>
			
			<?php foreach ( $templateFields as $key => $value ) {	?>
			<tr>
				<td>		
				<?php echo $value["field_label"];?>
					</td>
				<td>
					<?php
					
					if (strtolower ( $value ["field_type"] ) == "combobox") {
						
						$list = explode ( ",", $value ["field_list"] );
						
						?>
						
					<select id=<?php echo $value["field_id"];?>
					name=<?php echo $value["field_id"];?>>
					
					<?php foreach ($list as $key=>$value1) {?>
					
					<option
							<?php if($value["field_value"]==$value1){echo "selected=true";}?>><?php echo $value1?></option>
					<?php }?>			
					</select>					
					
					<?php } elseif(strtolower ( $value ["field_type"] ) == "radio"){?>
							<input type=<?php echo strtolower($value["field_type"]); ?>
					id=<?php echo $value["field_id"];?>
					name=<?php echo $value["field_id"];?>
					value=<?php echo $value["field_label"];?>
					<?php if($value["field_value"]=='true') {echo "checked='true'";}?>>
					
					<?php } elseif(strtolower ( $value ["field_type"] ) == "checkbox"){?>
							<input type=<?php echo strtolower($value["field_type"]); ?>
					id=<?php echo $value["field_id"];?>
					name=<?php echo $value["field_id"];?>
					value=<?php echo $value["field_label"];?>
					<?php if($value["field_value"]=='true') {echo "checked='true'";}?>>
						
					<?php } elseif(strtolower ( $value ["field_type"] ) == "textarea"){?>
					<?php $list = explode ( ",", $value ["field_list"] );?>
						<textarea id=<?php echo $value["field_id"];?>
						name="<?php echo $value["field_id"];?>" 
						rows="<?php echo $list[0]; ?>"
						cols="<?php echo $list[1]; ?>"
						<?php
						
if ( $value ["field_validation"] == 'required') {
							echo "class='required'";
						}
						?>>
						<?php echo $value["field_value"];?>
						</textarea>					
					
					<?php }else {?>
					<input type=<?php echo strtolower($value["field_type"]);?>
						id=<?php echo $value["field_id"];?>
						name=<?php echo $value["field_id"];?> 
						value="<?php echo $value["field_value"];?>" 
						<?php if ($value ["field_validation"] == 'required'){ 
							echo "class='required'"; }?> >
							<?php }?>
							</td>
			</tr>
			<?php }?>
			
			<?php } ?>
			
			
			<tr>
				<td colspan=2>
				<input type='hidden' name='templateName'
					value="<?php echo $templateFields[0]["template_name"];?>"> 
					<button onclick=submitForm();>Submit form</button></td>
			</tr>
		</table>

	</form>

</div>

<div id="footer"></div>



