<?php
/**
 * Created by PhpStorm.
 * User: maks7
 * Date: 08.02.2017
 * Time: 16:49
 */

namespace  maks757\library\interfaces;


interface LibraryInterface
{
    /**
     * @param string $dir alias
     * @return boolean
     */
    public function addDir($dir);

    /**
     * @param string $dir alias
     * @return boolean
     */
    public function removeDir($dir);

    /**
     * @return boolean
     */
    public function removeAllDir();

    /**
     * @param string $file_path alias path to file
     * @return boolean
     */
    public function removeFileOne($file_path);

    /**
     * @return array
     */
    public function getFiles();

    /**
     *
     * @param string $file_path path to file
     * @return void
     */
    public function uploadFile($file_path);
}