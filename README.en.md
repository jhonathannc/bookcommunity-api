<p align="center"><img src="https://i.ibb.co/bK4bF9H/laravelrest.png" width="400"></p>

<p align="center">
<img alt="GitHub repo size" src="https://img.shields.io/github/repo-size/jhonathannc/bookcommunity-api?color=blue&label=Repo%20Size&style=plastic">
<img alt="GitHub stars" src="https://img.shields.io/github/stars/jhonathannc/bookcommunity-api">
<img alt="GitHub top language" src="https://img.shields.io/github/languages/top/jhonathannc/bookcommunity-api">
<img alt="GitHub language count" src="https://img.shields.io/github/languages/count/jhonathannc/bookcommunity-api">
<img alt="GitHub" src="https://img.shields.io/github/license/jhonathannc/bookcommunity-api">
</p>

### 📋 Index

- [About](#-About)
- [API Functions](#-API-Functions)
- [Technologies used](#-Technologies-used)
- [Resources Used](#-Resources-Used)
- [How to run the project](#-How-to-run-the-project)
- [Endpoints](#-Endpoints)
- [Preview](#-Preview)
- [License](#-License)

### 📖 About

This is a simple API that allows you to register a user, login, reset the password, search the books registered in the database, register a new book and edit it. At first I chose laravel, as this is an excellent framework that helps me a lot in the development, giving me many ready methods and making me focus only on the real solution of the project. Well, the api uses jwt authentication, making sure that no route is accessed except if the user logs in and uses his token to make requests. When registering, the user receives a verification request in his email and does not have access to requests until his email is verified. After the email is verified, he is able to make requests in the api. Aaah, if he forgets his password, he also receives an email to reset his password. When adding a book, he can see his edited book in a listing, and laravel provides the entire listing by pages, that is, he will see 5 books at a time. In this api, it is also possible to make a review about the book, where the user chooses which book he wants to evaluate (grade from 1 to 5), and write a brief comment (being able to edit it too). Well, this is how the api works, it seems simple, but it gave me a lot of knowledge, especially with the jwt, which I thought would be a great villain, because its documentation is very weak, so I had to resort to various forums and tutorials on the internet. I used as a base several tutorials on the internet, and some templates too, because my intention here was not to develop a ready code, but to understand how this relation of an api rest made with laravel using jwt authentication works. So, if you are the author of any code or template used here, please contact me and I will be very grateful to put your reference here. Below I will leave some of the references I used as a base, because as I said I used several articles and videos on the internet.

- [Build a REST API with Laravel API resources](https://blog.pusher.com/build-rest-api-laravel-api-resources/).
- [JWT Documentation](https://jwt-auth.readthedocs.io/en/develop/).
- Playlist [Laravel Tips](https://www.youtube.com/playlist?list=PLi_gvjv-JgXqop7hgVKZMGPiT9rUYy1sr) in [UpInside](https://www.youtube.com/channel/UCw6vF0DoeshwUcmBnjUe2ZQ) youtube channel.
- Laravel API building articles series on the [Rafaell Lycan](https://rafaell-lycan.com/) blog. [Parte 1](https://rafaell-lycan.com/2015/construindo-restful-api-laravel-parte-1/), [Parte 2](https://rafaell-lycan.com/2016/construindo-restful-api-laravel-parte-2/), [Parte 3](https://rafaell-lycan.com/2016/construindo-restful-api-laravel-parte-3/).
- [Build authentication into your Laravel API with JSON Web Tokens (JWT)](https://medium.com/employbl/build-authentication-into-your-laravel-api-with-json-web-tokens-jwt-cd223ace8d1a)
- [How to Build a Laravel 5.5 JWT Authentication API with E-Mail Verification](https://medium.com/mesan-digital/tutorial-5-how-to-build-a-laravel-5-4-jwt-authentication-api-with-e-mail-verification-61d3f356f823)
- [HTTP Status Codes](https://httpstatuses.com/)
- And several other articles on medium and stackoverflow.

### ✅ API Functions

In summary, these are the functions of the API:
```bash
• User registration.
• Sending email when the user registers (for the user to validate their email and release their use in the system).
• Reset user password with an email confirmation.
• Connection token expires in 60 minutes.
• Email validation / password reset token expires in 60 minutes.
• Registering a book
• Evaluate any book with a note and comment.
• Edit your book.
• API blocks when a user tries to edit a book that was not added by him.
• Delete book.
• List of all books. note: the api returns 5 books per request to make the request lighter.
• All requests return their due status code, whether it is a success or an error.
```

### 💻 Technologies used

This API uses the following technologies:

```bash
• PHP7
• Database with MySQL.
• Authentication with JWT.
• Laravel 7 as the base of the API and its features as:
     # Migrations.
     # Middlewares.
     # Resources Routes.
     # Database relationship methods.
     # Request data validation.
     # Pagination of data.
     # Sending email (check new user when he registers or reset password).
```

### 📂 Resources Used
- [<b> PHPStorm </b>] (https://www.jetbrains.com/pt-br/phpstorm/) - For me, the best idea for php today.
- [<b> Insomnia </b>] (https://insomnia.rest/download/) - Test all api endpoints.
- [<b> Mailtrap </b>] (https://mailtrap.io/) - View your email submissions.
- [<b> DBeaver </b>] (https://dbeaver.io/) - Administer the database.

### 🔗 How to run the project

``` bash
Install PHP (Version 7)
# https://www.php.net/downloads

Install MySQL
# https://www.mysql.com/downloads/

Install Composer
# https://getcomposer.org/download/

Clone the repository
# git clone https://github.com/jhonathannc/bookcommunity-api

Enter directory
# cd bookcommunity-api

Generate an .env file
# cp .env.example .env

Create a database and put its information in the .env file
# DB_CONNECTION = mysql
# DB_HOST = 127.0.0.1
# DB_PORT = 3306
# DB_DATABASE = database-name
# DB_USERNAME = user
# DB_PASSWORD = password

Download dependencies
# composer install

Laravel Setup
# php artisan key: generate

Setup JWT
# php artisan jwt: secret

Set up a smtp (I used mailtrap)
# MAIL_MAILER = smtp
# MAIL_HOST = smtp.mailtrap.io
# MAIL_PORT = 2525
# MAIL_USERNAME = user
# MAIL_PASSWORD = password
# MAIL_ENCRYPTION = tls
# MAIL_FROM_ADDRESS=mailtrap@io.com

Configure database
# php artisan migrate

Run the API
# php artisan serves
```
Okay, if everything went well, the api is already working normally!
Leave an insomnia file in the repository for testing all endpoints.

### 🌐 Endpoints
<img src="https://i.ibb.co/98TtJwJ/api-endpoints.png" width="400">

### 🖥 Preview
<p align="center">Emails - Bem-vindo e Recuperação de senha</p>
<p align="center">
    <a href="https://imgbb.com/"><img src="https://i.ibb.co/N13qSMn/welcome-mail.png" alt="welcome-mail" width="400"></a>
    <a href="https://imgbb.com/"><img src="https://i.ibb.co/YRw3s48/recover-mail.png" alt="recover-mail" width="400"></a>
</p>
<p align="center">Formulário de recuperação de senha</p>
<p align="center">
    <a href="https://imgbb.com/"><img src="https://i.ibb.co/SBBFS3M/recover.png" alt="recover" border="0" width="400"></a>
    <a href="https://imgbb.com/"><img src="https://i.ibb.co/g3C3sFF/recoverdone.png" alt="recoverdone" border="0" width="400"></a>
</p>

### 📋 License
This API uses the [MIT license](https://opensource.org/licenses/MIT).
