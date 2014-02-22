<a href=<?php echo $base_url.'index.php/admin/wechat/autoresponse/add';?>>添加</a>
<br>
<?php 
foreach($autoresponse_list as $item):
echo $item['id'].'--'.$item['title'].'--'.$item['answer'].'<br>';
endforeach;
?>