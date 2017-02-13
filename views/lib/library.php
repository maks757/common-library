<?php

/* @var $this yii\web\View */
use  maks757\library\LibraryComponent;

/* @var $library array */

$this->title = 'Библиотека';
$regular = '';
?>
<div class="row">
    <?php $index = 1; foreach ($library as $image_url): ?>
            <div class="col-sm-2" style="">
                <?php if(preg_match('/(gif)|(png)|(jpg)|(jpeg)|(svg)/', $image_url['type'])): ?>
                    <img src="<?= $image_url['url'] ?>" style="width: 100%" title="<?= $image_url['type'] ?>">
                <?php elseif(preg_match('/(mp4)|(webm)/', $image_url['type'])): ?>
                    <video style="width: 100%" controls title="<?= $image_url['type'] ?>">
                        <source src="<?= $image_url['url'] ?>" type="video/<?= $image_url['type'] ?>">
                        Your browser does not support the video tag.
                    </video>
                <?php elseif(preg_match('/(mp3)|(ogg)|(wav)/', $image_url['type'])): ?>
                    <audio controls style="width: 100%" title="<?= $image_url['type'] ?>">
                        <source src="<?= $image_url['url'] ?>" type="audio/<?= $image_url['type'] ?>">
                        Your browser does not support the audio element.
                    </audio>
                <?php elseif(preg_match('/(pdf)/', $image_url['type'])): ?>
                    <embed src="<?= $image_url['url'] ?>" style="width: 100%" type='application/pdf' title="<?= $image_url['type'] ?>">
                <?php endif; ?>
                    <div class="block" style="position: absolute; top: 10px; right: 10px;">
                        <a href="<?= \yii\helpers\Url::toRoute(['delete', 'file' => $image_url['url']])?>" class="glyphicon glyphicon-remove" title="Удалить" style="width: 100%"></a>
                        <a href="<?= \yii\helpers\Url::toRoute(['upload', 'file' => $image_url['url']])?>" class="glyphicon glyphicon-upload" title="Скачать" style="width: 100%"></a>
                    </div>
            </div>
            <?php if(($index % 6) == 0): ?>
                <div class="col-sm-12" style="">
                    <br><br>
                </div>
            <?php endif; ?>
            <?php $index++; ?>
    <?php endforeach; ?>
</div>