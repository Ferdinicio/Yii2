<?php

namespace app\modules\financeiro;

use yii;
use yii\base\Module;


class FinanceiroModule extends Module
{
    public $layout = 'main';
    public function init()
    {
        parent::init();
        Yii::configure($this, require(__DIR__ . '/config/main.php'));

    }


}