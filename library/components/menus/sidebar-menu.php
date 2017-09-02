<?php
require_once ABSPATH.'/library/routing/route.php';
require_once ABSPATH.'/library/routing/page-router.php';

class SidebarMenu {
    /** @var array of Route */
    protected $routeList = [];

    public function __construct() {
        global $router;
        $this->routeList = $router->getAllRoutes();

    }

    public function renderMenu() {
        /** @var Route $rt */
        ?>
        <ul class="sidebar-menu">
        <?php
        foreach($this->routeList as $rt) {
            if($rt->isShowInMenu()) {
                ?>
                <li>
                    <a href="/<?=$rt->getUrl();?>"><?= $rt->getMenuText();?></a>
                </li>
                <?php
            }
        }
        ?>
        </ul>
        <?php
    }
}
