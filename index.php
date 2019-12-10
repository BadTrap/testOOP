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

/* 2. Attach HR and Manager to Team Lead for watching on TeamLead. Attach Team Lead to watching on Junior  */
$teamLead->attach($hr);
$teamLead->attach($manager);
$junior->attach($teamLead);

/* 2.  Set new tasks for Junior Vasya */

echo "State history: <br>";

for ($i = 0; $i < 30; $i++) {
    $task = $junior->setTask('Delay Testovoy zadanie!!!' . $i);
    $junior->getTaskResult();
    $teamLead->state;
}

echo '<br>';



///* 5. Feedback from HR */
print_r(' Feedback from HR (Super BAD!!! ) - ' . $hr->stateCount . '</br>');
//
//
///* 5. Feedback from Manager */
print_r(' Feedback from Manager (Super GOOD!!) - ' . $manager->stateCount . '</br>');
//
//
