FROM php:5.6-alpine
RUN apk --update --upgrade add build-base
RUN apk add postgresql postgresql-dev php5-pgsql
WORKDIR /app
ENTRYPOINT ["php"]
CMD ["-S", "0.0.0.0:8088"]
EXPOSE 8088
