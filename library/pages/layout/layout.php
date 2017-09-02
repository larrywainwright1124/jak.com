<?php
require_once ABSPATH.'/library/pages/layout/header.php';
require_once ABSPATH.'/library/pages/layout/footer.php';
require_once ABSPATH.'/library/components/menus/sidebar-menu.php';


class Layout {
    protected $pageCallback = null;
    protected $header = null;
    protected $footer = null;

    /**
     * Layout constructor.
     * @param null|Callback $pageCallback
     * @param null|Header $header
     * @param null|Footer $footer
     */
    public function __construct($pageCallback = null, $header = null, $footer = null) {
        $this->pageCallback = $pageCallback;
        if($header == null) {
            $this->header = new Header();
        }
        else {
            $this->header = $header;
        }
        if($footer == null) {
            $this->footer = new Footer();
        }
        else {
            $this->footer = $footer;
        }
    }

    public function render() {
        ?>
        <!DOCTYPE html>
        <html lang="en-US">
        <head>
            <?php $this->header->render($this->pageCallback);?>
        </head>
        <body>
            <div class="container">
                <div class="row page-heading">
                    <div class="col">
                        <div class="page-heading-content">
                            Page Heading Content--u know, like pics or some crap
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-4">&nbsp;</div>
                    <div class="col-lg-9 col-sm-8">
                        <h1>
                            <?php call_user_func_array($this->pageCallback, ['h1']);?>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-4">
                        <div class="sidebar-frame">
                            <?php
                            $sbm = new SidebarMenu();
                            $sbm->renderMenu();
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-8">
                        <div class="page-content-frame">
                            <?php call_user_func_array($this->pageCallback, ['content']);?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->footer->renderJsFiles();?>
            <script type="text/javascript">
                <?php $this->footer->renderJsVars();?>
            </script>
        </body>
        </html>
        <?php
    }
}
