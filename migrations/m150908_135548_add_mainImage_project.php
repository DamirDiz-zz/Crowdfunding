<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_135548_add_mainImage_project extends Migration
{
    public function up()
    {
        $this->addColumn("{{%project}}", "mainImage", Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn("{{%project}}", "mainImage");
    }
}
