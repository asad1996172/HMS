# Hotel Management System (HMS)
This is a hotel management web application built using PHP Laravel, designed to streamline and automate hotel operations. It caters to three user types: the Customer, who can be a guest or a registered profile holder visiting the website for information or booking; the Manager, responsible for adding room information; and the Admin, who approves tasks carried out by the manager. Each user type has distinct constraints, with permissions implemented accordingly.

Features:
- User authorization and authentication
- View and search with filters, available rooms as guest
- Book rooms as a client
- View and manage bookings as a client
- Add rooms as a manager
- Approve room addition requests as an admin

Technical Details:
- Framework: PHP Laravel
- Database: MySQL
- Design Patterns: MVC (Model-View-Controller)
- Programming Languages: PHP, JavaScript, HTML, CSS
- Containerization: Dockerized using Dev Container

## How to Run
### Demo
[![Video Instructions to Run Code](https://i.ytimg.com/vi/bte1UPU9dZQ/hqdefault.jpg)](https://www.youtube.com/watch?v=bte1UPU9dZQ)

In order to run this repository, following these instructions:
1) Open using Dev Container
5) Open PhpMyAdmin using `localhost:8080`
6) Load hms.sql into the default database i.e. laravel
7) Run `composer update`
8) Run `composer install`
9) Create .env file in repos folder
10) In terminal write `php artisan serve --host=0.0.0.0 --port=8000`

## Screenshots
![](https://github.com/asad1996172/HMS/blob/master/1.png)
![](https://github.com/asad1996172/HMS/blob/master/2.png)
![](https://github.com/asad1996172/HMS/blob/master/3.png)
![](https://github.com/asad1996172/HMS/blob/master/4.png)
