<?php

use yii\db\Schema;
use yii\db\Migration;

class m151001_142936_addTodos extends Migration {

    public function up() {
        $this->createTable('{{%todo}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'content' => $this->text()->notNull(),
            'status' => $this->integer()->notNull(),
            'creator' => $this->integer()->notNull(),
            'assignedTo' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
         ]);
        
        $this->addForeignKey('forproject', 'todo', 'project_id', 'project', 'id');
        $this->addForeignKey('creator', 'todo', 'creator', 'user', 'id');
    }

    public function down() {
        $this->dropTable('{{%todo}}');
    }

}
