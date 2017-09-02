<?php
class Route {
    protected $url;
    protected $pageClass;
    protected $pageFile;
    protected $showInMenu = true;
    protected $menuText = '';
    protected $requiresLogin = false;
    protected $defaultPage = false;


    public function __construct($url, $pageClass, $pageFile, $showInMenu, $menuText, $requiresLogin,
            $defaultPage=false) {
        $this->url = $url;
        $this->pageClass = $pageClass;
        $this->pageFile = $pageFile;
        $this->showInMenu = $showInMenu;
        $this->menuText = $menuText;
        $this->requiresLogin = $requiresLogin;
        $this->defaultPage = $defaultPage;
    }

    public function isRouteMatch($uri) {
        $result = false;
        if($this->url == $uri) {
            $result = true;
        }
        return $result;
    }


    /**
     * @return mixed
     */
    public function getPageClass() {
        return $this->pageClass;
    }

    /**
     * @param mixed $pageClass
     * @return Route
     */
    public function setPageClass($pageClass) {
        $this->pageClass = $pageClass;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageFile() {
        return $this->pageFile;
    }

    /**
     * @param mixed $pageFile
     * @return Route
     */
    public function setPageFile($pageFile) {
        $this->pageFile = $pageFile;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isShowInMenu() {
        return $this->showInMenu;
    }

    /**
     * @param boolean $showInMenu
     * @return Route
     */
    public function setShowInMenu($showInMenu) {
        $this->showInMenu = $showInMenu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Route
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getMenuText() {
        return $this->menuText;
    }

    /**
     * @param string $menuText
     */
    public function setMenuText($menuText) {
        $this->menuText = $menuText;
    }

    /**
     * @return boolean
     */
    public function isRequiresLogin() {
        return $this->requiresLogin;
    }

    /**
     * @param boolean $requiresLogin
     */
    public function setRequiresLogin($requiresLogin) {
        $this->requiresLogin = $requiresLogin;
    }

    /**
     * @return boolean
     */
    public function isDefaultPage() {
        return $this->defaultPage;
    }

    /**
     * @param boolean $defaultPage
     */
    public function setDefaultPage($defaultPage) {
        $this->defaultPage = $defaultPage;
    }


}
