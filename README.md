CakePHP serialize-able Data Types
=================================

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Build Status](https://img.shields.io/travis/burzum/cakephp-serialize-data-types/master.svg?style=flat-square)](https://travis-ci.org/burzum/cakephp-serialize-data-types)
[![Build Status](https://img.shields.io/coveralls/burzum/cakephp-serialize-data-types/master.svg?style=flat-square)](https://coveralls.io/r/burzum/cakephp-serialize-data-types)
[![Code Quality](https://img.shields.io/scrutinizer/g/burzum/cakephp-serialize-data-types/master.svg?style=flat-square)](https://coveralls.io/r/burzum/cakephp-serialize-data-types)

> Serialization is the process of converting an object into a stream of bytes in order to store the object or transmit it to memory, a database, or a file. Its main purpose is to save the state of an object in order to be able to recreate it when needed. The reverse process is called deserialization.

The plugin will add data types that will allow you to store serialized data in your database.


Requirements
------------

* CakePHP 3.0+

How to use?
-----------

Check the official documentation on how to use data types:

* http://book.cakephp.org/3.0/en/orm/saving-data.html#saving-complex-types
* http://book.cakephp.org/3.0/en/orm/database-basics.html#adding-custom-database-types

Serializeable Data Types
------------------------

The following types are included in this plugin:

* **Json** (using [json_decode](http://php.net/manual/en/function.json-decode.php) and [json_encode](http://php.net/manual/en/function.json-encode.php))
* **Serialize** (using [serialize](http://php.net/manual/en/function.serialize.php) and [unserialize](http://php.net/manual/en/function.unserialize.php))

Please notice [this security warning from the official php documentation](http://php.net/manual/en/function.unserialize.php) when using the Serialize data type:

> Do not pass untrusted user input to unserialize(). Unserialization can result in code being loaded and executed due to object instantiation and autoloading, and a malicious user may be able to exploit this. Use a safe, standard data interchange format such as JSON (via json_decode() and json_encode()) if you need to pass serialized data to the user.

Support
-------

For support and feature request, please visit the [Support Site](https://github.com/burzum/cakephp-serialize-data-types/issues).

Branch strategy
-------------

* The **master** branch holds the `STABLE` latest version of the plugin.
* The **develop** branch is `UNSTABLE` and used to test new features before releasing them.
* Only **hot fixes** are accepted against the master branch.

Contributing to this Plugin
---------------------------

Please feel free to contribute to the plugin with new issues, requests, unit tests and code fixes or new features. If you want to contribute some code, create a feature branch from develop, and send us your pull request. Unit tests for new features and issues detected are mandatory to keep quality high.

* Pull requests must be send to the ```develop``` branch.
* Contributions must follow the PSR2 coding standard recommendation.
* [Unit tests](http://book.cakephp.org/3.0/en/development/testing.html) are required.

License
-------

Copyright 2013 - 2016 Florian Krämer

Licensed under the [MIT](http://www.opensource.org/licenses/mit-license.php) License. Redistributions of the source code included in this repository must retain the copyright notice found in each file.
