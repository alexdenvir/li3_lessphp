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

(Hint: the above rule should be in a .htaccess inside your css directory, use the webroot .htaccess as a base)

Usage
-----

Inside your templates, call $this->less->style('stylesheetname');

So, for example, to include the Twitter Bootstrap compiled css, call $this->less->style('bootstrap');

If both the less and css files are found, it will check the modified times of both. If the less was modified later than the css, the css will be recompiled from the less.

If only the less is found, the css will be compiled.

If only the css if found, the css will be included as is.

If neither less nor css are found, nothing will be included.

To include multiple stylesheets, call $this->less->style(array('stylesheet1', 'stylesheet2'));
