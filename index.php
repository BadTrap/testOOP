<?php

/* Autoloader */
require_once __DIR__ . '/vendor/autoload.php';

use Company\State\Current\{SuperGoodState, SuperBadState, GoodState, BadState};

use Company\Members\Current\{Junior, HR, Manager, TeamLead};


/* 1. Create our Company members - DREAM TEAM */

$teamLead = new TeamLead('T-70', new SuperGoodState);
$junior = new Junior('Vasya');
$hr = new HR('T-1000');
$manager = new Manager('T-1001');
/* 2.  Set new tasks for Junior Vasya */


for ($i = 0; $i < 30; $i++) {
    $task = $junior->setTask('Delay Testovoy zadanie!!!' . $i);

    $taskResult = $junior->getTaskResult();
    /* 3. Team lead  T-70 check, what result of Junior working */
    print_r($teamLead->checkTaskResult($taskResult). '<br>');
}


/* 4. Team lead current state */
//print_r('Team lead current state - ' . $teamLead . '</br>');

///* 5. Feedback from HR */
//print_r(' Feedback from HR (Super BAD!!! ) - ' . $hr->getBadFeedback($teamLead) . '</br>');
//
//
///* 5. Feedback from Manager */
//print_r(' Feedback from Manager (Super GOOD!!) - ' . $manager->getGoodFeedback($teamLead) . '</br>');
//
//
