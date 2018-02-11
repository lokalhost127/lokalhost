#!/bin/bash
echo "Starting shell script..";
php artisan migrate:refresh --seed
php artisan storage:link