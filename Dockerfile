FROM php:8.2-apache

# Habilitar mod_rewrite de Apache por si usas rutas limpias (como en Laravel o MVC caseros)
RUN a2enmod rewrite

# Instalar extensiones de PHP comunes (agrega o quita según necesites)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copiar los archivos del proyecto al directorio web de Apache
COPY . /var/www/html/

# Configurar permisos si es necesario
RUN chown -R www-data:www-data /var/www/html

# Render asigna dinámicamente un puerto, por lo que configuramos Apache para escuchar en el puerto 80
EXPOSE 80