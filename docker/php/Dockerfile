FROM hyperf/hyperf:8.3-alpine-v3.20-swoole-v5.1.6 AS base

# Set Environment Variables
ENV TIMEZONE=${timezone:-"America/Sao_Paulo"}

LABEL authors="haaragard"

RUN set -ex \
    # show php version and extensions
    && php -v \
    && php -m \
    && php --ri swoole \
    #  ---------- some config ----------
    && cd /etc/php* \
    # - config PHP
    && { \
        echo "upload_max_filesize=128M"; \
        echo "post_max_size=128M"; \
        echo "memory_limit=1G"; \
        echo "date.timezone=${TIMEZONE}"; \
    } | tee conf.d/99_overrides.ini \
    # - config timezone
    && ln -sf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" > /etc/timezone

# Install composer
COPY --from=composer:2.8.4 /usr/bin/composer /usr/bin/composer

FROM base AS dev

# Set Environment Variables
ENV USER_ID ${USER_ID:-1000}
ENV GROUP_ID ${GROUP_ID:-1000}
ENV TIMEZONE=${timezone:-"America/Sao_Paulo"}
ENV APP_ENV=${APP_ENV:-"dev"}

LABEL authors="haaragard"

# Set working directory
WORKDIR /var/www/app

# Copy all files to the container
COPY . .

RUN apk add php83-pecl-xdebug

COPY docker/php/config/custom_xdebug.ini /etc/php83/conf.d/99_xdebug.ini

# Create new user with same user id as host user
RUN addgroup -S appgroup -g $GROUP_ID \
    && adduser -S appuser -u $USER_ID -G appgroup -G root -G www-data

RUN chown -R appuser:appgroup /var/www/app

USER appuser

#RUN composer install

#EXPOSE 9501

#ENTRYPOINT ["php", "/var/www/app/bin/hyperf.php", "server:watch"]
