<?php
/* @var $this yii\web\View */
/* @var $albumList[] frontend\models\Album */

use yii\helpers\Url;
?>
<h1>Albums</h1>

<?php foreach ($albumList as $album): ?>
<a href="<?php echo Url::to(['/album/view', 'id' => $album->id, 'name' => $album->name]); ?>">
    <h3><?php echo $album->name; ?></h3>
</a>
<hr>
<?php endforeach;
