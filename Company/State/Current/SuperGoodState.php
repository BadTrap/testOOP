<?php

namespace Company\State\Current;



use Company\State\Abstracts\State;
use Company\State\Interfaces\IState;

class SuperGoodState extends State implements IState
{
    public $stateCount = 0;

    public function handleGood(): void
    {
        echo "Good for you, your state is  better!";
        $this->stateCount++;
    }

    public function handleBad(): void
    {
        echo "Bad for you, your state is  worst!";
        $this->member->transitionTo(new GoodState);
    }
}