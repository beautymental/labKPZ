<?php
class Triangle extends Shape {
    public function draw() {
        $this->renderer->render("Triangle");
    }
}
