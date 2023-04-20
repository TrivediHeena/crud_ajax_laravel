FROM php:7.4-fpm-alpine

RUN apt-get update -y
RUN RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY . .
CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000