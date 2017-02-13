# common-library
```
composer require maks757/common-library
```

### config frontend
```php
'components' => [
        'library' => [
            'class' => \common\modules\library\LibraryComponent::className(),
            //default alias @frontend/web + array items
            'dirs' => [
                '/images',
                '/textEditor',
                '/info',
                '/pdf',
                '/video',
                '/Musik',
            ],
            //search type files
            'file_type' => [
                '.gif', 
                '.png', 
                '.jpg', 
                '.jpeg', 
                '.svg', 
                '.pdf', 
                '.mp4', 
                '.webm', 
                '.mp3', 
                '.ogg', 
                '.wav'
            ]
        ],
        //...
]
```

### config backend
```php
'modules' => [
        'lib' => [
            'class' => \common\modules\library\LibraryModule::className()
        ],
        //...
],
```
