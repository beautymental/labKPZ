<?php
interface CommandCentre {
    public function notify($sender, string $event): void;
}

class AirportCommand implements CommandCentre {
    public array $runways = [];
    public array $aircrafts = [];

    public function registerRunway(Runway $runway): void {
        $this->runways[] = $runway;
        $runway->setMediator($this);
    }

    public function registerAircraft(Aircraft $aircraft): void {
        $this->aircrafts[] = $aircraft;
        $aircraft->setMediator($this);
    }

    public function notify($sender, string $event): void {
        echo "CommandCentre received event: $event from " . get_class($sender) . "
";
    }
}

class Aircraft {
    private CommandCentre $mediator;

    public function setMediator(CommandCentre $mediator): void {
        $this->mediator = $mediator;
    }

    public function requestLanding(): void {
        $this->mediator->notify($this, "requestLanding");
    }
}

class Runway {
    private CommandCentre $mediator;

    public function setMediator(CommandCentre $mediator): void {
        $this->mediator = $mediator;
    }

    public function clearRunway(): void {
        $this->mediator->notify($this, "clearRunway");
    }
}

$cc = new AirportCommand();
$a = new Aircraft();
$r = new Runway();
$cc->registerAircraft($a);
$cc->registerRunway($r);
$a->requestLanding();
$r->clearRunway();
?>
