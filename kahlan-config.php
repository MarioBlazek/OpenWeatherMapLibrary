<?php

use Kahlan\Cli\Kahlan;
use Kahlan\Cli\CommandLine;

/** @var CommandLine $commandLine */
$commandLine = $this->commandLine();

// set src directoru to lib
$commandLine->set('src','lib');
