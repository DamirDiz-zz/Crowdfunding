<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

use app\models\User;
use app\models\Todo;
use app\models\Project;
use app\models\TimelineEntry;
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
    
    public function createTodo($projectId, $userId) {
        $todo = new Todo();
        
        $todo->project_id = $projectId;
        $todo->content = "New Todo";
        $todo->status = 0;
        $todo->creator = $userId;
        $todo->assignedTo = null;
        $todo->created_at = time();
        $todo->updated_at = time();
        
        $todo->save();
        
        return $todo;
        //#todo exception werfen falls es nicht geklappt hat
    }
    
    public function editTodo($todoId, $content) {
        $todo = Todo::findOne(["id" => $todoId]);
        
        if ($todo) {
            $todo->content = $content;
            $todo->updated_at = time();
            $todo->save();
            return $todo;
        }
    }
    
    public function addTimeLineEntryToProject($projectId, $title, $text = null, $userId = null, $typeId) {
        $timelineEntry = new TimelineEntry();
        
        $timelineEntry->project_id = $projectId;
        $timelineEntry->title = $title; 
        $timelineEntry->text = $text; 
        $timelineEntry->userReference = $userId; 
        $timelineEntry->created_at = time();
        $timelineEntry->updated_at = time();   
        $timelineEntry->type_id = $typeId;
        
        $timelineEntry->save();
        
        return $timelineEntry;
    }
    
    public function deleteTodo($todoId) {
        Todo::deleteAll(["id" => $todoId]);
    }
    
    public function getUpdatesForProject($id) {
        return TimelineEntry::find()->where(["project_id" => $id])->orderBy(['id' => SORT_DESC])->all();
            }
    
    public function getTodosForProject($id) {
        return Todo::findAll(["project_id" => $id]);
    }
}