FROM --platform=linux/amd64 alpine:3.16

# Define workdir
WORKDIR /var/www/html

# Define environments
ARG ENV=production
ENV TZ=Asia/Ho_Chi_Minh

# Set timezone
RUN apk add --no-cache tzdata ; \
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime

# Installing PHP 8
RUN apk add --no-cache php81 php81-json php81-mysqli php81-curl php81-dom php81-exif php81-fileinfo php81-phar \
    php81-pecl-imagick php81-mbstring php81-openssl pcre php81-xml php81-xmlreader php81-xmlwriter php81-gd php81-iconv \
    php81-simplexml php81-zip php81-opcache php8-pecl-memcached php81-pecl-redis php81-bcmath php81-ctype php81-intl ; \
    ln -s /usr/bin/php81 /usr/bin/php

# Installing packages
RUN if [ "$ENV" = "production" ] ; \
      then apk add --no-cache curl shadow sudo exim ; \
      else apk add --no-cache curl shadow sudo exim gettext htop php81-pecl-xdebug ; \
      sed -i 's/;zend_extension/zend_extension/g' /etc/php81/conf.d/50_xdebug.ini ; \
      sed -i 's/;xdebug.mode=off/xdebug.mode=develop/g' /etc/php81/conf.d/50_xdebug.ini ; \
      echo 'xdebug.output_dir=/var/www/html' >> /etc/php81/conf.d/50_xdebug.ini ; \
    fi

# Configure php service
COPY .docker/php.ini /etc/php81/conf.d/99-dev.ini

# Installing composer
RUN curl -sS https://getcomposer.org/download/latest-stable/composer.phar -o /usr/bin/composer ; \
    chmod +x /usr/bin/composer

# Installing WP-CLI
RUN curl -sS https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -o /usr/bin/wp ; \
    chmod +x /usr/bin/wp

# Copy source code
COPY . .
RUN rm -rf .git .docker .composer .npm database

RUN addgroup -g 5000 dev ; \
    adduser -S -G dev -u 5000 -s /bin/ash dev -h /var/www/html ; \
    printf "dev ALL=(root) NOPASSWD:/bin/chown -R dev.dev /var/www/html\n" > /etc/sudoers.d/dev-chown-workspace ; \
    chown -R dev.dev /var/www/html ; \
    chmod -R 777 /var/www/html/wp-content
# Expose HTTP port
EXPOSE 8080

# Switch user
USER dev

# Start services
ENTRYPOINT ["entrypoint"]
STOPSIGNAL SIGQUIT
CMD ["php", "-S", "0.0.0.0:8080", "router.php"]
