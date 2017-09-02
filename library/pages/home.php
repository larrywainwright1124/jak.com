<?php
require_once ABSPATH.'/library/pages/page.php';
require_once ABSPATH.'/library/pages/layout/default-header.php';
require_once ABSPATH.'/library/pages/layout/footer.php';


class Home extends Page {
    protected $header = null;
    protected $footer = null;

    public function __construct() {
        $this->header = new DefaultHeader();
        $this->header->setTitle("Company :: Home Page");
        $this->header->addCss("/assets/css/bootstrap/bootstrap.min.css");
        $this->header->addCss("/assets/css/styles.css");

        $this->footer = new Footer();
        $this->footer->addJsFile("/assets/js/jquery-3.2.1.min.js");
        $this->footer->addJsFile("/assets/js/bootstrap.min.js");

        $this->layout = new Layout([$this, 'layoutCallback'], $this->header, $this->footer);

        parent::__construct();
    }
    public function render() {
        $this->layout->render();
    }

    public function layoutCallback($what) {
        switch($what) {
            case 'h1':
                echo 'Home';
                break;

            case 'content':
                $this->renderPageContent();
                break;

            default:
                break;
                //echo 'what: '.$what.'<br />';
        }
    }

    protected function renderPageContent() {
        ?>
        home page
        <?php
    }
}
