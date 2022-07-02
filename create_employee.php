<?php

use Entities\Employee;

require_once "bootstrap.php";

$newEmployeeName = $argv[1];
$newEmployeeSurname = $argv[2];

$employee = new Employee();
$employee->setName($newEmployeeName);
$employee->setSurname($newEmployeeSurname);
$entityManager->persist($employee);
$entityManager->flush();

echo "Created Employee with ID " . $employee->getId() . "\n";
