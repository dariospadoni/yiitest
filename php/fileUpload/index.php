<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
//
//if (isset ($_GET['upload_dir']))
//    $upload_handler = new UploadHandler(
//        array(
//            'upload_dir' => dirname($_SERVER["SCRIPT_FILENAME"]).'/'.$_GET['upload_dir'].'/',
//            'upload_url' => '/'.$_GET['upload_dir'].'/',
//        )
//    );
//else
    $upload_handler = new UploadHandler();
