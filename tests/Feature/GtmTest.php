<?php

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
