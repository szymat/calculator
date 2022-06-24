<?php

namespace Calculator\Strategy;

class EasterEggStrategy implements CalculationStrategyInterface
{
    private const MAP = [
        'ICBfX18KIC8gXyBcCnwgfCB8IHwKfCB8X3wgfAogXF9fXy8=',
        'IF8KLyB8CnwgfAp8IHwKfF98',
        'IF9fX18KfF9fXyBcCiAgX18pIHwKIC8gX18vCnxfX19fX3w=',
        'IF9fX19fCnxfX18gLwogIHxfIFwKIF9fXykgfAp8X19fXy8=',
        'IF8gIF8KfCB8fCB8CnwgfHwgfF8KfF9fICAgX3wKICAgfF98',
        'IF9fX18KfCBfX198CnxfX18gXAogX19fKSB8CnxfX19fLw==',
        'ICBfXwogLyAvXwp8ICdfIFwKfCAoXykgfAogXF9fXy8=',
        'IF9fX19fCnxfX18gIHwKICAgLyAvCiAgLyAvCiAvXy8=',
        'ICBfX18KICggXyApCiAvIF8gXAp8IChfKSB8CiBcX19fLw==',
        'ICBfX18KIC8gXyBcCnwgKF8pIHwKIFxfXywgfAogICAvXy8=',
        'CgoKIF8KKF8p',
        'ICAgIF9fIF8gX19fIF8gICBfIF8gX18gX19fICAgIAogICAvIF9gIC8gX198IHwgfCB8ICdfXy8gXyBcICAgCiAgfCAoX3wgXF9fIFwgfF98IHwgfCB8IChfKSB8ICAKICAgXF9fLF98X19fL1xfXyxffF98ICBcX19fLyAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg',
    ];
    private const MIN_SPAN = 10;

    public function execute(mixed $a, mixed $b): string
    {
        $symbols = [];
        $chars = str_split($a);
        foreach ($chars as $c) {
            $symbols[] = $this->decode($c === '.' ? self::MAP[10] : self::MAP[$c]);
        }
        $chars = str_split($b);
        $symbols[] = $this->decode(self::MAP[11]);
        foreach ($chars as $c) {
            $symbols[] = $this->decode($c === '.' ? self::MAP[10] : self::MAP[$c]);
        }

        $output = [];
        foreach ($symbols as $symbol) {
            foreach ($symbol as $x => $line) {
                if(!array_key_exists($x, $output)) {
                    $output[$x] = '';
                }
                if(strlen($line) < self::MIN_SPAN) {
                    $line .= str_repeat(' ' , self::MIN_SPAN - strlen($line));
                }
                $output[$x] .= $line;
            }
        }
        return implode("\n", $output);
    }

    private function decode(mixed $data) : array {
        return preg_split("/\r\n|\n|\r/", base64_decode($data));
    }
}