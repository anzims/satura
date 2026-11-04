# Satura

Дизайн-система для Laravel 13 и Livewire 4: токены, Blade-компоненты и Livewire-виджеты.

Пакет не строится на сторонних UI-библиотеках: только Tailwind CSS 4, Alpine (в составе Livewire) и собственные токены.

## Установка

```bash
composer require anzims/satura
```

## Стили

```css
@import '../../vendor/anzims/satura/resources/css/satura.css';
@source  '../../vendor/anzims/satura/resources/views';
@source  '../../vendor/anzims/satura/src';
```

Строки `@source` обязательны: Tailwind собирает утилиты у потребителя и без них классы из шаблонов пакета не попадут в CSS.

Тёмная тема включается классом `dark` на `<html>` или `<body>` (`config/satura.php`).

## Настройка

```bash
php artisan vendor:publish --tag=satura-config
php artisan satura:theme --base=zinc --accent=blue
```

Префикс компонентов по умолчанию — `sat`, то есть `<x-sat::button>`.

## Компоненты

| Группа | Компоненты |
|---|---|
| Элементы | `button`, `icon-button`, `icon`, `close`, `badge`, `spinner`, `divider`, `skeleton`, `progress`, `avatar`, `avatar-group`, `card`, `alert`, `empty-state` |
| Формы | `input`, `textarea`, `select`, `checkbox`, `radio`, `toggle`, `field`, `label`, `error`, `autocomplete`, `color-picker` |
| Навигация | `breadcrumbs`, `pagination`, `accordion`, `tabs`, `steps` |
| Оверлеи | `dropdown`, `menu`, `context-menu`, `popover`, `tooltip`, `modal`, `drawer`, `toast` |

Подробные примеры — в репозитории демо-страницы (приватный проект).

## Satura Pro

Расширенные компоненты — таблицы, деревья, канбан, календарь, графики, мастер шагов и продвинутые поля — поставляются отдельным пакетом `anzims/satura-pro` по подписке.

## Лицензия

MIT. См. [LICENSE](LICENSE).
