<a href=<?php echo $base_url.'index.php/admin/wechat/suggestion/add';?>>添加</a>
<br>
<div class="Id">ID</div><div class="username">USERNAME</div><div class="suggestion">SUGGESTION</div><div class="flag">FLAG</div><br>
<?php foreach($suggestion_list as $item):?>
<div class="items">
<div class="Id"><?php echo $item['id'];?></div>
<div class="username"><?php echo $item['username'];?></div>
<div class="suggestion"><?php echo $item['suggestion'];?></div>
<div class="flag"><?php echo $item['flag'];?></div>
<div class="active"><a href=<?php if($item['isactive']==1){$act='Setinactive';}else{$act='Setactive';}echo $base_url.'index.php/admin/wechat/suggestion/'.$act.'/'.$item['id'];?>><?php echo $act;?></a></div>
</div>
<?php endforeach;?>
<div class="clr"></div>