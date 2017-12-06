<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $image
 * @property string $package
 * @property string $description
 * @property string $benefits
 * @property string $suggested_use
 * @property string $updated_by
 * @property string $created_by
 * @property string $updated_at
 * @property string $created_at
 * @property integer $is_deleted
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file; 

    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'package', 'description', 'benefits', 'suggested_use', 'is_deleted','unit_price'], 'required'],
            [['category_id', 'updated_by', 'created_by', 'is_deleted'], 'integer'],
            [['description', 'benefits', 'suggested_use'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['name', 'package'], 'string', 'max' => 255],
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
            // 'id' => 'ID',
            'category_id' => 'Category',
            'name' => 'Name',
            'image' => 'Image',
            'package' => 'Package',
            'description' => 'Description',
            'benefits' => 'Benefits',
            'suggested_use' => 'Suggested Use',
            'unit_price' => 'Unit Price',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }    
}
