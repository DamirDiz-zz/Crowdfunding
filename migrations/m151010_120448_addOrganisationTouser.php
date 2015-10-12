<?php

use yii\db\Schema;
use yii\db\Migration;

class m151010_120448_addOrganisationTouser extends Migration
{
    public function up()
    {
        $this->addColumn("{{%user}}", "organisationName", Schema::TYPE_STRING . ' AFTER `lastname`');
    }
    
    public function down()
    {
        $this->dropColumn("{{%user}}", "organisationName");
    }
}
