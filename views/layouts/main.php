<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('main','Home'), 'url' => ['/site/index']],
            //['label' => Yii::t('main','Fuels'), 'url' => ['/fuels/index']],
            [
                'label' => Yii::t('main','Catalogues'),
                'items' => [
                    ['label' => Yii::t('main','Fuels'), 'url' => '/fuels/index'],
                    //'<li class="divider"></li>',
                    //'<li class="dropdown-header">Dropdown Header</li>',
                    ['label' => Yii::t('main','Boilers'), 'url' => '/boilers/index'],
                    ['label' => Yii::t('main','Fuel Types'), 'url' => '/fuel-types/index'],
                    ['label' => Yii::t('main','Burning Types'), 'url' => '/burning-types/index'],

                    ['label' => Yii::t('main','Fuel2 Boilers'), 'url' => '/fuel2-boiler/index'],
                    ['label' => Yii::t('main','Fuel2 Burnigs'), 'url' => '/fuel2-burnig/index'],

                    ['label' => Yii::t('main','Catalysts'), 'url' => '/catalysts/index'],
                ],
            ],
            ['label' => Yii::t('main','Calculator'), 'url' => ['/calc/index']],
            ['label' => Yii::t('main','Help'), 'url' => ['/site/help']],
            //['label' => Yii::t('main','About'), 'url' => ['/site/about']],
            //['label' => Yii::t('main','Contact'), 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest ? (
//                ['label' => Yii::t('main','Login'), 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            ),
            \lajax\languagepicker\widgets\LanguagePicker::widget([
                'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
                'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
            ])
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
