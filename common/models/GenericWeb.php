<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

abstract class GenericWeb extends ActiveRecord {

    private static $system_id = 0;

    public function beforeSave() {
//        parent::beforeSave($insert);
        if ($this->isNewRecord) {
            $this->updated_at = $this->created_at = date('Y-m-d H:i:s');

            if (!defined('STDIN')) {
                if (Yii::$app->user->isGuest) {
                    $this->updated_by = $this->created_by = GenericWeb::$system_id;
                } else {
                    $this->updated_by = $this->created_by = Yii::$app->user->identity->id;
                }
            } else {
                $this->updated_by = $this->created_by = GenericWeb::$system_id;
            }
        } else {
            if ($this->isDeleted == "1") {
                $this->deleted_at = date('Y-m-d H:i:s');

                if (!defined('STDIN')) {
                    if (Yii::$app->user->isGuest) {
                        $this->deleted_by = GenericWeb::$system_id;
                    } else {
                        $this->deleted_by = Yii::$app->user->identity->id;
                    }
                } else {
                    $this->deleted_by = GenericWeb::$system_id;
                }
            } else {
                $this->updated_at = date('Y-m-d H:i:s');
                if (!defined('STDIN')) {
                    if (Yii::$app->user->isGuest) {
                        $this->updated_by = GenericWeb::$system_id;
                    } else {
                        $this->updated_by = Yii::$app->user->identity->id;
                    }
                } else {
                    $this->updated_by = GenericWeb::$system_id;
                }
            }
        }
        return TRUE;
    }

}
