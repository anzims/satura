<?php

declare(strict_types=1);

namespace Anzims\Satura\Support;

/**
 * Цветовые классы компонентов на палитрах Tailwind CSS 4.
 *
 * Имена цветов совпадают с палитрой Tailwind, специальный ключ accent
 * ссылается на токен --ui-accent из темы приложения.
 *
 * Классы записаны буквально, а не собраны из строк: Tailwind сканирует
 * src/ через @source и не увидел бы динамические имена.
 */
final class Colors
{
    /** @var array<string, array<string, string>> */
    private const MAP = [
        'accent' => [
            'solid' => 'bg-ui-accent text-ui-accent-fg hover:opacity-90 focus-visible:outline-ui-accent',
            'soft' => 'bg-ui-accent/15 text-ui-accent hover:bg-ui-accent/25 focus-visible:outline-ui-accent',
            'outline' => 'border border-ui-accent/40 text-ui-accent hover:bg-ui-accent/15 focus-visible:outline-ui-accent',
            'ghost' => 'text-ui-accent hover:bg-ui-accent/10 focus-visible:outline-ui-accent',
            'link' => 'text-ui-accent underline underline-offset-2 hover:opacity-80',
            'tint' => 'bg-ui-accent/15 text-ui-accent border border-ui-accent/20',
        ],
        'red' => [
            'solid' => 'bg-red-600 text-white hover:bg-red-700 focus-visible:outline-red-600',
            'soft' => 'bg-red-100 text-red-800 hover:bg-red-200 dark:bg-red-950 dark:text-red-200 dark:hover:bg-red-900',
            'outline' => 'border border-red-300 text-red-800 hover:bg-red-100 dark:border-red-700 dark:text-red-200 dark:hover:bg-red-950',
            'ghost' => 'text-red-700 hover:bg-red-100 dark:text-red-300 dark:hover:bg-red-950',
            'link' => 'text-red-700 underline underline-offset-2 hover:text-red-900 dark:text-red-300 dark:hover:text-red-100',
            'tint' => 'bg-red-50 text-red-700 border border-red-200 dark:bg-red-950/60 dark:text-red-200 dark:border-red-800',
        ],
        'orange' => [
            'solid' => 'bg-orange-600 text-white hover:bg-orange-700 focus-visible:outline-orange-600',
            'soft' => 'bg-orange-100 text-orange-800 hover:bg-orange-200 dark:bg-orange-950 dark:text-orange-200 dark:hover:bg-orange-900',
            'outline' => 'border border-orange-300 text-orange-800 hover:bg-orange-100 dark:border-orange-700 dark:text-orange-200 dark:hover:bg-orange-950',
            'ghost' => 'text-orange-700 hover:bg-orange-100 dark:text-orange-300 dark:hover:bg-orange-950',
            'link' => 'text-orange-700 underline underline-offset-2 hover:text-orange-900 dark:text-orange-300 dark:hover:text-orange-100',
            'tint' => 'bg-orange-50 text-orange-700 border border-orange-200 dark:bg-orange-950/60 dark:text-orange-200 dark:border-orange-800',
        ],
        'amber' => [
            'solid' => 'bg-amber-500 text-amber-950 hover:bg-amber-400 focus-visible:outline-amber-500',
            'soft' => 'bg-amber-100 text-amber-800 hover:bg-amber-200 dark:bg-amber-950 dark:text-amber-200 dark:hover:bg-amber-900',
            'outline' => 'border border-amber-300 text-amber-800 hover:bg-amber-100 dark:border-amber-700 dark:text-amber-200 dark:hover:bg-amber-950',
            'ghost' => 'text-amber-700 hover:bg-amber-100 dark:text-amber-300 dark:hover:bg-amber-950',
            'link' => 'text-amber-700 underline underline-offset-2 hover:text-amber-900 dark:text-amber-300 dark:hover:text-amber-100',
            'tint' => 'bg-amber-50 text-amber-700 border border-amber-200 dark:bg-amber-950/60 dark:text-amber-200 dark:border-amber-800',
        ],
        'yellow' => [
            'solid' => 'bg-yellow-500 text-yellow-950 hover:bg-yellow-400 focus-visible:outline-yellow-500',
            'soft' => 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200 dark:bg-yellow-950 dark:text-yellow-200 dark:hover:bg-yellow-900',
            'outline' => 'border border-yellow-300 text-yellow-800 hover:bg-yellow-100 dark:border-yellow-700 dark:text-yellow-200 dark:hover:bg-yellow-950',
            'ghost' => 'text-yellow-700 hover:bg-yellow-100 dark:text-yellow-300 dark:hover:bg-yellow-950',
            'link' => 'text-yellow-700 underline underline-offset-2 hover:text-yellow-900 dark:text-yellow-300 dark:hover:text-yellow-100',
            'tint' => 'bg-yellow-50 text-yellow-700 border border-yellow-200 dark:bg-yellow-950/60 dark:text-yellow-200 dark:border-yellow-800',
        ],
        'lime' => [
            'solid' => 'bg-lime-500 text-lime-950 hover:bg-lime-400 focus-visible:outline-lime-500',
            'soft' => 'bg-lime-100 text-lime-800 hover:bg-lime-200 dark:bg-lime-950 dark:text-lime-200 dark:hover:bg-lime-900',
            'outline' => 'border border-lime-300 text-lime-800 hover:bg-lime-100 dark:border-lime-700 dark:text-lime-200 dark:hover:bg-lime-950',
            'ghost' => 'text-lime-700 hover:bg-lime-100 dark:text-lime-300 dark:hover:bg-lime-950',
            'link' => 'text-lime-700 underline underline-offset-2 hover:text-lime-900 dark:text-lime-300 dark:hover:text-lime-100',
            'tint' => 'bg-lime-50 text-lime-700 border border-lime-200 dark:bg-lime-950/60 dark:text-lime-200 dark:border-lime-800',
        ],
        'green' => [
            'solid' => 'bg-green-600 text-white hover:bg-green-700 focus-visible:outline-green-600',
            'soft' => 'bg-green-100 text-green-800 hover:bg-green-200 dark:bg-green-950 dark:text-green-200 dark:hover:bg-green-900',
            'outline' => 'border border-green-300 text-green-800 hover:bg-green-100 dark:border-green-700 dark:text-green-200 dark:hover:bg-green-950',
            'ghost' => 'text-green-700 hover:bg-green-100 dark:text-green-300 dark:hover:bg-green-950',
            'link' => 'text-green-700 underline underline-offset-2 hover:text-green-900 dark:text-green-300 dark:hover:text-green-100',
            'tint' => 'bg-green-50 text-green-700 border border-green-200 dark:bg-green-950/60 dark:text-green-200 dark:border-green-800',
        ],
        'emerald' => [
            'solid' => 'bg-emerald-600 text-white hover:bg-emerald-700 focus-visible:outline-emerald-600',
            'soft' => 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200 dark:bg-emerald-950 dark:text-emerald-200 dark:hover:bg-emerald-900',
            'outline' => 'border border-emerald-300 text-emerald-800 hover:bg-emerald-100 dark:border-emerald-700 dark:text-emerald-200 dark:hover:bg-emerald-950',
            'ghost' => 'text-emerald-700 hover:bg-emerald-100 dark:text-emerald-300 dark:hover:bg-emerald-950',
            'link' => 'text-emerald-700 underline underline-offset-2 hover:text-emerald-900 dark:text-emerald-300 dark:hover:text-emerald-100',
            'tint' => 'bg-emerald-50 text-emerald-700 border border-emerald-200 dark:bg-emerald-950/60 dark:text-emerald-200 dark:border-emerald-800',
        ],
        'teal' => [
            'solid' => 'bg-teal-600 text-white hover:bg-teal-700 focus-visible:outline-teal-600',
            'soft' => 'bg-teal-100 text-teal-800 hover:bg-teal-200 dark:bg-teal-950 dark:text-teal-200 dark:hover:bg-teal-900',
            'outline' => 'border border-teal-300 text-teal-800 hover:bg-teal-100 dark:border-teal-700 dark:text-teal-200 dark:hover:bg-teal-950',
            'ghost' => 'text-teal-700 hover:bg-teal-100 dark:text-teal-300 dark:hover:bg-teal-950',
            'link' => 'text-teal-700 underline underline-offset-2 hover:text-teal-900 dark:text-teal-300 dark:hover:text-teal-100',
            'tint' => 'bg-teal-50 text-teal-700 border border-teal-200 dark:bg-teal-950/60 dark:text-teal-200 dark:border-teal-800',
        ],
        'cyan' => [
            'solid' => 'bg-cyan-600 text-white hover:bg-cyan-700 focus-visible:outline-cyan-600',
            'soft' => 'bg-cyan-100 text-cyan-800 hover:bg-cyan-200 dark:bg-cyan-950 dark:text-cyan-200 dark:hover:bg-cyan-900',
            'outline' => 'border border-cyan-300 text-cyan-800 hover:bg-cyan-100 dark:border-cyan-700 dark:text-cyan-200 dark:hover:bg-cyan-950',
            'ghost' => 'text-cyan-700 hover:bg-cyan-100 dark:text-cyan-300 dark:hover:bg-cyan-950',
            'link' => 'text-cyan-700 underline underline-offset-2 hover:text-cyan-900 dark:text-cyan-300 dark:hover:text-cyan-100',
            'tint' => 'bg-cyan-50 text-cyan-700 border border-cyan-200 dark:bg-cyan-950/60 dark:text-cyan-200 dark:border-cyan-800',
        ],
        'sky' => [
            'solid' => 'bg-sky-600 text-white hover:bg-sky-700 focus-visible:outline-sky-600',
            'soft' => 'bg-sky-100 text-sky-800 hover:bg-sky-200 dark:bg-sky-950 dark:text-sky-200 dark:hover:bg-sky-900',
            'outline' => 'border border-sky-300 text-sky-800 hover:bg-sky-100 dark:border-sky-700 dark:text-sky-200 dark:hover:bg-sky-950',
            'ghost' => 'text-sky-700 hover:bg-sky-100 dark:text-sky-300 dark:hover:bg-sky-950',
            'link' => 'text-sky-700 underline underline-offset-2 hover:text-sky-900 dark:text-sky-300 dark:hover:text-sky-100',
            'tint' => 'bg-sky-50 text-sky-700 border border-sky-200 dark:bg-sky-950/60 dark:text-sky-200 dark:border-sky-800',
        ],
        'blue' => [
            'solid' => 'bg-blue-600 text-white hover:bg-blue-700 focus-visible:outline-blue-600',
            'soft' => 'bg-blue-100 text-blue-800 hover:bg-blue-200 dark:bg-blue-950 dark:text-blue-200 dark:hover:bg-blue-900',
            'outline' => 'border border-blue-300 text-blue-800 hover:bg-blue-100 dark:border-blue-700 dark:text-blue-200 dark:hover:bg-blue-950',
            'ghost' => 'text-blue-700 hover:bg-blue-100 dark:text-blue-300 dark:hover:bg-blue-950',
            'link' => 'text-blue-700 underline underline-offset-2 hover:text-blue-900 dark:text-blue-300 dark:hover:text-blue-100',
            'tint' => 'bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-950/60 dark:text-blue-200 dark:border-blue-800',
        ],
        'indigo' => [
            'solid' => 'bg-indigo-600 text-white hover:bg-indigo-700 focus-visible:outline-indigo-600',
            'soft' => 'bg-indigo-100 text-indigo-800 hover:bg-indigo-200 dark:bg-indigo-950 dark:text-indigo-200 dark:hover:bg-indigo-900',
            'outline' => 'border border-indigo-300 text-indigo-800 hover:bg-indigo-100 dark:border-indigo-700 dark:text-indigo-200 dark:hover:bg-indigo-950',
            'ghost' => 'text-indigo-700 hover:bg-indigo-100 dark:text-indigo-300 dark:hover:bg-indigo-950',
            'link' => 'text-indigo-700 underline underline-offset-2 hover:text-indigo-900 dark:text-indigo-300 dark:hover:text-indigo-100',
            'tint' => 'bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-950/60 dark:text-indigo-200 dark:border-indigo-800',
        ],
        'violet' => [
            'solid' => 'bg-violet-600 text-white hover:bg-violet-700 focus-visible:outline-violet-600',
            'soft' => 'bg-violet-100 text-violet-800 hover:bg-violet-200 dark:bg-violet-950 dark:text-violet-200 dark:hover:bg-violet-900',
            'outline' => 'border border-violet-300 text-violet-800 hover:bg-violet-100 dark:border-violet-700 dark:text-violet-200 dark:hover:bg-violet-950',
            'ghost' => 'text-violet-700 hover:bg-violet-100 dark:text-violet-300 dark:hover:bg-violet-950',
            'link' => 'text-violet-700 underline underline-offset-2 hover:text-violet-900 dark:text-violet-300 dark:hover:text-violet-100',
            'tint' => 'bg-violet-50 text-violet-700 border border-violet-200 dark:bg-violet-950/60 dark:text-violet-200 dark:border-violet-800',
        ],
        'purple' => [
            'solid' => 'bg-purple-600 text-white hover:bg-purple-700 focus-visible:outline-purple-600',
            'soft' => 'bg-purple-100 text-purple-800 hover:bg-purple-200 dark:bg-purple-950 dark:text-purple-200 dark:hover:bg-purple-900',
            'outline' => 'border border-purple-300 text-purple-800 hover:bg-purple-100 dark:border-purple-700 dark:text-purple-200 dark:hover:bg-purple-950',
            'ghost' => 'text-purple-700 hover:bg-purple-100 dark:text-purple-300 dark:hover:bg-purple-950',
            'link' => 'text-purple-700 underline underline-offset-2 hover:text-purple-900 dark:text-purple-300 dark:hover:text-purple-100',
            'tint' => 'bg-purple-50 text-purple-700 border border-purple-200 dark:bg-purple-950/60 dark:text-purple-200 dark:border-purple-800',
        ],
        'fuchsia' => [
            'solid' => 'bg-fuchsia-600 text-white hover:bg-fuchsia-700 focus-visible:outline-fuchsia-600',
            'soft' => 'bg-fuchsia-100 text-fuchsia-800 hover:bg-fuchsia-200 dark:bg-fuchsia-950 dark:text-fuchsia-200 dark:hover:bg-fuchsia-900',
            'outline' => 'border border-fuchsia-300 text-fuchsia-800 hover:bg-fuchsia-100 dark:border-fuchsia-700 dark:text-fuchsia-200 dark:hover:bg-fuchsia-950',
            'ghost' => 'text-fuchsia-700 hover:bg-fuchsia-100 dark:text-fuchsia-300 dark:hover:bg-fuchsia-950',
            'link' => 'text-fuchsia-700 underline underline-offset-2 hover:text-fuchsia-900 dark:text-fuchsia-300 dark:hover:text-fuchsia-100',
            'tint' => 'bg-fuchsia-50 text-fuchsia-700 border border-fuchsia-200 dark:bg-fuchsia-950/60 dark:text-fuchsia-200 dark:border-fuchsia-800',
        ],
        'pink' => [
            'solid' => 'bg-pink-600 text-white hover:bg-pink-700 focus-visible:outline-pink-600',
            'soft' => 'bg-pink-100 text-pink-800 hover:bg-pink-200 dark:bg-pink-950 dark:text-pink-200 dark:hover:bg-pink-900',
            'outline' => 'border border-pink-300 text-pink-800 hover:bg-pink-100 dark:border-pink-700 dark:text-pink-200 dark:hover:bg-pink-950',
            'ghost' => 'text-pink-700 hover:bg-pink-100 dark:text-pink-300 dark:hover:bg-pink-950',
            'link' => 'text-pink-700 underline underline-offset-2 hover:text-pink-900 dark:text-pink-300 dark:hover:text-pink-100',
            'tint' => 'bg-pink-50 text-pink-700 border border-pink-200 dark:bg-pink-950/60 dark:text-pink-200 dark:border-pink-800',
        ],
        'rose' => [
            'solid' => 'bg-rose-600 text-white hover:bg-rose-700 focus-visible:outline-rose-600',
            'soft' => 'bg-rose-100 text-rose-800 hover:bg-rose-200 dark:bg-rose-950 dark:text-rose-200 dark:hover:bg-rose-900',
            'outline' => 'border border-rose-300 text-rose-800 hover:bg-rose-100 dark:border-rose-700 dark:text-rose-200 dark:hover:bg-rose-950',
            'ghost' => 'text-rose-700 hover:bg-rose-100 dark:text-rose-300 dark:hover:bg-rose-950',
            'link' => 'text-rose-700 underline underline-offset-2 hover:text-rose-900 dark:text-rose-300 dark:hover:text-rose-100',
            'tint' => 'bg-rose-50 text-rose-700 border border-rose-200 dark:bg-rose-950/60 dark:text-rose-200 dark:border-rose-800',
        ],
        'slate' => [
            'solid' => 'bg-slate-600 text-white hover:bg-slate-700 focus-visible:outline-slate-600',
            'soft' => 'bg-slate-100 text-slate-800 hover:bg-slate-200 dark:bg-slate-950 dark:text-slate-200 dark:hover:bg-slate-900',
            'outline' => 'border border-slate-300 text-slate-800 hover:bg-slate-100 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-950',
            'ghost' => 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-950',
            'link' => 'text-slate-700 underline underline-offset-2 hover:text-slate-900 dark:text-slate-300 dark:hover:text-slate-100',
            'tint' => 'bg-slate-50 text-slate-700 border border-slate-200 dark:bg-slate-950/60 dark:text-slate-200 dark:border-slate-800',
        ],
        'gray' => [
            'solid' => 'bg-gray-600 text-white hover:bg-gray-700 focus-visible:outline-gray-600',
            'soft' => 'bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-950 dark:text-gray-200 dark:hover:bg-gray-900',
            'outline' => 'border border-gray-300 text-gray-800 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-950',
            'ghost' => 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-950',
            'link' => 'text-gray-700 underline underline-offset-2 hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-100',
            'tint' => 'bg-gray-50 text-gray-700 border border-gray-200 dark:bg-gray-950/60 dark:text-gray-200 dark:border-gray-800',
        ],
        'zinc' => [
            'solid' => 'bg-zinc-600 text-white hover:bg-zinc-700 focus-visible:outline-zinc-600',
            'soft' => 'bg-zinc-100 text-zinc-800 hover:bg-zinc-200 dark:bg-zinc-950 dark:text-zinc-200 dark:hover:bg-zinc-900',
            'outline' => 'border border-zinc-300 text-zinc-800 hover:bg-zinc-100 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-950',
            'ghost' => 'text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-950',
            'link' => 'text-zinc-700 underline underline-offset-2 hover:text-zinc-900 dark:text-zinc-300 dark:hover:text-zinc-100',
            'tint' => 'bg-zinc-50 text-zinc-700 border border-zinc-200 dark:bg-zinc-950/60 dark:text-zinc-200 dark:border-zinc-800',
        ],
        'neutral' => [
            'solid' => 'bg-neutral-600 text-white hover:bg-neutral-700 focus-visible:outline-neutral-600',
            'soft' => 'bg-neutral-100 text-neutral-800 hover:bg-neutral-200 dark:bg-neutral-950 dark:text-neutral-200 dark:hover:bg-neutral-900',
            'outline' => 'border border-neutral-300 text-neutral-800 hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-950',
            'ghost' => 'text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-950',
            'link' => 'text-neutral-700 underline underline-offset-2 hover:text-neutral-900 dark:text-neutral-300 dark:hover:text-neutral-100',
            'tint' => 'bg-neutral-50 text-neutral-700 border border-neutral-200 dark:bg-neutral-950/60 dark:text-neutral-200 dark:border-neutral-800',
        ],
        'stone' => [
            'solid' => 'bg-stone-600 text-white hover:bg-stone-700 focus-visible:outline-stone-600',
            'soft' => 'bg-stone-100 text-stone-800 hover:bg-stone-200 dark:bg-stone-950 dark:text-stone-200 dark:hover:bg-stone-900',
            'outline' => 'border border-stone-300 text-stone-800 hover:bg-stone-100 dark:border-stone-700 dark:text-stone-200 dark:hover:bg-stone-950',
            'ghost' => 'text-stone-700 hover:bg-stone-100 dark:text-stone-300 dark:hover:bg-stone-950',
            'link' => 'text-stone-700 underline underline-offset-2 hover:text-stone-900 dark:text-stone-300 dark:hover:text-stone-100',
            'tint' => 'bg-stone-50 text-stone-700 border border-stone-200 dark:bg-stone-950/60 dark:text-stone-200 dark:border-stone-800',
        ],
        'mauve' => [
            'solid' => 'bg-mauve-600 text-white hover:bg-mauve-700 focus-visible:outline-mauve-600',
            'soft' => 'bg-mauve-100 text-mauve-800 hover:bg-mauve-200 dark:bg-mauve-950 dark:text-mauve-200 dark:hover:bg-mauve-900',
            'outline' => 'border border-mauve-300 text-mauve-800 hover:bg-mauve-100 dark:border-mauve-700 dark:text-mauve-200 dark:hover:bg-mauve-950',
            'ghost' => 'text-mauve-700 hover:bg-mauve-100 dark:text-mauve-300 dark:hover:bg-mauve-950',
            'link' => 'text-mauve-700 underline underline-offset-2 hover:text-mauve-900 dark:text-mauve-300 dark:hover:text-mauve-100',
            'tint' => 'bg-mauve-50 text-mauve-700 border border-mauve-200 dark:bg-mauve-950/60 dark:text-mauve-200 dark:border-mauve-800',
        ],
        'olive' => [
            'solid' => 'bg-olive-600 text-white hover:bg-olive-700 focus-visible:outline-olive-600',
            'soft' => 'bg-olive-100 text-olive-800 hover:bg-olive-200 dark:bg-olive-950 dark:text-olive-200 dark:hover:bg-olive-900',
            'outline' => 'border border-olive-300 text-olive-800 hover:bg-olive-100 dark:border-olive-700 dark:text-olive-200 dark:hover:bg-olive-950',
            'ghost' => 'text-olive-700 hover:bg-olive-100 dark:text-olive-300 dark:hover:bg-olive-950',
            'link' => 'text-olive-700 underline underline-offset-2 hover:text-olive-900 dark:text-olive-300 dark:hover:text-olive-100',
            'tint' => 'bg-olive-50 text-olive-700 border border-olive-200 dark:bg-olive-950/60 dark:text-olive-200 dark:border-olive-800',
        ],
        'mist' => [
            'solid' => 'bg-mist-600 text-white hover:bg-mist-700 focus-visible:outline-mist-600',
            'soft' => 'bg-mist-100 text-mist-800 hover:bg-mist-200 dark:bg-mist-950 dark:text-mist-200 dark:hover:bg-mist-900',
            'outline' => 'border border-mist-300 text-mist-800 hover:bg-mist-100 dark:border-mist-700 dark:text-mist-200 dark:hover:bg-mist-950',
            'ghost' => 'text-mist-700 hover:bg-mist-100 dark:text-mist-300 dark:hover:bg-mist-950',
            'link' => 'text-mist-700 underline underline-offset-2 hover:text-mist-900 dark:text-mist-300 dark:hover:text-mist-100',
            'tint' => 'bg-mist-50 text-mist-700 border border-mist-200 dark:bg-mist-950/60 dark:text-mist-200 dark:border-mist-800',
        ],
        'taupe' => [
            'solid' => 'bg-taupe-600 text-white hover:bg-taupe-700 focus-visible:outline-taupe-600',
            'soft' => 'bg-taupe-100 text-taupe-800 hover:bg-taupe-200 dark:bg-taupe-950 dark:text-taupe-200 dark:hover:bg-taupe-900',
            'outline' => 'border border-taupe-300 text-taupe-800 hover:bg-taupe-100 dark:border-taupe-700 dark:text-taupe-200 dark:hover:bg-taupe-950',
            'ghost' => 'text-taupe-700 hover:bg-taupe-100 dark:text-taupe-300 dark:hover:bg-taupe-950',
            'link' => 'text-taupe-700 underline underline-offset-2 hover:text-taupe-900 dark:text-taupe-300 dark:hover:text-taupe-100',
            'tint' => 'bg-taupe-50 text-taupe-700 border border-taupe-200 dark:bg-taupe-950/60 dark:text-taupe-200 dark:border-taupe-800',
        ],
    ];

    /**
     * Поля ввода: рамка и кольцо фокуса в выбранном цвете.
     *
     * @var array<string, string>
     */
    private const FIELDS = [
        'accent' => 'border-ui-border focus:border-ui-accent focus:ring-ui-accent/30',
        'red' => 'border-red-300 focus:border-red-500 focus:ring-red-500/30 dark:border-red-700 dark:focus:border-red-400 dark:focus:ring-red-400/30',
        'orange' => 'border-orange-300 focus:border-orange-500 focus:ring-orange-500/30 dark:border-orange-700 dark:focus:border-orange-400 dark:focus:ring-orange-400/30',
        'amber' => 'border-amber-300 focus:border-amber-500 focus:ring-amber-500/30 dark:border-amber-700 dark:focus:border-amber-400 dark:focus:ring-amber-400/30',
        'yellow' => 'border-yellow-300 focus:border-yellow-500 focus:ring-yellow-500/30 dark:border-yellow-700 dark:focus:border-yellow-400 dark:focus:ring-yellow-400/30',
        'lime' => 'border-lime-300 focus:border-lime-500 focus:ring-lime-500/30 dark:border-lime-700 dark:focus:border-lime-400 dark:focus:ring-lime-400/30',
        'green' => 'border-green-300 focus:border-green-500 focus:ring-green-500/30 dark:border-green-700 dark:focus:border-green-400 dark:focus:ring-green-400/30',
        'emerald' => 'border-emerald-300 focus:border-emerald-500 focus:ring-emerald-500/30 dark:border-emerald-700 dark:focus:border-emerald-400 dark:focus:ring-emerald-400/30',
        'teal' => 'border-teal-300 focus:border-teal-500 focus:ring-teal-500/30 dark:border-teal-700 dark:focus:border-teal-400 dark:focus:ring-teal-400/30',
        'cyan' => 'border-cyan-300 focus:border-cyan-500 focus:ring-cyan-500/30 dark:border-cyan-700 dark:focus:border-cyan-400 dark:focus:ring-cyan-400/30',
        'sky' => 'border-sky-300 focus:border-sky-500 focus:ring-sky-500/30 dark:border-sky-700 dark:focus:border-sky-400 dark:focus:ring-sky-400/30',
        'blue' => 'border-blue-300 focus:border-blue-500 focus:ring-blue-500/30 dark:border-blue-700 dark:focus:border-blue-400 dark:focus:ring-blue-400/30',
        'indigo' => 'border-indigo-300 focus:border-indigo-500 focus:ring-indigo-500/30 dark:border-indigo-700 dark:focus:border-indigo-400 dark:focus:ring-indigo-400/30',
        'violet' => 'border-violet-300 focus:border-violet-500 focus:ring-violet-500/30 dark:border-violet-700 dark:focus:border-violet-400 dark:focus:ring-violet-400/30',
        'purple' => 'border-purple-300 focus:border-purple-500 focus:ring-purple-500/30 dark:border-purple-700 dark:focus:border-purple-400 dark:focus:ring-purple-400/30',
        'fuchsia' => 'border-fuchsia-300 focus:border-fuchsia-500 focus:ring-fuchsia-500/30 dark:border-fuchsia-700 dark:focus:border-fuchsia-400 dark:focus:ring-fuchsia-400/30',
        'pink' => 'border-pink-300 focus:border-pink-500 focus:ring-pink-500/30 dark:border-pink-700 dark:focus:border-pink-400 dark:focus:ring-pink-400/30',
        'rose' => 'border-rose-300 focus:border-rose-500 focus:ring-rose-500/30 dark:border-rose-700 dark:focus:border-rose-400 dark:focus:ring-rose-400/30',
        'slate' => 'border-slate-300 focus:border-slate-500 focus:ring-slate-500/30 dark:border-slate-700 dark:focus:border-slate-400 dark:focus:ring-slate-400/30',
        'gray' => 'border-gray-300 focus:border-gray-500 focus:ring-gray-500/30 dark:border-gray-700 dark:focus:border-gray-400 dark:focus:ring-gray-400/30',
        'zinc' => 'border-zinc-300 focus:border-zinc-500 focus:ring-zinc-500/30 dark:border-zinc-700 dark:focus:border-zinc-400 dark:focus:ring-zinc-400/30',
        'neutral' => 'border-neutral-300 focus:border-neutral-500 focus:ring-neutral-500/30 dark:border-neutral-700 dark:focus:border-neutral-400 dark:focus:ring-neutral-400/30',
        'stone' => 'border-stone-300 focus:border-stone-500 focus:ring-stone-500/30 dark:border-stone-700 dark:focus:border-stone-400 dark:focus:ring-stone-400/30',
        'mauve' => 'border-mauve-300 focus:border-mauve-500 focus:ring-mauve-500/30 dark:border-mauve-700 dark:focus:border-mauve-400 dark:focus:ring-mauve-400/30',
        'olive' => 'border-olive-300 focus:border-olive-500 focus:ring-olive-500/30 dark:border-olive-700 dark:focus:border-olive-400 dark:focus:ring-olive-400/30',
        'mist' => 'border-mist-300 focus:border-mist-500 focus:ring-mist-500/30 dark:border-mist-700 dark:focus:border-mist-400 dark:focus:ring-mist-400/30',
        'taupe' => 'border-taupe-300 focus:border-taupe-500 focus:ring-taupe-500/30 dark:border-taupe-700 dark:focus:border-taupe-400 dark:focus:ring-taupe-400/30',
    ];

    /**
     * @return array<string, array<string, string>>
     */
    public static function map(): array
    {
        return self::MAP;
    }

    /**
     * @return list<string>
     */
    public static function names(): array
    {
        return array_keys(self::MAP);
    }

    public static function classes(string $color, string $variant): string
    {
        return self::MAP[$color][$variant] ?? '';
    }

    public static function field(string $color): string
    {
        return self::FIELDS[$color] ?? self::FIELDS['accent'];
    }

    /** @var array<string, string> */
    private const ICONS = [
        'accent' => 'text-ui-accent',
        'red' => 'text-red-600 dark:text-red-400',
        'orange' => 'text-orange-600 dark:text-orange-400',
        'amber' => 'text-amber-600 dark:text-amber-400',
        'yellow' => 'text-yellow-600 dark:text-yellow-400',
        'lime' => 'text-lime-600 dark:text-lime-400',
        'green' => 'text-green-600 dark:text-green-400',
        'emerald' => 'text-emerald-600 dark:text-emerald-400',
        'teal' => 'text-teal-600 dark:text-teal-400',
        'cyan' => 'text-cyan-600 dark:text-cyan-400',
        'sky' => 'text-sky-600 dark:text-sky-400',
        'blue' => 'text-blue-600 dark:text-blue-400',
        'indigo' => 'text-indigo-600 dark:text-indigo-400',
        'violet' => 'text-violet-600 dark:text-violet-400',
        'purple' => 'text-purple-600 dark:text-purple-400',
        'fuchsia' => 'text-fuchsia-600 dark:text-fuchsia-400',
        'pink' => 'text-pink-600 dark:text-pink-400',
        'rose' => 'text-rose-600 dark:text-rose-400',
        'slate' => 'text-slate-600 dark:text-slate-400',
        'gray' => 'text-gray-600 dark:text-gray-400',
        'zinc' => 'text-zinc-600 dark:text-zinc-400',
        'neutral' => 'text-neutral-600 dark:text-neutral-400',
        'stone' => 'text-stone-600 dark:text-stone-400',
        'mauve' => 'text-mauve-600 dark:text-mauve-400',
        'olive' => 'text-olive-600 dark:text-olive-400',
        'mist' => 'text-mist-600 dark:text-mist-400',
        'taupe' => 'text-taupe-600 dark:text-taupe-400',
    ];

    /** @var array<string, string> */
    private const CIRCLES = [
        'accent' => 'bg-ui-accent/15 text-ui-accent',
        'red' => 'bg-red-100 text-red-700 dark:bg-red-950 dark:text-red-300',
        'orange' => 'bg-orange-100 text-orange-700 dark:bg-orange-950 dark:text-orange-300',
        'amber' => 'bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-300',
        'yellow' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-950 dark:text-yellow-300',
        'lime' => 'bg-lime-100 text-lime-700 dark:bg-lime-950 dark:text-lime-300',
        'green' => 'bg-green-100 text-green-700 dark:bg-green-950 dark:text-green-300',
        'emerald' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-300',
        'teal' => 'bg-teal-100 text-teal-700 dark:bg-teal-950 dark:text-teal-300',
        'cyan' => 'bg-cyan-100 text-cyan-700 dark:bg-cyan-950 dark:text-cyan-300',
        'sky' => 'bg-sky-100 text-sky-700 dark:bg-sky-950 dark:text-sky-300',
        'blue' => 'bg-blue-100 text-blue-700 dark:bg-blue-950 dark:text-blue-300',
        'indigo' => 'bg-indigo-100 text-indigo-700 dark:bg-indigo-950 dark:text-indigo-300',
        'violet' => 'bg-violet-100 text-violet-700 dark:bg-violet-950 dark:text-violet-300',
        'purple' => 'bg-purple-100 text-purple-700 dark:bg-purple-950 dark:text-purple-300',
        'fuchsia' => 'bg-fuchsia-100 text-fuchsia-700 dark:bg-fuchsia-950 dark:text-fuchsia-300',
        'pink' => 'bg-pink-100 text-pink-700 dark:bg-pink-950 dark:text-pink-300',
        'rose' => 'bg-rose-100 text-rose-700 dark:bg-rose-950 dark:text-rose-300',
        'slate' => 'bg-slate-100 text-slate-700 dark:bg-slate-950 dark:text-slate-300',
        'gray' => 'bg-gray-100 text-gray-700 dark:bg-gray-950 dark:text-gray-300',
        'zinc' => 'bg-zinc-100 text-zinc-700 dark:bg-zinc-950 dark:text-zinc-300',
        'neutral' => 'bg-neutral-100 text-neutral-700 dark:bg-neutral-950 dark:text-neutral-300',
        'stone' => 'bg-stone-100 text-stone-700 dark:bg-stone-950 dark:text-stone-300',
        'mauve' => 'bg-mauve-100 text-mauve-700 dark:bg-mauve-950 dark:text-mauve-300',
        'olive' => 'bg-olive-100 text-olive-700 dark:bg-olive-950 dark:text-olive-300',
        'mist' => 'bg-mist-100 text-mist-700 dark:bg-mist-950 dark:text-mist-300',
        'taupe' => 'bg-taupe-100 text-taupe-700 dark:bg-taupe-950 dark:text-taupe-300',
    ];

    /** @var array<string, string> */
    private const LINES = [
        'accent' => 'border-ui-border',
        'red' => 'border-red-200 dark:border-red-800',
        'orange' => 'border-orange-200 dark:border-orange-800',
        'amber' => 'border-amber-200 dark:border-amber-800',
        'yellow' => 'border-yellow-200 dark:border-yellow-800',
        'lime' => 'border-lime-200 dark:border-lime-800',
        'green' => 'border-green-200 dark:border-green-800',
        'emerald' => 'border-emerald-200 dark:border-emerald-800',
        'teal' => 'border-teal-200 dark:border-teal-800',
        'cyan' => 'border-cyan-200 dark:border-cyan-800',
        'sky' => 'border-sky-200 dark:border-sky-800',
        'blue' => 'border-blue-200 dark:border-blue-800',
        'indigo' => 'border-indigo-200 dark:border-indigo-800',
        'violet' => 'border-violet-200 dark:border-violet-800',
        'purple' => 'border-purple-200 dark:border-purple-800',
        'fuchsia' => 'border-fuchsia-200 dark:border-fuchsia-800',
        'pink' => 'border-pink-200 dark:border-pink-800',
        'rose' => 'border-rose-200 dark:border-rose-800',
        'slate' => 'border-slate-200 dark:border-slate-800',
        'gray' => 'border-gray-200 dark:border-gray-800',
        'zinc' => 'border-zinc-200 dark:border-zinc-800',
        'neutral' => 'border-neutral-200 dark:border-neutral-800',
        'stone' => 'border-stone-200 dark:border-stone-800',
        'mauve' => 'border-mauve-200 dark:border-mauve-800',
        'olive' => 'border-olive-200 dark:border-olive-800',
        'mist' => 'border-mist-200 dark:border-mist-800',
        'taupe' => 'border-taupe-200 dark:border-taupe-800',
    ];

    public static function icon(string $color): string
    {
        return self::ICONS[$color] ?? self::ICONS['accent'];
    }

    public static function circle(string $color): string
    {
        return self::CIRCLES[$color] ?? self::CIRCLES['accent'];
    }

    public static function line(string $color): string
    {
        return self::LINES[$color] ?? self::LINES['accent'];
    }

    /** @var array<string, string> */
    private const CIRCLES_OUTLINE = [
        'accent' => 'border border-ui-accent/40 text-ui-accent',
        'red' => 'border border-red-300 text-red-700 dark:border-red-700 dark:text-red-300',
        'orange' => 'border border-orange-300 text-orange-700 dark:border-orange-700 dark:text-orange-300',
        'amber' => 'border border-amber-300 text-amber-700 dark:border-amber-700 dark:text-amber-300',
        'yellow' => 'border border-yellow-300 text-yellow-700 dark:border-yellow-700 dark:text-yellow-300',
        'lime' => 'border border-lime-300 text-lime-700 dark:border-lime-700 dark:text-lime-300',
        'green' => 'border border-green-300 text-green-700 dark:border-green-700 dark:text-green-300',
        'emerald' => 'border border-emerald-300 text-emerald-700 dark:border-emerald-700 dark:text-emerald-300',
        'teal' => 'border border-teal-300 text-teal-700 dark:border-teal-700 dark:text-teal-300',
        'cyan' => 'border border-cyan-300 text-cyan-700 dark:border-cyan-700 dark:text-cyan-300',
        'sky' => 'border border-sky-300 text-sky-700 dark:border-sky-700 dark:text-sky-300',
        'blue' => 'border border-blue-300 text-blue-700 dark:border-blue-700 dark:text-blue-300',
        'indigo' => 'border border-indigo-300 text-indigo-700 dark:border-indigo-700 dark:text-indigo-300',
        'violet' => 'border border-violet-300 text-violet-700 dark:border-violet-700 dark:text-violet-300',
        'purple' => 'border border-purple-300 text-purple-700 dark:border-purple-700 dark:text-purple-300',
        'fuchsia' => 'border border-fuchsia-300 text-fuchsia-700 dark:border-fuchsia-700 dark:text-fuchsia-300',
        'pink' => 'border border-pink-300 text-pink-700 dark:border-pink-700 dark:text-pink-300',
        'rose' => 'border border-rose-300 text-rose-700 dark:border-rose-700 dark:text-rose-300',
        'slate' => 'border border-slate-300 text-slate-700 dark:border-slate-700 dark:text-slate-300',
        'gray' => 'border border-gray-300 text-gray-700 dark:border-gray-700 dark:text-gray-300',
        'zinc' => 'border border-zinc-300 text-zinc-700 dark:border-zinc-700 dark:text-zinc-300',
        'neutral' => 'border border-neutral-300 text-neutral-700 dark:border-neutral-700 dark:text-neutral-300',
        'stone' => 'border border-stone-300 text-stone-700 dark:border-stone-700 dark:text-stone-300',
        'mauve' => 'border border-mauve-300 text-mauve-700 dark:border-mauve-700 dark:text-mauve-300',
        'olive' => 'border border-olive-300 text-olive-700 dark:border-olive-700 dark:text-olive-300',
        'mist' => 'border border-mist-300 text-mist-700 dark:border-mist-700 dark:text-mist-300',
        'taupe' => 'border border-taupe-300 text-taupe-700 dark:border-taupe-700 dark:text-taupe-300',
    ];

    /** @var array<string, string> */
    private const SKELETONS = [
        'accent' => 'bg-ui-accent/15',
        'red' => 'bg-red-100 dark:bg-red-900',
        'orange' => 'bg-orange-100 dark:bg-orange-900',
        'amber' => 'bg-amber-100 dark:bg-amber-900',
        'yellow' => 'bg-yellow-100 dark:bg-yellow-900',
        'lime' => 'bg-lime-100 dark:bg-lime-900',
        'green' => 'bg-green-100 dark:bg-green-900',
        'emerald' => 'bg-emerald-100 dark:bg-emerald-900',
        'teal' => 'bg-teal-100 dark:bg-teal-900',
        'cyan' => 'bg-cyan-100 dark:bg-cyan-900',
        'sky' => 'bg-sky-100 dark:bg-sky-900',
        'blue' => 'bg-blue-100 dark:bg-blue-900',
        'indigo' => 'bg-indigo-100 dark:bg-indigo-900',
        'violet' => 'bg-violet-100 dark:bg-violet-900',
        'purple' => 'bg-purple-100 dark:bg-purple-900',
        'fuchsia' => 'bg-fuchsia-100 dark:bg-fuchsia-900',
        'pink' => 'bg-pink-100 dark:bg-pink-900',
        'rose' => 'bg-rose-100 dark:bg-rose-900',
        'slate' => 'bg-slate-100 dark:bg-slate-900',
        'gray' => 'bg-gray-100 dark:bg-gray-900',
        'zinc' => 'bg-zinc-100 dark:bg-zinc-900',
        'neutral' => 'bg-neutral-100 dark:bg-neutral-900',
        'stone' => 'bg-stone-100 dark:bg-stone-900',
        'mauve' => 'bg-mauve-100 dark:bg-mauve-900',
        'olive' => 'bg-olive-100 dark:bg-olive-900',
        'mist' => 'bg-mist-100 dark:bg-mist-900',
        'taupe' => 'bg-taupe-100 dark:bg-taupe-900',
    ];

    public static function circleOutline(string $color): string
    {
        return self::CIRCLES_OUTLINE[$color] ?? self::CIRCLES_OUTLINE['accent'];
    }

    public static function skeleton(string $color): string
    {
        return self::SKELETONS[$color] ?? self::SKELETONS['accent'];
    }

    /** @var array<string, string> */
    private const ACCENTS = [
        'accent' => 'accent-ui-accent',
        'red' => 'accent-red-600',
        'orange' => 'accent-orange-600',
        'amber' => 'accent-amber-600',
        'yellow' => 'accent-yellow-600',
        'lime' => 'accent-lime-600',
        'green' => 'accent-green-600',
        'emerald' => 'accent-emerald-600',
        'teal' => 'accent-teal-600',
        'cyan' => 'accent-cyan-600',
        'sky' => 'accent-sky-600',
        'blue' => 'accent-blue-600',
        'indigo' => 'accent-indigo-600',
        'violet' => 'accent-violet-600',
        'purple' => 'accent-purple-600',
        'fuchsia' => 'accent-fuchsia-600',
        'pink' => 'accent-pink-600',
        'rose' => 'accent-rose-600',
        'slate' => 'accent-slate-600',
        'gray' => 'accent-gray-600',
        'zinc' => 'accent-zinc-600',
        'neutral' => 'accent-neutral-600',
        'stone' => 'accent-stone-600',
        'mauve' => 'accent-mauve-600',
        'olive' => 'accent-olive-600',
        'mist' => 'accent-mist-600',
        'taupe' => 'accent-taupe-600',
    ];

    /** @var array<string, string> */
    private const TOGGLES = [
        'accent' => 'peer-checked:bg-ui-accent',
        'red' => 'peer-checked:bg-red-600 dark:peer-checked:bg-red-500',
        'orange' => 'peer-checked:bg-orange-600 dark:peer-checked:bg-orange-500',
        'amber' => 'peer-checked:bg-amber-600 dark:peer-checked:bg-amber-500',
        'yellow' => 'peer-checked:bg-yellow-600 dark:peer-checked:bg-yellow-500',
        'lime' => 'peer-checked:bg-lime-600 dark:peer-checked:bg-lime-500',
        'green' => 'peer-checked:bg-green-600 dark:peer-checked:bg-green-500',
        'emerald' => 'peer-checked:bg-emerald-600 dark:peer-checked:bg-emerald-500',
        'teal' => 'peer-checked:bg-teal-600 dark:peer-checked:bg-teal-500',
        'cyan' => 'peer-checked:bg-cyan-600 dark:peer-checked:bg-cyan-500',
        'sky' => 'peer-checked:bg-sky-600 dark:peer-checked:bg-sky-500',
        'blue' => 'peer-checked:bg-blue-600 dark:peer-checked:bg-blue-500',
        'indigo' => 'peer-checked:bg-indigo-600 dark:peer-checked:bg-indigo-500',
        'violet' => 'peer-checked:bg-violet-600 dark:peer-checked:bg-violet-500',
        'purple' => 'peer-checked:bg-purple-600 dark:peer-checked:bg-purple-500',
        'fuchsia' => 'peer-checked:bg-fuchsia-600 dark:peer-checked:bg-fuchsia-500',
        'pink' => 'peer-checked:bg-pink-600 dark:peer-checked:bg-pink-500',
        'rose' => 'peer-checked:bg-rose-600 dark:peer-checked:bg-rose-500',
        'slate' => 'peer-checked:bg-slate-600 dark:peer-checked:bg-slate-500',
        'gray' => 'peer-checked:bg-gray-600 dark:peer-checked:bg-gray-500',
        'zinc' => 'peer-checked:bg-zinc-600 dark:peer-checked:bg-zinc-500',
        'neutral' => 'peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-500',
        'stone' => 'peer-checked:bg-stone-600 dark:peer-checked:bg-stone-500',
        'mauve' => 'peer-checked:bg-mauve-600 dark:peer-checked:bg-mauve-500',
        'olive' => 'peer-checked:bg-olive-600 dark:peer-checked:bg-olive-500',
        'mist' => 'peer-checked:bg-mist-600 dark:peer-checked:bg-mist-500',
        'taupe' => 'peer-checked:bg-taupe-600 dark:peer-checked:bg-taupe-500',
    ];

    public static function accent(string $color): string
    {
        return self::ACCENTS[$color] ?? self::ACCENTS['accent'];
    }

    public static function toggle(string $color): string
    {
        return self::TOGGLES[$color] ?? self::TOGGLES['accent'];
    }

    /** @var array<string, string> */
    private const TOGGLES_OFF = [
        'accent' => 'bg-ui-accent',
        'red' => 'bg-red-600 dark:bg-red-500',
        'orange' => 'bg-orange-600 dark:bg-orange-500',
        'amber' => 'bg-amber-600 dark:bg-amber-500',
        'yellow' => 'bg-yellow-600 dark:bg-yellow-500',
        'lime' => 'bg-lime-600 dark:bg-lime-500',
        'green' => 'bg-green-600 dark:bg-green-500',
        'emerald' => 'bg-emerald-600 dark:bg-emerald-500',
        'teal' => 'bg-teal-600 dark:bg-teal-500',
        'cyan' => 'bg-cyan-600 dark:bg-cyan-500',
        'sky' => 'bg-sky-600 dark:bg-sky-500',
        'blue' => 'bg-blue-600 dark:bg-blue-500',
        'indigo' => 'bg-indigo-600 dark:bg-indigo-500',
        'violet' => 'bg-violet-600 dark:bg-violet-500',
        'purple' => 'bg-purple-600 dark:bg-purple-500',
        'fuchsia' => 'bg-fuchsia-600 dark:bg-fuchsia-500',
        'pink' => 'bg-pink-600 dark:bg-pink-500',
        'rose' => 'bg-rose-600 dark:bg-rose-500',
        'slate' => 'bg-slate-600 dark:bg-slate-500',
        'gray' => 'bg-gray-600 dark:bg-gray-500',
        'zinc' => 'bg-zinc-600 dark:bg-zinc-500',
        'neutral' => 'bg-neutral-600 dark:bg-neutral-500',
        'stone' => 'bg-stone-600 dark:bg-stone-500',
        'mauve' => 'bg-mauve-600 dark:bg-mauve-500',
        'olive' => 'bg-olive-600 dark:bg-olive-500',
        'mist' => 'bg-mist-600 dark:bg-mist-500',
        'taupe' => 'bg-taupe-600 dark:bg-taupe-500',
    ];

    public static function toggleOff(string $color): string
    {
        return self::TOGGLES_OFF[$color] ?? self::TOGGLES_OFF['accent'];
    }

    /**
     * Сплошная заливка цвета: прогресс, полоски, индикаторы.
     */
    public static function solid(string $color): string
    {
        return self::toggleOff($color);
    }

    /** @var array<string, string> */
    private const STROKES = [
        'accent' => 'stroke-ui-accent',
        'red' => 'stroke-red-600 dark:stroke-red-500',
        'orange' => 'stroke-orange-600 dark:stroke-orange-500',
        'amber' => 'stroke-amber-600 dark:stroke-amber-500',
        'yellow' => 'stroke-yellow-600 dark:stroke-yellow-500',
        'lime' => 'stroke-lime-600 dark:stroke-lime-500',
        'green' => 'stroke-green-600 dark:stroke-green-500',
        'emerald' => 'stroke-emerald-600 dark:stroke-emerald-500',
        'teal' => 'stroke-teal-600 dark:stroke-teal-500',
        'cyan' => 'stroke-cyan-600 dark:stroke-cyan-500',
        'sky' => 'stroke-sky-600 dark:stroke-sky-500',
        'blue' => 'stroke-blue-600 dark:stroke-blue-500',
        'indigo' => 'stroke-indigo-600 dark:stroke-indigo-500',
        'violet' => 'stroke-violet-600 dark:stroke-violet-500',
        'purple' => 'stroke-purple-600 dark:stroke-purple-500',
        'fuchsia' => 'stroke-fuchsia-600 dark:stroke-fuchsia-500',
        'pink' => 'stroke-pink-600 dark:stroke-pink-500',
        'rose' => 'stroke-rose-600 dark:stroke-rose-500',
        'slate' => 'stroke-slate-600 dark:stroke-slate-500',
        'gray' => 'stroke-gray-600 dark:stroke-gray-500',
        'zinc' => 'stroke-zinc-600 dark:stroke-zinc-500',
        'neutral' => 'stroke-neutral-600 dark:stroke-neutral-500',
        'stone' => 'stroke-stone-600 dark:stroke-stone-500',
        'mauve' => 'stroke-mauve-600 dark:stroke-mauve-500',
        'olive' => 'stroke-olive-600 dark:stroke-olive-500',
        'mist' => 'stroke-mist-600 dark:stroke-mist-500',
        'taupe' => 'stroke-taupe-600 dark:stroke-taupe-500',
    ];

    public static function stroke(string $color): string
    {
        return self::STROKES[$color] ?? self::STROKES['accent'];
    }

    /** @var array<string, string> */
    private const STATUSES = [
        'online' => 'bg-green-500',
        'away' => 'bg-amber-500',
        'busy' => 'bg-red-500',
        'offline' => 'bg-neutral-400 dark:bg-neutral-500',
    ];

    public static function status(string $status): string
    {
        return self::STATUSES[$status] ?? self::STATUSES['offline'];
    }

    /** @var array<string, string> */
    private const STEP_DONE = [
        'accent' => 'bg-ui-accent text-ui-accent-fg',
        'red' => 'bg-red-600 text-white dark:bg-red-500 dark:text-red-950',
        'orange' => 'bg-orange-600 text-white dark:bg-orange-500 dark:text-orange-950',
        'amber' => 'bg-amber-600 text-white dark:bg-amber-500 dark:text-amber-950',
        'yellow' => 'bg-yellow-600 text-white dark:bg-yellow-500 dark:text-yellow-950',
        'lime' => 'bg-lime-600 text-white dark:bg-lime-500 dark:text-lime-950',
        'green' => 'bg-green-600 text-white dark:bg-green-500 dark:text-green-950',
        'emerald' => 'bg-emerald-600 text-white dark:bg-emerald-500 dark:text-emerald-950',
        'teal' => 'bg-teal-600 text-white dark:bg-teal-500 dark:text-teal-950',
        'cyan' => 'bg-cyan-600 text-white dark:bg-cyan-500 dark:text-cyan-950',
        'sky' => 'bg-sky-600 text-white dark:bg-sky-500 dark:text-sky-950',
        'blue' => 'bg-blue-600 text-white dark:bg-blue-500 dark:text-blue-950',
        'indigo' => 'bg-indigo-600 text-white dark:bg-indigo-500 dark:text-indigo-950',
        'violet' => 'bg-violet-600 text-white dark:bg-violet-500 dark:text-violet-950',
        'purple' => 'bg-purple-600 text-white dark:bg-purple-500 dark:text-purple-950',
        'fuchsia' => 'bg-fuchsia-600 text-white dark:bg-fuchsia-500 dark:text-fuchsia-950',
        'pink' => 'bg-pink-600 text-white dark:bg-pink-500 dark:text-pink-950',
        'rose' => 'bg-rose-600 text-white dark:bg-rose-500 dark:text-rose-950',
        'slate' => 'bg-slate-600 text-white dark:bg-slate-500 dark:text-slate-950',
        'gray' => 'bg-gray-600 text-white dark:bg-gray-500 dark:text-gray-950',
        'zinc' => 'bg-zinc-600 text-white dark:bg-zinc-500 dark:text-zinc-950',
        'neutral' => 'bg-neutral-600 text-white dark:bg-neutral-500 dark:text-neutral-950',
        'stone' => 'bg-stone-600 text-white dark:bg-stone-500 dark:text-stone-950',
        'mauve' => 'bg-mauve-600 text-white dark:bg-mauve-500 dark:text-mauve-950',
        'olive' => 'bg-olive-600 text-white dark:bg-olive-500 dark:text-olive-950',
        'mist' => 'bg-mist-600 text-white dark:bg-mist-500 dark:text-mist-950',
        'taupe' => 'bg-taupe-600 text-white dark:bg-taupe-500 dark:text-taupe-950',
    ];

    /** @var array<string, string> */
    private const STEP_CURRENT = [
        'accent' => 'border-ui-accent text-ui-accent',
        'red' => 'border-red-600 text-red-700 dark:border-red-400 dark:text-red-300',
        'orange' => 'border-orange-600 text-orange-700 dark:border-orange-400 dark:text-orange-300',
        'amber' => 'border-amber-600 text-amber-700 dark:border-amber-400 dark:text-amber-300',
        'yellow' => 'border-yellow-600 text-yellow-700 dark:border-yellow-400 dark:text-yellow-300',
        'lime' => 'border-lime-600 text-lime-700 dark:border-lime-400 dark:text-lime-300',
        'green' => 'border-green-600 text-green-700 dark:border-green-400 dark:text-green-300',
        'emerald' => 'border-emerald-600 text-emerald-700 dark:border-emerald-400 dark:text-emerald-300',
        'teal' => 'border-teal-600 text-teal-700 dark:border-teal-400 dark:text-teal-300',
        'cyan' => 'border-cyan-600 text-cyan-700 dark:border-cyan-400 dark:text-cyan-300',
        'sky' => 'border-sky-600 text-sky-700 dark:border-sky-400 dark:text-sky-300',
        'blue' => 'border-blue-600 text-blue-700 dark:border-blue-400 dark:text-blue-300',
        'indigo' => 'border-indigo-600 text-indigo-700 dark:border-indigo-400 dark:text-indigo-300',
        'violet' => 'border-violet-600 text-violet-700 dark:border-violet-400 dark:text-violet-300',
        'purple' => 'border-purple-600 text-purple-700 dark:border-purple-400 dark:text-purple-300',
        'fuchsia' => 'border-fuchsia-600 text-fuchsia-700 dark:border-fuchsia-400 dark:text-fuchsia-300',
        'pink' => 'border-pink-600 text-pink-700 dark:border-pink-400 dark:text-pink-300',
        'rose' => 'border-rose-600 text-rose-700 dark:border-rose-400 dark:text-rose-300',
        'slate' => 'border-slate-600 text-slate-700 dark:border-slate-400 dark:text-slate-300',
        'gray' => 'border-gray-600 text-gray-700 dark:border-gray-400 dark:text-gray-300',
        'zinc' => 'border-zinc-600 text-zinc-700 dark:border-zinc-400 dark:text-zinc-300',
        'neutral' => 'border-neutral-600 text-neutral-700 dark:border-neutral-400 dark:text-neutral-300',
        'stone' => 'border-stone-600 text-stone-700 dark:border-stone-400 dark:text-stone-300',
        'mauve' => 'border-mauve-600 text-mauve-700 dark:border-mauve-400 dark:text-mauve-300',
        'olive' => 'border-olive-600 text-olive-700 dark:border-olive-400 dark:text-olive-300',
        'mist' => 'border-mist-600 text-mist-700 dark:border-mist-400 dark:text-mist-300',
        'taupe' => 'border-taupe-600 text-taupe-700 dark:border-taupe-400 dark:text-taupe-300',
    ];

    /** @var array<string, string> */
    private const TAB_BORDER = [
        'accent' => 'border-ui-accent',
        'red' => 'border-red-600 dark:border-red-400',
        'orange' => 'border-orange-600 dark:border-orange-400',
        'amber' => 'border-amber-600 dark:border-amber-400',
        'yellow' => 'border-yellow-600 dark:border-yellow-400',
        'lime' => 'border-lime-600 dark:border-lime-400',
        'green' => 'border-green-600 dark:border-green-400',
        'emerald' => 'border-emerald-600 dark:border-emerald-400',
        'teal' => 'border-teal-600 dark:border-teal-400',
        'cyan' => 'border-cyan-600 dark:border-cyan-400',
        'sky' => 'border-sky-600 dark:border-sky-400',
        'blue' => 'border-blue-600 dark:border-blue-400',
        'indigo' => 'border-indigo-600 dark:border-indigo-400',
        'violet' => 'border-violet-600 dark:border-violet-400',
        'purple' => 'border-purple-600 dark:border-purple-400',
        'fuchsia' => 'border-fuchsia-600 dark:border-fuchsia-400',
        'pink' => 'border-pink-600 dark:border-pink-400',
        'rose' => 'border-rose-600 dark:border-rose-400',
        'slate' => 'border-slate-600 dark:border-slate-400',
        'gray' => 'border-gray-600 dark:border-gray-400',
        'zinc' => 'border-zinc-600 dark:border-zinc-400',
        'neutral' => 'border-neutral-600 dark:border-neutral-400',
        'stone' => 'border-stone-600 dark:border-stone-400',
        'mauve' => 'border-mauve-600 dark:border-mauve-400',
        'olive' => 'border-olive-600 dark:border-olive-400',
        'mist' => 'border-mist-600 dark:border-mist-400',
        'taupe' => 'border-taupe-600 dark:border-taupe-400',
    ];

    /** @var array<string, string> */
    private const TAB_TEXT = [
        'accent' => 'text-ui-accent',
        'red' => 'text-red-700 dark:text-red-300',
        'orange' => 'text-orange-700 dark:text-orange-300',
        'amber' => 'text-amber-700 dark:text-amber-300',
        'yellow' => 'text-yellow-700 dark:text-yellow-300',
        'lime' => 'text-lime-700 dark:text-lime-300',
        'green' => 'text-green-700 dark:text-green-300',
        'emerald' => 'text-emerald-700 dark:text-emerald-300',
        'teal' => 'text-teal-700 dark:text-teal-300',
        'cyan' => 'text-cyan-700 dark:text-cyan-300',
        'sky' => 'text-sky-700 dark:text-sky-300',
        'blue' => 'text-blue-700 dark:text-blue-300',
        'indigo' => 'text-indigo-700 dark:text-indigo-300',
        'violet' => 'text-violet-700 dark:text-violet-300',
        'purple' => 'text-purple-700 dark:text-purple-300',
        'fuchsia' => 'text-fuchsia-700 dark:text-fuchsia-300',
        'pink' => 'text-pink-700 dark:text-pink-300',
        'rose' => 'text-rose-700 dark:text-rose-300',
        'slate' => 'text-slate-700 dark:text-slate-300',
        'gray' => 'text-gray-700 dark:text-gray-300',
        'zinc' => 'text-zinc-700 dark:text-zinc-300',
        'neutral' => 'text-neutral-700 dark:text-neutral-300',
        'stone' => 'text-stone-700 dark:text-stone-300',
        'mauve' => 'text-mauve-700 dark:text-mauve-300',
        'olive' => 'text-olive-700 dark:text-olive-300',
        'mist' => 'text-mist-700 dark:text-mist-300',
        'taupe' => 'text-taupe-700 dark:text-taupe-300',
    ];

    public static function stepDone(string $color): string
    {
        return self::STEP_DONE[$color] ?? self::STEP_DONE['accent'];
    }

    public static function stepCurrent(string $color): string
    {
        return self::STEP_CURRENT[$color] ?? self::STEP_CURRENT['accent'];
    }

    public static function tabBorder(string $color): string
    {
        return self::TAB_BORDER[$color] ?? self::TAB_BORDER['accent'];
    }

    public static function tabText(string $color): string
    {
        return self::TAB_TEXT[$color] ?? self::TAB_TEXT['accent'];
    }

    /** @var array<string, string> */
    private const ITEM_TEXT = [
        'accent' => 'text-ui-accent',
        'red' => 'text-red-600 dark:text-red-500',
        'orange' => 'text-orange-600 dark:text-orange-500',
        'amber' => 'text-amber-600 dark:text-amber-500',
        'yellow' => 'text-yellow-600 dark:text-yellow-500',
        'lime' => 'text-lime-600 dark:text-lime-500',
        'green' => 'text-green-600 dark:text-green-500',
        'emerald' => 'text-emerald-600 dark:text-emerald-500',
        'teal' => 'text-teal-600 dark:text-teal-500',
        'cyan' => 'text-cyan-600 dark:text-cyan-500',
        'sky' => 'text-sky-600 dark:text-sky-500',
        'blue' => 'text-blue-600 dark:text-blue-500',
        'indigo' => 'text-indigo-600 dark:text-indigo-500',
        'violet' => 'text-violet-600 dark:text-violet-500',
        'purple' => 'text-purple-600 dark:text-purple-500',
        'fuchsia' => 'text-fuchsia-600 dark:text-fuchsia-500',
        'pink' => 'text-pink-600 dark:text-pink-500',
        'rose' => 'text-rose-600 dark:text-rose-500',
        'slate' => 'text-slate-600 dark:text-slate-500',
        'gray' => 'text-gray-600 dark:text-gray-500',
        'zinc' => 'text-zinc-600 dark:text-zinc-500',
        'neutral' => 'text-neutral-600 dark:text-neutral-500',
        'stone' => 'text-stone-600 dark:text-stone-500',
        'mauve' => 'text-mauve-600 dark:text-mauve-500',
        'olive' => 'text-olive-600 dark:text-olive-500',
        'mist' => 'text-mist-600 dark:text-mist-500',
        'taupe' => 'text-taupe-600 dark:text-taupe-500',
    ];

    public static function itemText(string $color): string
    {
        return self::ITEM_TEXT[$color] ?? self::ITEM_TEXT['accent'];
    }

    /** @var array<string, string> */
    private const HIGHLIGHTS = [
        'accent' => 'bg-ui-accent/20 text-ui-accent',
        'red' => 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-200',
        'orange' => 'bg-orange-100 text-orange-700 dark:bg-orange-900 dark:text-orange-200',
        'amber' => 'bg-amber-100 text-amber-700 dark:bg-amber-900 dark:text-amber-200',
        'yellow' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-200',
        'lime' => 'bg-lime-100 text-lime-700 dark:bg-lime-900 dark:text-lime-200',
        'green' => 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-200',
        'emerald' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-200',
        'teal' => 'bg-teal-100 text-teal-700 dark:bg-teal-900 dark:text-teal-200',
        'cyan' => 'bg-cyan-100 text-cyan-700 dark:bg-cyan-900 dark:text-cyan-200',
        'sky' => 'bg-sky-100 text-sky-700 dark:bg-sky-900 dark:text-sky-200',
        'blue' => 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200',
        'indigo' => 'bg-indigo-100 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200',
        'violet' => 'bg-violet-100 text-violet-700 dark:bg-violet-900 dark:text-violet-200',
        'purple' => 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-200',
        'fuchsia' => 'bg-fuchsia-100 text-fuchsia-700 dark:bg-fuchsia-900 dark:text-fuchsia-200',
        'pink' => 'bg-pink-100 text-pink-700 dark:bg-pink-900 dark:text-pink-200',
        'rose' => 'bg-rose-100 text-rose-700 dark:bg-rose-900 dark:text-rose-200',
        'slate' => 'bg-slate-100 text-slate-700 dark:bg-slate-900 dark:text-slate-200',
        'gray' => 'bg-gray-100 text-gray-700 dark:bg-gray-900 dark:text-gray-200',
        'zinc' => 'bg-zinc-100 text-zinc-700 dark:bg-zinc-900 dark:text-zinc-200',
        'neutral' => 'bg-neutral-100 text-neutral-700 dark:bg-neutral-900 dark:text-neutral-200',
        'stone' => 'bg-stone-100 text-stone-700 dark:bg-stone-900 dark:text-stone-200',
        'mauve' => 'bg-mauve-100 text-mauve-700 dark:bg-mauve-900 dark:text-mauve-200',
        'olive' => 'bg-olive-100 text-olive-700 dark:bg-olive-900 dark:text-olive-200',
        'mist' => 'bg-mist-100 text-mist-700 dark:bg-mist-900 dark:text-mist-200',
        'taupe' => 'bg-taupe-100 text-taupe-700 dark:bg-taupe-900 dark:text-taupe-200',
    ];

    public static function highlight(string $color): string
    {
        return self::HIGHLIGHTS[$color] ?? self::HIGHLIGHTS['accent'];
    }

    /** @var array<string, string> */
    private const FILLS = [
        'accent' => 'bg-ui-accent',
        'red' => 'bg-red-500 dark:bg-red-400',
        'orange' => 'bg-orange-500 dark:bg-orange-400',
        'amber' => 'bg-amber-500 dark:bg-amber-400',
        'yellow' => 'bg-yellow-500 dark:bg-yellow-400',
        'lime' => 'bg-lime-500 dark:bg-lime-400',
        'green' => 'bg-green-500 dark:bg-green-400',
        'emerald' => 'bg-emerald-500 dark:bg-emerald-400',
        'teal' => 'bg-teal-500 dark:bg-teal-400',
        'cyan' => 'bg-cyan-500 dark:bg-cyan-400',
        'sky' => 'bg-sky-500 dark:bg-sky-400',
        'blue' => 'bg-blue-500 dark:bg-blue-400',
        'indigo' => 'bg-indigo-500 dark:bg-indigo-400',
        'violet' => 'bg-violet-500 dark:bg-violet-400',
        'purple' => 'bg-purple-500 dark:bg-purple-400',
        'fuchsia' => 'bg-fuchsia-500 dark:bg-fuchsia-400',
        'pink' => 'bg-pink-500 dark:bg-pink-400',
        'rose' => 'bg-rose-500 dark:bg-rose-400',
        'slate' => 'bg-slate-500 dark:bg-slate-400',
        'gray' => 'bg-gray-500 dark:bg-gray-400',
        'zinc' => 'bg-zinc-500 dark:bg-zinc-400',
        'neutral' => 'bg-neutral-500 dark:bg-neutral-400',
        'stone' => 'bg-stone-500 dark:bg-stone-400',
        'mauve' => 'bg-mauve-500 dark:bg-mauve-400',
        'olive' => 'bg-olive-500 dark:bg-olive-400',
        'mist' => 'bg-mist-500 dark:bg-mist-400',
        'taupe' => 'bg-taupe-500 dark:bg-taupe-400',
    ];

    public static function fill(string $color): string
    {
        return self::FILLS[$color] ?? self::FILLS['accent'];
    }

    /** @var array<string, string> */
    private const AXES = [
        'accent' => 'border-ui-accent',
        'red' => 'border-red-400 dark:border-red-500',
        'orange' => 'border-orange-400 dark:border-orange-500',
        'amber' => 'border-amber-400 dark:border-amber-500',
        'yellow' => 'border-yellow-400 dark:border-yellow-500',
        'lime' => 'border-lime-400 dark:border-lime-500',
        'green' => 'border-green-400 dark:border-green-500',
        'emerald' => 'border-emerald-400 dark:border-emerald-500',
        'teal' => 'border-teal-400 dark:border-teal-500',
        'cyan' => 'border-cyan-400 dark:border-cyan-500',
        'sky' => 'border-sky-400 dark:border-sky-500',
        'blue' => 'border-blue-400 dark:border-blue-500',
        'indigo' => 'border-indigo-400 dark:border-indigo-500',
        'violet' => 'border-violet-400 dark:border-violet-500',
        'purple' => 'border-purple-400 dark:border-purple-500',
        'fuchsia' => 'border-fuchsia-400 dark:border-fuchsia-500',
        'pink' => 'border-pink-400 dark:border-pink-500',
        'rose' => 'border-rose-400 dark:border-rose-500',
        'slate' => 'border-slate-400 dark:border-slate-500',
        'gray' => 'border-gray-400 dark:border-gray-500',
        'zinc' => 'border-zinc-400 dark:border-zinc-500',
        'neutral' => 'border-neutral-400 dark:border-neutral-500',
        'stone' => 'border-stone-400 dark:border-stone-500',
        'mauve' => 'border-mauve-400 dark:border-mauve-500',
        'olive' => 'border-olive-400 dark:border-olive-500',
        'mist' => 'border-mist-400 dark:border-mist-500',
        'taupe' => 'border-taupe-400 dark:border-taupe-500',
    ];

    public static function axis(string $color): string
    {
        return self::AXES[$color] ?? self::AXES['zinc'];
    }

    /** @var array<string, string> */
    private const TEXTS = [
        'accent' => 'text-ui-accent',
        'red' => 'text-red-600 dark:text-red-400',
        'orange' => 'text-orange-600 dark:text-orange-400',
        'amber' => 'text-amber-600 dark:text-amber-400',
        'yellow' => 'text-yellow-600 dark:text-yellow-400',
        'lime' => 'text-lime-600 dark:text-lime-400',
        'green' => 'text-green-600 dark:text-green-400',
        'emerald' => 'text-emerald-600 dark:text-emerald-400',
        'teal' => 'text-teal-600 dark:text-teal-400',
        'cyan' => 'text-cyan-600 dark:text-cyan-400',
        'sky' => 'text-sky-600 dark:text-sky-400',
        'blue' => 'text-blue-600 dark:text-blue-400',
        'indigo' => 'text-indigo-600 dark:text-indigo-400',
        'violet' => 'text-violet-600 dark:text-violet-400',
        'purple' => 'text-purple-600 dark:text-purple-400',
        'fuchsia' => 'text-fuchsia-600 dark:text-fuchsia-400',
        'pink' => 'text-pink-600 dark:text-pink-400',
        'rose' => 'text-rose-600 dark:text-rose-400',
        'slate' => 'text-slate-600 dark:text-slate-400',
        'gray' => 'text-gray-600 dark:text-gray-400',
        'zinc' => 'text-zinc-600 dark:text-zinc-400',
        'neutral' => 'text-neutral-600 dark:text-neutral-400',
        'stone' => 'text-stone-600 dark:text-stone-400',
        'mauve' => 'text-mauve-600 dark:text-mauve-400',
        'olive' => 'text-olive-600 dark:text-olive-400',
        'mist' => 'text-mist-600 dark:text-mist-400',
        'taupe' => 'text-taupe-600 dark:text-taupe-400',
    ];

    public static function text(string $color): string
    {
        return self::TEXTS[$color] ?? self::TEXTS['accent'];
    }
}
