FROM php:5.6-alpine
RUN apk --update --upgrade add build-base
RUN \
	apk add postgresql postgresql-dev php5-pgsql \
	&& docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
	&& docker-php-ext-install pgsql
COPY .pgpass /root
RUN chmod 600 /root/.pgpass
WORKDIR /app
ENTRYPOINT ["php"]
CMD ["-S", "0.0.0.0:8088"]
EXPOSE 8088
