<p align="center"><img src="https://i.ibb.co/bK4bF9H/laravelrest.png" width="400"></p>

<p align="center">
<img alt="GitHub repo size" src="https://img.shields.io/github/repo-size/jhonathannc/bookcommunity-api?color=blue&label=Repo%20Size&style=plastic">
<img alt="GitHub stars" src="https://img.shields.io/github/stars/jhonathannc/bookcommunity-api">
<img alt="GitHub top language" src="https://img.shields.io/github/languages/top/jhonathannc/bookcommunity-api">
<img alt="GitHub language count" src="https://img.shields.io/github/languages/count/jhonathannc/bookcommunity-api">
<img alt="GitHub" src="https://img.shields.io/github/license/jhonathannc/bookcommunity-api?color=blue">
</p>

Needs README in english? [Check here](https://github.com/jhonathannc/bookcommunity-api/blob/master/README.en.md)


### 📋 Índice

- [Sobre](#-Sobre)
- [Funções da API](#-Funções-da-API)
- [Tecnologias utilizadas](#-Tecnologias-utilizadas)
- [Recursos utilizados](#-Recursos-Utilizados)
- [Como executar o projeto](#-Como-executar-o-projeto)
- [Endpoints](#-Endpoints)
- [Preview](#-Preview)
- [Licença](#-Licença)

### 📖 Sobre

Esta é uma API simples, que permite fazer cadastro de usuario, login, redefinir a senha, pesquisar os livros cadastrados na base da dados, cadastrar um novo livro e editá-lo. De inicio eu escolhi o laravel, pois esse é um excelente framework que me auxilia e muito no desenvolvimento, me entregando muitos métodos prontos e fazendo com que eu foque apenas na solução real do projeto. Bom pra começar, a api utiliza de uma autenticação por jwt, fazendo com que nenhuma rota seja acessada exceto se o usuário efetuar o login e utilizar de seu token para fazer as requisições. Ao se cadastrar, o usuário recebe em seu email, um pedido de verificação e não tem acesso as requisições até que seu email esteja verificado. Após o email verificado, ele está apto para fazer requisições na api. Aaah, se ele esquecer a senha, ele também recebe um email para redefinir sua senha. Ao adicionar um livro, ele pode ver o seu livro editado em uma listagem, e o laravel fornece toda a listagem por páginas, ou seja, ele verá 5 livros por vez. Nesta api, também é possível fazer uma resenha sobre o livro, onde o usuário escolhe qual livro ele deseja avaliar (nota de 1 a 5), e escrever um breve comentário (podendo editá-lo também). Toda a programação foi feita em inglês, para treinar um pouco minhas habilidades em inglês e também porque meu [phpstorm](https://www.jetbrains.com/pt-br/phpstorm/) não tem dicionário em português, então ele fica me sugerindo que há erros de ortografia e eu tenho toc com isso 😅. Bom, o funcionamento da api é esse, parece simples, mas me rendeu muito conhecimento, principalmente com o jwt, que achei que seria um grande vilão, pois sua documentação é bem fraca, então tive que recorrer a vários fóruns e tutoriais na internet. Usei como base vários tutoriais na internet, e alguns templates também, pois a minha intenção aqui não era desenvolver um código pronto, e sim entender como funciona o essa relação de uma api rest feita com laravel utilizando autenticação com jwt. Então, se você é autor de algum código ou template aqui usado, porfavor, entre em contato comigo e ficarei muito grato em colocar sua referência aqui. Abaixo vou deixar algumas das referências que usei como base, pois como dito utilizei de vários artigos e videos na internet.


- [Build a REST API with Laravel API resources](https://blog.pusher.com/build-rest-api-laravel-api-resources/).
- [Documentação JWT](https://jwt-auth.readthedocs.io/en/develop/).
- Playlist do [Laravel Tips](https://www.youtube.com/playlist?list=PLi_gvjv-JgXqop7hgVKZMGPiT9rUYy1sr) no canal da [UpInside](https://www.youtube.com/channel/UCw6vF0DoeshwUcmBnjUe2ZQ) no youtube.
- Série de artigos de contrução de API Laravel no blog do [Rafaell Lycan](https://rafaell-lycan.com/). [Parte 1](https://rafaell-lycan.com/2015/construindo-restful-api-laravel-parte-1/), [Parte 2](https://rafaell-lycan.com/2016/construindo-restful-api-laravel-parte-2/), [Parte 3](https://rafaell-lycan.com/2016/construindo-restful-api-laravel-parte-3/).
- [Build authentication into your Laravel API with JSON Web Tokens (JWT)](https://medium.com/employbl/build-authentication-into-your-laravel-api-with-json-web-tokens-jwt-cd223ace8d1a)
- [How to Build a Laravel 5.5 JWT Authentication API with E-Mail Verification](https://medium.com/mesan-digital/tutorial-5-how-to-build-a-laravel-5-4-jwt-authentication-api-with-e-mail-verification-61d3f356f823)
- [HTTP Status Codes](https://httpstatuses.com/)
- E vários outros artigos no medium e stackoverflow.

### ✅ Funções da API
Resumidamente, essas são as funções da API:
```bash
• Cadastro de usuário.    
• Envio de email quando usuário se cadastra (para o usuário validar seu email e liberar seu uso no sistema).
• Redefinir senha de usuário com uma confirmação no email.
• Token de login expira em 60 minutos.
• Token de validacao de email/redefinição de senha expira em 60 minutos.
• Cadastro de um livro 
• Avaliação qualquer livro com nota e comentário.
• Editar seu livro.
• API bloqueia quando um usuario tenta editar um livro que não foi adicionado por ele.
• Deletar livro.
• Listagem de todos os livros. obs: a api retorna 5 livros por requisição para tornar a request mais leve.
• Todas as requisições retornam seu devido status code, sendo ele de sucesso ou erro.
```

### 💻 Tecnologias utilizadas

Esta API utiliza das seguintes tecnologias:

```bash
• PHP7
• Banco de dados com MySQL.    
• Autenticação com JWT.
• Laravel 7 como a base da API e seus recursos como:
    # Migrations.
    # Middlewares.
    # Resources Routes.
    # Métodos de relacionamentos do banco de dados.
    # Validação de dados da request.
    # Paginação dos dados.
    # Envio de email (verificar novo usuário quando ele se cadastra ou redefinir senha).
```

### 📂 Recursos Utilizados
- [<b>PHPStorm</b>](https://www.jetbrains.com/pt-br/phpstorm/) - Pra mim a melhor ide para php atualmente.
- [<b>Insomnia</b>](https://insomnia.rest/download/) - Testar todos os endpoints da api.
- [<b>Mailtrap</b>](https://mailtrap.io/) - Visualizar os envios de email.
- [<b>DBeaver</b>](https://dbeaver.io/) - Administrar o banco de dados.

### 🔗 Como executar o projeto

```bash
Instalar o PHP (Versão 7)
# https://www.php.net/downloads

Instalar o MySQL
# https://www.mysql.com/downloads/

Instalar o Composer
# https://getcomposer.org/download/

Clonar o repositório
# git clone https://github.com/jhonathannc/bookcommunity-api

Entrar no diretório
# cd bookcommunity-api

Gerar um arquivo .env
# cp .env.example .env

Criar um banco de dados e colocar as informações dele no arquivo .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=nome-do-banco-de-dados
# DB_USERNAME=usuario
# DB_PASSWORD=senha

Baixar as dependências
# composer install

Setup Laravel
# php artisan key:generate

Setup JWT
# php artisan jwt:secret

Configurar um smtp (utilizei o mailtrap)
# MAIL_MAILER=smtp
# MAIL_HOST=smtp.mailtrap.io
# MAIL_PORT=2525
# MAIL_USERNAME=usuario
# MAIL_PASSWORD=senha
# MAIL_ENCRYPTION=tls
# MAIL_FROM_ADDRESS=mailtrap@io.com

Configurar banco de dados
# php artisan migrate

Executar a API
# php artisan serve
```

Pronto, se tudo ocorreu bem, a api ja está funcionando normalmente!
Deixar no repositório um arquivo do insomnia para o teste de todo os endpoints.

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

### 📋 Licença
Esta API está dotada da [MIT license](https://opensource.org/licenses/MIT).
