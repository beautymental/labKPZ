<?php
class FileWriter {
    public function Write($content) {

        file_put_contents('log.txt', $content);
    }

    public function WriteLine($content) {

        file_put_contents('log.txt', $content . PHP_EOL, FILE_APPEND);
    }
}
?>
