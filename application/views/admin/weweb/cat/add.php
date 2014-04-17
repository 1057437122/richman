<?php
/*page to add category
*
*
*/
?>
<script type="text/javascript">
	var swfu;
	window.onload = function () {
		swfu = new SWFUpload({
			// Backend Settings
			upload_url: "<?php echo $base_url;?>index.php/admin/uploadimg",
			post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},

			// File Upload Settings
			file_size_limit : "2 MB",	// 2MB
			file_types : "*.jpg",
			file_types_description : "JPG Images",
			file_upload_limit : "0",

			// Event Handler Settings - these functions as defined in Handlers.js
			//  The handlers are not part of SWFUpload but are part of my website and control how
			//  my website reacts to the SWFUpload events.
			file_queue_error_handler : fileQueueError,
			file_dialog_complete_handler : fileDialogComplete,
			upload_progress_handler : uploadProgress,
			upload_error_handler : uploadError,
			upload_success_handler : uploadSuccess,
			upload_complete_handler : uploadComplete,

			// Button Settings
			button_image_url : "<?php echo $base_url;?>static/plugins/swfupload/images/SmallSpyGlassWithTransperancy_17x18.png",
			button_placeholder_id : "spanholder",
			button_width: 180,
			button_height: 18,
			button_text : '<span class="button">Select Images <span class="buttonSmall">(2 MB Max)</span></span>',
			button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
			button_text_top_padding: 0,
			button_text_left_padding: 18,
			button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_cursor: SWFUpload.CURSOR.HAND,
			
			// Flash Settings
			flash_url : "<?php echo $base_url;?>static/plugins/swfupload/swfupload.swf",

			custom_settings : {
				upload_target : "divFileProgressContainer"
			},
			
			// Debug Settings
			debug: false
		});
	};
</script>
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
	
	<label for='bkpic' name='bkpic'><div id="spanholder"></div></label>
	<br>
	
	<textarea name='description'></textarea>
	<br>
	<input type="submit" value="SUBMIT">
</form>