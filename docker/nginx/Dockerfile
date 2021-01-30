ARG NGINX_VERSION=1.19

FROM nginx:${NGINX_VERSION}-alpine

COPY docker/nginx/conf.d/default.conf /etc/nginx/conf.d/

WORKDIR /srv/sylius

COPY tests/Application ./
