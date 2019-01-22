<?php
$loader = require __DIR__ . '/vendor/autoload.php';

use punctuation\{PunctRevertManager, IPunctRevertManager};

/** @var IPunctRevertManager $punctRevertManager */
$punctRevertManager = new PunctRevertManager();

echo $punctRevertManager->revertPunctuationMarks("Привет! Как твои дела?");
