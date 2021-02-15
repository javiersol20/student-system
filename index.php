<?php

require_once "Controllers/templateC.php";
require_once "Controllers/usersC.php";
require_once "Models/usersM.php";
require_once "Controllers/careersC.php";
require_once "Models/careersM.php";
require_once "Controllers/settingsC.php";
require_once "Models/settingsM.php";

$template = new Template();
$template->callTemplate();