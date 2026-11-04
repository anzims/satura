<?php

declare(strict_types=1);

namespace Anzims\Satura\Support;

use RuntimeException;

/**
 * Палитры Tailwind, доступные генератору темы.
 *
 * Значения лежат в resources/palettes.json и совпадают с палитрой
 * Tailwind CSS 4, поэтому сгенерированные токены совместимы
 * с любым проектом на Tailwind.
 */
final class Palettes
{
    /** @var array<string, array<string, string>>|null */
    private ?array $palettes = null;

    /**
     * @return array<string, array<string, string>>
     */
    public function all(): array
    {
        if ($this->palettes === null) {
            $path = dirname(__DIR__, 2).'/resources/palettes.json';

            if (! is_file($path)) {
                throw new RuntimeException('Satura: palette file not found at '.$path.'.');
            }

            $decoded = json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);

            if (! is_array($decoded)) {
                throw new RuntimeException('Satura: palette file is not a JSON object.');
            }

            /** @var array<string, array<string, string>> $decoded */
            $this->palettes = $decoded;
        }

        return $this->palettes;
    }

    /**
     * @return list<string>
     */
    public function names(): array
    {
        return array_keys($this->all());
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->all());
    }

    /**
     * @return array<string, string>
     */
    public function shades(string $name): array
    {
        return $this->all()[$name] ?? [];
    }
}
