<?php

require_once "Controllers/templateC.php";

require_once "Controllers/usersC.php";
require_once "Models/usersM.php";

require_once "Controllers/careersC.php";
require_once "Models/careersM.php";

require_once "Controllers/settingsC.php";
require_once "Models/settingsM.php";

require_once "Controllers/coursesC.php";
require_once "Models/coursesM.php";

require_once "Controllers/examsC.php";
require_once "Models/examsM.php";

$template = new Template();
$template->callTemplate();