---
title: Google Tag Manager
description: Add Google Tag Manager to a Laravel application with two Blade components and a config file.
---

# Google Tag Manager

This package adds Google Tag Manager to a Laravel application through two Blade components — one for the head, one for the body — backed by a small config file.

There is no JavaScript build step, no service to register, and no facade. You publish the config, set a container ID, and place two tags in your layout.

## What it provides

- A `gtm` config file holding the container ID and a global on/off switch.
- An `x-gtm::script` component for the `<head>`.
- An `x-gtm::no-script` component for immediately after the opening `<body>` tag.

Both components render nothing at all when tracking is disabled, so no empty tags are left behind in the markup.

## Turning tracking on and off

Tracking is controlled at two levels, and both must agree before anything renders:

- **Globally**, through `GTM_ENABLED` in your environment file. This is the switch to reach for when disabling analytics across a whole environment such as local or staging.
- **Per layout**, through the `enabled` prop on each component. This is useful when a particular layout should opt out while the rest of the application keeps tracking.

See [Usage](usage.md) for how the two interact.

## Next steps

Start with [Installation](installation.md).
