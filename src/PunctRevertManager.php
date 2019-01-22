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

//preg_split ("/[[:punct:]]/", $string, $match);
//print_r(preg_split ("/[[:punct:]]/", $string,-1, PREG_SPLIT_OFFSET_CAPTURE));

        preg_match_all("#[[:punct:]]#Ui", $subject, $matches, PREG_OFFSET_CAPTURE);
        $matches = $matches[0];
//$matches = fixOffsets($subject, $matches);
        $reversedPunctMeta = $this->getReversedPunctMeta($matches);

        foreach ($reversedPunctMeta as $position => $puncSumbol) {
            $subject[$position] = $puncSumbol;
            //$subject = substr_replace ($subject, $puncSumbol, $position, 1);
        }

//print_r(array_reverse ($matches, true));

        //$byPunct = preg_split ("/[[:punct:]]/", $str, 0, PREG_SPLIT_OFFSET_CAPTURE);
        //print_r($byPunct);
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