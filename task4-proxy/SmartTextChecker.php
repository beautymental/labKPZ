<?php
class SmartTextChecker {
    private $reader;

    public function __construct(SmartTextReader $reader) {
        $this->reader = $reader;
    }

    public function read() {
        echo "Opening file: " . $this->reader->filename . "\n";
        $content = $this->reader->read();
        echo "Reading file...\n";
        echo "Closing file: " . $this->reader->filename . "\n";

        $lines = count($content);
        $chars = array_sum(array_map('count', $content));
        echo "Lines: $lines, Characters: $chars\n";

        return $content;
    }
}
