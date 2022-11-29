<?php
// WAJIB DI INCLUDE TIAP PAGE SETELAH LOGIN

if ($_SESSION['last_activity'] < time() - $_SESSION['expire_time']) { //have we expired?
    //redirect to logout.php
    header('Location: system/logout.php'); //change yoursite.com to the name of you site!!
} else { //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}
