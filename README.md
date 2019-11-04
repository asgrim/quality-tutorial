# Quality PHP Workshop

Sample code and exercises for my quality PHP workshop.

Requirements:

 * PHP 7.2+
 * Composer

## Installation (online)

 * Clone this repository
 * Run `composer install`
 * The `handbook` folder is just for me, please don't cheat :)

## Installation (copy from USB)

 * Copy the folder, hopefully everything will work for you! :)

## Using the Dockerfile

If you don't have a suitable PHP environment set up, you can try the Dockerfile:

**NOTE** I have not tested this thoroughly, so YMMV... proceed with caution AT YOUR OWN RISK!!

 * `docker build -t quality .`
 * `docker run --rm -v $(pwd):/app -it quality php -v` - test it works
 * `docker run --rm -v $(pwd):/app -it quality bash` - open a shell "inside" the container
 * inside container: `rm /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini` (removes xdebug)
 * inside container: `docker-php-ext-enable xdebug` (adds xdebug)
 
# Bulgaria PHP Training (3h)

 - 14:00 : Intro - 15m
 - Planning
   - 14:15 : Event storming practical - 30m
   - 14:45 : Feature description practical - 15m
 - Development
   - 15:00 : Object Calisthenics + Types (ex 1 + 2 combined) - 30m
 - 15:30 Break
 - Development
   - 15:45 : Static Analysis (ex 3)- 10m
 - Testing
   - 15:55 : Testing Legacy (ex 5) - 10m
   - 16:05 : Branch coverage (ex 6) - 10m
   - 16:15 : Coverage leaking (ex 7) - 10m
   - 16:25 : Mutation testing (ex 8) - 10m
 - 16:35 : Code Reviews - 10m
 - 16:45 : Deployments / Outro - 15m
