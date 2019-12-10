<?php

namespace Company\Members\Current;


use Company\Members\Abstracts\Member;
use Company\Members\Interfaces\ICompanyMember;
use Company\State\Abstracts\State;
use SplObserver;
use SplSubject;

class TeamLead extends Member implements ICompanyMember, SplSubject, SplObserver
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var State
     */
    public $state;

    /**
     * @var \SplObjectStorage
     */
    private $observers;


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
        $this->observers = new \SplObjectStorage;
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
     * Метод управления для добавления обсервера.
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer): void
    {
        echo "Subject: Attached an observer.\n";
        $this->observers->attach($observer);
    }

    /**
     * Метод управления для удаления обсервера.
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer.\n";
    }


    /**
     * Запуск обновления в каждом подписчике.
     */
    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }


    public function update(\SplSubject $subject): void
    {
        $subject->lastTaskResult ? $this->state->handleGood() :  $this->state->handleBad();
        $this->notify();
    }
}
