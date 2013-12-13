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
    // This file allows the sending of messages 

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->operator();
    $inc->chat();
    $inc->db();

    if (isset($_GET['admin'])) {
        $GLOBALS['template']->assign('admin', 'true');
    } else {
        $GLOBALS['template']->assign('admin', 'false');
    }

    if (isset($_GET['opchat'])) {
        $GLOBALS['template']->assign('opchat', 'true');
    } else {
        $GLOBALS['template']->assign('opchat', 'false');
    }

    $GLOBALS['chat']->assign(addslashes($_GET['chatid']));
    $GLOBALS['template']->assign('chatid', addslashes($_GET['chatid']));
    $GLOBALS['template']->assign('onload', ' onload="parent.window.Chat.focus_chat();"');

    // Display the output
    $GLOBALS['template']->display('chat_send.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>