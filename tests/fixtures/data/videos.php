<?php

return [
  'video1' => [
    'user_id' => 1,
    'category_id' => 1,
    'title' => 'AQUAMAN - Official Trailer - Fanmade (2018)',
    'privacy' => 0,
    'url' => 'http://',
    'status' => \app\models\Video::STATUS_ACTIVE,
    'created_at' => new \yii\db\Expression('NOW()'),
    'updated_at' => new \yii\db\Expression('NOW()'),
  ],
  'video2' => [
  ]
];
