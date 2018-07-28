<section class="widget widget-recommended">
	<header class="widget-header">
		<h3 class="widget-title">Recommended</h3>
	</header>
	<div class="widget-block row">
	<?php foreach ($videos as $video): ?>
		<div class="col-lg-2 video">
			<div class="video-media">
				<img src="<?= $video->thumb ?>" class="video-poster">
				<span class="badge badge-secondary video-duration"><?= $video->duration ?></span>
			</div>
			<h5 class="video-title"><?= $video->title ?></h5>
		</div>
	<?php endforeach ?>
	</div>
</div>