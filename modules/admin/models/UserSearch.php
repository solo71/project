<?php
namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
* UserSearch represents the model behind the search forms about `app\modules\admin\models\User`.
*/
class UserSearch extends Model
{
public $id;
public $username;
public $email;
public $status;
public $date_from;
public $date_to;

public function rules()
{
return [
[['id', 'status'], 'integer'],
[['username', 'email'], 'safe'],
[['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
];
}

public function attributeLabels()
{
return [
'id' => 'ID',
'created_at' => Yii::t('app', 'USER_CREATED'),
'updated_at' => Yii::t('app', 'USER_UPDATED'),
'username' => Yii::t('app', 'USER_USERNAME'),
'email' => Yii::t('app', 'USER_EMAIL'),
'status' => Yii::t('app', 'USER_STATUS'),
'date_from' => Yii::t('app', 'USER_DATE_FROM'),
'date_to' => Yii::t('app', 'USER_DATE_TO'),
];
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
$query = User::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
'sort' => [
'defaultOrder' => ['id' => SORT_DESC],
]
]);

$this->load($params);

if (!$this->validate()) {
$query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
'id' => $this->id,
'status' => $this->status,
]);

$query
->andFilterWhere(['like', 'username', $this->username])
->andFilterWhere(['like', 'email', $this->email])
->andFilterWhere(['>=', 'created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
->andFilterWhere(['<=', 'created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

return $dataProvider;
}
}