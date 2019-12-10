<?php


namespace Company\Members\Current;


use Company\Members\Abstracts\Member;
use Company\Members\Interfaces\ICompanyMember;
use Company\State\Current\SuperBadState;
use Company\State\Current\SuperGoodState;
use SplObserver;

class  HR extends Member implements ICompanyMember, SplObserver
{
    public $name;
    public $stateCount = 0;

    /**
     * HR constructor.
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
    }


    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject): void
    {
        if ($subject->state instanceof SuperBadState) {
            $this->stateCount++;
        }
    }
}

