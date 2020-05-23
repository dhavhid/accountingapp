FROM php:7.4.5-apache-buster

# Instalamos los paquetes soporte
RUN apt-get update && apt-get install -y \ 
	libc-client-dev \
	libkrb5-dev \
	libpng-dev \
	libjpeg-dev \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libcurl4-openssl-dev \
	bzip2 \
	libbz2-dev \
	libmcrypt-dev \
	libxslt-dev \
	libldap2-dev \
	zlib1g-dev \
	libicu-dev \
	libsodium-dev \
	libzip-dev \
	libpq-dev \
	zip \
	g++

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install bcmath \
	&& docker-php-ext-install sodium \
	&& docker-php-ext-install zip \
	&& docker-php-ext-install pdo_pgsql

COPY ./conf/php.ini-development /usr/local/etc/php/php.ini-development
COPY ./conf/php.ini-production /usr/local/etc/php/php.ini-production

WORKDIR /root
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
  && php -r "unlink('/root/composer-setup.php');"

RUN composer global require laravel/installer \
	&& ln -s /root/.composer/vendor/bin/laravel /usr/local/bin/laravel

RUN a2enmod rewrite expires vhost_alias
RUN sed -i 's/	AllowOverride None/	AllowOverride All/' /etc/apache2/apache2.conf
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
VOLUME /var/www/html

CMD ["apache2-foreground"]