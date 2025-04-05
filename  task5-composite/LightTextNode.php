<?php
class LightTextNode extends LightNode {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    public function getOuterHTML() {
        return $this->text;
    }

    public function getInnerHTML() {
        return $this->text;
    }
}
