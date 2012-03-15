lessphp library for Lithium
---------------------------

Precompile your less files server-side, using the lessphp compiler.

The library handles both less and css files with the Less view helper. Accepts either a string or an array of strings as a parameter, and returns a stylesheet link in your templates.

Installation
------------

Clone git://github.com/alexdenvir/li3_lessphp.git into your Lithium libraries directory (or even better: git submodule add git://github.com/alexdenvir/li3_lessphp.git libraries/Less ).

Add the library to your libraries bootstrap: Libraries::add('Less');

Create directories in your app/webroot for css and less - make sure the css directory is writable.

Set up your .htaccess for css cachebursting - css urls will point to "/css/[css modified time]/*.css", so a rewrite rule like the following should work:
RewriteRule ^/css/(\d+)/(.+)\.css /css/$2.css [L]