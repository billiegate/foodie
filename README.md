<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## About Fudie

An application that manages food inventories and orders.

- [Multiple auth system for customers, admins and couriers].
- [Ability for admins to add inventory in real time].
- [View and manage inventories].

Application is built with laravel and vuew and can be found [here](http://fudies.herokuapp.com/)

##Routing

Endpoints are varied between 
- HTTP REST API
- Basic HTTP Request

this is to ensure both web and app are properly served

## REST ENDPOINT

- **[user loginc - POST /api/auth/login/user ](/api/auth/login/user)**
- **[admin login - POST /api/auth/login/admin ](/api/auth/login/admin)**
- **[courier login - POST /api/auth/login/courier](/api/auth/login/courier)**
- [item list - GET /api/item](/api/item)
- [item Creation - POST /api/item](/api/item)

## Previleges

- You will only be able to create an item if you are an admin and logged in as one.

Feel free to create a pull request to this project, or mail me [afolabitope@ymail.com] (mailto:afolabitope@ymail.com)

## Contributing

Feel free to create a pull request to this project, or mail me [afolabitope@ymail.com] (mailto:afolabitope@ymail.com)

## Security Vulnerabilities

If you discover a security vulnerability within App, please send an e-mail to Afolabi Tope via [afolabitope@ymail.com](mailto:afolabitope@ymail.com). All security vulnerabilities will be promptly addressed.

## License

This is open-sourced application licensed under the [MIT license](https://opensource.org/licenses/MIT).
