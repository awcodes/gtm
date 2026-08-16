<?php

declare(strict_types=1);

it('displays gtm tags', function () {
    $view = $this->blade('<x-gtm :enabled="$enabled"/>', ['enabled' => true]);

    $view
        ->assertSee('test')
        ->assertSee('GTM-XXXXXX');
});

it('does\'t display gtm tags', function () {
    $view = $this->blade('<x-gtm :enabled="$enabled"/>', ['enabled' => false]);

    $view
        ->assertSee('test')
        ->assertDontSee('GTM-XXXXXX');
});

it('renders the container id into the script tag', function () {
    $this->blade('<x-gtm::script />')
        ->assertSee('gtm.js?id=', false)
        ->assertSee('GTM-XXXXXX');
});

it('renders the container id into the noscript iframe', function () {
    $this->blade('<x-gtm::no-script />')
        ->assertSee('ns.html?id=GTM-XXXXXX', false);
});

it('omits both components when the enabled prop is false', function (string $component) {
    $this->blade("<x-gtm::{$component} :enabled=\"false\" />")
        ->assertDontSee('GTM-XXXXXX');
})->with(['script', 'no-script']);

it('omits both components when disabled in config', function (string $component) {
    config()->set('gtm.enabled', false);

    $this->blade("<x-gtm::{$component} />")
        ->assertDontSee('GTM-XXXXXX');
})->with(['script', 'no-script']);

it('defaults the enabled prop to true', function (string $component) {
    $this->blade("<x-gtm::{$component} />")
        ->assertSee('GTM-XXXXXX');
})->with(['script', 'no-script']);
