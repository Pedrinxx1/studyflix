# Usa imagem base do PHP com Apache
FROM php:8.2-apache

# Instala dependências do PostgreSQL antes de instalar extensões PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql

# Copia o projeto para o diretório padrão do Apache
COPY . /var/www/html/

# Dá permissão para o Apache ler os arquivos
RUN chown -R www-data:www-data /var/www/html

# Habilita o mod_rewrite (caso seu projeto use .htaccess)
RUN a2enmod rewrite

# Expõe a porta 80
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]
