<?php
require_once 'Logger.php';
require_once 'FileWriter.php';
require_once 'FileLoggerAdapter.php';

$logger = new Logger();
$fileWriter = new FileWriter();
$fileLogger = new FileLoggerAdapter($fileWriter);

// Використання адаптера для запису в файл
$fileLogger->Log("This is a log message");
$fileLogger->Error("This is an error message");
$fileLogger->Warn("This is a warning message");


$logger->Log("Console Log");
$logger->Error("Console Error");
$logger->Warn("Console Warning");
?>
