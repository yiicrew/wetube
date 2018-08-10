<?php

namespace app\widgets;

use yii\bootstrap4\Widget;
use app\models\Video;
use app\models\Category;

class Recommended extends Widget
{
	public $title = 'Recommended';
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
			->all();

		return $this->render('recommended', [
			'title' => $this->title,
			'videos' => $videos
		]);
	}

}
