<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

use app\models\Project;

class ProjectDao 
{
    
    public function getTop3()
    {
        return Project::find()->limit(3)->all();
    }

    public function getAllProjects()
    {
        return Project::find()->all();
    }
}
