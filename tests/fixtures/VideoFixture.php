<?php

namespace tests\fixtures;

use yii\test\ActiveFixture;

class VideoFixture extends ActiveFixture
{
    public $modelClass = "app\models\Video";
    public $depends = [
        'tests\fixtures\UserFixture',
        'tests\fixtures\CategoryFixture',

    ];
}
