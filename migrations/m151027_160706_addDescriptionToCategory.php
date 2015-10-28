<?php

use yii\db\Schema;
use yii\db\Migration;

class m151027_160706_addDescriptionToCategory extends Migration
{
    public function up()
    {
        $this->addColumn("{{%category}}", "description", Schema::TYPE_TEXT);

    }

    public function down()
    {
        $this->dropColumn("{{%category}}", "description");
    }

}
