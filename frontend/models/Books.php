<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Books extends ActiveRecord
{
    public function getFullTitle($title) {
        return 'Книга ' . $title;
    }
}
