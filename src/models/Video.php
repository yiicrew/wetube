<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $tags
 * @property int $privacy
 * @property string $image_path
 * @property string $file_path
 * @property int $file_size
 * @property int $duration
 * @property string $url
 * @property string $embed_code
 * @property int $like_count
 * @property int $dislike_count
 * @property int $view_count
 * @property int $favourite_count
 * @property int $playlist_count
 * @property int $download_count
 * @property int $comment_count
 * @property int $allow_downloads
 * @property int $allow_comments
 * @property int $allow_rating
 * @property int $rating
 * @property int $is_featured
 * @property int $is_hd
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Categories $category
 * @property Users $user
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'title', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'category_id', 'privacy', 'file_size', 'duration', 'like_count', 'dislike_count', 'view_count', 'favourite_count', 'playlist_count', 'download_count', 'comment_count', 'allow_downloads', 'allow_comments', 'allow_rating', 'rating', 'is_featured', 'is_hd', 'status'], 'integer'],
            [['description', 'tags', 'embed_code'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'image_path', 'file_path', 'url'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'tags' => 'Tags',
            'privacy' => 'Privacy',
            'image_path' => 'Image Path',
            'file_path' => 'File Path',
            'file_size' => 'File Size',
            'duration' => 'Duration',
            'url' => 'Url',
            'embed_code' => 'Embed Code',
            'like_count' => 'Like Count',
            'dislike_count' => 'Dislike Count',
            'view_count' => 'View Count',
            'favourite_count' => 'Favourite Count',
            'playlist_count' => 'Playlist Count',
            'download_count' => 'Download Count',
            'comment_count' => 'Comment Count',
            'allow_downloads' => 'Allow Downloads',
            'allow_comments' => 'Allow Comments',
            'allow_rating' => 'Allow Rating',
            'rating' => 'Rating',
            'is_featured' => 'Is Featured',
            'is_hd' => 'Is Hd',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
