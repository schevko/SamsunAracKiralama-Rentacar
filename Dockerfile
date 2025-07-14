############################################################
##  Stage 1 – Assets derlemesi (Node + Laravel Mix)
############################################################
FROM node:20-alpine AS frontend

WORKDIR /app
COPY package*.json ./
RUN npm ci --no-audit --progress=false

# Kaynakları kopyala ve derle
COPY resources ./resources
# Mix/Vite/webpack dosyan hangisi ise ekle
COPY webpack.mix.js vite.config.* ./
RUN npm run prod

############################################################
##  Stage 2 – PHP bağımlılıkları (Composer)
############################################################
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction

############################################################
##  Stage 3 – Uygulama (PHP-FPM + Nginx tek imaj)
############################################################
FROM webdevops/php-nginx:8.3-alpine

# İsteğe bağlı PHP ayar örnekleri
ENV PHP_MEMORY_LIMIT=512M \
    PHP_DATE_TIMEZONE=Europe/Istanbul \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS=0

WORKDIR /app

# --- Uygulama dosyalarını kopyala ---
COPY --from=vendor   /app/vendor               ./vendor
COPY --from=frontend /app/public               ./public
COPY . .

# -- Laravel için izinler --
RUN mkdir -p storage bootstrap/cache \
 && chown -R application:application storage bootstrap/cache \
 && chmod -R ug+rwx storage bootstrap/cache

# Nginx portu (webdevops imajında 80)
EXPOSE 80
# webdevops zaten supervisord ile php-fpm + nginx’i başlatıyor
