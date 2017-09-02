<?php
require_once ABSPATH.'/library/pages/page.php';
require_once ABSPATH.'/library/pages/layout/default-header.php';
require_once ABSPATH.'/library/pages/layout/footer.php';
require_once ABSPATH.'/library/pages/layout/login-layout.php';


class Login extends Page {
    protected $header = null;
    protected $footer = null;

    public function __construct() {
        $this->header = new DefaultHeader();
        $this->header->setTitle("Company :: Login");
        $this->header->addCss("/assets/css/bootstrap/bootstrap.min.css");
        $this->header->addCss("/assets/css/styles.css");

        $this->footer = new Footer();
        $this->footer->addJsFile("/assets/js/jquery-3.2.1.min.js");
        $this->footer->addJsFile("/assets/js/bootstrap.min.js");

        $this->layout = new LoginLayout([$this, 'layoutCallback'], $this->header, $this->footer);

        parent::__construct();
    }

    public function render() {
        $this->layout->render();
    }

    public function layoutCallback($what) {
        switch($what) {
            case 'h1':
                echo 'Login';
                break;

            case 'content':
                $this->renderPageContent();
                break;

            default:
//                echo 'what: '.$what.'<br />';
                break;
        }
    }

    protected function renderPageContent() {
        ?>
        <form method="post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php
                        if(isset($_POST['btn_login'])
                                && (isset($_SESSION['user_id']) && intval($_SESSION['user_id']) > 0)) {
                            // things are ok, user logged in, we should not actually ever get to this code block.
                            echo 'wtf??';
                        }
                        elseif(isset($_POST['btn_login'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Invalid user name or password
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-4">
                        <label for="user-name">User Name:</label>
                    </div>
                    <div class="col-lg-5 col-sm-8">
                        <input type="text" name="user_name" id="user-name" value="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-4">
                        <label for="user-password">Password:</label>
                    </div>
                    <div class="col-lg-5 col-sm-8">
                        <input type="text" name="user_password" id="user-password" value="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-4">&nbsp;</div>
                    <div class="col-lg-5 col-sm-8">
                        <input type="submit" name="btn_login" id="btn-login" value="Login" />
                    </div>
                </div>
            </div>
        </form>
        <?php
    }
}
