<?php
/**
 * Created by PhpStorm.
 * User: maks7
 * Date: 10.02.2017
 * Time: 16:32
 */

namespace  maks757\library\controllers;


use  maks757\library\components\LibraryHelper;
use Yii;
use yii\web\Controller;

class LibController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        /** @var $library LibraryHelper */
        $library = Yii::$app->library;

        return $this->render('library', [
            'library' => $library->getFiles()
        ]);
    }

    /**
     * @param $file
     * @return string
     */
    public function actionDelete($file)
    {
        /** @var $library LibraryHelper */
        $library = Yii::$app->library;
        $library->removeFileOne($file);
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @return string
     */
    public function actionUpload($file)
    {
        /** @var $library LibraryHelper */
        $library = Yii::$app->library;
        $library->uploadFile($file);
        return $this->redirect(Yii::$app->request->referrer);
    }
}