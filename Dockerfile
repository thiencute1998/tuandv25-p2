FROM wyveo/nginx-php-fpm:latest

ADD . /var/www/html/tuandv25-p2
ADD docker/conf/giao-phan.conf /etc/nginx/conf.d/giao-phan.conf

RUN rm -f /etc/nginx/conf.d/default.conf
RUN rm -rf /etc/localtime
RUN ln -s /usr/share/zoneinfo/Asia/Ho_Chi_Minh /etc/localtime

WORKDIR /var/www/html/tuandv25-p2

RUN php artisan view:clear
RUN php artisan route:clear
RUN php artisan config:cache
RUN php artisan config:clear
RUN php artisan cache:clear

RUN chmod -R 777 storage/



