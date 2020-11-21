<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Create Skill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			[
				'label' => 'Slug',
				'value' => function ($model) {
					return Html::a($model->slug, [
						$model->id
					]);
				},
				'format' => 'raw',
			],
			[
				'label' => 'Buttons',
				'value' => function ($model) {
					return Html::a('delete', [
						'delete' . DIRECTORY_SEPARATOR .
						$model->id
					], ['class' => 'btn btn-danger']);
				},
				'format' => 'raw',
			],
		],
	]); ?>


</div>
