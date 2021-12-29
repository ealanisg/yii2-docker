# Yii 2 Boilerplate

## About

This boilerplate is ready for build projects with Yii2 using basic template with adminlte3 and advanced features.
It is using the mix of different projects:

* Yii2 Docker Image (https://github.com/yiisoft/yii2-docker)
  * plus Configuration from MariaDB Container
* hail812/yii2-adminlte3 (https://github.com/hail812/yii2-adminlte3)
* Yii2 Basic Template (https://github.com/nenad-zivkovic/yii2-basic-template)

These 3 projects were mixed and adjusted to work together with the current Yii2 version.

Go to each repo README file for details.

## Setup

    cp .env-dist .env

Adjust the versions in `.env` if you want to build a specific version.

> **Note:** Please make sure to use a matching combination of `DOCKERFILE_FLAVOUR` and `PHP_BASE_IMAGE_VERSION`

## Configuration

- `PHP_ENABLE_XDEBUG` whether to load an enable Xdebug, defaults to `0` (false)
- `PHP_USER_ID` (Debian only) user ID, when running commands as webserver (`www-data`), see also [#15](https://github.com/yiisoft/yii2-docker/issues/15)

## Building

    docker-compose build

## Testing

    docker-compose run --rm php php /tests/requirements.php

### Xdebug

To enable Xdebug, set `PHP_ENABLE_XDEBUG=1` in .env file

Xdebug is configured to call ip `xdebug.remote_host` on `9005` port (not use standard port to avoid conflicts),
so you have to configure your IDE to receive connections from that ip.

## Run container for local development

./start.sh

## Stop containers

./stop.sh

## Notes

The repository already includes yii2 framework, it is ready to work with multiple environments through the following files:

`index.php` is modified to read `$_SERVER['SERVER_NAME']` making possible to set the current environment and load different configurations settings from `_protected/config/ENV/...`
