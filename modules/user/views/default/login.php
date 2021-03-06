<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\models\LoginForm */

$this->title = Yii::t('app', 'TITLE_LOGIN');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //Please fill out the following fields to login:
        echo Yii::t('app', 'LOGIN_MESSAGE'); ?></p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-forms',
        'options' => ['class' => 'forms-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->checkbox() ?>

    <div class="form-group" style="color: #999;">
        <div class="col-lg-offset-1 col-lg-11">
            <?php //If you forgot your password you can
            echo Yii::t('app', 'LOGIN_FOR_PASSWORD');?>
            <?= Html::a('сбросить его', ['/user/default/request-password-reset']) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(Yii::t('app', 'BUTTON_LOGIN'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
