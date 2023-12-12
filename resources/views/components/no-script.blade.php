@props([
    'enabled' => true
])

@if ($enabled && config('gtm.enabled'))
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id={{ config('site.gtm.id') }}" height="0" width="0" tabindex="-1" aria-hidden="true" style="display:none;visibility:hidden"></iframe></noscript>
@endif
