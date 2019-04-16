Minhas notas
============

**O que eu preciso?**

- PHP Storm
- Postman
- Terminal aberto no projeto
- Rodar o servidor do PHP
- Preciso abrir o SGBD e deixar as consultas abertas
- http://localhost:8000/api/ceuma-challenge/

**Observações:**

- ENTIDADE É A REPRESENTAÇÃO DO BANCO DE DADOS ATRAVES DE UMA CLASSE PHP, ONDE AS PROPRIEDADES DESSA ENTIDADE SÃO AS COLUNAS DE UMA TABELA NO BANCO.
- `bin/console doctrine:schema:create --dump-sql` - Irá mostrar a querry de criação do banco de dados que o doctrine realizou
- `bin/console doctrine:schema:create --force` (se precisar forçar o doctrine a criar o schema)

**GIT**

git status - mostra status da arvore do projeto
git add . (pra adicionar tudo)
ou
$git add (caminho)
$git push origin master (ENVIAR PARA O GITHUB)

$request 
Variável de requisição
Um array que contém as informações de $GET, $POST...

para criar a form 
bin/console

Repository == Entity

`bin/console debug:route` - mostra as rotas da API
