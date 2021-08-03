# Laravel Docker Currency Converter


### How to run this project

To run this project you need to have docker and docker-compose installed in your machine.

Take the following steps:

- clone repository: 'git clone https://github.com/Dini108/laravel-docker-currency-converter'
- change directory: 'cd laravel-docker-currency-converter'
- run command: 'docker-compose build'
- run command: 'docker-compose up'
- run command: 'docker exec -it laravel-currency-converter bash'
- run command: 'composer install' 
- create an '.env' file from '.env.example'
- fill CURRENCY_CONVERTER_API_KEY, EXCHANGE_RATES_API_KEY in .env file
- run command: 'php artisan key:generate'

Webpage path: http://localhost

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
