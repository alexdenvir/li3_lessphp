<?php

namespace Less\extensions\helper;

use lithium\analysis\Logger;

class Less extends \lithium\template\Helper {


    public function style($path, array $options = array()) {
        $html = '';

        if (\is_string($path)) {
            $html .= $this->_compileLess($path);
        }
        elseif (\is_array($path)) {
            foreach ($path as $style) {
                $html .= $this->_compileLess($style);
            }
        }

        return $html;
    }

    private function _compileLess($path) {
        Logger::config(array('error' => array('adapter' => 'File')));
        $less = LITHIUM_APP_PATH . '/webroot/less/' . $path . '.less';
        $css = LITHIUM_APP_PATH . '/webroot/css/' . $path . '.css';

        if (!\file_exists($less)) {
            if (\file_exists($css)) {
                return '<link rel="stylesheet" type="text/css" href="/css/' . \filemtime($css) . '/' . $path . '.css">';
            }
            else {
                Logger::write('error', "Unable to find stylesheet: {$css}");
                return '';
            }
        }
        else {
            include_once(dirname(dirname(dirname(__FILE__))) . '/_source/lessphp/lessc.inc.php');

            \lessc::ccompile($less, $css);
            if (\file_exists($css)) {
                return '<link rel="stylesheet" type="text/css" href="/css/' . \filemtime($css) . '/' . $path . '.css">';
            }
            else {
                Logger::write('error', "Unable to find stylesheet: {$css}");
                return '';
            }
        }
    }
}
?>
