FROM php:8.2-apache

# 1. Habilitamos mod_rewrite (vital para redirecciones en Apache)
RUN a2enmod rewrite

# 2. Copiamos todo el contenido de tu repo (que ya está en la raíz) a la carpeta del servidor
COPY . /var/www/html/

# 3. Configuramos Apache para que reconozca index.php como el archivo de entrada
# y permitimos que lea los archivos correctamente
RUN sed -i 's/DirectoryIndex index.html/DirectoryIndex index.php index.html/g' /etc/apache2/mods-enabled/dir.conf

# 4. Ajustamos permisos para que el servidor pueda leer el JSON y las carpetas
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

EXPOSE 80