<?php
require_once ABSPATH.'/library/pages/layout/header.php';

class DefaultHeader extends Header {
    public function __construct() {
        parent::__construct();
        $this->addMeta('viewport', 'width=device-width, initial-scale=1.0');
    }

    public function render($callback=null) {
        ?>
        <title><?=$this->getTitle();?></title>
        <?php
        $this->renderCharset();
        $this->renderMeta();
        $this->renderCss();
        $this->renderJsFiles();
    }
}
