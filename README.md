# C$50 Finance

A web app developed in PHP to buy and sell stocks.
Current stock prices are picked up using Yahoo Finance.

## Using the app :
- Install Apache
- Install MySQL
- Run your apache server 
- Run Mysql server

## Configuring the database:

- Make a new database with any name and use PHPmyadmin interface to run the sql code in pset7.sql

- Make a new file config.json and add the following lines :
```
{
    "database": {
        "host": "localhost",
        "name": "database_name",
        "username": "your_mysql_username",
        "password": "your_mysql_password"
    }
}
```


