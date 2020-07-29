<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * PostForm is the model behind the create post form.
 * @property string $title
 * @property string $description
 */
class PostForm extends Model
{
    public $title;
    public $description;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function save()
    {

        if ($this->validate()) {

            $time = time();

            $post = new Post();
            $post->user_id = Yii::$app->user->identity->getId();
            $post->title = $this->title;
            $post->description = $this->description;
            $post->created_at = $time;
            $post->updated_at = $time;
            if ($post->save()) {
                return $post;
            };
        }

        return null;
    }
}
