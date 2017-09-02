<?php
require_once ABSPATH.'/library/routing/route.php';

class PageRouter {
    /** @var array of Route */
    protected $routeList = [];
    /** @var null|Route */
    protected $selectedRoute = null;

    /**
     * Cleans up a uri to be used in Route->isRouteMatch() messages.
     *
     * @param $uri - url
     * @return string cleaned up uri
     */
    public static function cleanUri($uri) {
        $uri = trim($uri, "/ \t\n\t\0\x0B");
        return $uri;
    }

    /**
     * Adds a mapped route (page) to tracked routes.
     *
     * @param string $url url to match against
     * @param string $pageClass Name of the page class
     * @param string $pageFile Path to the file containing the $pageClass
     * @param bool $showInMenu Should this url show up in menuing?
     * @param string $menuText Text to show for this url in a menu.
     * @param bool $defaultPage Indicates that this page will be used as the default in the event
     *              a page load is attempted on a page that requiresLogin
     * @return PageRouter $this
     */
    public function addRoute($url, $pageClass, $pageFile, $showInMenu, $menuText, $requiresLogin,
            $defaultPage=false) {
        $this->routeList[] = new Route($url, $pageClass, $pageFile, $showInMenu, $menuText, $requiresLogin,
            $defaultPage);
        return $this;
    }

    public function route($uri) {
        $uri = PageRouter::cleanUri($uri);

        $result = null;

        /** @var Route $rt */
        foreach($this->routeList as $rt) {
            if($rt->isRouteMatch($uri)) {
                $result = $rt;
                $this->selectedRoute = $rt;
                break;
            }
        }

        if($rt->isRequiresLogin() && (!isset($_SESSION['user_id']) || intval($_SESSION['user_id']) < 1)) {
            $result = $this->navToDefault();
        }
        return $result;
    }

    public function navToDefault() {
        $result = null;
        /** @var Route $rt */
        foreach($this->routeList as $rt) {
            if($rt->isDefaultPage()) {
                $this->selectedRoute = $rt;
                $result = $rt;
            }
        }
        return $result;
    }

    /**
     * @param null|Route $target
     */
    public function loadPage($target = null) {
        $fileName = null;
        $clsName = null;
        $clsObj = null;
        if($target == null && $this->selectedRoute != null) {
            $fileName = $this->selectedRoute->getPageFile();
            $clsName = $this->selectedRoute->getPageClass();
        }
        elseif($target != null) {
            $fileName = $target->getPageFile();
            $clsName = $target->getPageClass();
        }

        if($fileName != null && $clsName != null) {
            require_once ABSPATH."/library/pages/{$fileName}.php";
            /** @var Page $clsObj */
            $clsObj = new $clsName();
            $clsObj->render();
        }
    }

    public function getAllRoutes() {
        return $this->routeList;
    }
}
