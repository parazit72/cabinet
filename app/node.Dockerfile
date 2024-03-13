FROM node:16

ARG user
ARG uid

RUN apt-get update

RUN rm -rf /var/lib/apt/lists/*

RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user &&  \
    chown -R $user:$user /home/$user

COPY source /var/www

RUN chown -R $user:$user /var/www

USER $user

WORKDIR /var/www

