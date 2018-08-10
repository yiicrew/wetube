<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\widgets\News;


$this->title = Yii::$app->name;
?>

<?= app\widgets\Trending::widget([
	'limit' => 6
]) ?>

<br>
<br>

<?= app\widgets\Recent::widget([
	'limit' => 6
]) ?>


<br>
<br>

<?= app\widgets\Recommended::widget([
	'limit' => 6
]) ?>
