<?php

class Styles {

    static public $isProd = false;

    static public $css = "";

    static public $minify = true;

    static function begin() {
        if (!self::$isProd) {
            echo '<style>';
        } else {
            ob_start();
        }
    }


    static function end() {
        if (!self::$isProd) {
            echo '</style>';
        } else {
            self::$css .= ob_get_clean(); 
        }
    }

    static function dump() {
        $spath = '../public/css/styles.css';
        $vpath = '../views/';

        file_put_contents($spath, "");

        if (self::$isProd) {

            self::$css = "";

            ob_start();
            foreach(scandir($vpath ) as $file) {
                if ($file == '.' && $file == '..') continue;
                echo $file, "\n";
                @include($vpath . $file);
            }
            ob_end_clean();

            if (self::$minify) {
                self::$css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', self::$css);
                self::$css = preg_replace('/\s{2,}/', ' ', self::$css);
                self::$css = preg_replace('/\s*([:;{}])\s*/', '$1', self::$css);
                self::$css = preg_replace('/;}/', '}', self::$css);
            }

            file_put_contents($spath, self::$css);
        }
    }
}