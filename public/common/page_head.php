<?php
require_once("gallery_model.php");
$gallery = new Gallery();
$galleries = $gallery->fetch();
if(isset($_REQUEST['gallery']) && $page == "gallery"){
	$gallery_index = $_REQUEST['gallery'];
	$path = $galleries[$gallery_index]['path']."/";
	$subs = $gallery->fetch($path, false, true);
	if($sub_index = $_REQUEST['sub'])	$active_gallery = $subs[$sub_index];
	else $active_gallery = $galleries[$gallery_index];
} elseif($page == "gallery"){
	$gallery_index = 0;
	$active_gallery = $galleries[$gallery_index];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="keywords" content="Lucas North, photography, lucas, north, lucas north photography" /> 
	<meta name="description" content="Lucas North Photography." />
	<meta name="author" content="" />
	<link rel="stylesheet" href="http://yui.yahooapis.com/2.4.1/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css" media="screen" title="styles" charset="utf-8" />
	<link rel="stylesheet" href="stylesheets/styles.css" type="text/css" media="screen" title="styles" charset="utf-8" />	
	
	<?if($page == "gallery"):?>
	<script src="/javascripts/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="/javascripts/jquery-galleria.js" type="text/javascript" charset="utf-8"></script>
	<script src="/javascripts/jquery-gallery-init.js" type="text/javascript" charset="utf-8"></script>
	<?endif?>
	
	<title>Lucas North</title>
	
</head>

<body id="webpage<?=$page?>">
	<div id="container">
		
		<div id="secondary_column">
		
			<h1 id="page_title"><a href="/" rel="my name">lucas north</a></h1>
			<h2 id="by_line">photographer</h2>
			
			<ul id="navigation">
				<li id="about_link"><a href="/about.php">about</a></li>
				<li id="galleries_link"><a href="/galleries.php">galleries</a></li>
				<li id="contact_link"><a href="/contact.php">contact</a></li>
			</ul>
			
			<ul class="subnavigation" >
				<?foreach($galleries as $k => $gallery_item):?>
					<?
					if($k == $_REQUEST['gallery']) $class = "selected";
					else $class = "gallery_folder";
					?>
				<li id="sub_<?=$gallery_item['name']?>_<?=$k?>" class="<?=$class?>"><a href="/galleries.php?gallery=<?=$k?>"><?=strtolower($gallery_item['name'])?></a>
					<?if($k == $_REQUEST['gallery'] && $gallery->fetch()):?>
						<?if(count($subs)):?>
						<ul>
							<?foreach($subs as $i => $sub):?>
								<?if($i == $sub_index){$subclass = "selected";}else{$subclass="gallery_folder";}?>
							<li id="sub_sub_<?=$sub['name']?>_<?=$i?>" class="<?=$subclass?> subfolder"><a href="/galleries.php?gallery=<?=$k?>&amp;sub=<?=$i?>"><?=strtolower($sub['name'])?></a>
							<?endforeach?>	
						</ul>
						<?endif?>
					<?endif?>
				</li>
				<?endforeach?>
			</ul>
				
		</div>
		
		
		<div id="primary_column">