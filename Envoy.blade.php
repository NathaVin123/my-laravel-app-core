@servers([
    'dev'   => 'vincent@192.168.1.10',
    'sit'   => 'vincent@192.168.1.10',
    'live'  => 'vincent@192.168.1.10'
])

@task('deploy_dev', ['on' => 'dev'])
    cd /home/vincent/Project/docker/trial/my-laravel-app-dev
    git checkout dev
    git fetch core master
    git checkout core/master -- database/migrations
    git add database/migrations
    git commit -m "Merge database/migrations dari master ke dev"
    git push origin dev
    docker exec laravel_app sh -c "php artisan migrate --force"
    docker exec laravel_app sh -c "php artisan config:cache"
    docker exec laravel_app sh -c "php artisan route:cache"
    docker exec laravel_app_core sh -c "php artisan migrate --force"
    docker exec laravel_app_core sh -c "php artisan config:cache"
    docker exec laravel_app_core sh -c "php artisan route:cache"
@endtask

@task('deploy_sit', ['on' => 'sit'])
    cd /home/vincent/Project/docker/trial/my-laravel-app-sit
    git checkout sit
    git fetch origin dev
    git merge --no-edit origin/dev
    git add database/migrations
    git commit -m "Merge database/migrations dari dev ke sit"
    git push origin sit
    docker exec laravel_app_sit sh -c "php artisan migrate --force"
    docker exec laravel_app_sit sh -c "php artisan config:cache"
    docker exec laravel_app_sit sh -c "php artisan route:cache"
@endtask

@task('deploy_live', ['on' => 'live'])
    cd /home/vincent/Project/docker/trial/my-laravel-app-live
    git checkout master
    git pull origin master
    docker exec laravel_app_live sh -c "php artisan migrate --force"
    docker exec laravel_app_live sh -c "php artisan config:cache"
    docker exec laravel_app_live sh -c "php artisan route:cache"
@endtask