# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP application code into the container
COPY . .

RUN chmod -R 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html
# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd mysqli

# Set ServerName to avoid warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Ensure Apache can serve index.php or index.html
RUN echo "DirectoryIndex index.php index.html" >> /etc/apache2/apache2.conf

# Expose the port Apache listens on
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]
