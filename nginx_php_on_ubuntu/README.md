# README

## 環境

Ubuntu 24.04 上にNginx, PHP 8.3 をインストールします。

PHPをFPMで動作させます。

## DB

本リポジトリでは共通のDBを使用しています。

設定を変えずに使用する場合は、先に`recipe_mysql` コンテナを立ち上げてください。

## Nginxの設定ファイル

`nginx` ディレクトリは `/etc/nginx/sites-available/` ディレクトリにマウントされます。

独自の設定ファイルを追加した際は、`/etc/nginx/sites-enalbled/` へのリンクを作成してください。

```
RUN ln -s /etc/nginx/sites-available/<設定ファイル> /etc/nginx/sites-enabled/
```
