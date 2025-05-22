<?php
interface Handler {
    public function setNext(Handler $handler): Handler;
    public function handle(string $request): ?string;
}

abstract class AbstractHandler implements Handler {
    private ?Handler $nextHandler = null;

    public function setNext(Handler $handler): Handler {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(string $request): ?string {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }
        return null;
    }
}

class Level1Support extends AbstractHandler {
    public function handle(string $request): ?string {
        if ($request === "simple") return "Level 1 handled the request.
";
        return parent::handle($request);
    }
}

class Level2Support extends AbstractHandler {
    public function handle(string $request): ?string {
        if ($request === "intermediate") return "Level 2 handled the request.
";
        return parent::handle($request);
    }
}

class Level3Support extends AbstractHandler {
    public function handle(string $request): ?string {
        if ($request === "advanced") return "Level 3 handled the request.
";
        return parent::handle($request);
    }
}

class FinalSupport extends AbstractHandler {
    public function handle(string $request): ?string {
        return "Final handler. No solution found.
";
    }
}

$l1 = new Level1Support();
$l2 = new Level2Support();
$l3 = new Level3Support();
$final = new FinalSupport();
$l1->setNext($l2)->setNext($l3)->setNext($final);

echo $l1->handle("intermediate");
?>
