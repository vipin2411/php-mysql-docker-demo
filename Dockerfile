FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy application code
COPY app/ /var/www/html/
