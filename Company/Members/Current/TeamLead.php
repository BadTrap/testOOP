<?php

namespace Company\Members\Current;


use Company\Members\Abstracts\Member;
use Company\Members\Interfaces\ICompanyMember;

class TeamLead extends Member implements ICompanyMember
{
    public $name;
    public $currentState;
    public $allStates = [
        1 => 'Good!',
        2 => 'Normas',
        3 => 'BAD =(',
        4 => 'SUPER BADDD!'
    ];

    public $criticalStates = [
        'good' => 0,
        'bad' => 0
    ];

    /**
     * TeamLead constructor.
     * @param $name
     * @param $currentState
     */
    public function __construct(string $name, string $currentState)
    {
        parent::__construct($name);
        $this->currentState = array_search($currentState, $this->allStates);
        $this->name = $name;
    }


    /**
     * @param bool $result
     * @return string
     */
    public function checkTaskResult(bool $result): string
    {
        $allStates = $this->allStates;

        $result ? $this->currentState++ : $this->currentState--;
        if ($this->currentState <= reset($allStates)) {
            $this->currentState = reset($allStates);
            $this->criticalStates['good']++;
            return 'I am feeling - ' . $this->currentState;

        } elseif ($this->currentState >= key(array_slice($allStates, -1, 1, true))) {
            $this->currentState = key(array_slice($allStates, -1, 1, true));
            $this->criticalStates['bad']++;
            return 'I am feeling - ' . $this->currentState;
        } else {
            return 'I am feeling - ' . $this->currentState;
        }
    }

    /**
     *
     * Add new state to TeamLead
     *
     * @param $currentState
     */
    public function addNewState(string $currentState)
    {
        array_push($this->allStates, $currentState);
    }

}
