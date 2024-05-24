# API Description

This API is a simple JSON REST API built using the Laravel framework, designed for managing members and their associated tags. The API adheres to REST architectural principles and uses JSON for data exchange.

# Entities

## Members

| Syntax                    | Description          | Required                                    |
| ------------------------- | -------------------- | ------------------------------------------- |
| `POST api/members`        | Create a new member  | name, surname, email, date_of_birth         |
| `GET api/members`         | Get list of members  |                                             |
| `GET api/members/{id}`    | Get specific member  | Id                                          |
| `PUT api/members/{id}`    | Update member        | Id, ?name, ?surname, ?email, ?date_of_birth |
| `DELETE api/members/{id}` | Delete member        | Id                                          |
| `POST api/members/{id}`   | Attach tag to member | Id, Tag_id                                  |

## Tags

Created by seeders

# JWT

JWT, or JSON Web Token, is a compact, URL-safe way to transfer claims between parties. It consists of three parts: a header, payload (claims), and signature. The claims contain information about the user or entity

| Syntax                   | Description                               | Required                   |
| ------------------------ | ----------------------------------------- | -------------------------- |
| `POST api/auth/register` | Create new user                           | name, email, password      |
| `POST api/auth/login`    | Create new JWT                            | email, password            |
| `POST api/auth/me`       | Get information about user                | Authorization Bearer token |
| `POST api/auth/logout`   | Invalide the token                        | Authorization Bearer token |
| `POST api/auth/refresh`  | Refresh current token (returns a new one) | Authorization Bearer token |

# Bonus features

-   PORTO architecture
-   Repository pattern
-   Pest tests
-   JWT Bearer token

# TODO
- Logout and refresh - how it works