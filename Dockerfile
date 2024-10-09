FROM quay.io/polyu_lbsys/php8.2-apache
COPY index.php /var/www/html
RUN chmod -R /var/www/html
EXPOSE 9000
CMD ['apache2-foreground']
