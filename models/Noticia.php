<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticias".
 *
 * @property int $id
 * @property string $titulo
 * @property string $cabeca
 * @property string $corpo
 * @property int $status
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'titulo', 'cabeca', 'corpo', 'status'], 'required'],
            [['id', 'status'], 'integer'],
            [['cabeca', 'corpo'], 'string'],
            [['titulo'], 'string', 'max' => 60],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'cabeca' => 'Cabeca',
            'corpo' => 'Corpo',
            'status' => 'Status',
        ];
    }
}
