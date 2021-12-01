<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'git@github.com:matthieumota/air-office.git');

// Hosts
host('68f8a8b6.nip.io')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/air-office');

// Tasks
task('build', function () {
    // cd('{{release_path}}');
    // run('npm run build');
});

after('deploy:failed', 'deploy:unlock');
