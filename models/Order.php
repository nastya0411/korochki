<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property int $name_id
 * @property int $status_id
 * @property string $appointment_date
 * @property string $appointment_time
 * @property string|null $created_at
 * @property int $pay_type_id
 *
 * @property Name $name
 * @property Status $status
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name_id', 'status_id', 'appointment_date', 'appointment_time', 'pay_type_id'], 'required'],
            [['user_id', 'name_id', 'status_id', 'pay_type_id'], 'integer'],
            [['appointment_date', 'appointment_time', 'created_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Name::class, 'targetAttribute' => ['name_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер заявки',
            'user_id' => 'Клиент',
            'name_id' => 'Название курса',
            'status_id' => 'Статус',
            'appointment_date' => 'Дата начала обучения',
            'appointment_time' => 'Время начала обучения',
            'created_at' => 'Дата и время создания заявки',
            'pay_type_id' => 'Способ оплаты',
        ];
    }

    /**
     * Gets query for [[Name]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getName()
    {
        return $this->hasOne(Name::class, ['id' => 'name_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
