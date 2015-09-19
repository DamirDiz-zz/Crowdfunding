<?php

use yii\db\Schema;
use yii\db\Migration;

class m150919_133548_add_formatted_address_toProject extends Migration
{
    public function up()
    {
        $this->addColumn("{{%project}}", "formattedAddress", Schema::TYPE_STRING . ' AFTER `location`');
        $this->addColumn("{{%project}}", "placeId", Schema::TYPE_STRING . ' AFTER `location`');

    }

    public function down()
    {
        $this->dropColumn("{{%project}}", "formattedAddress");
        $this->dropColumn("{{%project}}", "placeId");
    }
}
