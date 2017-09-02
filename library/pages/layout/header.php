<?php
class Header {
    protected $meta = [];
    protected $charset = 'UTF-8';
    protected $title = 'Company';
    protected $description = 'Company page description';
    protected $css = [];
    protected $jsFiles = [];

    public function __construct() {
        // dont do shit
    }

    public function render($callback=null) {}

    /**
     * @return array
     */
    public function getMeta() {
        return $this->meta;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getCss() {
        return $this->css;
    }

    /**
     * @return array
     */
    public function getJsFiles() {
        return $this->jsFiles;
    }

    /**
     * @param string $title
     * @return Header
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $description
     * @return Header
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function addMeta($name, $content) {
        $this->meta[] = ['name' => $name, 'content' => $content];
    }

    public function addCss($fileName) {
        $this->css[] = $fileName;
    }

    public function addJsFiles($fileName) {
        $this->jsFiles[] = $fileName;
    }

    /**
     * @return string
     */
    public function getCharset() {
        return $this->charset;
    }

    /**
     * @param $charSet
     * @return Header
     */
    public function setCharset($charSet) {
        $this->charset = $charSet;
        return $this;
    }

    public function renderCharset() {
        echo '<meta charset="'.$this->charset.'">';
    }

    public function renderMeta() {
        foreach($this->meta as $m) {
            echo "<meta name=\"{$m['name']}\" content=\"{$m['content']}\">";
        }
    }

    public function renderCss() {
        foreach($this->css as $c) {
            echo '<link rel="stylesheet" type="text/css" href="' . $c . '">';
        }
    }

    public function renderJsFiles() {
        foreach($this->jsFiles as $j) {
            echo '<script type="text/javascript" src="' . $j . '"></script>';
        }
    }
}
