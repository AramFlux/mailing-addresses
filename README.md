#### Requirements
- docker 
***
## Installation
Go to the project directory and build the docker container.
This can take some time

```bash
docker-compose up -d
```

Migration is not implemented yet, so we have to create the database manually.

Enter into the docker mysql container to create the database.

```bash
docker exec -it mailing_form_mysql bash
```
Now when you are in the container you need to connect to the mysql.

```bash
mysql -u root -p
```
Here you need to enter the password. You need to take it from `config.php` file.

Create database with the query:

```bash
CREATE DATABASE address;
```

Start using the database with query:

```bash
USE address;
```

Finally, add the table with query:

```bash
CREATE TABLE addresses (id int NOT NULL AUTO_INCREMENT, address1 VARCHAR(255) NOT NULL, address2 VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, zip VARCHAR(255) NOT NULL, PRIMARY KEY (id));
```

The Application is running on port `4000`. Access the application with url http://localhost:4000/

***
`USPS_USER_ID` is needed to set in `config.php` file to access the USPS API.
To get the user id register in https://registration.shippingapis.com/ and in the email you can find the user id.