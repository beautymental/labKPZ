<?php
class LightElementNode extends LightNode {
    private $tagName;
    private $displayType;
    private $selfClosing;
    private $cssClasses;
    private $children = [];

    public function __construct($tagName, $displayType, $selfClosing, $cssClasses = []) {
        $this->tagName = $tagName;
        $this->displayType = $displayType;
        $this->selfClosing = $selfClosing;
        $this->cssClasses = $cssClasses;
    }

    public function addChild(LightNode $child) {
        $this->children[] = $child;
    }

    public function getOuterHTML() {
        $classString = implode(' ', $this->cssClasses);
        $childrenHTML = '';
        foreach ($this->children as $child) {
            $childrenHTML .= $child->getOuterHTML();
        }

        if ($this->selfClosing) {
            return "<$this->tagName class=\"$classString\" />";
        }

        return "<$this->tagName class=\"$classString\">$childrenHTML</$this->tagName>";
    }

    public function getInnerHTML() {
        $childrenHTML = '';
        foreach ($this->children as $child) {
            $childrenHTML .= $child->getInnerHTML();
        }
        return $childrenHTML;
    }
}
