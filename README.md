# Interpretabble-front
Laravel Back Office for intepretable

## Requirements :
- Composer
- Nodejs

## Setup :

After you've cloned this repo

Update all the missing php dependencies with
> composer update

Copy the env.example file and rename it to .env
And edit this file to fit your api url

API_URL=url_to_interpretable_api

Run the asset compiler if needed
> npm run watch

For development purpose you can use
> php artisan serve 

To serve the back office

For production purpose you should change your .htaccess (/public) 
and your vhost to serve your api (on apache or nginx) 

##Usage


