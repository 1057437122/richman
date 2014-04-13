<?php
/*page to add category
*
*
*/
?>
<?php echo validation_errors(); ?>
<!--<form action=<?php echo $base_url.'admin/weweb/cat/add';?> method='post'><!-->
<?php echo form_open('admin/weweb/cat/add') ?>
	<label for='name'>Name</label>
	<input type="input" name="name" /><br />
	
	<label for='parentId'>Parent Category</label>
	<select>
		<?php
		foreach($catid as $key=>$value){
		?>
		<option value=<?php echo $key;?>><?php echo $value;?></option>
		<?php }?>
	</select>
	<br>
	<input type="checkbox" name="showInIndex" value="1"> Show In Index Page<br> 
	
	<label for='bkpic' name='bkpic'>Background Picture</label>
	<br>
	
	<textarea name='description'></textarea>
	<br>
	<input type="submit" value="SUBMIT">
</form>