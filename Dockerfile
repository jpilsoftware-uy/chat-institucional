FROM php:7.4-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
ARG token
ARG usuario


RUN apt-get update && \
    apt-get install git -y

COPY alumno/. /var/www/html
RUN git clone https://IvanBraida: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@github.com/IvanBraida/backEnd-chatInstitucional.git


ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite