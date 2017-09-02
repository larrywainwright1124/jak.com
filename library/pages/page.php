<?php
require_once ABSPATH.'/library/pages/layout/layout.php';


abstract class Page {
    /** @var  Layout */
    protected $layout = null;

    public function __construct() {
        if($this->layout == null) {
            $this->layout = new Layout([$this, 'layoutCallback']);
        }
    }

    abstract public function render();
    abstract public function layoutCallback($what);
    abstract protected function renderPageContent();
}
