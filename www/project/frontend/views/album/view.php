<?php
/* @var $album frontend\controllers\AlbumController */
?>
<h1><?php echo $name; ?></h1>
<div class="row-album">
    <?php foreach ($photoList as $photo): ?>
        <div class="column-album">
            <img src="<?php echo "/uploads/" . $photo->name; ?>" style="width:100%">
        </div>
    <?php endforeach; ?>
</div>