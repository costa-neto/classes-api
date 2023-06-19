# Classes API

> Glofox is a saas platform for boutiques, studios, and gyms which allows business owners to manage
their courses, classes, members, memberships etc,.


## ⚙️ Technologies

* [PHP 8.1](https://www.php.net/releases/8.1/en.php)
* [Docker](https://www.docker.com/)
* [Visual Studio Code](https://code.visualstudio.com/)
* [Composer](https://getcomposer.org/)
* [Leaf](https://leafphp.dev/)
* [SQLite](https://www.sqlite.org/index.html)

## 🧱 Structure
The project is structured with a SQLite database with the following tables:
```sql
CREATE TABLE classes(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    class_name STRING NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    capacity INTEGER NOT NULL
);

CREATE TABLE bookings (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    booking_date DATE NOT NULL,
    member_name STRING NOT NULL
);
```
The architecure is based on the Repository-Service Pattern and in the structure given in the skeleton mvc boilerplate provided by leaf.
Some improvements I would like to make with given time:

- [ ] Add unit tests
- [ ] Improve dependency injection practices
- [ ] Add feature to get bookings for each class
- [ ] Add caching resources

## 💻 Prerequisites

Before starting, make sure you:
* Installed [`Docker` and `Docker-Compose`](https://docs.docker.com/compose/install/)


## 🚀 Building

To build the project, follow these steps:

Inside the project folder, run this command to build the container:
```
docker-compose build
```


## ☕  Running
To run the project, all you have to do is run this command:

```
docker-compose up

```
You can then access the route http://localhost:8080/classes and check some previously created classes.

The routes are /classes and /bookings, both accept get and post requests, some samples requests are:

`GET - http://localhost:8080/classes/`

`GET - http://localhost:8080/bookings/`

`POST - http://localhost:8080/classes/`
```json
{
    "class_name": "Super Dancing Class",
    "start_date":"16/07/2023",
    "end_date":"31/07/2023",
    "capacity":40
}
```

`POST - http://localhost:8080/bookings/`
```json
{
    "member_name": "Neto Costa",
    "booking_date": "25/06/2023"
}
```

