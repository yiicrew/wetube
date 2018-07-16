<?php

return [
	'demo' => [
		'username' => 'demo',
		'email' => 'demo@example.com',
		'password_hash' => \Yii::$app->security->generatePasswordHash('demo'),
		'auth_key' => \Yii::$app->security->generateRandomString(),
		'status' => \app\models\User::STATUS_ACTIVE,
		'created_at' => new \yii\db\Expression('NOW()'),
		'updated_at' => new \yii\db\Expression('NOW()'),
	],
	'admin' => [
		'username' => 'admin',
		'email' => 'admin@example.com',
		'password_hash' => \Yii::$app->security->generatePasswordHash('admin'),
		'auth_key' => \Yii::$app->security->generateRandomString(),
		'status' => \app\models\User::STATUS_ACTIVE,
		'created_at' => new \yii\db\Expression('NOW()'),
		'updated_at' => new \yii\db\Expression('NOW()'),
	],
];