FROM phpdockerio/php72-fpm:latest

RUN apt-get update \
    && apt-get install -y --no-install-recommends runit \
    && apt-get install -y --no-install-recommends cron \
    && apt-get -y --no-install-recommends install  php7.2-mysql php-redis \
    && mkdir /etc/service/cron \
    && echo '#!/bin/sh' > /etc/service/cron/run \
    && echo 'exec /usr/sbin/cron -f' >> /etc/service/cron/run \
    && chmod -R 700 /etc/service/cron/ \
    && chmod 600 /etc/crontab \
    && rm -f /etc/cron.daily/standard \
    && rm -f /etc/cron.daily/upstart \
    && rm -f /etc/cron.daily/dpkg \
    && rm -f /etc/cron.daily/password \
    && rm -f /etc/cron.weekly/fstrim \
    && apt-get purge -y --auto-remove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR "/application"

CMD ["runsv", "/etc/service/cron"]