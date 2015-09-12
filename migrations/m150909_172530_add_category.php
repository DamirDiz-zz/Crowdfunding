<?php

use yii\db\Schema;
use yii\db\Migration;

class m150909_172530_add_category extends Migration
{
    public function up()
    {
          $tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }

          $this->createTable('{{%category}}', [
              'id' => Schema::TYPE_PK,
              'title' => Schema::TYPE_STRING . ' NOT NULL'
          ],$tableOptions);
          
          $this->addColumn("{{%project}}", "category_id", Schema::TYPE_INTEGER);
          $this->addForeignKey('category', 'project', 'category_id', 'category', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
        
        $this->dropColumn("{{%project}}", "category_id");

    }
}
