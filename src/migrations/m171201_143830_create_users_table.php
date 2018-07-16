<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m171201_143830_create_users_table extends Migration
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

        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'auth_key' => $this->string()->notNull()->unique(),
            'confirmation_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ], $options);

        $this->createIndex('idx-users-username', 'users', 'username');
        $this->createIndex('idx-users-email', 'users', 'email');
        $this->createIndex('idx-users-confirmation_token', 'users', 'confirmation_token');
        $this->createIndex('idx-users-password_reset_token', 'users', 'password_reset_token');
        $this->createIndex('idx-users-auth_key', 'users', 'auth_key');
        $this->createIndex('idx-users-status', 'users', 'status');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
