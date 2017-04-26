<?php

namespace app\models;

use Yii;
use common\models\GenericWeb;

/**
 * This is the model class for table "role_mapping".
 *
 * @property string $id
 * @property string $role_code
 * @property integer $menu_id
 * @property string $isDeleted
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 */
class RoleMapping extends GenericWeb {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'role_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['role_code', 'menu_id'], 'required'],
            [['menu_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['role_code'], 'string', 'max' => 50],
            [['isDeleted'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'role_code' => 'Role Code',
            'menu_id' => 'Menu ID',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
        ];
    }

    

}
