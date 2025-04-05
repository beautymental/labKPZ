<?php
class Logger {
    public function Log($message) {
        echo "\033[32m$message\033[0m\n";  // Зелений
    }

    public function Error($message) {
        echo "\033[31m$message\033[0m\n";  // Червоний
    }

    public function Warn($message) {
        echo "\033[33m$message\033[0m\n";  // Оранжевий
    }
}
?>
