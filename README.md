
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

