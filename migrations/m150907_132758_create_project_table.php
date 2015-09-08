<?php

use yii\db\Schema;
use yii\db\Migration;

class m150907_132758_create_project_table extends Migration
{
    public function up()
    {
          $tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }

          $this->createTable('{{%project}}', [
              'id' => Schema::TYPE_PK,
              'title' => Schema::TYPE_STRING . ' NOT NULL',
              'shortDescription' => Schema::TYPE_TEXT .' NOT NULL',
              'location' => Schema::TYPE_STRING . ' NOT NULL',
              'longitude' => Schema::TYPE_DOUBLE,
              'latitude' => Schema::TYPE_DOUBLE,
              'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
              'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
          ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%project}}');

        return false;
    }
}
