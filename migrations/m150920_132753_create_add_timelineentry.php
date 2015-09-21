<?php

use yii\db\Schema;
use yii\db\Migration;

class m150920_132753_create_add_timelineentry extends Migration {

    public function up() {

        $this->createTable('{{%timelineEntryType}}', [
              'id' => Schema::TYPE_PK,
              'type' => Schema::TYPE_STRING . ' NOT NULL'
          ]);

        $this->createTable('{{%timelineEntry}}', [
            'id' => Schema::TYPE_PK,
            'project_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'text' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'type_id' => Schema::TYPE_INTEGER,
        ]);
        
        $this->addForeignKey('project', 'timelineEntry', 'project_id', 'project', 'id');
        $this->addForeignKey('type', 'timelineEntry', 'type_id', 'timelineEntryType', 'id');
    }

    public function down() {
        $this->dropTable('{{%timelineEntryType}}');
        $this->dropTable('{{%timelineEntry}}');
        
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
