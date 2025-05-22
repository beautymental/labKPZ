<?php
interface EventListener {
    public function update(string $eventType): void;
}

class ClickLogger implements EventListener {
    public function update(string $eventType): void {
        echo "Clicked! Logged event: $eventType\n";
    }
}

class LightHTMLElement {
    private array $listeners = [];

    public function addEventListener(string $eventType, EventListener $listener): void {
        $this->listeners[$eventType][] = $listener;
    }

    public function triggerEvent(string $eventType): void {
        if (!empty($this->listeners[$eventType])) {
            foreach ($this->listeners[$eventType] as $listener) {
                $listener->update($eventType);
            }
        }
    }
}

$element = new LightHTMLElement();
$element->addEventListener("click", new ClickLogger());
$element->triggerEvent("click");
?>
