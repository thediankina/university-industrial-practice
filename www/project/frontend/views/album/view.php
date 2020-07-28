<?php
/* @var $album frontend\controllers\AlbumController */
?>
<h1><?php echo $name; ?></h1>
<?php foreach ($photoList as $photo): ?>
    <img src=<?php echo "/uploads/".$photo->name; ?>>
<?php endforeach;
