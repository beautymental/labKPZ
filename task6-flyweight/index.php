<?php
require_once 'LightHTML.php';
require_once 'LightElementNode.php';

$header = LightHTML::getElement("h1");
$header->addChild(new LightTextNode("This is a heading"));
echo $header->getOuterHTML();
