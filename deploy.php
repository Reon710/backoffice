<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/Reon710/backoffice.git');

add('shared_files', ['.env', 'database/database.sqlite']);
add('shared_dirs', ['bootstrap/cache', 'storage']);
add('writable_dirs', ['bootstrap/cache', 'storage']);

// Hosts

host('34.234.8.234')
    ->set('remote_user', 'rochialbi-deployer')
    ->set('identity_file', '~/.ssh/id_rsa')
    ->set('deploy_path', '/home/rochialbi-deployer/var/www');

set('keep_realeases', 3);

// Tasks
task('build', function () {
   run('cd {{release_path}} && build');
});

// Hooks

after('deploy:failed', 'deploy:unlock');
// before('deploy:symlink', 'artisan:migrate');
