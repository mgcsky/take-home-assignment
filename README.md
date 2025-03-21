## Introduction
Hi team, so below is my solution and instruction to test the code

## Schema
After checking the requirements, I started creating this schema.
    - So the idea is to take the product at the center of the relations, for the attribute, I'll save the actual result on attribute value, so the attribute is basically a many-to-many table then we can achieve reuse attribute on multiple products.
    - For the product pricing, since we have product, region, and rental period as the criteria for the price, I'm using the Product_pricing table for holding price with keys from Products, Regions and Rental Period table.
![image](https://github.com/user-attachments/assets/e4c93aa2-2cbe-4b1b-bfb2-9887b0781394)

## Code Base
For this scenario, I choosing repository pattern to implement, So the controller will be the communicate center, it's calling service to do somethings. With each service, I will handle the logic and calling repository to handle DB interaction. Repository then calling Model to do query, insert, update ,etc...

## Testing

- setup .env file
- db migration `php artisan migrate`
- db seeding `php artisan db:seed --class="Database\Seeders\TestCodeInitSeeder"`
- running `php artisan ser` for fast up
- the API should be ready at endpoint: {host}/api/v1/products

curl:
curl --location --globoff 'http://127.0.0.1:8000/api/v1/products?offset=0&limit=10&attributeLimit=10&attribute_offset=0&pricingLimit=10&pricing_offset=0&filter[region]=singapore' \
--header 'Accept: application/json'

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
            "pricing": {
                "Singapore": [
                    {
                        "rental_period": 12,
                        "price": 357
                    },
                    {
                        "rental_period": 3,
                        "price": 368
                    }
                ],
                "Malaysia": [
                    {
                        "rental_period": 3,
                        "price": 371
                    },
                    {
                        "rental_period": 6,
                        "price": 376
                    }
                ]
            }
        }
    ],
    "success": {
        "message": "Production return successfully"
    }
}
```
