<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\PostForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @param $action
     * @return bool|\yii\web\Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $postList = Post::find()
            ->where(['status' => 1])
            ->all();

        return $this->render('index', [
            'postList' => $postList,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new PostForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return array
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax && ($model = Post::findOne($id)) !== null) {
            return [
                "data" => $model,
                "error" => null
            ];
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
