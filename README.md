# yii2-copy-to-clipboard-widget
Simple widget that display text with 'copy to clipboard' button. 

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require wiperawa/yii2-copy-to-clipboard-widget "dev-master"
```

or add

```
"wiperawa/yii2-copy-to-clipboard-widget": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
<?= \wiperawa\copytoclipboard\CopyToClipboardWidget::widget([
    'content' => 'Some text to be copied to clipboard',
    //'containerOptions' => ['class' => 'd-flex'], // optional
    //'copyBtnOptions' => [], //optional
    //'copyBtnIcon' => '<span class="fa fa-clipboard-list"></span>'
    //'copiedIcon' => '<span class="fa fa-check-double"></span>',

]) ?>
```