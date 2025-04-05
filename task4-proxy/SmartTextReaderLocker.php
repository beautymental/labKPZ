<?php
class SmartTextReaderLocker {
    private $reader;
    private $regex;

    public function __construct(SmartTextReader $reader, $regex) {
        $this->reader = $reader;
        $this->regex = $regex;
    }

    public function read() {
        if (preg_match($this->regex, $this->reader->filename)) {
            echo "Access denied!\n";
            return;
        }
        return $this->reader->read();
    }
}
