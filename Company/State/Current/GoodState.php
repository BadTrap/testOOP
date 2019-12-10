<?php


namespace Company\State\Current;


use Company\State\Abstracts\State;
use Company\State\Interfaces\IState;

class GoodState extends State implements IState
{

    public function handleGood(): void
    {
        echo "Good for you, your state is  better!";
        $this->member->transitionTo(new SuperGoodState);

    }

    public function handleBad(): void
    {
        $this->member->transitionTo(new BadState);
        echo "Bad for you, your state is  worst!";
    }
}