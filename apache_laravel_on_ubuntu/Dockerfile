FROM ubuntu:24.04

RUN apt-get update && apt-get install -y \
    apache2 \
    php8.3 \
    libapache2-mod-php8.3 \
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

# 000-default.conf の上書き
COPY ./apache/ /etc/apache2/sites-available/

# Apache権限の変更
RUN chown -R www-data:www-data /var/log/apache2 && \
    chmod -R 755 /var/log/apache2

# 作業ディレクトリを設定
WORKDIR /var/www/html

# Laravelプロジェクトのコピー
COPY ./src ./

CMD ["apache2ctl", "-D", "FOREGROUND"]
