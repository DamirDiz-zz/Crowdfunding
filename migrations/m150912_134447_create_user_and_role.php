<?php

use yii\db\Schema;
use yii\db\Migration;

class m150912_134447_create_user_and_role extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%role}}', [
            'id' => Schema::TYPE_PK,
            'role' => Schema::TYPE_STRING . ' NOT NULL',
                ], $tableOptions);

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'firstname' => Schema::TYPE_STRING . ' NOT NULL',
            'lastname' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'avatarImage' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);

        $this->createTable('{{%user2project}}', [
            'user_id' => Schema::TYPE_INTEGER  . ' NOT NULL',
            'project_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'role_id' => Schema::TYPE_INTEGER  . ' NOT NULL',
                ], $tableOptions);
        
        $this->addForeignKey('user2project_user', 'user2project', 'user_id', 'user', 'id');
        $this->addForeignKey('user2project_project', 'user2project', 'project_id', 'project', 'id');
        $this->addForeignKey('user2project_role', 'user2project', 'role_id', 'role', 'id');

        }

    public function down() {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%role}}');
        $this->dropTable('{{%user2project}}');
    }

}
