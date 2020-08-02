<?php
/* @var $album frontend\controllers\AlbumController */
/* @var $modelPicture frontend\models\PictureForm */

use yii\helpers\Url;
use dosamigos\fileupload\FileUpload;

$this->title = $name.' - Album';
?>
<h1><?php echo $name; ?></h1>

<?= FileUpload::widget([
    'model' => $modelPicture,
    'attribute' => 'picture',
    'url' => ['/album/upload-picture', 'id' => $id],
    'options' => ['accept' => 'image/*'],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
            if (data.result.success) {
                sessionStorage.reloadAfterPageLoad = true;
                location.reload();
                sessionStorage.reloadAfterPageLoad = false;
                $("#upload-image-success").show();
                $("#upload-image-fail").hide();
            } else {
                $("#upload-image-fail").html(data.result.errors.picture).show();
                $("#upload-image-success").hide();
            }
        }',
    ],
]); ?>
<br><br>
<div class="alert alert-success" style="display: none" id="upload-image-success">Image was uploaded successfully</div>
<div class="alert alert-danger" style="display: none" id="upload-image-fail"></div>
<?php if ($photoExist): ?>
    <div class="row-album">
        <?php foreach ($photoList as $photo): ?>
            <div class="column-album">
                <a href="<?php echo Url::to(['/photo/view', 'id' => $photo->id, 'name' => $photo->name]); ?>">
                    <img src="<?php echo "/uploads/" . $photo->name; ?>" style="width:100%"/>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php
else:
    echo 'This album is empty';
endif;