<?php

/* @var $this yii\web\View */
/* @var $album frontend\models\Album */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create new album';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($album, 'name'); ?>

    <?php echo Html::submitButton('Save', [
        'class' => 'btn btn-primary',
    ]); ?>

<?php ActiveForm::end(); ?>