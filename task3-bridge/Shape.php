<?php
abstract class Shape {
    protected $renderer;

    public function __construct($renderer) {
        $this->renderer = $renderer;
    }

    abstract public function draw();
}
