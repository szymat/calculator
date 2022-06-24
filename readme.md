# Task
A calculator should be implemented as a RESTful web service. The API should be used by other developers for
their frontend applications or apps, but also be available for partners and business customers.
The calculator must accept two values at a time and should support the four basic arithmetic operations
addition, subtraction, multiplication and division.

# Requirements
- bc math
- php 8.1

# Run
```shell
composer install
php bin/console lexik:jwt:generate-keypair
```

# Usage
Login to acquire JWT token by sending 
```http request
POST /api/login_check
Content-Type: application/json

{
  "username": "user@e.com",
  "password": "123456"
}
```
You can also login as example vendor "vendor@e.com".
Users are done by simple user provider, I did not want to use database so project would be easy to run without any db required.


You can execute calculations on this endpoint (a or b must be numeric):

```http request
POST /api/calculator/{type}

{
    "a": "43.53",
    "b":0
}

```
where type must be: 
```php
enum CalculationTypeEnum : string
{
    case Addition = 'addition';
    case Subtraction = 'subtraction';
    case Multiplication = 'multiplication';
    case Division = 'division';
}
```

upon success endpoint will return:
```json
{
    "results": "43.53000000"
}
```

# Tests
There are simple unit tests present, you can run `php bin/phpunit` to execute them.

# DTO without types
I used DTO without types for symfony serializer to not throw exceptions on invalid types, symfony is still working on this issue (I even opened a issue on github for them: https://github.com/symfony/symfony/issues/44925).
I did not want to use JMS Serializer nor forms with API.

# Final thoughts
I created project with simples approaches that are fast and not over-complicated, DDD would be possible to implement, but simple modular monolith in this case is already overkill.
There is a hidden easter egg in Commands. :)
