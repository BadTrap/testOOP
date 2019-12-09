<?php


namespace Company\Members\Current;


use Company\Members\Abstracts\Member;
use Company\Members\Interfaces\ICompanyMember;

class  HR extends Member implements ICompanyMember
{
    public $name;

    public function __construct($name)
    {
        parent::__construct($name);
    }


    /**
     *
     * Count of where Team lead feels super bad
     * @param TeamLead $teamLead
     * @return mixed
     */
    public function getBadFeedback(TeamLead $teamLead)
    {
        return  $teamLead->criticalStates['bad'];
    }
}

