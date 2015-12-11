<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Route;

/**
 * RouteSearch represents the model behind the search form about `app\models\Route`.
 */
class RouteSearch extends Route
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'days', 'start_time', 'end_time', 'status', 'author_id', 'create_at'], 'integer'],
            //[['title', 'img', 'departure', 'destination', 'about', 'check_list'], 'safe'],
			[['title', 'img', 'departure', 'destination', 'about'], 'safe'],
            [['miles'], 'number'],
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
        $query = Route::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//        //通过preg_split函数分别把2007,9,22存入$year,$month,$day,$hour,$minute,$second六个参数中
//        list($year,$month,$day,$hour,$minute)=preg_split('/[-: ]/',$this->start_time);
//        //根据年 月 日 时 分 秒输出时间戳
//        $start=mktime($hour,$minute,0,$month,$day,$year);
//        $this->start_time = $start;
//
//        list($year,$month,$day,$hour,$minute)=preg_split('/[-: ]/',$this->end_time);
//        $end=mktime($hour,$minute,0,$month,$day,$year);
//        $this->end_time = $end;

        $query->andFilterWhere([
            'id' => $this->id,
            'days' => $this->days,
            'miles' => $this->miles,
            //'start_time' => $this->start_time,
            //'end_time' => $this->end_time,
            'status' => $this->status,
            //'author_id' => $this->author_id,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'departure', $this->departure])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'about', $this->about]);
            //->andFilterWhere(['like', 'check_list', $this->check_list]);

        return $dataProvider;
    }
}
