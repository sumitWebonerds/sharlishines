<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "security_tokens".
 *
 * @property string $id
 * @property string $token
 * @property integer $status
 */
class SecurityTokens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'security_tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token', 'status'], 'required'],
            [['status'], 'integer'],
            [['token'], 'string', 'max' => 32],
            [['token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'status' => 'Status',
        ];
    }
}
