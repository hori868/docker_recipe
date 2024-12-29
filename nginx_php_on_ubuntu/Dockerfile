FROM ubuntu:24.04

RUN apt-get update && apt-get install -y \
    nginx \
    php8.3-fpm \
    php8.3-mysql \
&& apt-get clean \
&& rm -rf /var/lib/apt/lists/*

# Nginxの設定ファイル
COPY ./nginx/ /etc/nginx/sites-available/

# PHP-FPMの設定ファイル
COPY ./php-fpm/www.conf /etc/php/8.3/fpm/pool.d/www.conf

# PHPの設定ファイル
COPY ./php-fpm/php.ini /etc/php/8.3/fpm/php.ini

# Nginx, PHP-FPMの起動スクリプト
COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

WORKDIR /var/www/html

EXPOSE 80
CMD ["/entrypoint.sh"]
