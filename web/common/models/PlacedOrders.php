<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "placedorders".
 *
 * @property string $id
 * @property string $invoice
 * @property string $product_id
 * @property string $user_id
 * @property integer $quantity
 * @property double $bill
 * @property string $date
 * @property string $updated_by
 * @property string $created_by
 * @property string $updated_at
 * @property string $created_at
 * @property integer $is_deleted
 */
class PlacedOrders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'placedorders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice', 'product_id', 'user_id', 'quantity', 'bill', 'date', 'updated_by', 'created_by', 'created_at', 'is_deleted'], 'required'],
            [['product_id', 'user_id', 'quantity', 'updated_by', 'created_by', 'is_deleted'], 'integer'],
            [['bill'], 'number'],
            [['date', 'updated_at', 'created_at'], 'safe'],
            [['invoice'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice' => 'Invoice',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
            'quantity' => 'Quantity',
            'bill' => 'Bill',
            'date' => 'Date',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
