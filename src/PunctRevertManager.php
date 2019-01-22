<?php

namespace punctuation;

/**
 * Class PunctRevertManager
 * @package punctuation
 */
class PunctRevertManager implements IPunctRevertManager
{
    /**
     * @param string $subject
     * @return string
     */
    public function revertPunctuationMarks(string $subject): string
    {
        $subject = mb_convert_encoding($subject, 'UTF-8');
        preg_match_all("#[[:punct:]]#Ui", $subject, $matches, PREG_OFFSET_CAPTURE);
        $matches = $matches[0];

        $reversedPunctMeta = $this->getReversedPunctMeta($matches);

        foreach ($reversedPunctMeta as $position => $puncSumbol) {
            $subject[$position] = $puncSumbol;
        }

        return $subject;
    }

    /**
     * @param array $matches
     * @return array
     */
    protected function getReversedPunctMeta(array $matches): array
    {
        $matchesTmp = [];
        foreach ($matches as $match) {
            $newOffset = $match[1];
            $matchesTmp[$newOffset] = $match[0];
        }
        $keys = array_keys($matchesTmp);
        $values = array_values($matchesTmp);
        $values = array_reverse($values);

        return array_combine($keys, $values);
    }
}