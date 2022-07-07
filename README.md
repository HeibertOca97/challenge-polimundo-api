### Note: about the extra points for using Docker.

Docker, I never used it before but I know what it is for and its benefits in project development.

I could say that an important point of this is that it allows us to create containers (virtual machine) with which our projects are executed, which we have in other versions different from the programming language that is being used in our own machine. That helps avoid certain bugs or compatibility issues.

# Challenge Back-end

- Descarga la última version de Laravel
- Crea migraciones, seeders y modelos, para 2 tablas, cada una con 3 columnas (sin contar el ID, y los 2 timestamps)
- Crea 2 endpoints de API para cada tabla, el 1ero para toda la colección (todos los datos); eje: api/persona, el 2do para el recurso (un registro en especifico, via su ID); eje: api/persona/1.

## Created Table

- Passengers

- Tickets

## Fields of the "Passengers" table

| Fields         | Type       |
| -------------- | ---------- |
| id             | integer    |
| name           | string     |
| surname        | string     |
| identification | string     |
| created_at     | timestamps |
| updated_at     | timestamps |

## Fields of the "Tickets" table

| Fields            | Type       |
| ----------------- | ---------- |
| id                | integer    |
| origin_city       | string     |
| destiny_city      | string     |
| departure_date_at | date       |
| created_at        | timestamps |
| updated_at        | timestamps |

## Entity Files

| Entity    | Files                                                     |
| --------- | --------------------------------------------------------- |
| Passenger | Model - Controller - Migration - Factorie - Seeder - Test |
| Ticket    | Model - Controller - Migration - Factorie - Seeder - Test |

## API Route list

| Method | URI                 | Action | Middleware |
| ------ | ------------------- | ------ | ---------- |
| GET    | api/passengers      | index  | api        |
| GET    | api/passengers/{id} | show   | api        |
| GET    | api/tickets         | index  | api        |
| GET    | api/tickets/{id}    | show   | api        |

## Testing

Write the following line of code to run the tests.

`php artisan test --testsuite=Feature`

![](https://res.cloudinary.com/heibertoca97/image/upload/v1657153496/testing/testing_beor8h.png)


