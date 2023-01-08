# true-compliance

> True-Compliance Test

## Getting started

``` bash
# install dependencies
git clone https://github.com/aleronal/true-compliance.git
cd true-compliance


# create .env file and generate the application key
cp .env.example .env
php artisan key:generate
composer install
php artisan migrate
php artisan db:seed --class=SqlFileSeeder 

Then launch the server:


php artisan serve
The Laravel project is now up and running! Access it at http://localhost:8000.

```

## Running Tests

To run tests, run the following command

```bash
  php artisan test
  
```


## Write a MySQL raw query & eloquent query to get properties which have more than 5 certificates

```mysql
SELECT * FROM properties
WHERE (SELECT COUNT(*) FROM certificates WHERE certificates.property_id = properties.id) > 5;

```

#Eloquent

```bash
  $properties = Property::withCount('certificates')
                        ->having('certificates_count', '>', 5)
                        ->get();
```




