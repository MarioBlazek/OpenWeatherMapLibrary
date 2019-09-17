<?php

declare(strict_types=1);

use Kahlan\Cli\CommandLine;

/** @var CommandLine $commandLine */
$commandLine = $this->commandLine();

// set src directoru to lib
$commandLine->set('src', __DIR__ . '/lib');
$commandLine->set('spec', __DIR__ . '/spec');
$commandLine->set('reporter', 'verbose');
