@servers(['dev' => 'vincent@192.168.1.10', 'sit' => 'vincent@192.168.1.10'])

@task('deploy_dev', ['on' => 'dev'])
    cd /home/vincent/Project/docker/trial/my-laravel-app-dev
    git checkout dev
    git fetch origin master
    git pull origin dev
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
    git pull origin sit
    docker exec laravel_app_sit sh -c "php artisan migrate --force"
    docker exec laravel_app_sit sh -c "php artisan config:cache"
    docker exec laravel_app_sit sh -c "php artisan route:cache"
@endtask