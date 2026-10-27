# MeusEstudos
Testes e projetos


## Requisitos
- XAMPP com Apache, PHP e MySQL/MariaDB
- Obiviamente, um navegador WEB

## instação no XAMPP

1. Inicie o Apache e o MySQL no XAMPP.

2. Copie a pasta `biblioteca` para o diretório
   `htdocs` do XAMPP.

3. Acesse o phpMyAdmin:
   http://localhost/phpmyadmin

4. Importe o arquivo `banco.sql` para criar
   o banco de dados e os livros iniciais.

5. Faça uma cópia do arquivo `config.exemplo.php`
   e renomeie a cópia para `config.local.php`.

6. Abra `config.local.php` e ajuste o usuário,
   a senha e a porta do MySQL, se necessário.

7. Acesse o sistema:
   http://localhost/biblioteca/index.php


# Estrutura do projeto
-`index.php`: listagem e pesquisa
-`cadastrar.php`: cadastro de livros
-`editar.php`: edição de livros
-`excluir.php`: exclusão de livros
-`conexao.php`: conexão PDO com o banco
-`config.exemplo.php`: modelo de configuração
-`config.local.php`: configuração pessoal
-`banco.sql`: estrutura e dados iniciais 
-`estilo.css`: estilização/aparencia da pagina

## Configuração pelo Terminal HEHE

1. Importe `banco.sql` no MySQL, pelo phpMyAdmin ou pelo terminal:

   ```sh
   mysql -u root -p < banco.sql
   ```

2. Copie `config.exemplo.php` para `config.php`:

   ```sh
   cp config.exemplo.php config.php
   ```

3. Edite `config.php` com o host, a porta, o nome do banco, o usuário e a senha.
4. Dentro da pasta do projeto, inicie o servidor local:

   ```sh
   php -S localhost:8000
   ```

5. Acesse http://localhost:8000 no endereço da pasta, ou utilize o XAMPP.

