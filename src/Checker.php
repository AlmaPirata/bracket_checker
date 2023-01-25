<?php

class Checker
{
    private const ALLOWED_SYMBOLS = ['(', ')', ' ', '\n', '\r', '\t'];

    private function doMagic(string $string): bool
    {
        $open = $close = 0;
        $bracketsArr = str_split($string);
        foreach ($bracketsArr as $symbol) {
            if ($symbol === '(') {
                $open++;
            } elseif ($symbol === ')') {
                $close++;
            }
        }

        return $open === $close;
    }

    public function checkBrackets(string $string): bool
    {
        $bracketsArr = str_split($string);
        if (count(array_diff($bracketsArr, self::ALLOWED_SYMBOLS)) > 0) {
            throw new InvalidArgumentException('Строка содержит запрещённые символы!');
        }

        return $this->doMagic($string);
    }

}
