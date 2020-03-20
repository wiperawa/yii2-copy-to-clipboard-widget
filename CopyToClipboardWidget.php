<?php

namespace wiperawa\copytoclipboard;

use yii\base\Widget;
use yii\helpers\Html;


class CopyToClipboardWidget extends Widget
{

    /**
     * @var array Widget Container Options
     */
    public $containerOptions = [
        'class' => 'd-inline-flex'
    ];

    /**
     * @var array Copy Btn Options
     */
    public $copyBtnOptions = [
        'class' => ['d-flex', 'align-items-center']
    ];

    /**
     * @var string Copy button icon
     */
    public $copyBtnIcon = '<span class="fa fa-clipboard-list"></span>';

    /**
     * @var string Copied icon name
     */
    public $copiedIcon = '<span class="fa fa-check-double"></span>';

    /**
     * @var string content to copy to clipboard
     */
    public $content;


    protected $contentId;
    protected $copyBtnId;
    protected $copiedIconId;

    /**
     * {@inheritDoc}
     */
    public function init()
    {

        $this->contentId = $this->getId() . '-content';
        $this->copyBtnId = $this->getId() . '-copy-btn';
        $this->copiedIconId = $this->getId() . '-copied';
    }

    /**
     * {@inheritDoc}
     */
    public function run()
    {
        echo Html::tag(
            'div',
            Html::tag('div', Html::encode($this->content), ['id' => $this->contentId]) .
            Html::a(
                $this->copyBtnIcon .
                Html::tag('span', $this->copiedIcon, ['id' => $this->copiedIconId, 'style' => ['display' => 'none']]),
                '#',
                array_merge(['id' => $this->copyBtnId], $this->copyBtnOptions)
            ),
            array_merge(['id' => $this->getId()], $this->containerOptions));

        $this->registerJs();
    }


    /**
     * Registering JS for widget
     */
    protected function registerJs()
    {
        $js = <<<JS
$(document).on('click','#{$this->copyBtnId}', (event) => {
    event.preventDefault();
    let temp = $("<input>");
    let text = $('#{$this->contentId}').text();
    let copied_icon = $('#{$this->copiedIconId}');
    $("body").append(temp);
    temp.val(text).select();
    if (document.execCommand("copy")) {
        copied_icon.show();
        setTimeout(() => copied_icon.hide(),1000);
    } else {
        console.log('Cant copy, use your mouse!');
    }
    temp.remove();
    return false;
})
JS;

        $this->getView()->registerJs($js);
    }
}