<?php
session_start();
if (isset($_SESSION['user'])) {
    header("location:" . BASEURL . "home");
}

echo "This is landing page";
?>