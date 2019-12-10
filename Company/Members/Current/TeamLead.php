<?php

namespace Company\Members\Current;


use Company\Members\Abstracts\Member;
use Company\Members\Interfaces\ICompanyMember;
use Company\State\Abstracts\State;

class TeamLead extends Member implements ICompanyMember
{
    public $name;
    public $state;

    /**
     * TeamLead constructor.
     * @param string $name
     * @param State $state
     */
    public function __construct(string $name, State $state )
    {
        parent::__construct($name);
        $this->name = $name;
        $this->transitionTo($state);
    }

    /**
     * Team lead  позволяет изменять объект Состояния во время выполнения.
     * @param State $state
     */
    public function transitionTo(State $state): void
    {
        echo "State (Mood): Transition to " . get_class($state) . ".\n";
        $this->state = $state;
        $this->state->setTeamLeadMember($this);
    }

    /**
     * @param bool $result
     */
    public function checkTaskResult(bool $result)
    {
        $result ? $this->state->handleGood() :  $this->state->handleBad();
    }


}
