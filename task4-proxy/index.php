<?php
require_once 'SmartTextReader.php';
require_once 'SmartTextChecker.php';
require_once 'SmartTextReaderLocker.php';

$reader = new SmartTextReader("test.txt");
$checker = new SmartTextChecker($reader);
$locker = new SmartTextReaderLocker($reader, "/restricted/");

$checker->read();
$locker->read();
