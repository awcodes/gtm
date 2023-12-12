@props([
    'enabled' => null
])

<div>
    test
    <x-gtm::script :enabled="$enabled" />
    <x-gtm::no-script :enabled="$enabled" />
</div>
