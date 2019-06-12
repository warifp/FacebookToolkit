<?php

require __DIR__.'/../vendor/autoload.php';

echo 'Say hello (visible): ';

$answer = Seld\CliPrompt\CliPrompt::prompt();

echo 'You answered: '.$answer . PHP_EOL;

echo 'Say hello (hidden): ';

$answer = Seld\CliPrompt\CliPrompt::hiddenPrompt();

echo 'You answered: '.$answer . PHP_EOL;
