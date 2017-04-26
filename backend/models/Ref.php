<?php

namespace app\models;

use Yii;
use common\models\GenericWeb;

/**
 * This is the model class for table "ref".
 *
 * @property string $id
 * @property string $cat
 * @property string $code
 * @property string $descr
 * @property string $param1
 * @property string $param2
 * @property string $sort
 * @property string $isDeleted
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 */
class Ref extends GenericWeb {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ref';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cat', 'code', 'descr'], 'required'],
            [['sort', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['cat', 'code'], 'string', 'max' => 30],
            [['descr', 'param1', 'param2'], 'string', 'max' => 50],
            [['isDeleted'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cat' => 'Cat',
            'code' => 'Code',
            'descr' => 'Descr',
            'param1' => 'Param1',
            'param2' => 'Param2',
            'sort' => 'Sort',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
        ];
    }

    public static function getList($kat, $param1 = '', $choose = true) {
        $arr2 = array();

        if ($choose) {
// $arr2['0'] = '--Sila Pilih--';
        }

        if (empty($param1)) {
//$arr  = self::find()->where("cat = '$kat'")->orderBy('sort,descr')->all();
            $arr = Ref::findAll(["cat" => $kat]);
        } else {
//$arr  = self::find()->where("cat = '$kat' AND param1 = '$param1'")->orderBy('sort,descr')->all();
            $arr = Ref::findAll(["cat" => $kat]);
        }

        foreach ($arr as $param) {
            $arr2[$param->code] = $param->descr;
        }
        return $arr2;
    }

    public static function getDesc($cat, $code, $field = '') {
//        $ref = self::find()->where("cat = '$cat' AND code = '$code'")->one();
        $ref = Ref::find()->where("cat='$cat' AND code='$code'")->one();
        if (!is_null($ref)) {
            if ($field)
                return $ref->$field;
            else
                return $ref->descr;
        } else {
            return '';
        }
    }

}
