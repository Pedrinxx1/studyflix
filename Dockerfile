# Usa uma imagem do PHP com Apache
FROM php:8.2-apache

# Copia todos os arquivos do seu projeto para a pasta do servidor
COPY . /var/www/html/

# Instala extensões necessárias para conectar ao banco (PostgreSQL e MySQL)
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql

# Expõe a porta 80 (onde o site vai rodar)
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]
