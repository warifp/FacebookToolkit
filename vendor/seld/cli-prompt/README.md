CLI-Prompt
==========

While prompting for user input using `fgets()` is quite easy, sometimes you
need to prompt for sensitive information. In these cases, the characters typed
in by the user should not be directly visible, and this is quite a pain to
do in a cross-platform way.

This tiny package fixes just that for you:

```php
<?php

echo 'Say hello: ';

$answer = Seld\CliPrompt\CliPrompt::hiddenPrompt();

echo 'You answered: '.$answer . PHP_EOL;

// Output in the CLI:
// 
// Say hello:
// You answered: hello
```

Installation
------------

`composer require seld/cli-prompt`

API
---

- `Seld\CliPrompt\CliPrompt::hiddenPrompt($allowFallback = false);`

  > Prompts the user for input and hides what they type. If this fails for any
  > reason and `$allowFallback` is set to `true` the prompt will be done using
  > the usual `fgets()` and characters will be visible.

- `Seld\CliPrompt\CliPrompt::prompt();`

  > Regular user prompt for input with characters being shown on screen.

In both cases, the trailing newline the user enters when submitting the answer
is trimmed.

Requirements
------------

PHP 5.3 and above

License
-------

CLI-Prompt is licensed under the MIT License - see the LICENSE file for details

Acknowledgments
---------------

- This project uses hiddeninput.exe to prompt for passwords on Windows, sources
  and details can be found on the [github page of the project](https://github.com/Seldaek/hidden-input).
