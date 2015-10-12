<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Role;
use app\models\Project;
use app\models\ProjectSearch;
use app\models\User2project;
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
        
        return $this->render('detail', [
            'project' => $project,
            'initiator' => $initiator,
            'projectIsNew' => $projectIsNew,
            'projectDescriptions' => $pds
        ]);
    }
    
    public function actionAll() {
        $projectDao = new ProjectDao();
        $projects = $projectDao->getAllProjects();
        
        return $this->render('all', [
            'projects' => $projects
        ]);

    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null, $isNew = false)
    {
        $project = new Project();

        $user = User::findById(Yii::$app->user->id);

        if ($project->load(Yii::$app->request->post())) {
            $project->created_at = time();
            $project->updated_at = time();
            
            $project->mainImageFile = UploadedFile::getInstance($project,'mainImage');
            if($project->mainImageFile) {
                $name = $project->mainImageFile->baseName . '.' . $project->mainImageFile->extension;
                $project->mainImageFile->saveAs('uploads/' . $name);  
                $project->mainImage = $name;
            }
            
            if($project->save()) {
                
                $u2p = new User2project();
                $u2p->project_id = $project->id;
                $u2p->user_id = $user->id;
                $u2p->role_id = Role::INITIATOR;
                
                $u2p->save();
                
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
        $project = $this->findModel($id);

        return $this->render('addTodos', [
            'project' => $project,
        ]);
    }
    
    public function actionAddProjectDescription() {
        
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
