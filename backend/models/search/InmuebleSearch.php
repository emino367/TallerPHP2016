<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Inmueble;

/**
 * InmuebleSearch represents the model behind the search form about `backend\models\Inmueble`.
 */
class InmuebleSearch extends Inmueble
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tipoInmueble', 'idCliente', 'cantDorm', 'cantBaños', 'supTotal', 'supEdificada', 'garage', 'patio'], 'integer'],
            [['nombre'], 'safe'],
            [['latitud', 'longitud'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Inmueble::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tipoInmueble' => $this->tipoInmueble,
            'idCliente' => $this->idCliente,
            'cantDorm' => $this->cantDorm,
            'cantBaños' => $this->cantBaños,
            'supTotal' => $this->supTotal,
            'supEdificada' => $this->supEdificada,
            'garage' => $this->garage,
            'patio' => $this->patio,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
