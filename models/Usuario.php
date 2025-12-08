<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property int $edad
 * @property string $correo
 * @property string $contrasena
 * @property bool|null $estado
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Usuario extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado'], 'default', 'value' => 1],
            [['nombre', 'apellido', 'edad', 'correo', 'contrasena'], 'required'],
            [['edad'], 'default', 'value' => null],
            [['edad'], 'integer'],
            [['estado'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['correo'], 'string', 'max' => 150],
            [['contrasena'], 'string', 'max' => 255],
            [['correo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'edad' => 'Edad',
            'correo' => 'Correo',
            'contrasena' => 'Contraseña',
            'estado' => 'Estado',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isAttributeChanged('contrasena')) {
            $this->contrasena = hash('sha256', $this->contrasena);
        }

        return parent::beforeSave($insert);
    }
}
