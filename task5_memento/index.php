<?php
class TextDocument {
    private string $text = "";

    public function write(string $words): void {
        $this->text .= $words;
    }

    public function getText(): string {
        return $this->text;
    }

    public function save(): Memento {
        return new Memento($this->text);
    }

    public function restore(Memento $memento): void {
        $this->text = $memento->getState();
    }
}

class Memento {
    private string $state;

    public function __construct(string $state) {
        $this->state = $state;
    }

    public function getState(): string {
        return $this->state;
    }
}

class TextEditor {
    private TextDocument $doc;
    private array $history = [];

    public function __construct() {
        $this->doc = new TextDocument();
    }

    public function write(string $text): void {
        $this->history[] = $this->doc->save();
        $this->doc->write($text);
    }

    public function undo(): void {
        $memento = array_pop($this->history);
        if ($memento) $this->doc->restore($memento);
    }

    public function getText(): string {
        return $this->doc->getText();
    }
}

$editor = new TextEditor();
$editor->write("Hello ");
$editor->write("world!");
echo $editor->getText() . "\n";
$editor->undo();
echo $editor->getText() . "\n";
?>
