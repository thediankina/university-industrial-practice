<?php
/* @var $album frontend\controllers\AlbumController */

use yii\helpers\Url;
?>
<h1><?php echo $name; ?></h1>

<?php if ($photoExist): ?>
    <div class="row-album">
        <?php foreach ($photoList as $photo): ?>
            <div class="column-album">
                <a href="<?php echo Url::to(['/photo/view', 'id' => $photo->id, 'name' => $photo->name]); ?>">
                    <img src="<?php echo "/uploads/" . $photo->name; ?>" style="width:100%">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php
else:
    echo 'This album is empty';
endif;