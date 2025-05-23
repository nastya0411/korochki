<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\web\JqueryAsset;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100 bg-info-subtle">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => 'Корочки, есть',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark bg-info fixed-top']
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],

                Yii::$app->user->isGuest
                    ? ['label' => 'Регистрация', 'url' => ['/site/register']]
                    : '',
                !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin
                    ? ['label' => 'Личный кабинет', 'url' => ['/account']]
                    : '',

                !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin
                    ? ['label' => 'Панель управления', 'url' => ['/admin']]
                    : '',

                Yii::$app->user->isGuest
                    ? ['label' => 'Войти', 'url' => ['/site/login']]
                    : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->login . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
            ]
        ]);
        NavBar::end();
        ?>
    </header>
    <?php Yii::debug($controllerId = Yii::$app->controller->id) ?>
    <?php Yii::debug($actionId = Yii::$app->controller->action->id) ?>




    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <div class="alert-block" style="display: none">
                <div id="typewriter"></div>
                <?= Alert::widget() ?>
            </div>
            <?= $content ?>
        </div>
    </main>

    <?php $this->registerJsFile("/js/animation.js", ["depends" => JqueryAsset::class]) ?>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>