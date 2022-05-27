<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\models\Utenti;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$log = new Utenti();


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'Homepage',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->email . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
                ),

            // Logopedista --------------------------------------------------------------------------------------
            Yii::$app->user->isGuest ? (
                ['label' => 'Registrati', 'url' => ['/utenti/create']]
            ) : (
                    $log->isLogopedista(Yii::$app->user->identity->tipoUtente) ? (
                        ['label' => 'Completa la registrazione', 'url' => ['/logopedisti/create']]
                    ) : (
                        '<li>'
                        .'</li>'
                    )
            ),

            Yii::$app->user->isGuest ? (
                '<li>'
                .'</li>'
            ) : (
                $log->isLogopedistaConf(Yii::$app->user->identity->tipoUtente) ? (
                    ['label' => 'Il tuo profilo', 'url' => ['/logopedisti/view', 'idUtente'=> Yii::$app->user->id]]
                ) : (
                    '<li>'
                    .'</li>'
                )
            ),

            Yii::$app->user->isGuest ? (
                '<li>'
                .'</li>'
            ) : (
            $log->isLogopedistaConf(Yii::$app->user->identity->tipoUtente) ? (
                ['label' => 'Lista bambini', 'url' => ['/logopedisti/listabambini']]
            ) : (
                '<li>'
                .'</li>'
            )
            ),

            Yii::$app->user->isGuest ? (
                '<li>'
                .'</li>'
            ) : (
            $log->isLogopedistaConf(Yii::$app->user->identity->tipoUtente) ? (
            ['label' => 'Lista batterie', 'url' => ['/batterie/batteriedellog', 'idLogopedista'=> Yii::$app->user->id]]
            ) : (
                '<li>'
                .'</li>'
            )
            ),

            // Bambino --------------------------------------------------------------------------------------
            Yii::$app->user->isGuest ? (
                '<li>'
                .'</li>'
            ) : (
                $log->isBambino(Yii::$app->user->identity->tipoUtente) ? (
                    ['label' => 'Completa la tua registrazione', 'url' => ['/bambini/create']]
                ) : (
                    '<li>'
                    .'</li>'
                )
            ),

            Yii::$app->user->isGuest ? (
                '<li>'
                .'</li>'
            ) : (
                $log->isBambinoConf(Yii::$app->user->identity->tipoUtente) ? (
                    ['label' => 'Il tuo profilo', 'url' => ['/bambini/view', 'idUtente'=> Yii::$app->user->id]]
                ) : (
                    '<li>'
                    .'</li>'
                )
            ),

            Yii::$app->user->isGuest ? (
                '<li>'
                .'</li>'
            ) : (
            $log->isBambinoConf(Yii::$app->user->identity->tipoUtente) ? (
            ['label' => 'Lista terapie', 'url' => ['/bambini/terapiepersonali']]
            ) : (
                '<li>'
                .'</li>'
            )
            ),

            // Caregiver --------------------------------------------------------------------------------------
            Yii::$app->user->isGuest ? (
                '<li>'
                .'</li>'
            ) : (
            $log->isCaregiver(Yii::$app->user->identity->tipoUtente) ? (
            ['label' => 'Completa la tua registrazione', 'url' => ['/caregiver/create']]
            ) : (
                '<li>'
                .'</li>'
            )
            ),

            Yii::$app->user->isGuest ? (
                '<li>'
                .'</li>'
            ) : (
            $log->isCaregiverConf(Yii::$app->user->identity->tipoUtente) ? (
            ['label' => 'Il tuo profilo', 'url' => ['/caregiver/view', 'idUtente'=> Yii::$app->user->id]]
            ) : (
                '<li>'
                .'</li>'
            )
            ),

        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Call Of Code <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
