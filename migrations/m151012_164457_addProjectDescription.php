<?php

use yii\db\Schema;
use yii\db\Migration;

class m151012_164457_addProjectDescription extends Migration
{
    public function up()
    {
        $this->createTable('{{%projectDescription}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'value' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'type' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull(),            
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
         ]);
        
        $this->addForeignKey('describesproject', 'projectDescription', 'project_id', 'project', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%projectDescription}}');
    }
}
