<?php

namespace punctuation\helpers;

/**
 * Class OffsetHelper
 * @package helpers
 */
class OffsetHelper
{
    /**
     * @deprecated
     * Для получения сдвигов в UTF-8
     * Иначе для знаков препинания "Привет! Как твои. дела." PREG_OFFSET_CAPTURE выдаёт: 12, 29, 39 соотвественно
     * @param string $subject
     * @param array $matches
     * @return array
     */
    public static function fixOffsets(string $subject, array $matches): array
    {
        foreach ($matches as &$match) {
            $match[1] = strlen(utf8_decode(substr($subject, 0, $match[1])));
        }
        return $matches;
    }
}