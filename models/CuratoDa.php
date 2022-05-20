<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curato_da".
 *
 * @property string $data
 * @property int $idLogopedista
 * @property int $idCaregiver
 * @property int $idBambino
 *
 * @property Bambini $idBambino0
 * @property Caregiver $idCaregiver0
 * @property Logopedisti $idLogopedista0
 */
class CuratoDa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curato_da';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'idLogopedista', 'idCaregiver', 'idBambino'], 'required'],
            [['data'], 'safe'],
            [['idLogopedista', 'idCaregiver', 'idBambino'], 'integer'],
            [['idLogopedista', 'idCaregiver', 'idBambino'], 'unique', 'targetAttribute' => ['idLogopedista', 'idCaregiver', 'idBambino']],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedisti::className(), 'targetAttribute' => ['idLogopedista' => 'idUtente']],
            [['idCaregiver'], 'exist', 'skipOnError' => true, 'targetClass' => Caregiver::className(), 'targetAttribute' => ['idCaregiver' => 'idUtente']],
            [['idBambino'], 'exist', 'skipOnError' => true, 'targetClass' => Bambini::className(), 'targetAttribute' => ['idBambino' => 'idUtente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'data' => 'Data',
            'idLogopedista' => 'Id Logopedista',
            'idCaregiver' => 'Id Caregiver',
            'idBambino' => 'Id Bambino',
        ];
    }

    /**
     * Gets query for [[IdBambino0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdBambino0()
    {
        return $this->hasOne(Bambini::className(), ['idUtente' => 'idBambino']);
    }

    /**
     * Gets query for [[IdCaregiver0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaregiver0()
    {
        return $this->hasOne(Caregiver::className(), ['idUtente' => 'idCaregiver']);
    }

    /**
     * Gets query for [[IdLogopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogopedista0()
    {
        return $this->hasOne(Logopedisti::className(), ['idUtente' => 'idLogopedista']);
    }
}
