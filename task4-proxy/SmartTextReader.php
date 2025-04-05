<?php
class SmartTextReader {
    public $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function read() {
        $content = file_get_contents($this->filename);
        $lines = explode("\n", $content);
        $result = [];
        foreach ($lines as $line) {
            $result[] = str_split($line);
        }
        return $result;
    }
}
