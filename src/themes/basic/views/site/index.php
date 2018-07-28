<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\widgets\News;


$this->title = Yii::$app->name;
?>

<?= app\widgets\Recommended::widget([
	'limit' => 6
]) ?>
