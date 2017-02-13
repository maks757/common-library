<?php
/**
 * Created by PhpStorm.
 * User: maks7
 * Date: 08.02.2017
 * Time: 17:16
 */

namespace maks757\library\components;


use maks757\library\interfaces\LibraryInterface;
use maks757\library\LibraryComponent;
use yii\base\Behavior;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

class LibraryHelper extends Behavior implements LibraryInterface
{
    /**
     * @param string $dir alias
     * @return boolean
     */
    public function addDir($dir)
    {
        // TODO: Implement addDir() method.
        $alias_path = FileHelper::normalizePath(\Yii::getAlias($dir));
        if(is_dir($alias_path)) {
            /** @var $library LibraryComponent */
            $library = \Yii::$app->library;
            $library->dirs = ArrayHelper::merge($library->dirs, [$dir]);
            return true;
        }
        return false;
    }

    /**
     * @param string $dir alias
     * @return boolean
     */
    public function removeDir($dir)
    {
        // TODO: Implement removeDir() method.
        /** @var $library LibraryComponent */
        $library = \Yii::$app->library;
        if(!empty($id = array_search($dir, $library->dirs))) {
            unset($library->dirs);
            return true;
        }
        return false;
    }

    /**
     * @return boolean
     */
    public function removeAllDir()
    {
        // TODO: Implement removeAll() method.
        /** @var $library LibraryComponent */
        $library = \Yii::$app->library;
        $library->dirs = [];
        return true;
    }

    /**
     * @param string $file_path alias path to file
     * @return boolean
     */
    public function removeFileOne($file_path)
    {
        /** @var $library LibraryComponent */
        $library = \Yii::$app->library;
        $alias_path = FileHelper::normalizePath(\Yii::getAlias($library->defaultAlias) .$file_path);
        if(file_exists($alias_path) && unlink($alias_path)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $file_path path to file
     * @return void
     */
    public function uploadFile($file_path)
    {
        /** @var $library LibraryComponent */
        $library = \Yii::$app->library;
        \Yii::$app->response->sendFile(\Yii::getAlias($library->defaultAlias . $file_path))->send();
    }

    /**
     * @return array list files
     */
    public function getFiles()
    {
        $array = [];
        /** @var $library LibraryComponent */
        $library = \Yii::$app->library;
        foreach ($library->dirs as $dir) {
            $this->recursionOutput($array, \Yii::getAlias($library->defaultAlias . $dir));
        }
        return $array;
    }

    private function recursionOutput(&$array, $dir) {
        $dirs = glob($dir.'/*', GLOB_ONLYDIR);
        foreach ($dirs as $dir){
            $dirs = glob($dir.'/*', GLOB_ONLYDIR);
            if(!empty($dirs)){
                foreach ($dirs as $dir_next) {
                    $this->recursionOutput($array, $dir_next);
                }
            }
            $this->addFiled($array, $dir);
        }
        $this->addFiled($array, $dir);
    }

    private function addFiled(&$array, $dir){
        /** @var $library LibraryComponent */
        $library = \Yii::$app->library;
        foreach($library->file_type as $ext){
            foreach(glob($dir.'/*'.$ext) as $image){
                $array[] = [
                    'url' => str_replace(\Yii::getAlias($library->defaultAlias), '', $image),
                    'type' => (new \SplFileInfo($image))->getExtension()
                ];
            }

        }
    }
}