<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\GlobalTest;

/**
 * GlobalTestSearch represents the model behind the search form of `common\models\GlobalTest`.
 */
class GlobalTestSearch extends GlobalTest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'UUTPLACE', 'INDEXRANGE'], 'integer'],
            [['FACILITY', 'STATIONID', 'UUTNAME', 'PARTNUMBER', 'SERIALNUMBER', 'TECHNAME', 'TESTDATE', 'TIMESTART', 'TIMESTOP', 'TESTMODE', 'GLOBALRESULT', 'VERSIONS'], 'safe'],
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
        $query = GlobalTest::find();

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
            'TESTDATE' => $this->TESTDATE,
            'TIMESTART' => $this->TIMESTART,
            'TIMESTOP' => $this->TIMESTOP,
            'UUTPLACE' => $this->UUTPLACE,
            'INDEXRANGE' => $this->INDEXRANGE,
        ]);

        $query->andFilterWhere(['=', 'FACILITY', $this->FACILITY])
            ->andFilterWhere(['=', 'STATIONID', $this->STATIONID])
            ->andFilterWhere(['=', 'UUTNAME', $this->UUTNAME])
            ->andFilterWhere(['=', 'PARTNUMBER', $this->PARTNUMBER])
            ->andFilterWhere(['like', 'SERIALNUMBER', $this->SERIALNUMBER])
            ->andFilterWhere(['like', 'TECHNAME', $this->TECHNAME])
            ->andFilterWhere(['like', 'TESTMODE', $this->TESTMODE])
            ->andFilterWhere(['like', 'GLOBALRESULT', $this->GLOBALRESULT])
            ->andFilterWhere(['like', 'VERSIONS', $this->VERSIONS]);

        return $dataProvider;
    }
}
