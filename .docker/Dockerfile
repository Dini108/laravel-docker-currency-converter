FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    		libfreetype6-dev \
    		libpng-dev \
    		libwebp-dev \
    		libjpeg62-turbo-dev \
    		libmcrypt-dev \
    		libzip-dev \
            zip \
    		git \
    		vim \
    && docker-php-ext-install \
    gd \
    zip \
    && a2enmod \
    rewrite

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
# Add the user UID:1000, GID:1000, home at /app
RUN groupadd -r app -g 1000 && useradd -u 1000 -r -g app -m -d /app -s /sbin/nologin -c "App user" app && \
    chmod 755 /var/www/


RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

#upload
COPY my-site.ini /usr/local/etc/php/conf.d/uploads.ini

USER app

WORKDIR /var/www/

USER root

COPY my-site.conf /etc/apache2/sites-enabled/000-default.conf

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

RUN printf '\nxdebug.remote_autostart = 0 \nxdebug.remote_enable = 1 \nxdebug.remote_host = host.docker.internal \nxdebug.remote_port = 9000 \nxdebug.var_display_max_depth = 20 \nxdebug.var_display_max_children = 256 \nxdebug.var_display_max_data = 1024\n xdebug.remote_connect_back=0' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

EXPOSE 80