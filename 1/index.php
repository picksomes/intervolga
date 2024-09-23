<?php

define("ROOT", __DIR__);

include_once ROOT . '/functions/functions.php';
$data = require_once ROOT . '/data.php';
$sortData = sortAndGroupByStudent($data);
$subjects = getUniqSubjects($data);

include_once 'views/tableStudents.php';
