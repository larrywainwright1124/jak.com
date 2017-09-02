<?php
function printit($value) {
    echo '<div style="width:100%;"><pre>';
    if(is_object($value) || is_array($value)) {
        print_r($value);
    }
    else {
        echo $value;
    }
    echo '</pre></div>';
}
