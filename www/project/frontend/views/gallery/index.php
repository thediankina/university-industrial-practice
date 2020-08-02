<?php
/* @var $this yii\web\View */
/* @var $albumList[] frontend\models\Album */

use yii\helpers\Url;
?>
<h1>Albums</h1>

<a href="<?php echo Url::to(['/gallery/create']); ?>" class="btn btn-primary">Create new</a><br><br>
<?php if ($albumExist): ?>
    <?php foreach ($albumList as $album): ?>
        <a href="<?php echo Url::to(['/album/view', 'id' => $album->id, 'name' => $album->name]); ?>">
            <h3><?php echo $album->name; ?></h3>
        </a>
        <hr>
    <?php
    endforeach;
else:
    echo 'Your photo gallery is empty';
endif;
