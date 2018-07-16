<?php

return [
	'uncategorized' => [
        'parent_id' => 0,
        'name' => 'Uncategorized',
        'sort_order' => 0,
        'is_default' => false,
        'status' => \app\models\Category::STATUS_ACTIVE,
        'created_at' => new \yii\db\Expression('NOW()'),
        'updated_at' => new \yii\db\Expression('NOW()')
	],
];