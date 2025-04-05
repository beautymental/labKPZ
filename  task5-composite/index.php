<?php
require_once 'LightNode.php';
require_once 'LightElementNode.php';
require_once 'LightTextNode.php';

$body = new LightElementNode("body", "block", false);
$header = new LightElementNode("h1", "block", false);
$header->addChild(new LightTextNode("Hello, World!"));
$body->addChild($header);

echo $body->getOuterHTML();
