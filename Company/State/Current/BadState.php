<?php


namespace Company\State\Current;

use Company\State\Abstracts\State;
use Company\State\Interfaces\IState;

class BadState extends State implements IState
{

    public function handleGood(): void
    {
        echo "Good for you, your state is  better!";
        $this->member->transitionTo(new GoodState);

    }

    public function handleBad(): void
    {
        echo "Bad for you, your state is  worst!";
        $this->member->transitionTo(new SuperBadState);
    }
}