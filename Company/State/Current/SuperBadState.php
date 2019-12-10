<?php

namespace Company\State\Current;

use Company\State\Abstracts\State;
use Company\State\Interfaces\IState;

class SuperBadState extends State implements IState
{
    public $stateCount = 0;

    public function handleGood(): void
    {
        echo "Bad for you, your state is  worst!";
        $this->member->transitionTo(new GoodState);

    }

    public function handleBad(): void
    {
        echo "Good for you, your state is  better!";
        $this->stateCount++;
    }
}