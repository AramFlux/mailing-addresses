FROM php:latest
LABEL name="mailing_form_php"
RUN apt-get update && apt-get install -y \
    openssl \
    git \
    unzip \
    && docker-php-ext-install mysqli
COPY . /var/www/html
WORKDIR /var/www/html
EXPOSE 4000
CMD ["php", "-S", "0.0.0.0:4000"]