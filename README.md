# monte-carlo
Driving School Management Platform "Monte Carlo" group project carried out as part of the course of studies at Politechnika Opolska.

## How to run on PC:
- Make sure you have PHP and Composer installed
- Pull project
- Rename `.env.example` file to `.env` inside project root folder and fill with databse information.
- Uncomment `extension=fileinfo` in php.ini file located in \tools\php82\
- Open terminal and cd into root project directory
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan serve`

You should be able to acces the project at localhost:8000