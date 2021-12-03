<?php

it('user can view homepage')
    ->get('/')
    ->assertSee('Air Office');
