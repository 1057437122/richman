<a href=<?php echo $base_url.'index.php/admin/wechat/autoresponse/add';?>>添加</a>
<a href=<?php echo $base_url.'index.php/admin/wechat/autoresponse/add_single';?>>添加单图文内容</a>
<br>
<div class="Id">ID</div><div class="title">TITLE</div><div class="introcude">INTRODUCE</div><div class="answer">ANSWER</div><br>
<?php foreach($autoresponse_list as $item):?>
<div class="items">
<div class="Id"><?php echo $item['id'];?></div>
<div class="title"><?php echo $item['title'];?></div>
<div class="introcude"><?php echo $item['introduce'];?></div>
<div class="answer"><?php echo $item['answer'];?></div>
<div class="edit"><a href=<?php echo $base_url.'index.php/admin/wechat/autoresponse/edit/'.$item['id'];?>>Edit</a></div>
<div class="active"><a href=<?php if($item['isactive']==1){$act='Setinactive';}else{$act='Setactive';}echo $base_url.'index.php/admin/wechat/autoresponse/'.$act.'/'.$item['id'];?>><?php echo $act;?></a></div>
</div>
<?php endforeach;?>
<div class="clr"></div>