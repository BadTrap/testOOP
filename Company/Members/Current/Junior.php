<?php


namespace Company\Members\Current;


use Company\Members\Abstracts\Member;
use Company\Members\Interfaces\ICompanyMember;

class Junior extends Member implements ICompanyMember
{

    public $tasks;

    /**
     * Junior constructor.
     * @param $name
     * @param array|null $tasks
     */
    public function __construct($name, array $tasks = [])
    {
        parent::__construct($name);
        $this->tasks = $tasks;
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
     * @return bool
     */
    public function getTaskResult() : bool
    {
        return rand(0,1) == 1;
    }
}