<?php


namespace Company\Members\Current;


use Company\Members\Abstracts\Member;
use Company\Members\Interfaces\ICompanyMember;
use SplSubject;

class Junior extends Member implements ICompanyMember, SplSubject
{

    /**
     * @var array
     */
    public $tasks;

    /**
     * @var \SplObjectStorage
     */
    public $observers;

    /**
     * @var boolean
     */
    public $lastTaskResult;

    /**
     * Junior constructor.
     * @param $name
     * @param array|null $tasks
     */
    public function __construct($name, array $tasks = [])
    {
        parent::__construct($name);
        $this->tasks = $tasks;
        $this->observers = new \SplObjectStorage;
    }

    /**
     * @param $task
     */
    public function setTask($task)
    {
        array_push($this->tasks, $task);
    }


    /**
     *
     * There is no logic!
     * @return void
     */
    public function getTaskResult()
    {
        $this->lastTaskResult = rand(0, 1) == 1;
        $this->notify();
    }


    /**
     * Методы управления подпиской.
     * @param \SplObserver $observer
     */
    public function attach(\SplObserver $observer): void
    {
        echo "Subject: Attached an observer.\n";
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer.\n";
    }

    /**
     * Запуск обновления в каждом подписчике.
     */
    public function notify(): void
    {
        echo "Subject: Notifying observers...\n";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

}