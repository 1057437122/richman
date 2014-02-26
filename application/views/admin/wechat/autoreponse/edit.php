<?php
/*page to add questions to the database
*
*
*/
?>
<?php echo validation_errors(); ?>

<?php echo form_open('admin/wechat/autoresponse/edit/'.$id) ?>

	<label for="title">Title</label>
	<input type="input" name="title" value=<?php echo $info['title'];?>><br />

	<label for="answer">Answer</label>
	<textarea name="answer"><?php echo $info['answer'];?></textarea><br />
	
	<input type="submit" name="submit" value="Update" />

</form>