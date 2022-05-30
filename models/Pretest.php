<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pretest".
 *
 * @property int $idPretest
 * @property string $domanda1
 * @property string $domanda2
 * @property string $domanda3
 * @property string $telefono
 * @property int $idLogopedista
 * @property int $stato
 *
 * @property Logopedisti $idLogopedista0
 */
class Pretest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pretest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['domanda1', 'domanda2', 'domanda3', 'telefono', 'idLogopedista', 'stato'], 'required'],
            [['domanda1', 'domanda2', 'domanda3', 'telefono'], 'string'],
            [['idLogopedista', 'stato'], 'integer'],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedisti::className(), 'targetAttribute' => ['idLogopedista' => 'idUtente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPretest' => 'Id Pretest',
            'domanda1' => 'Durante la gravidanza ci sono state complicanze?',
            'domanda2' => 'Quando il bambino parla ha difficolta a pronunciare la s?',
            'domanda3' => 'Il bambino è nato prematuro?',
            'telefono' => 'Numero di telefono',
            'idLogopedista' => 'Scegli un logopedista',
            'stato' => 'Stato',
        ];
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
