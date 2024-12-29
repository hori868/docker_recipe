#!/bin/bash

# PHP-FPM を起動
php-fpm8.3 -D

# Nginx をフォアグラウンドで起動
nginx -g "daemon off;"
