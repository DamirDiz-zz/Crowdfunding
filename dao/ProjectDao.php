<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

use app\models\User;
use app\models\Project;
use app\models\User2project;
use app\models\ProjectDescription;

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
    
    public function getById($id) {
        return Project::findOne($id);
    }
    
    public function getProjectDescriptionsForProject($project) {
        $pds = ProjectDescription::findAll(['project_id' => $project->id]);
        
        return $pds;
    }
    
    public function getInitiatorForProject($project) {
        $user2project = User2project::findOne(['project_id' => $project->id, 'role_id' => 1]);

        if ($user2project) {
            return User::findOne($user2project->user_id);
        }

        return null;
    }

}
