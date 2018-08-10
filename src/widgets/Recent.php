<?php

namespace app\widgets;

use yii\bootstrap4\Widget;
use app\models\Video;
use app\models\Category;

class Recent extends Widget
{
	public $title = 'Recently Uploaded';
	public $limit = 10;

	public function run()
	{
		/* @TODO: improve query for Recent */

		$videos = Video::find()
			->with('user')
			->where(['status' => Video::STATUS_ACTIVE])
			->limit($this->limit)
			->orderBy('created_at')
			->all();

		return $this->render('recent', [
			'title' => $this->title,
			'videos' => $videos
		]);
	}

}