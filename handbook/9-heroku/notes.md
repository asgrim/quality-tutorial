# Heroku demo
Procfile:
```
web: vendor/bin/heroku-php-apache2 public/
```

 - Register for Heroku (if not already)
 - Make a new branch `git checkout heroku"
 - Copy `Procfile` to root, commit
 - What is the Procfile?
   - `worker: php worker.php`
 - `heroku login` then `heroku create`
 - `git push heroku heroku:master` = deploy

## Other bits
 - PHP extensions as deps in `composer.json`
 - Logs: `heroku logs --tail`
 - Addons - https://elements.heroku.com/addons (DB, MQ, Redis etc.)
 - Migrations? https://devcenter.heroku.com/articles/release-phase
   - `release: ./test.sh`
