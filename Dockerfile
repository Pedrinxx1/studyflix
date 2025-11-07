# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Copia todos os arquivos do seu repositório para a pasta do servidor Apache
COPY . /var/www/html/

# Instala extensões básicas do PHP (caso precise de banco de dados)
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Dá permissão para o Apache acessar os arquivos
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80 (a que o Render usa)
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]
