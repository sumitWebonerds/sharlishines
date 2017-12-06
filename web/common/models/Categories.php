<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property string $id
 * @property string $name
 * @property string $image
 * @property integer $is_deleted
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file; 

    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'is_deleted'], 'required'],
            [['is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'image' => 'Image',
            'is_deleted' => 'Is Deleted',
        ];
    }
    

}
