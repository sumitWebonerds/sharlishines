<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property string $id
 * @property string $image
 * @property string $caption
 * @property integer $is_deleted
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;   

    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caption'], 'required'],
            [['is_deleted'], 'integer'],
            [['image', 'caption'], 'string', 'max' => 255],
            [['file'],'file']   
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'caption' => 'Caption',
            'is_deleted' => 'Status',
        ];
    }
}
