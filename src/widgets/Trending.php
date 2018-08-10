<?php

namespace app\widgets;

use app\models\Video;
use yii\bootstrap4\Widget;

class Trending extends Widget
{
	public $title = 'Trending';
    public $limit = 10;

    public function run()
    {
        /* @TODO: improve query for RecentlyUploaded */

        $videos = Video::find()
            ->with('user')
            ->where(['status' => Video::STATUS_ACTIVE])
            ->limit($this->limit)
            ->orderBy('RAND()')
            ->all();

        return $this->render('trending', [
        	'title' => $this->title,
            'videos' => $videos,
        ]);
    }
}
