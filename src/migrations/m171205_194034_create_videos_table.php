<?php

use yii\db\Migration;

/**
 * Handles the creation of table `videos`.
 */
class m171205_194034_create_videos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $options = null;

        if ($this->db->driverName === 'mysql') {
          // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
          $options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('videos', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'tags' => $this->text(),
            'image' => $this->string(),
            'file_name' => $this->string(),
            'file_size' => $this->integer(),
            'duration' => $this->integer(),
            'url' => $this->string(),
            'embed_code' => $this->text(),
            'like_count' => $this->integer()->defaultValue(0),
            'dislike_count' => $this->integer()->defaultValue(0),
            'view_count' => $this->integer()->defaultValue(0),
            'favourite_count' => $this->integer()->defaultValue(0),
            'playlist_count' => $this->integer()->defaultValue(0),
            'download_count' => $this->integer()->defaultValue(0),
            'comment_count' => $this->integer()->defaultValue(0),
            'allow_downloads' => $this->boolean()->defaultValue(true),
            'allow_comments' => $this->boolean()->defaultValue(true),
            'allow_rating' => $this->boolean()->defaultValue(true),
            'rating' => $this->integer(),
            'is_featured' => $this->boolean()->defaultValue(false),
            'is_hd' => $this->boolean()->defaultValue(false),

            /*
             * Status Options
             *
             *  - deleted
             *  - processing
             *  - active
             *  - flagged
             *
             *  etc.
             */

            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ], $options);

        $this->createIndex('idx-videos-user_id', 'videos', 'user_id');
        $this->createIndex('idx-videos-category_id', 'videos', 'category_id');
        $this->createIndex('idx-videos-title', 'videos', 'title');
        $this->createIndex('idx-videos-like_count', 'videos', 'like_count');
        $this->createIndex('idx-videos-view_count', 'videos', 'view_count');
        $this->createIndex('idx-videos-is_featured', 'videos', 'is_featured');
        $this->createIndex('idx-videos-is_hd', 'videos', 'is_hd');
        $this->createIndex('idx-videos-status', 'videos', 'status');
        $this->createIndex('idx-videos-created_at', 'videos', 'created_at');

        $this->addForeignKey('fk-videos-user_id', 'videos', 'user_id', 'users', 'id', 'CASCADE');
        $this->addForeignKey('fk-videos-category_id', 'videos', 'category_id', 'categories', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('videos');
    }
}
