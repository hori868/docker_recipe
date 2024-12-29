# README

## 環境

Ubuntu 24.04 上にNginx, PHP 8.3 をインストールします。

PHPをFPMで動作させます。

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

## Nginxの設定ファイル

`nginx` ディレクトリは `/etc/nginx/sites-available/` ディレクトリにマウントされます。

独自の設定ファイルを追加した際は、`/etc/nginx/sites-enalbled/` へのリンクを作成してください。

```
RUN ln -s /etc/nginx/sites-available/<設定ファイル> /etc/nginx/sites-enabled/
```
