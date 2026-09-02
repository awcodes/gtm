<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GTM Workbench</title>

        <x-gtm::script :enabled="$enabled" />
    </head>
    <body>
        <x-gtm::no-script :enabled="$enabled" />

        <main>
            <h1>Google Tag Manager Workbench</h1>
            <p>Per-layout tracking is {{ $enabled ? 'enabled' : 'disabled' }}.</p>
            <p><a href="{{ $enabled ? '/?enabled=0' : '/' }}">{{ $enabled ? 'Disable' : 'Enable' }} tracking</a></p>
        </main>
    </body>
</html>
