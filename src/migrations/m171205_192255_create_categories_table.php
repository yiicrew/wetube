<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m171205_192255_create_categories_table extends Migration
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


        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'image' => $this->string(),
            'sort_order' => $this->smallInteger(),
            'is_default' => $this->boolean()->defaultValue(false),
            /*
             * Status Options
             *
             *  - inactive
             *  - active
             *
             *  etc.
             */
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull()
        ], $options);

        $this->createIndex('idx-categories-parent_id', 'categories', 'parent_id');
        $this->createIndex('idx-categories-sort_order', 'categories', 'sort_order');
        $this->createIndex('idx-categories-is_default', 'categories', 'is_default');
        $this->createIndex('idx-categories-status', 'categories', 'status');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('categories');
    }
}
