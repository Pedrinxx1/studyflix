# Usa a imagem base do PHP com Apache
FROM php:8.2-apache

# Instala dependências do sistema (incluindo PostgreSQL e utilitários)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql

# Copia os arquivos do seu projeto para dentro do container
COPY . /var/www/html/

# Dá permissão para o Apache acessar os arquivos
RUN chown -R www-data:www-data /var/www/html

# Habilita o módulo de reescrita do Apache (caso use .htaccess)
RUN a2enmod rewrite

# Expõe a porta padrão do Apache
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]
