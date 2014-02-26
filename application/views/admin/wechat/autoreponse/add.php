<?php
/*page to add questions to the database
*
*
*/
?>
<?php echo validation_errors(); ?>

<?php echo form_open('admin/wechat/autoresponse/add') ?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />
	
	<label for="introduce">Introduce</label>
	<input type="input" name="introduce" /><br/>

	<label for="answer">Answer</label>
	<textarea name="answer"></textarea><br />
	
	<input type="submit" name="submit" value="Add" />

</form>
<div>您添加的内容将会以如下的形式表现：回复@Title获得@Introduce</div>