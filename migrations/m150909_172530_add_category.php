<?php

use yii\db\Schema;
use yii\db\Migration;

class m150909_172530_add_category extends Migration
{
    public function up()
    {
          $this->createTable('{{%category}}', [
              'id' => Schema::TYPE_PK,
              'title' => Schema::TYPE_STRING . ' NOT NULL'
          ]);
          
          $this->addColumn("{{%project}}", "category_id", Schema::TYPE_INTEGER);
          $this->addForeignKey('category', 'project', 'category_id', 'category', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
        
        $this->dropColumn("{{%project}}", "category_id");

    }
}
