<?php

declare(strict_types=1);

namespace Anzims\Satura\Support;

/**
 * Соответствие клавиш QWERTY и ЙЦУКЕН.
 *
 * Нужна для поиска без учёта раскладки: «Vjcrdf» и «москва» — одно и то же
 * слово, набранное в разных раскладках. Это не транслитерация, а позиции
 * клавиш, поэтому таблица статичная.
 */
final class Keyboard
{
    /** @var array<string, string> */
    public const LATIN_TO_CYRILLIC = [
        'q' => 'й', 'w' => 'ц', 'e' => 'у', 'r' => 'к', 't' => 'е', 'y' => 'н',
        'u' => 'г', 'i' => 'ш', 'o' => 'щ', 'p' => 'з', '[' => 'х', ']' => 'ъ',
        'a' => 'ф', 's' => 'ы', 'd' => 'в', 'f' => 'а', 'g' => 'п', 'h' => 'р',
        'j' => 'о', 'k' => 'л', 'l' => 'д', ';' => 'ж', "'" => 'э',
        'z' => 'я', 'x' => 'ч', 'c' => 'с', 'v' => 'м', 'b' => 'и', 'n' => 'т',
        'm' => 'ь', ',' => 'б', '.' => 'ю',
    ];

    /**
     * Обе стороны для Alpine: латиница → кириллица и обратно.
     *
     * @return array{latin: array<string, string>, cyrillic: array<string, string>}
     */
    public static function pairs(): array
    {
        return [
            'latin' => self::LATIN_TO_CYRILLIC,
            'cyrillic' => array_flip(self::LATIN_TO_CYRILLIC),
        ];
    }
}
