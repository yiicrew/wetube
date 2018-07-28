<?php

namespace app\widgets;

use app\models\Video;
use app\models\Category;

class Recommended extends \yii\bootstrap4\Widget
{
	public $limit = 10;

	public function run()
	{
		/*
		@TODO: improve query for recommendations

		SELECT editors_picks.*, videos.*, users.id, users.username
		FROM editors_picks, videos, users
		WHERE editors_picks.videoid = video.videoid 
			AND video.active = 'yes' 
			AND video.broadcast = 'public' 
			AND video.userid = users.userid 
		ORDER BY editors_picks.sort ASC
		*/

		$videos = Video::find()
			->with('user')
			->where(['status' => Video::STATUS_ACTIVE])
			->limit($this->limit)
			->orderBy('created_at')
			->all();

		return $this->render('recommended', [
			'videos' => $videos
		]);
	}

}
