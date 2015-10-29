<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Role;
use app\models\Project;
use app\models\ProjectSearch;
use app\models\User2project;
use app\models\TimelineEntry;
use app\models\Category;
use app\models\ProjectDescription;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\dao\ProjectDao;

use yii\web\UploadedFile;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionDetail($id, $projectIsNew = false)
    {
        $projectDao = new ProjectDao();

        $project = $projectDao->getById($id);
        $initiator = $projectDao->getInitiatorForProject($project);
        $pds = $projectDao->getProjectDescriptionsForProject($project);
        $todos = $projectDao->getTodosForProject($project->id);
        $updates = $projectDao->getUpdatesForProject($project->id);
        
        return $this->render('detail', [
            'project' => $project,
            'initiator' => $initiator,
            'projectIsNew' => $projectIsNew,
            'projectDescriptions' => $pds,
            'todos' => $todos,
            'updates' => $updates,

        ]);
    }
    
    public function actionAll() {
        $projectDao = new ProjectDao();
        $projects = $projectDao->getAllProjects();
        
        return $this->render('all', [
            'projects' => $projects
        ]);
    }
    
    public function actionDiscover($categoryId) {
        $projectDao = new ProjectDao();
        $category = Category::findOne(['id' => $categoryId]);
       
        $projects = $projectDao->getProjectsForCategory($categoryId);
        
        return $this->render('discover', [
            'projects' => $projects,
            'category' => $category
        ]);

    }
    
    public function actionAddprojectdescription($projectId = null, $type = null) {
        $projectDescription = new ProjectDescription();

        if ($projectDescription->load(Yii::$app->request->post())) {
            
            $projectDescription->created_at = time();
            $projectDescription->updated_at = time();
            $projectDescription->position = 0;
            
            if ($projectDescription->type == 1) {
                
                $projectDescription->imageFile = UploadedFile::getInstance($projectDescription,'value');
                
                if($projectDescription->imageFile) {
                    $name = 'img_'.date('Y-m-d-H-s').'.' . $projectDescription->imageFile->extension;
                    $projectDescription->imageFile->saveAs('uploads/' . $name);  
                    $projectDescription->value = $name;
                }
            }
            
            if ($projectDescription->save()) {
                return $this->redirect(['detail',
                    'id' => $projectDescription->project_id]);
            }
        } else {
            $projectDao = new ProjectDao();
            $project = $projectDao->getById($projectId);
            
            $view = "";
            if ($type == "text") {
                $view = "addprojectdescriptiontext";
            } else if ($type == "image") {
                $view = "addprojectdescriptionimage";
            }
            
            return $this->render($view, [
                    'projectDescription' => $projectDescription,
                    'project' => $project
            ]);
        }
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null, $isNew = false)
    {
        $project = new Project();
        $projectDao = new ProjectDao();
        
        $user = User::findById(Yii::$app->user->id);

        if ($project->load(Yii::$app->request->post())) {
            $project->created_at = time();
            $project->updated_at = time();
            
            $project->mainImageFile = UploadedFile::getInstance($project,'mainImage');
            if($project->mainImageFile) {
                $name = 'img_'.date('Y-m-d-H-s').'.' . $project->mainImageFile->extension;
                $project->mainImageFile->saveAs('uploads/' . $name);  
                $project->mainImage = $name;
            }
            
            if($project->save()) {
                
                $u2p = new User2project();
                $u2p->project_id = $project->id;
                $u2p->user_id = $user->id;
                $u2p->role_id = Role::INITIATOR;
                
                $u2p->save();
                $projectDao->addTimeLineEntryToProject($project->id, "Es geht los! Unterstütz unser Projekt!", null, null, TimelineEntry::START);
                $projectDao->addTimeLineEntryToProject($project->id, "$user->firstname hat das Projekt gestartet!", null, $user->id, TimelineEntry::USER);
                                
                return $this->render('addTodos', [
                    'project' => $project,
                ]);
            }
        } else {
            if(isset($id) && $isNew == true) {
                return $this->redirect(['detail', 
                    'id' => $id,
                    'projectIsNew' => true]);                
            } else {
                return $this->render('create', [
                    'model' => $project,
                ]); 
            }
        }
    }
    
    public function actionAddtodos($id) {
        $projectDao = new ProjectDao();

        $project = $this->findModel($id);
        $todos = $projectDao->getTodosForProject($id);
        
        return $this->render('addTodos', [
            'project' => $project,
            'todos' => $todos
        ]);
    }
     
       
    public function actionSavetodo($projectId) {
        $projectDao = new ProjectDao();
        $user = User::findById(Yii::$app->user->id);

        $action = $_POST['action'];
        
        if ($action == "create") {
            $todo = $projectDao->createTodo($projectId, $user->id);
            $projectDao->addTimeLineEntryToProject($projectId, "Eine neue Aufgabe wurde hinzugefügt!", null, null, TimelineEntry::INFO);
           
            return json_encode(array('id' => $todo->id, 'content' => $todo->content));   
        } else if ($action == "edit") {
            $todoid = (int) $_POST['todoid'];
            $content = $_POST['content'];
            $todo = $projectDao->editTodo($todoid, $content);
            return json_encode(array('id' => $todo->id, 'content' => $todo->content));   
        } else if ($action == "delete") {
            $todoid = (int) $_POST['todoid'];
            $projectDao = $projectDao->deleteTodo($todoid);
            return json_encode(array('todoId' => $todoid));   
        }
    }
    
     public function actionAddupdate($id) {
        $projectDao = new ProjectDao();
                
        $action = $_POST['action'];
        $tile = $_POST['title'];
        $content = $_POST['content'];

        if ($action == "create") {
            $update = $projectDao->addTimeLineEntryToProject($id, $tile, $content, null, TimelineEntry::INFO);

            return json_encode(array('id' => $update->id, 'title' => $update->title, 'content' => $update->text, 'createdat' => date("m.d.y",$update->created_at)));   
        }
    }
    
    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();

            $model->mainImageFile = UploadedFile::getInstance($model,'mainImage');
            if($model->mainImageFile) {
                $name = $model->mainImageFile->baseName . '.' . $model->mainImageFile->extension;
                $model->mainImageFile->saveAs('uploads/' . $name);  
                $model->mainImage = $name;
            }
            
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);                
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
