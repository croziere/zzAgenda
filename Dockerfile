FROM php:7.0-cli-alpine

ADD . /app

WORKDIR /app

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "web/"]