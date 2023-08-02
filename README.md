# Challenge Culture Studio

Hi! I'm Julian, I'll trough you step by step in this documentation with the purpose to know technical details and how you could build these projects in your local machine. 

## Solution for the SQL scripts

 These are the SQL scripts to solve the first point of the challenge.

- Write a SQL query to get the usernames and email address of all users from the users table.
	> SELECT username, email FROM users;
- Write a SQL query to get the name, description, and price of all products from the products table.
	> SELECT name, description, price FROM products;
- Write a SQL query to retrieve the order total amount for a given id from the orders table.
	> SELECT total FROM orders WHERE id = order_id;
- Write a SQL query to get the list of products and their quantities ordered for a specific order_id from the order_items table.
	> SELECT product_id, qty FROM order_items WHERE order_id = specific_order_id;
- Write a SQL query to update the stock_quantity of a product with a given product_id in the products table.
	> UPDATE products SET stock_quantity = new_stock_quantity WHERE Id = product_id;
- What can be done to the schema(s) above to optimize queries? If so, provide me with exact step by step instructions (queries). This question is strictly based on the table structures a.
	> I'd suggest to use indexes in the tables that will save more load data (orders table)
	> Use appropiate data type for the columns, for example INT or VARCHAR
	> Denormilize the `orders`  table, denormalize and store the total amount directly in the `orders` table. This way, you won't need to join with the `order_items` table and perform calculations every time.
- Given a specific order_id, write a SQL query that will return all the products for that order including name, price, order total, created date of the order, full name of the user who created the order
	> SELECT
    o.id AS order_id,
    p.name AS product_name,
    p.price AS product_price,
    SUM(oi.qty * p.price) AS order_total,
    o.created_at AS order_created_at,
    CONCAT(u.first_name, ' ', u.last_name) AS user_full_name
FROM orders o
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON oi.product_id = p.id
JOIN users u ON o.user_id = u.id
WHERE o.id = your_order_id;


# Backend Project

It's a Laravael project, 

In the Model package it has the data model classes (Entities), for the ORM process I selected the Laravel's Eloquent ORM, that ORM is easy to understand and has improvement to work on Laravel framework. 

It has the logic for all the CRUD operations.

It´s not functional at this moment, I'm prwsenting an issue when it´s running the docker-compose up command.



# Frontend Project

It's an Angular project


# Build the project


You need to have installed this software stacks in terms to buils the project code in your local machine:
- Docker  installed
- MySQL image running in your local, you can accomplish it using this docker command
- Go to the root of the project and run this command
	> docker-compose build
- Run the Laravel project, in the root path run this command:
	> docker-compose up
