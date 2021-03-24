<?php

namespace app\search;

use app\models\Links;
use yii\data\ActiveDataProvider;

class LinksSearch extends Links
{

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {

        $query        = self::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        if ($this->id) {
            $query->andWhere(['id' => $this->id]);
        }
        if (strlen($this->redirect_limit)) {
            $query->andWhere(['redirect_limit' => $this->redirect_limit]);
        }
        if (strlen($this->count_redirect)) {
            $query->andWhere(['count_redirect' => $this->count_redirect]);
        }
        if ($this->token) {
            $query->andWhere(['like', 'token', $this->token]);
        }
        if ($this->url) {
            $query->andWhere(['like', 'url', $this->url]);
        }

        return $dataProvider;
    }
}