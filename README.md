# demo-php-site

A simple demo webpage to demonstrate the usage of php for web dev.

## Pre-requisites

```sh
# Install php
sudo apt update
sudo apt install php php-sqlite3
```

## Running php server

```sh
# On first use, run init.php to create database and perform other initial tasks
php init.php

# Run to print current users
php run.php

# Run index.php at localhost:8080
php -S localhost:8080 index.php
```

## Possible additional features

1. Implement security including username validaiton, password validation and secure storing of a password.
2. Add a button to look up account settings.
3. Add a button to go to do the maths challange: Doing a series of maths questions till you get the wrong answer. There is a scoreboard for each user.