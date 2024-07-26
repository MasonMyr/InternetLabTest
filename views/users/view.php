<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$form = ActiveForm::begin([
    'id'                          =>    'about-form',
    'method'                      =>    'post',
]);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'name',
            'value' => $form->field($model, 'name'),
            'format' => 'raw',
        ],
        [
            'label' => 'email',
            'value' => $form->field($model, 'email'),
            'format' => 'raw',
        ],
        'password',
        'role',
        'id',
    ],
]);
?>

</div>
