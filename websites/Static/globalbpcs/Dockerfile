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
    wget \
    curl \
    vim \
    nano

# Timezone
RUN apt-get install -y tzdata \
    && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install Apache
RUN apt-get install -y apache2

# Install MySQL (MariaDB)
RUN apt-get install -y mariadb-server mariadb-client \
    && /etc/init.d/mysql start

# Enable Apache modules
RUN a2enmod rewrite \
    && a2enmod headers \
    && a2enmod expires

# Configure Apache
RUN a2enmod rewrite \
    && export LANG=en_US.UTF-8

# Setting up javago
#RUN wget https://eu2.contabostorage.com/4151baf6820f406fb90ae06f3bf9e3ac:leonov/javago.co/Friday_javago.co_backup.zip \
#    && unzip Friday_javago.co_backup.zip \
#    && cd home/javago/public_html 
    
# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 775 /var/www/html/

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#Content COPY
COPY ./ /var/www/html/

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
EXPOSE 9000
#EXPOSE 9001
EXPOSE 3306

# Start Apache
CMD ["apache2-foreground"]
