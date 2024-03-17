FROM php:7.4.15-apache
ENV TZ=Asia/Kolkata

# Set working directory
WORKDIR /var/www/html/

# Linux Library
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    git \
    wget \
    curl \
    vim \
    nano

# Timezone
RUN apt-get install -y tzdata \
    && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install Apache
RUN apt-get install -y apache2

# Enable Apache modules
RUN a2enmod rewrite \
    && a2enmod headers \
    && a2enmod expires

# Configure Apache
RUN a2enmod rewrite \
    && export LANG=en_US.UTF-8

# Donwload all Files
COPY . /var/www/html/
# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 775 /var/www/html/

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP Extension
RUN docker-php-ext-install gettext intl pdo_mysql gd mysqli

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Set environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_LOG_DIR /var/log/apache2

# Expose Ports
EXPOSE 80
EXPOSE 9000

# Start Apache
CMD ["apache2-foreground"]
