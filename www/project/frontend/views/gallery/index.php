<?php
/* @var $this yii\web\View */
/* @var $albumList[] frontend\models\Album */

use yii\helpers\Url;
use frontend\models\Photo;

$this->title = 'My photo gallery';
?>
<h1>Albums</h1>

<a href="<?php echo Url::to(['/gallery/create']); ?>" class="btn btn-primary">Create new</a><br><br>
<?php if ($albumExist): ?>
    <?php foreach ($albumList as $album): ?>
        <a href="<?php echo Url::to(['/album/view', 'id' => $album->id, 'name' => $album->name]); ?>">
            <img class="preview-album" src="<?php echo "/uploads/" . $album->preview; ?>" style="width:25%"/>
        </a>
        <h4><?php echo $album->name; ?></h4>
        <div class="indicate-number"><h5><?php
        $countPhotos = Photo::find()->where(['album_id' => $album->id])->count();
        $album->number_of_photos = $countPhotos;
        $album->update();
        echo $album->number_of_photos." elements"; ?></h5></div>
    <?php
    endforeach;
else:
    echo 'Your photo gallery is empty';
endif;
