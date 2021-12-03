<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'git@github.com:matthieumota/air-office.git');

// Hosts
host('prod-68f8a8b6.nip.io')
    ->set('branch', 'master')
    ->set('labels', ['stage' => 'prod'])
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/air-office');

host('staging-68f8a8b6.nip.io')
    ->set('branch', 'develop')
    ->set('labels', ['stage' => 'staging'])
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/air-office-staging');

// Tasks
task('build', function () {
    // cd('{{release_path}}');
    // run('npm install');
    // run('npm run prod');
});

// after('artisan:migrate', 'build');
after('deploy:failed', 'deploy:unlock');
