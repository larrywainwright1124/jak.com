<?php
class Footer {
    protected $jsFiles = [];
    protected $jsVars = [];

    public function renderJsFiles() {
        foreach($this->jsFiles as $f) {
            ?>
            <script type="text/javascript" src="<?=$f;?>"></script>
            <?php
        }
    }

    public function renderJsVars() {
        foreach($this->jsVars as $v) {
            echo $v['name'] . ' = ' . ($v['quotes'] ? '"' : '') . $v['value'] . ($v['quotes'] ? '"' : '') . ";\n";
        }
    }

    /**
     * @return array
     */
    public function getJsFiles() {
        return $this->jsFiles;
    }

    /**
     * @return array
     */
    public function getJsVars() {
        return $this->jsVars;
    }

    /**
     * @param $fileName
     * @return Footer
     */
    public function addJsFile($fileName) {
        $this->jsFiles[] = $fileName;
        return $this;
    }

    /**
     * @param string $varName
     * @param string $value
     * @param bool $useQuotes
     */
    public function addJsVar($varName, $value, $useQuotes=false) {
        $this->jsVars[] = [
            'name' => $varName,
            'value' => $value,
            'quotes' => $useQuotes
        ];
    }
}
