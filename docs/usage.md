---
title: Usage
description: Place the script and no-script components in a layout and control when they render.
---

# Usage

## Placing the components

Google Tag Manager needs two snippets in every page, in specific positions. Add each component to your base layout:

```blade
<!DOCTYPE html>
<html>
    <head>
        <x-gtm::script />
    </head>
    <body>
        <x-gtm::no-script />

        {{ $slot }}
    </body>
</html>
```

`x-gtm::script` belongs in the `<head>`, as early as practical, so the container loads before the rest of the page. `x-gtm::no-script` belongs immediately after the opening `<body>` tag — it renders a fallback iframe that reports page views for visitors without JavaScript.

Both read the container ID from `config('gtm.id')`, so neither takes an ID argument.

## Controlling when tags render

Each component accepts an `enabled` prop:

```blade
<x-gtm::script :enabled="$enabled" />
<x-gtm::no-script :enabled="$enabled" />
```

The prop defaults to `true`, which is why the examples above can omit it.

Tags render only when **both** the prop and the config value are true:

| `enabled` prop | `gtm.enabled` config | Renders |
| --- | --- | --- |
| `true` (or omitted) | `true` | Yes |
| `true` (or omitted) | `false` | No |
| `false` | `true` | No |
| `false` | `false` | No |

The two are deliberately independent. The config value is the environment-wide switch; the prop lets an individual layout opt out without touching configuration.

A common pattern is a layout that passes a variable down from the view or controller:

```blade
<x-gtm::script :enabled="$trackingEnabled ?? true" />
```

When either check fails, the component renders nothing — not an empty `<script>` tag, not a comment. Disabled pages carry no trace of the integration.

## Disabling per environment

Because `enabled` reads from `GTM_ENABLED`, the usual approach needs no code at all:

```dotenv
# .env.local
GTM_ENABLED=false
```

This is preferable to conditionally omitting the components from the layout, since the markup stays identical across environments and only the rendered output differs.

## Customizing the markup

If you published the views during [installation](installation.md), the two component files live at:

```text
resources/views/vendor/gtm/components/script.blade.php
resources/views/vendor/gtm/components/no-script.blade.php
```

Editing them replaces the rendered tags entirely. Keep the `enabled` prop check in place if you want the on/off behavior described above to keep working.
