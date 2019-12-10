<?php

namespace Company\State\Abstracts;

use Company\Members\Abstracts\Member;
use Company\Members\Current\TeamLead;
use Company\State\Interfaces\IState;

/**
 * Базовый класс Состояния объявляет методы, которые должны реализовать все
 * Конкретные Состояния, а также предоставляет обратную ссылку на объект
 * Контекст, связанный с Состоянием. Эта обратная ссылка может использоваться
 * Состояниями для передачи Контекста другому Состоянию.
 */
abstract class State implements IState
{
    /**
     * @var Member
     */
    protected  $member;

    public function __toString()
    {
        self::class;
    }

    /**
     * @param TeamLead $teamLead
     */
    public function setTeamLeadMember(TeamLead $teamLead)
    {
        $this->member = $teamLead;
    }

    abstract public function handleGood(): void;

    abstract public function handleBad(): void;
}
