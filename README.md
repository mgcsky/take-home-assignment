## Introduction
Hi team, so below is my solution and instruction to test the code

## Schema
After checking the requirements, I started creating this schema.
    - So the idea is to take the product at the center of the relations, for the attribute, I'll save the actual result on attribute value, so the attribute is basically a many-to-many table then we can achieve reuse attribute on multiple products.
    - For the product pricing, since we have product, region, and rental period as the criteria for the price, I'm using the Product_pricing table for holding price with keys from Products, Regions and Rental Period table.
![image](https://github.com/user-attachments/assets/e4c93aa2-2cbe-4b1b-bfb2-9887b0781394)

## Code Base
For this scenario, I choosing repository pattern to implement, So the controller will be the communicate center, it's calling service to do somethings. With each service, I will handle the logic and calling repository to handle DB interaction. Repository then calling Model to do query, insert, update ,etc...

To add new Repository, you can add one interface and one repository on App/Repository/[sub folder] folder. Then go to config/interface-implementations for declaration, then it will be binding in side the AppServiceProvider and ready to be use

## Testing

- setup .env file
- db migration `php artisan migrate`
- db seeding `php artisan db:seed --class="Database\Seeders\TestCodeInitSeeder"`
- running `php artisan ser` for fast up
- the API should be ready at endpoint: {host}/api/v1/products

curl:
For listing API please using below endpoint
curl --location --globoff 'https://min-test-assignment-main-x72qxh.laravel.cloud/api/v1/products?pagination[offset]=0&pagination[limit]=10&pagination[attribute][offset]=0&pagination[attribute][limit]=10&pagination[pricing][offset]=0&pagination[pricing][limit]=10&filter[region]=singapore' \
--header 'Accept: application/json'

For product count please using this one
curl --location --globoff 'https://min-test-assignment-main-x72qxh.laravel.cloud/api/v1/products/count?filter[region]=Malaysia' \
--header 'Accept: application/json'

## Live Endpoint
    https://min-test-assignment-main-x72qxh.laravel.cloud/api/v1/products

## Reponse JSON Example
Below is the response of API

```json
{
    "data": [
        {
            "id": 1,
            "name": "product01",
            "description": "product description",
            "sku": "prd-01",
            "remark": "test product 01",
            "attributes_total": 2,
            "attributes": [
                {
                    "id": 1,
                    "name": "color",
                    "value": "red",
                    "scope": "mobile"
                },
                {
                    "id": 6,
                    "name": "size",
                    "value": "18",
                    "scope": "mobile"
                }
            ],
            "pricing": [
                {
                    "price": 300,
                    "rental_period": 12,
                    "country_name": "Malaysia"
                },
                {
                    "price": 341,
                    "rental_period": 6,
                    "country_name": "Malaysia"
                },
                {
                    "price": 302,
                    "rental_period": 12,
                    "country_name": "Singapore"
                },
            ],
            "pricing_total": 3
        }
    ],
    "success": {
        "message": "Production return successfully"
    }
}
```

## Unit Test
Please update DB_CONNECTION and DB_DATABASE to test env before running the below command for the unit test
`php artisan test`

For the unit test, I'm currently using Pest PHP and fast starting to handle it.
