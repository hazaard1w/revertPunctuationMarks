<?php

namespace punctuation\tests;

use PHPUnit\Framework\TestCase;
use punctuation\{PunctRevertManager, IPunctRevertManager};

class RevertManagerTest extends TestCase
{
    public function testResultValue()
    {
        $subject = 'Привет! Как твои дела?';
        $need = 'Привет? Как твои дела!';

        /** @var IPunctRevertManager $punctRevertManager */
        $punctRevertManager = new PunctRevertManager();
        $resultValue = $punctRevertManager->revertPunctuationMarks($subject);

        $this->assertTrue($resultValue === $need);
    }
}