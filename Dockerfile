FROM php:8.2-apache

# Habilitar mod_rewrite de Apache por si usas rutas limpias
RUN a2enmod rewrite

# Instalar dependencias de PostgreSQL y las extensiones de PHP necesarias
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar los archivos del proyecto al directorio web de Apache
COPY . /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html

# Render asigna dinámicamente un puerto, por lo que configuramos Apache para escuchar en el puerto 80
EXPOSE 80