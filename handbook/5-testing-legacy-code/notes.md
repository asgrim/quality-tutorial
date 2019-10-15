# Legacy testing exercise

## Mocking functions

 * https://github.com/php-mock/php-mock-phpunit

## Mocking die/exit

```
sudo phpenmod uopz
sudo phpdismod xdebug
sudo phpdismod opcache
```

```
vendor/bin/phpunit exercises/5-testing-legacy-code/test/ShellTest.php
```

 * Needs extension `uopz`: https://github.com/krakjoe/uopz
 * `uopz_allow_exit(false);` is key
 * `phpdismod xdebug` and `phpdismod opcache`
 * Note: PECL in deb.sury world: https://github.com/oerdnj/deb.sury.org/wiki/PECL-Installation

```
sudo phpdismod uopz
sudo phpenmod xdebug
sudo phpenmod opcache
```
