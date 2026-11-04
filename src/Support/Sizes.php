<?php

declare(strict_types=1);

namespace Anzims\Satura\Support;

/**
 * Единая размерная линейка: девять ступеней от 3xs до 3xl.
 *
 * md — значение по умолчанию, как medium в Semantic UI. Карты держим
 * здесь, чтобы кнопка, инпут и спиннер не расходились по высоте.
 */
final class Sizes
{
    /** @var list<string> */
    public const STEPS = ['3xs', '2xs', 'xs', 'sm', 'md', 'lg', 'xl', '2xl', '3xl'];

    /**
     * Скругление — доля от высоты, а не фиксированные 8px.
     *
     * Эталон — sm: 32px высоты и 8px радиуса, то есть 0.25.
     * Значения в radius() уже посчитаны по этой доле; классы записаны
     * буквально, иначе Tailwind не соберёт произвольные значения.
     */
    public const RADIUS_RATIO = 0.25;

    /**
     * Кнопки: высота, отступ между иконкой и текстом, кегль.
     *
     * @return array<string, string>
     */
    public static function control(): array
    {
        return [
            '3xs' => 'h-5 gap-0.5 text-ui-3xs',
            '2xs' => 'h-6 gap-1 text-ui-2xs',
            'xs' => 'h-7 gap-1 text-xs',
            'sm' => 'h-8 gap-1.5 text-sm',
            'md' => 'h-10 gap-2 text-sm',
            'lg' => 'h-11 gap-2 text-base',
            'xl' => 'h-12 gap-2.5 text-lg',
            '2xl' => 'h-14 gap-3 text-xl',
            '3xl' => 'h-16 gap-3 text-2xl',
        ];
    }

    /**
     * Горизонтальные отступы кнопок.
     *
     * @return array<string, string>
     */
    public static function padding(): array
    {
        return [
            '3xs' => 'px-1.5',
            '2xs' => 'px-2',
            'xs' => 'px-2.5',
            'sm' => 'px-3',
            'md' => 'px-4',
            'lg' => 'px-5',
            'xl' => 'px-6',
            '2xl' => 'px-7',
            '3xl' => 'px-8',
        ];
    }

    /**
     * Скругление кнопок: высота × 0.25 (sm = 32px → 8px).
     *
     * @return array<string, string>
     */
    public static function radius(): array
    {
        return [
            '3xs' => 'rounded-[5px]',
            '2xs' => 'rounded-[6px]',
            'xs' => 'rounded-[7px]',
            'sm' => 'rounded-ui-md',
            'md' => 'rounded-[10px]',
            'lg' => 'rounded-[11px]',
            'xl' => 'rounded-[12px]',
            '2xl' => 'rounded-[14px]',
            '3xl' => 'rounded-[16px]',
        ];
    }

    /**
     * Поля ввода: высота, паддинг, кегль.
     *
     * @return array<string, string>
     */
    public static function field(): array
    {
        return [
            '3xs' => 'h-5 px-1.5 text-ui-3xs',
            '2xs' => 'h-6 px-2 text-ui-2xs',
            'xs' => 'h-7 px-2.5 text-xs',
            'sm' => 'h-8 px-3 text-sm',
            'md' => 'h-10 px-3 text-sm',
            'lg' => 'h-11 px-4 text-base',
            'xl' => 'h-12 px-4 text-lg',
            '2xl' => 'h-14 px-5 text-xl',
            '3xl' => 'h-16 px-6 text-2xl',
        ];
    }

    /**
     * Спиннеры: диаметр и толщина кольца.
     *
     * @return array<string, string>
     */
    public static function spinner(): array
    {
        return [
            '3xs' => 'size-2.5 border',
            '2xs' => 'size-3 border',
            'xs' => 'size-3.5 border-2',
            'sm' => 'size-4 border-2',
            'md' => 'size-5 border-2',
            'lg' => 'size-5 border-2',
            'xl' => 'size-6 border-2',
            '2xl' => 'size-7 border-2',
            '3xl' => 'size-8 border-[3px]',
        ];
    }

    /**
     * Квадратные кнопки-иконки: ширина = высоте.
     *
     * @return array<string, string>
     */
    public static function square(): array
    {
        return [
            '3xs' => 'size-5',
            '2xs' => 'size-6',
            'xs' => 'size-7',
            'sm' => 'size-8',
            'md' => 'size-10',
            'lg' => 'size-11',
            'xl' => 'size-12',
            '2xl' => 'size-14',
            '3xl' => 'size-16',
        ];
    }

    /**
     * Размеры самих иконок внутри контролов.
     *
     * @return array<string, string>
     */
    public static function icon(): array
    {
        return [
            '3xs' => 'size-2.5',
            '2xs' => 'size-3',
            'xs' => 'size-3.5',
            'sm' => 'size-4',
            'md' => 'size-5',
            'lg' => 'size-5',
            'xl' => 'size-6',
            '2xl' => 'size-7',
            '3xl' => 'size-8',
        ];
    }

    /**
     * Бейджи: паддинг и кегль. Высота не фиксируется, её задаёт контент.
     *
     * @return array<string, string>
     */
    public static function badge(): array
    {
        return [
            '3xs' => 'px-1 py-0 text-ui-3xs',
            '2xs' => 'px-1.5 py-0.5 text-ui-2xs',
            'xs' => 'px-2 py-0.5 text-ui-xs',
            'sm' => 'px-2 py-0.5 text-sm',
            'md' => 'px-2.5 py-1 text-ui-sm',
            'lg' => 'px-3 py-1 text-ui-sm',
            'xl' => 'px-3 py-1.5 text-base',
            '2xl' => 'px-3.5 py-1.5 text-lg',
            '3xl' => 'px-4 py-2 text-xl',
        ];
    }

    /**
     * Паддинг круглой подложки иконки: чем крупнее иконка, тем больше воздуха.
     *
     * @return array<string, string>
     */
    /**
     * Многострочные поля: минимальная высота, паддинг, кегль.
     *
     * @return array<string, string>
     */
    public static function textarea(): array
    {
        return [
            '3xs' => 'min-h-10 px-1.5 py-1 text-ui-3xs',
            '2xs' => 'min-h-12 px-2 py-1 text-ui-2xs',
            'xs' => 'min-h-14 px-2.5 py-1.5 text-xs',
            'sm' => 'min-h-16 px-3 py-1.5 text-sm',
            'md' => 'min-h-20 px-3 py-2 text-sm',
            'lg' => 'min-h-24 px-4 py-2 text-base',
            'xl' => 'min-h-28 px-4 py-2.5 text-lg',
            '2xl' => 'min-h-32 px-5 py-3 text-xl',
            '3xl' => 'min-h-40 px-6 py-3 text-2xl',
        ];
    }

    /**
     * Чекбоксы и радиокнопки: сторона квадрата.
     *
     * @return array<string, string>
     */
    public static function checkbox(): array
    {
        return [
            '3xs' => 'size-3',
            '2xs' => 'size-3.5',
            'xs' => 'size-4',
            'sm' => 'size-4',
            'md' => 'size-5',
            'lg' => 'size-5',
            'xl' => 'size-6',
            '2xl' => 'size-6',
            '3xl' => 'size-7',
        ];
    }

    /**
     * Дорожка переключателя.
     *
     * @return array<string, string>
     */
    /**
     * Отступ справа под шеврон селекта.
     *
     * @return array<string, string>
     */
    public static function selectPadding(): array
    {
        return [
            '3xs' => 'pe-5',
            '2xs' => 'pe-6',
            'xs' => 'pe-6',
            'sm' => 'pe-7',
            'md' => 'pe-8',
            'lg' => 'pe-8',
            'xl' => 'pe-9',
            '2xl' => 'pe-10',
            '3xl' => 'pe-12',
        ];
    }

    /**
     * Положение шеврона относительно края.
     *
     * @return array<string, string>
     */
    public static function selectIcon(): array
    {
        return [
            '3xs' => 'end-1',
            '2xs' => 'end-1.5',
            'xs' => 'end-2',
            'sm' => 'end-2',
            'md' => 'end-2.5',
            'lg' => 'end-2.5',
            'xl' => 'end-3',
            '2xl' => 'end-3',
            '3xl' => 'end-4',
        ];
    }

    public static function toggleTrack(): array
    {
        return [
            '3xs' => 'h-4 w-7',
            '2xs' => 'h-5 w-9',
            'xs' => 'h-5 w-9',
            'sm' => 'h-6 w-11',
            'md' => 'h-7 w-12',
            'lg' => 'h-8 w-14',
            'xl' => 'h-9 w-16',
            '2xl' => 'h-10 w-[4.5rem]',
            '3xl' => 'h-12 w-[5.5rem]',
        ];
    }

    /**
     * Кружок переключателя.
     *
     * @return array<string, string>
     */
    public static function toggleThumb(): array
    {
        return [
            '3xs' => 'size-3',
            '2xs' => 'size-4',
            'xs' => 'size-4',
            'sm' => 'size-5',
            'md' => 'size-6',
            'lg' => 'size-6',
            'xl' => 'size-7',
            '2xl' => 'size-8',
            '3xl' => 'size-10',
        ];
    }

    /**
     * Сдвиг кружка при включении.
     *
     * @return array<string, string>
     */
    public static function toggleShift(): array
    {
        return [
            '3xs' => 'peer-checked:after:translate-x-3',
            '2xs' => 'peer-checked:after:translate-x-4',
            'xs' => 'peer-checked:after:translate-x-4',
            'sm' => 'peer-checked:after:translate-x-5',
            'md' => 'peer-checked:after:translate-x-5',
            'lg' => 'peer-checked:after:translate-x-6',
            'xl' => 'peer-checked:after:translate-x-7',
            '2xl' => 'peer-checked:after:translate-x-8',
            '3xl' => 'peer-checked:after:translate-x-10',
        ];
    }

    /**
     * Дорожка переключателя-бегунка (variant="slider").
     *
     * @return array<string, string>
     */
    /**
     * Толщина полосы прогресса.
     *
     * @return array<string, string>
     */
    /**
     * Круговой прогресс: диаметр.
     *
     * @return array<string, string>
     */
    /**
     * Кегль текста внутри круглых элементов: аватар, круговой прогресс.
     *
     * @return array<string, string>
     */
    /**
     * Точка статуса у аватара: размер зависит от самого аватара.
     *
     * @return array<string, string>
     */
    public static function status(): array
    {
        return [
            '3xs' => 'size-1.5',
            '2xs' => 'size-1.5',
            'xs' => 'size-2',
            'sm' => 'size-2',
            'md' => 'size-2.5',
            'lg' => 'size-2.5',
            'xl' => 'size-3',
            '2xl' => 'size-3',
            '3xl' => 'size-3.5',
        ];
    }

    public static function text(): array
    {
        return [
            '3xs' => 'text-ui-3xs',
            '2xs' => 'text-ui-2xs',
            'xs' => 'text-xs',
            'sm' => 'text-xs',
            'md' => 'text-sm',
            'lg' => 'text-base',
            'xl' => 'text-lg',
            '2xl' => 'text-xl',
            '3xl' => 'text-2xl',
        ];
    }

    public static function progressCircle(): array
    {
        return [
            '3xs' => 'size-6',
            '2xs' => 'size-7',
            'xs' => 'size-8',
            'sm' => 'size-10',
            'md' => 'size-12',
            'lg' => 'size-14',
            'xl' => 'size-16',
            '2xl' => 'size-20',
            '3xl' => 'size-24',
        ];
    }

    /**
     * Толщина полосы прогресса.
     *
     * @return array<string, string>
     */
    public static function progress(): array
    {
        return [
            '3xs' => 'h-0.5',
            '2xs' => 'h-1.5',
            'xs' => 'h-2',
            'sm' => 'h-2',
            'md' => 'h-2.5',
            'lg' => 'h-3',
            'xl' => 'h-4',
            '2xl' => 'h-5',
            '3xl' => 'h-6',
        ];
    }

    public static function sliderTrack(): array
    {
        return [
            '3xs' => 'h-4 w-8',
            '2xs' => 'h-5 w-9',
            'xs' => 'h-5 w-10',
            'sm' => 'h-6 w-11',
            'md' => 'h-7 w-12',
            'lg' => 'h-8 w-14',
            'xl' => 'h-9 w-16',
            '2xl' => 'h-10 w-[4.5rem]',
            '3xl' => 'h-12 w-[5.5rem]',
        ];
    }

    /**
     * Бегунок для variant="slider".
     *
     * @return array<string, string>
     */
    public static function sliderThumb(): array
    {
        return [
            '3xs' => 'after:size-3',
            '2xs' => 'after:size-4',
            'xs' => 'after:size-4',
            'sm' => 'after:size-5',
            'md' => 'after:size-6',
            'lg' => 'after:size-6',
            'xl' => 'after:size-7',
            '2xl' => 'after:size-8',
            '3xl' => 'after:size-10',
        ];
    }

    /**
     * Сдвиг бегунка для variant="slider".
     *
     * @return array<string, string>
     */
    public static function sliderShift(): array
    {
        return [
            '3xs' => 'peer-checked:after:translate-x-4',
            '2xs' => 'peer-checked:after:translate-x-4',
            'xs' => 'peer-checked:after:translate-x-5',
            'sm' => 'peer-checked:after:translate-x-5',
            'md' => 'peer-checked:after:translate-x-5',
            'lg' => 'peer-checked:after:translate-x-6',
            'xl' => 'peer-checked:after:translate-x-7',
            '2xl' => 'peer-checked:after:translate-x-8',
            '3xl' => 'peer-checked:after:translate-x-10',
        ];
    }

    public static function circlePadding(): array
    {
        return [
            '3xs' => 'p-0.5',
            '2xs' => 'p-0.5',
            'xs' => 'p-0.5',
            'sm' => 'p-1',
            'md' => 'p-1',
            'lg' => 'p-1',
            'xl' => 'p-1.5',
            '2xl' => 'p-1.5',
            '3xl' => 'p-2',
        ];
    }

    public static function selectPaddingFor(string $size): string
    {
        return self::selectPadding()[$size] ?? self::selectPadding()['md'];
    }

    public static function selectIconFor(string $size): string
    {
        return self::selectIcon()[$size] ?? self::selectIcon()['md'];
    }

    public static function textareaFor(string $size): string
    {
        return self::textarea()[$size] ?? self::textarea()['md'];
    }

    public static function checkboxFor(string $size): string
    {
        return self::checkbox()[$size] ?? self::checkbox()['md'];
    }

    public static function toggleTrackFor(string $size): string
    {
        return self::toggleTrack()[$size] ?? self::toggleTrack()['md'];
    }

    public static function toggleThumbFor(string $size): string
    {
        return self::toggleThumb()[$size] ?? self::toggleThumb()['md'];
    }

    public static function toggleShiftFor(string $size): string
    {
        return self::toggleShift()[$size] ?? self::toggleShift()['md'];
    }

    public static function statusFor(string $size): string
    {
        return self::status()[$size] ?? self::status()['md'];
    }

    public static function textFor(string $size): string
    {
        return self::text()[$size] ?? self::text()['md'];
    }

    public static function progressCircleFor(string $size): string
    {
        return self::progressCircle()[$size] ?? self::progressCircle()['md'];
    }

    public static function progressCircleTextFor(string $size): string
    {
        return self::textFor($size);
    }

    public static function progressFor(string $size): string
    {
        return self::progress()[$size] ?? self::progress()['md'];
    }

    public static function sliderTrackFor(string $size): string
    {
        return self::sliderTrack()[$size] ?? self::sliderTrack()['md'];
    }

    public static function sliderThumbFor(string $size): string
    {
        return self::sliderThumb()[$size] ?? self::sliderThumb()['md'];
    }

    public static function sliderShiftFor(string $size): string
    {
        return self::sliderShift()[$size] ?? self::sliderShift()['md'];
    }

    public static function circlePaddingFor(string $size): string
    {
        return self::circlePadding()[$size] ?? self::circlePadding()['md'];
    }

    public static function squareFor(string $size): string
    {
        return self::square()[$size] ?? self::square()['md'];
    }

    public static function iconFor(string $size): string
    {
        return self::icon()[$size] ?? self::icon()['md'];
    }

    public static function controlFor(string $size): string
    {
        return self::control()[$size] ?? self::control()['md'];
    }

    public static function paddingFor(string $size): string
    {
        return self::padding()[$size] ?? self::padding()['md'];
    }

    public static function radiusFor(string $size): string
    {
        return self::radius()[$size] ?? self::radius()['sm'];
    }

    public static function badgeFor(string $size): string
    {
        return self::badge()[$size] ?? self::badge()['xs'];
    }

    public static function fieldFor(string $size): string
    {
        return self::field()[$size] ?? self::field()['md'];
    }

    public static function spinnerFor(string $size): string
    {
        return self::spinner()[$size] ?? self::spinner()['md'];
    }
}
