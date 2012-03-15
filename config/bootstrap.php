<?php

use lithium\core\Libraries;
use lithium\core\ConfigException;
use lithium\template\Helper;
use lithium\analysis\Logger;

Libraries::add('Less', array(
            'path' => LITHIUM_LIBRARY_PATH . '/Less/_source/lessphp',
            'includePath' => true,
            'bootstrap' => false
        ));
require_once("lessc.inc.php");

var_dump('less');

include(LITHIUM_LIBRARY_PATH . "/extensions/helpers/Less.php");

?>

