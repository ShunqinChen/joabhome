<?php

    // Copyright (c) 2005 Help Center Live. All Rights Reserved

    // This file is part of Help Center Live.

    // Help Center Live is free software; you can redistribute it and/or modify
    // it under the terms of the GNU General Public License as published by
    // the Free Software Foundation; either version 2 of the License, or
    // (at your option) any later version.

    // Help Center Live is distributed in the hope that it will be useful,
    // but WITHOUT ANY WARRANTY; without even the implied warranty of
    // MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    // GNU General Public License for more details.

    // You should have received a copy of the GNU General Public License
    // along with Help Center Live; if not, write to the Free Software
    // Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

    // Contributors: Michael Bird

    // File Comments:
    // This file contains outputs the request monitor template and executes any funtions that
    // should be executed before the request monitor starts to load

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'monitor');

    // Display the output
    $GLOBALS['template']->display('monitor.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
?>