FROM ubuntu:19.10

ADD /data.sh /data.sh

RUN apt-get update && apt-get -y install software-properties-common && add-apt-repository ppa:ondrej/php && apt-get update && apt-get install -y
RUN chmod +x /data.sh
RUN ./data.sh
RUN apt-get install apache2 -y \
    && apt-get install php7.4 -y \
    && apt-get install curl -y \
    && apt-get install libapache2-mod-php php-mbstring php-xmlrpc php-gd php-xml php-zip php-mysql php-curl -y \
    && apt-get install composer -y \
    && apt-get install wget \
    && apt-get install vim -y \
    && apt-get install expect -y \
    && apt-get install mysql-client -y \
    && apt-get install php-bcmath -y \
    && apt-get install -y \
    && apt-get install php-tokenizer -y

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN cd /etc/apache2/mods-available && a2enmod rewrite

COPY virtualHost.conf /etc/apache2/sites-enabled/000-default.conf
COPY php.ini /etc/php/7.4/apache2/php.ini

WORKDIR /var/www/phpchan

EXPOSE 80

CMD apachectl  -DFOREGROUND