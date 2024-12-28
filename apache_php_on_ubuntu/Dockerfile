FROM ubuntu:24.04

RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysql \
&& apt-get clean \
&& rm -rf /var/lib/apt/lists/*

# 000-default.conf の上書き
COPY ./apache/ /etc/apache2/sites-available/

# 権限の変更
RUN chown -R www-data:www-data /var/log/apache2 && \
    chmod -R 700 /var/log/apache2

CMD ["apache2ctl", "-D", "FOREGROUND"]
