<?php
$page = "gallery";
require_once("common/page_head.php");
$gallery = new Gallery();
$images = $gallery->fetch($active_gallery['path']."/", true);
if(empty($_REQUEST['img_index'])) $img_index = 0;
else $img_index = $_REQUEST['img_index'];

$default_image_path = $images[$img_index]['path'];
$default_image_name = $images[$img_index]['name'];
?>
<div class="gallery_frame">

	<div id="main_image">
		<noscript>
			<img src="<?=$default_image_path?>" title="<?=$default_image_name?>"  />
		</noscript>
	</div>
	
	<noscript>
		<ul class="nojs">
	<?foreach($images as $index => $image):?>
		<li <?if($index == $img_index):?>class="active"<?else:?>class="pic"<?endif?>><a href="?img_index=<?=$index?>"><?=$image['name']?></a></li>
	<?endforeach?>
		</ul>
	</noscript>
	
</div>

<!-- end primary column -->
</div>	
	
<div id="gallery_details">
	<ul class="gallery_unstyled">
		<?foreach($images as $index => $image):?>
		<li <?if($index == 0):?>class="active"<?else:?>class="pic"<?endif?>><img src="<?=$image['path']?>" title="<?=$image['name']?>" id="img<?=$index?>" alt="<?=$image['name']?>"/></li>
		<?endforeach?>
	</ul>

	<p class="nav"><a href="#" onclick="$.galleria.prev(); return false;">&laquo; previous</a> | <a href="#" onclick="$.galleria.next(); return false;">next &raquo;</a></p>
<?
require_once("common/page_foot.php");
?>
