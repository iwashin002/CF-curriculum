#カリキュラム生の方々は、下記のコードを絶対に触らないでください！



# イメージを取得
FROM php:8.1.18-fpm
# 独自のphp.iniファイル(PHPの設定ファイル)を 
# コンテナ内の/usr/local/etc/php/ディレクトリにコピー
COPY php.ini /usr/local/etc/php/

# パッケージやPHPの拡張モジュールをインストールするコマンド　を実行
RUN apt-get update && apt-get install -y \
	git \
	curl \
	zip \
	unzip \
    && docker-php-ext-install pdo_mysql

# 作業ディレクトリを/var/wwwに設定
WORKDIR /var/www