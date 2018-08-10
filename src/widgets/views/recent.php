<section class="widget widget-recently-uploaded">
	<header class="widget-header">
		<h3 class="widget-title"><?= $title ?></h3>
	</header>
	<div class="widget-block row">
	<?php foreach ($videos as $video): ?>
		<div class="col col-lg-2">
			<article class="video">
				<div class="video-media">
					<img src="<?= $video->thumb ?>" class="video-poster">
					<span class="video-duration"><?= $video->duration ?></span>
				</div>
				<div class="video-block">
					<h5 class="video-title"><?= $video->title ?></h5>
					<span class="video-author"><?= $video->user ?></span>
					<?= yii\helpers\Html::a($video->category, ['video/index', 'category' => $video->category]) ?>
				</div>
			</article>
		</div>
	<?php endforeach ?>
	</div>
</section>