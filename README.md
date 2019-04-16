Desafio Prático - Desenvolvedor Grupo Ceuma
===========================================

Problema
--------

A Universidade CEUMA contratou uma empresa terceirizada para criar um sistema de gerenciamento dos alunos nos cursos que eles escolheram. Esta empresa começou a desenvolver o sistema, mas por falta de conhecimento técnico acabou desistindo do projeto. Você foi indicado para desenvolver o sistema com os mesmos requisitos solicitados pela Universidade, sendo que os usuários desse sistema são pessoas que possuem dificuldade em utilizar computadores e precisam que o mesmo proporcione uma experiência agradável.

**O sistema deverá ser capaz de:**

- [x] Inserir 3 cursos (código do curso, nome do curso, data de cadastro, carga horária):

    - Administração
    - Direito
    - Medicina

- [x] Remover cursos
- [x] Alterar cursos

- [x] Inserir 7 alunos (código do aluno, nome do aluno, CPF, Endereço, CEP, E-mail, número de Telefone atrelados aos respectivos cursos na seguinte configuração:

    - 2 alunos para Direito
    - 2 para Administração
    - 3 para Medicina

- [x] Remover alunos;
- [x] Alterar alunos;
- [x] Listar os cursos e os alunos que fazem parte deste curso;
- [x] É desejável que o sistema também seja capaz de prevê erros de usuários no ato do cadastro das informações;
- [x] É desejável que o sistema contenha um controle de segurança de acesso ao sistema;

- [ ] É desejável que o sistema possa imprimir os dados dos cursos;
- [ ] É desejável que o sistema guarde logs de acesso na base de dados;
- [ ] O sistema deve exportar a lista de cursos e alunos para planilha excel;

### Este problema deverá ser resolvido e criado nas seguintes tecnologias:

- [x] Qualquer tecnologia de Backend (REST);
- [x] Qualquer base de dados relacional;
- [ ] Qualquer tecnologia de Frontend;

### O que iremos avaliar:

- Legibilidade de código;
- Testes;
- Coesão;
- Documentação;
- Hora da Entrega
- E não se esqueça do visual;

### Tecnologias utilizadas:

- PHP 7.1 e suas tecnologias - Symfony 4.2
- Banco de Dados Relacional  - PostgreSQL
- Token JWT
- Git 2.11
- Postaman (utilitário para testes de API)

### Como usar isto

Para utilizar este projeto siga os seguintes passos:

1. clone o projeto na sua maquina local
2. execute: `composer install`
3. execute: `bin/console server:start` ou `php -S localhost:8000 -t public`
4. acesse a porta exibida, conforme os comandos acima.

### LICENSE

[MIT License](LICENSE)
