## Introduction
Hi team, so below is my solution and instruction to test the code

## Schema
After checking the requirements, I started creating this schema.
    - So the idea is to take the product at the center of the relations, for the attribute, I'll save the actual result on attribute value, so the attribute is basically a many-to-many table then we can achieve reuse attribute on multiple products.
    - For the product pricing, since we have product, region, and rental period as the criteria for the price, I'm using the Product_pricing table for holding price with keys from Products, Regions and Rental Period table.
![image](https://github.com/user-attachments/assets/e4c93aa2-2cbe-4b1b-bfb2-9887b0781394)

## Testing

- db migration `php artisan migrate`
- db seeding `php artisan db:seed --class="Database\Seeders\TestCodeInitSeeder"`
