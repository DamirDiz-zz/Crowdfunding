<?php

use yii\db\Schema;
use yii\db\Migration;

class m151015_114501_addUserToTimeline extends Migration
{
    public function up()
    {
        $this->addColumn("{{%timelineEntry}}", "userReference", Schema::TYPE_INTEGER . ' AFTER `text`');
        $this->addForeignKey('referstouser', 'timelineEntry', 'userReference', 'user', 'id');
    }

    public function down()
    {
        $this->dropColumn("{{%timelineEntry}}", "userReference");

    }

}
