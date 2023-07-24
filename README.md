# laravel-doctrine-exemple
Small Project Demonstrating the Use of Laravel Doctrine

## Description:
This project showcases the integration and usage of Laravel Doctrine, a package that allows seamless integration of the Doctrine ORM with Laravel applications. Laravel Doctrine provides a powerful and flexible way to manage database interactions, mapping entities to database tables, and executing database queries efficiently.

## Features:

### Entity Creation: 
Demonstrates how to create entities that represent database tables and their relationships.

### Repository Pattern: 
Implements the repository pattern to handle data access and abstracts away the underlying database logic.

### CRUD Operations: 
Illustrates how to perform CRUD (Create, Read, Update, Delete) operations using the Laravel Doctrine repository.

### Query Builder: 
Utilizes the Doctrine Query Builder to construct complex database queries and fetch data efficiently.

### Entity Manager: 
Utilizes the Doctrine Entity Manager to persist and update entities.

### Requirements:

PHP 8.1 or higher
Laravel 9.x
Laravel Doctrine 1.8.x


## Installation Steps:

Clone the project from the repository.
Install dependencies using Composer: 

```
    composer install
```

Create a new database and configure the database connection in the .env file.
Run migrations to create the required database tables: 

```
    php artisan migrate
``` 

Seed the database with sample data (optional):

```
    php artisan db:seed
```

## Usage:
The project provides several endpoints that demonstrate the usage of Laravel Doctrine features. These endpoints can be accessed through the web browser or API client like Postman.

### Endpoints:

POST /api/register: Creates a new user in the database.

POST /api/login: Authenticate user e generate token JWT.

### Endpoints restricted:

GET /api/user: Retrieves a specific user by authenticated.

GET /api/customers: Fetches all customers from the database.

GET /api/customers/{id}: Retrieves a specific customer by their ID.

POST /api/customers: Creates a new customer in the database.

PUT /api/customers/{id}: Updates an existing customer.

DELETE /api/customers/{id}: Deletes a customer from the database.


## Postman

Use the [Postman](https://raw.githubusercontent.com/marcos-queiroz/laravel-doctrine-exemple/main/test.postman_collection){:target="_blank" download} file to run the tests.

Remember to change the {{base_url}} variable to your context.

---
## Conclusion:

This small project serves as a practical example of how Laravel Doctrine can be integrated into Laravel applications. By using Laravel Doctrine, developers can take advantage of powerful ORM features and better manage database interactions, leading to more efficient and maintainable applications. Feel free to explore the codebase to understand how Laravel Doctrine simplifies database operations and enhances the overall development experience.
