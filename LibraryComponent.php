<?php
/**
 * Created by PhpStorm.
 * User: maks7
 * Date: 08.02.2017
 * Time: 16:41
 */

namespace  maks757\library;


use  maks757\library\components\LibraryHelper;
use yii\base\Component;

class LibraryComponent extends Component
{
    /**
     *  This param array
     *  'dirs' => [
     *      '@frontend/web/inages',
     *      '@frontend/web/pdf'
     *      '@frontend/web/video'
     *  ]
     */
    public $dirs = [];

    public $defaultAlias = '@frontend/web';

    public $file_type = ['.gif', '.png', '.jpg', '.jpeg', '.svg', '.pdf', '.mp4', '.webm', '.mp3', '.ogg', '.wav'];

    public function behaviors()
    {
        return [
            'lib' => LibraryHelper::className()
        ];
    }
}