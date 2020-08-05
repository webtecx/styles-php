<?php

require './Styles.php';
require './Script.php';

require './views/home.php';

Styles::$isProd = true;
Styles::$minify = true;
Styles::dump();

Script::$isProd = true;
Script::$minify = true;
Script::dump();
