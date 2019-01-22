<?php

namespace punctuation;

/**
 * Interface IPunctRevertManager
 * @package punctuation
 */
interface IPunctRevertManager
{
    /**
     * @param string $subject
     * @return string
     */
    function revertPunctuationMarks(string $subject): string;
}