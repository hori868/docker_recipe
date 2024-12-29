FROM ubuntu:24.04

RUN apt-get update && apt-get install -y \
    nginx \
    php8.3-fpm \
    php8.3-mysql \
    php8.3-curl \
    php8.3-mbstring \
    php8.3-xml \
    unzip \
    git \
&& apt-get clean \
&& rm -rf /var/lib/apt/lists/*

# Composer のインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \ 
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

# Nginxの設定ファイル
COPY ./nginx/ /etc/nginx/sites-available/

# PHP-FPMの設定ファイル
COPY ./php-fpm/www.conf /etc/php/8.3/fpm/pool.d/www.conf

# PHPの設定ファイル
COPY ./php-fpm/php.ini /etc/php/8.3/fpm/php.ini

# Nginx, PHP-FPMの起動スクリプト
COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# 作業ディレクトリの設定
WORKDIR /var/www/html

# Laravelプロジェクトのコピー
COPY ./src ./

EXPOSE 80
CMD ["/entrypoint.sh"]
