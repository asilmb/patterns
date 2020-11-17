<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $slug
 * @property string $content
 * @property string $context_id
 */
class Page extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'page';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['slug', 'content', 'context_id'], 'required'],
			[['slug', 'content'], 'string'],
			[['context_id'], 'string'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'slug' => 'Slug',
			'content' => 'Content',
			'context_id' => 'Context ID',
		];
	}
}