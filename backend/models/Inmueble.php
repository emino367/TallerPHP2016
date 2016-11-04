<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Inmueble".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $tipoInmueble
 * @property integer $idCliente
 * @property integer $cantDorm
 * @property integer $cantBanos
 * @property integer $supTotal
 * @property integer $supEdificada
 * @property integer $garage
 * @property integer $patio
 * @property double $latitud
 * @property double $longitud
 */
class Inmueble extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Inmueble';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre', 'tipoInmueble', 'idCliente'], 'required'],
            [['id', 'tipoInmueble', 'idCliente', 'cantDorm', 'cantBanos', 'supTotal', 'supEdificada', 'garage', 'patio'], 'integer'],
            [['latitud', 'longitud'], 'number'],
            [['nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'tipoInmueble' => 'Tipo Inmueble',
            'idCliente' => 'Id Cliente',
            'cantDorm' => 'Cant Dorm',
            'cantBanos' => 'Cant Banos',
            'supTotal' => 'Sup Total',
            'supEdificada' => 'Sup Edificada',
            'garage' => 'Garage',
            'patio' => 'Patio',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
        ];
    }
}
