# ⛔️ DEPRECATED

[New __Interpretable__ version](https://github.com/interpretable/interpretable) is now based on [__Cboard__](https://github.com/cboard-org/cboard).

# Interpretabble-front
Laravel based api for Interpretabble

## Requirements :
- Composer
- Nodejs

## Setup :

After you've cloned this repo

Update all the missing php dependencies with
> composer update

Copy the env.example file and rename it to .env
And edit this file to fit your api url

> DB_CONNECTION=mysql

API_URL=myApiUrl

Run the asset compiler
> npm run watch

For development purpose you can use
> php artisan serve 

To serve your api

For production purpose you should change your .htaccess (/public) 
and your vhost to serve your api (on apache or nginx) 

