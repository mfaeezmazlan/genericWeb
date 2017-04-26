<script type="text/javascript">

//    try {
//
//        ace.settings.check('sidebar', 'collapsed')
//
//    } catch (e) {
//
//    }

    function setMenuOpen() {
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                // return c.substring(name.length,c.length);
            }
        }
        var idMenuToBeOpen = c.substr(c.indexOf("=") + 1);
        if (idMenuToBeOpen != "null") {
            var menuToBeOpen = document.getElementById(idMenuToBeOpen);

            switch (idMenuToBeOpen.substr(0, idMenuToBeOpen.indexOf("_"))) {
                case "child":
                    var getParentNode = menuToBeOpen.parentNode;
                    getParentNode.parentNode.className = "active open";
                    break;
            }
            menuToBeOpen.className = "active";
        }
    }

    function resetMenuCookie() {
        document.cookie = "menuToOpen=null";
    }

    function setMenuCookie(menu_id) {
        document.cookie = "menuToOpen=" + menu_id;
    }
</script>

<!-- ACE ADMIN -->
<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed');
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <?php
        $sql = "SELECT * FROM (SELECT t.* FROM menu t INNER JOIN role_mapping b ON b.menu_id=t.id INNER JOIN usr_access d ON d.role_code=b.role_code INNER JOIN user c ON c.id=d.user_id AND c.id='" . Yii::$app->session['user_id'] . "' AND t.module_ind='1' AND t.hide_ind = '0' AND t.isDeleted='0' UNION SELECT * FROM menu WHERE isDeleted='0' AND default_menu='1' AND hide_ind = '0' AND module_ind='1')aa ORDER BY sort";

        $connection = Yii::$app->db;

        $command = $connection->createCommand($sql);

        $modules = $command->query();

        $arr_menu = array();
        $counterMenuOpen = false;
        foreach ($modules as $module) {
            $sql = "SELECT * FROM menu WHERE menu_parent_id='" . $module['id'] . "' AND isDeleted='0'";

            $command = $connection->createCommand($sql);

            $sub_modules = $command->query();

            $arr_sub = array();

            if (count($sub_modules) > 0) {

                foreach ($sub_modules as $sub) {

                    array_push($arr_sub, array('url' => $sub['menu_loc'], 'own_id' => $sub['id'], 'id' => $sub['menu_parent_id'], 'label' => $sub['menu_txt'], 'icon_name' => $module['icon_name']));
                }
            }

            array_push($arr_menu, array('url' => $module['menu_loc'], 'id' => $module['id'], 'label' => $module['menu_txt'], 'sub_menu' => $arr_sub, 'icon_name' => $module['icon_name']));
        }

//            echo "<ul class='nav nav-list'>";

        foreach ($arr_menu as $menu) {

            if ($_SERVER['REQUEST_URI'] == "/jomweb/backend/web/index.php" || $_SERVER['REQUEST_URI'] == "/jomweb/backend/web/index.php?r=site/index" || $_SERVER['REQUEST_URI'] == "/jomweb/backend/web/index.php?r=site%2Findex" || $_SERVER['REQUEST_URI'] == "/" || fnmatch("/jomweb/backend/web/index.php?r=user/profile&*", $_SERVER['REQUEST_URI'])) {
                ?>
                <script>
                    resetMenuCookie();
                </script>
                <?php
            }



            $sub = $menu['sub_menu'];

            $ll = $menu['sub_menu'];

            $mm = $menu['sub_menu'];

            $setIdOpen = "";

            foreach ($ll as $l) {
                if (strtok($l['url'], '/') == (Yii::$app->controller->id)) {
                    $setIdOpen = $l['id'];
                }
            }

            foreach ($mm as $m) {

                if ($m['url'] == Yii::$app->controller->id . "/" . Yii::$app->controller->action->id || $m['own_id'] === Yii::$app->session['menuopen']) {

                    Yii::$app->session['menuopen'] = $m['own_id'];
                }
            }

            if (count($sub) > 0) {
                echo '<li class="" id="parent_' . $menu['id'] . '"><a href="#" class="dropdown-toggle"><i class="' . $menu['icon_name'] . '"></i><span class="menu-text">' . $menu['label'] . '</span><b class="arrow icon-angle-down"></b></a>';

                $sub = $menu['sub_menu'];

                echo '<ul class="submenu" role="menu">';

                foreach ($sub as $s) {
                    echo '<li class="" id="child_' . $s['own_id'] . '"><a href="index.php?r=' . $s['url'] . '" onclick="setMenuCookie(\'child_' . $s['own_id'] . '\')">' . $s['label'] . '</a></li>';
                }

                echo '</ul>';

                echo '</li>';
            } else {
                echo '<li class="" id="single_' . $menu['id'] . '" onclick="setMenuCookie(\'single_' . $menu['id'] . '\')"><a href="index.php?r=' . $menu['url'] . '"><i class="' . $menu['icon_name'] . '"></i><span class="menu-text">' . $menu['label'] . '</span></a><b class="arrow"></b></li>';
            }
        }

//            echo '</ul>';
        ?>
    </ul><!-- /.nav-list --> 
    <script>
        setMenuOpen();
    </script>
    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed');
        } catch (e) {
        }
    </script>
</div>