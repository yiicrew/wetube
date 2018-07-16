<?php

namespace tests\fixtures;

use yii\test\ActiveFixture;

class VideoFixture extends ActiveFixture
{
    public $modelClass = "app\models\Video";
    public $depends = [
        'app\tests\fixtures\UserFixture',
        'app\tests\fixtures\CategoryFixture',
    ];
}
