<?php
/* @var $album frontend\controllers\AlbumController */
/* @var $modelPicture frontend\models\PictureForm */

use yii\helpers\Url;
use dosamigos\fileupload\FileUpload;

?>
<h1><?php echo $name; ?></h1>

<?= FileUpload::widget([
    'model' => $modelPicture,
    'attribute' => 'picture',
    'url' => ['/album/upload-picture'],
    'options' => ['accept' => 'image/*'],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
    ],
]); ?>
<br><br>
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