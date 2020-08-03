<?php
/* @var $name frontend\controllers\PhotoController */

$this->title = 'View photo';
?>

<img class="only-photo" src="<?php echo "/uploads/" . $name; ?>" style="float: top; max-width:100%; height:auto">
<h4><?php echo $name; ?></h4>
