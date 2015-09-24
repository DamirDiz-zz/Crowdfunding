<?php

use yii\db\Schema;
use yii\db\Migration;

class m150924_144458_addLoginTouser extends Migration
{
    public function up()
    {
        $this->addColumn("{{%user}}", "auth_key", $this->string(32)->notNull());
        $this->addColumn("{{%user}}", "password_hash", $this->string()->notNull());
        $this->addColumn("{{%user}}", "password_reset_token", $this->string()->unique());
    }

    public function down()
    {
        $this->dropColumn("{{%user}}", "auth_key");
        $this->dropColumn("{{%user}}", "password_hash");
        $this->dropColumn("{{%user}}", "password_reset_token");
    }
}
