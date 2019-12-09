<?php

namespace Company\Members\Abstracts;

use Company\Members\Interfaces\ICompanyMember;

abstract class Member implements ICompanyMember
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}