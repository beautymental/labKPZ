<?php

interface Subscription
{
    public function getDetails();
}

class DomesticSubscription implements Subscription
{
    private $monthlyFee;
    private $minPeriod;
    private $channels;

    public function __construct($monthlyFee, $minPeriod, $channels)
    {
        $this->monthlyFee = $monthlyFee;
        $this->minPeriod = $minPeriod;
        $this->channels = $channels;
    }

    public function getDetails()
    {
        return "Domestic Subscription: \${$this->monthlyFee}/month, Min period: {$this->minPeriod} months, Channels: " . implode(", ", $this->channels);
    }
}

class EducationalSubscription implements Subscription
{
    private $monthlyFee;
    private $minPeriod;
    private $channels;

    public function __construct($monthlyFee, $minPeriod, $channels)
    {
        $this->monthlyFee = $monthlyFee;
        $this->minPeriod = $minPeriod;
        $this->channels = $channels;
    }

    public function getDetails()
    {
        return "Educational Subscription: \${$this->monthlyFee}/month, Min period: {$this->minPeriod} months, Channels: " . implode(", ", $this->channels);
    }
}

class PremiumSubscription implements Subscription
{
    private $monthlyFee;
    private $minPeriod;
    private $channels;

    public function __construct($monthlyFee, $minPeriod, $channels)
    {
        $this->monthlyFee = $monthlyFee;
        $this->minPeriod = $minPeriod;
        $this->channels = $channels;
    }

    public function getDetails()
    {
        return "Premium Subscription: \${$this->monthlyFee}/month, Min period: {$this->minPeriod} months, Channels: " . implode(", ", $this->channels);
    }
}

interface SubscriptionFactory
{
    public function createSubscription($subType);
}

class WebSite implements SubscriptionFactory
{
    public function createSubscription($subType)
    {
        if ($subType == "domestic") {
            return new DomesticSubscription(5, 1, ["Sports", "Music"]);
        } elseif ($subType == "educational") {
            return new EducationalSubscription(7, 3, ["Science", "History"]);
        } elseif ($subType == "premium") {
            return new PremiumSubscription(15, 6, ["Movies", "Series", "Music"]);
        }
        return null;
    }
}

class MobileApp implements SubscriptionFactory
{
    public function createSubscription($subType)
    {
        if ($subType == "domestic") {
            return new DomesticSubscription(6, 1, ["News", "Weather"]);
        } elseif ($subType == "educational") {
            return new EducationalSubscription(8, 3, ["Math", "Literature"]);
        } elseif ($subType == "premium") {
            return new PremiumSubscription(18, 6, ["Movies", "Documentaries", "Series"]);
        }
        return null;
    }
}

class ManagerCall implements SubscriptionFactory
{
    public function createSubscription($subType)
    {
        if ($subType == "domestic") {
            return new DomesticSubscription(4, 1, ["Kids", "Entertainment"]);
        } elseif ($subType == "educational") {
            return new EducationalSubscription(6, 3, ["Tech", "Coding"]);
        } elseif ($subType == "premium") {
            return new PremiumSubscription(20, 12, ["Sports", "Movies", "Music"]);
        }
        return null;
    }
}


$website = new WebSite();
$subscription = $website->createSubscription("premium");
echo $subscription->getDetails();

