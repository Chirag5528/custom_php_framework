<?php

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    die("HAha GOTCHA!");
}

require(__DIR__ . "/Controllers/" . $_POST['controller'] . "Controller.php");

call_user_func(array("Controllers\\" .  $_POST['controller'] . "Controller", $_POST['action']));
