# FROM php:8.0-cli-buster 
# CMD php -S 0.0.0.0:8000 -t /src/public

FROM php:alpine
LABEL maintainer="hitalos <hitalos@gmail.com>"
RUN apk update && apk upgrade && apk add bash git

# Install PHP extensions
# ADD install-php.sh /usr/sbin/install-php.sh
# RUN chmod +x /usr/sbin/install-php.sh
# RUN /usr/sbin/install-php.sh
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN php -r "readfile('https://getcomposer.org/installer');" | php && \
   mv composer.phar /usr/bin/composer && \
   chmod +x /usr/bin/composer
# Download and install NodeJS
# ENV NODE_VERSION 10.0.0
# ADD install-node.sh /usr/sbin/install-node.sh
# RUN /usr/sbin/install-node.sh
# RUN npm i -g yarn

RUN mkdir -p /etc/ssl/certs && update-ca-certificates

WORKDIR /src
CMD php -S localhost:8000 -t public/
EXPOSE 80
HEALTHCHECK --interval=1m CMD curl -f http://localhost/ || exit 1