<?php
class FileLoggerAdapter {
    private $fileWriter;

    public function __construct(FileWriter $fileWriter) {
        $this->fileWriter = $fileWriter;
    }

    public function Log($message) {
        $this->fileWriter->WriteLine("[LOG] " . $message);
    }

    public function Error($message) {
        $this->fileWriter->WriteLine("[ERROR] " . $message);
    }

    public function Warn($message) {
        $this->fileWriter->WriteLine("[WARN] " . $message);
    }
}
?>
