<?php

/** @var yii\web\View $this */

use yii\web\JqueryAsset;

$this->title = 'Корочки, есть';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5">
        <h1 class="display-4 main-text"></h1>

        <p class="lead">Портал дополнительного профессионального образования</p>

    </div>

    <div class="body-content">

        <div class="row text-center">

            <div class="text-center mb-2">
                <h2>Наши приемущества:</h2>
            </div>
            <div class="col-lg-4 mb-3">
                <h3>Лучшие специалисты</h3>
                <div >
                    <img src="/web/img/2.jpg" class="img-style">
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <h3>Удобный формат</h3>
                <div>
                    <img src="/web/img/5.jpg" class="img-style">
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <h3>Бюджетная стоимость</h3>
                <div>
                    <img src="/web/img/4.jpeg" class="img-style">
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

    $this->registerJsFile("/js/animation.js", ["depends" => JqueryAsset::class]) 
?>
