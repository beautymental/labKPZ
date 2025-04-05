<?php
class LightHTML {
    private static $elements = [];

    public static function getElement($tagName) {
        if (!isset(self::$elements[$tagName])) {
            self::$elements[$tagName] = new LightElementNode($tagName, "block", false);
        }
        return self::$elements[$tagName];
    }
}
