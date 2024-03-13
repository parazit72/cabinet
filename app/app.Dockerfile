FROM php:8.1.0-fpm

ARG user
ARG uid

RUN apt-get update

RUN apt-get install -y \
    openssl  \
    libssl-dev \
    zlib1g-dev \
    libzip-dev \
    libpng-dev \
    libjpeg* \
    libfreetype6-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql zip sockets bcmath

RUN docker-php-ext-enable pdo_mysql

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

COPY source /var/www

COPY ./start.sh /usr/local/bin/start

RUN chown -R $user:$user /usr/local/bin/start

RUN chown -R $user:$user /var/www

WORKDIR /var/www

EXPOSE 9000

USER $user

CMD ["bash", "start"]
