<?php

class Script {

    static public $isProd = false;

    static public $js = "";

    static public $minify = true;

    static function begin() {
        if (!self::$isProd) {
            echo '<script type="text/javascript">';
        }
    }

    static function end() {
        if (!self::$isProd) {
            echo '</script>';
        }
    }

    static function dump() {
        $spath = './js/scripts.js';
        $vpath = './views/';

        file_put_contents($spath, "");

        if (self::$isProd) {

            self::$js = "";

            ob_start();
            foreach(scandir($vpath ) as $file) {
                if ($file == '.' && $file == '..') continue;
                @include($vpath . $file);
            }
            ob_end_clean();

            if (self::$minify) {
              //..
            }

            file_put_contents($spath, self::$js);
        }
    }
}
