## DDD
[DDD Diagram](https://medium.com/spotlight-on-javascript/domain-driven-design-for-javascript-developers-9fc3f681931a)

* Domain: /app  
* Subdomains: /app/Domain (Context)

### Infrastructure layer
* Contains implementations of repositories and services
* Knows about the database
* Works with IoC (Inversion of Control) (Dependency Injection) Container

### Application
* Routing
* Configs

**Create client**
```PHP
use Illuminate\Support\Str;

new Client(
    Str::uuid(),
    new Name('Firstname', 'Lastname'),
    new Address('Germany', 'Essen', '45141', 'Bismarkstr 12'),
    new Phone('+49', '234', '656577585')
);
```

**Create Item**
```PHP
use Illuminate\Support\Str;

$item = new Item(Str::uuid(), 'Silver bullet', Money::USD(1000));
$item->setDescription('This Bullet is nice!');
```

**Create**
```PHP
use Illuminate\Support\Str;

$client = new Client(
    Str::uuid(),
    new Name('Firstname', 'Lastname'),
    new Address('Germany', 'Essen', '45141', 'Bismarkstr 12'),
    new Phone('+49', '234', '656577585')
);

$item = new Item(Str::uuid(), 'Silver bullet', Money::USD(1000));
$quantity = 2;

$bill = new Bill(Str::uuid(), $client);
$bill->addPosition(new Position($item, $quantity));

// Add position to bill
$anotherPosition = new Position(
    new Item(Str::uuid(), 'Rage cup', Money::USD(500))
);
$bill->addPosition([$anotherPosition]);
$bill->changeStatus(new ProcessingStatus());
```
