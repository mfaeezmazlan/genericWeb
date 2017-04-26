<?php

namespace app\models;

use common\models\GenericWeb;
use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property string $id
 * @property string $menu_txt
 * @property string $menu_loc
 * @property integer $menu_parent_id
 * @property integer $module_ind
 * @property integer $default_menu
 * @property string $target_win
 * @property integer $hide_ind
 * @property string $icon_name
 * @property string $sort
 * @property string $isDeleted
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 */
class Menu extends GenericWeb {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['menu_txt'], 'required'],
            [['menu_parent_id', 'module_ind', 'default_menu', 'hide_ind', 'sort', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['menu_txt', 'menu_loc', 'target_win', 'icon_name'], 'string', 'max' => 50],
            [['isDeleted'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'menu_txt' => 'Menu Txt',
            'menu_loc' => 'Menu Loc',
            'menu_parent_id' => 'Menu Parent ID',
            'module_ind' => 'Module Ind',
            'default_menu' => 'Default Menu',
            'target_win' => 'Target Win',
            'hide_ind' => 'Hide Ind',
            'icon_name' => 'Icon Name',
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

    public static function getMenuDescr($menuId) {
        $menu = Menu::findOne($menuId);
        if (count($menu) != 0)
            return $menu->menu_txt;
        else
            return "<i>(Is Parent)</i>";
    }

    public static function getMenuList($param1 = '', $choose = true) {
        $arr2 = array();

        if ($choose) {
            // $arr2['0'] = '--Sila Pilih--';
        }

        if (empty($param1)) {
            //$arr  = self::find()->where("cat = '$kat'")->orderBy('sort,descr')->all();
            $arr = Menu::findAll("");
        } else if ($param1 == "module") {
            //$arr  = self::find()->where("cat = '$kat' AND param1 = '$param1'")->orderBy('sort,descr')->all();
            $arr = Menu::findAll(["module_ind" => "1"]);
            // $arr = self::find()->where("module_ind='1'")->orderBy('menu_txt')->all();
        }

        foreach ($arr as $param) {
            $arr2[$param->id] = $param->menu_txt;
        }
        return $arr2;
    }

}
