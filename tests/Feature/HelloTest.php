<?php

it('user can view homepage')
    ->get('/')
    ->assertSee('Laravel');
