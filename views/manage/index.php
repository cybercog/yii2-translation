<?php

use yii\helpers\Html;
use yii\grid\GridView;
use krok\translation\models\I18nMessage;

/* @var $this yii\web\View */
/* @var $searchModel krok\translation\models\I18nSourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('translation', 'Translation');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-source-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'category',
                'message',
                [
                    'attribute' => 'translation',
                    'label' => (new I18nMessage())->attributeLabels()['translation'],
                    'value' => function ($model) {
                            return isset($model->i18nMessage->translation) ? $model->i18nMessage->translation : '';
                        },
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]
    ); ?>

</div>
