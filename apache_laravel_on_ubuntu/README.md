# README

## 環境

Ubuntu 24.04 上にApache, PHP をインストールします。

モジュール版PHP を使います。

## DB

本リポジトリでは共通のDBを使用しています。

設定を変えずに使用する場合は、先に`recipe_mysql` コンテナを立ち上げてください。

## 初期設定

コンテナ内で下記のコマンドを実行してください。

### 権限の設定

※不十分な可能性があります

```
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache
```

### `.env` ファイルのコピー

DBの設定を変更した場合、下記コマンドの実行に加えてDB情報の書き換えを行ってください。

```
cp .env.example .env
php artisan key:generate
```

### マイグレーションの実行

デフォルトでインストールされているマイグレーションファイルです。

```
php /var/www/html/artisan migrate
```

## Apacheの設定ファイル

`apache` ディレクトリは、`/etc/apache2/sites-available/` にマウントされます。

`000-default.conf` 以外のconfファイルを追加した際は、Dockerfile にて下記の記載が必要になります。

```
RUN a2ensite <追加したconfファイル>
```

例：

```
COPY ./apache/ /etc/apache2/sites-available/

RUN a2ensite 001-example.conf
```

なお、`000-default.conf` ファイルを無効化する際は、Dockerfile にて下記の記載を行います。

```
RUN a2dissite 000-default.conf
```

例：

```
COPY ./apache/ /etc/apache2/sites-available/

RUN a2ensite 001-example.conf \
    && a2dissite 000-default.conf
```
