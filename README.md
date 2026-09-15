SitePHP

Sistema web de gerenciamento de tarefas desenvolvido em PHP, utilizando arquitetura MVC, banco de dados MySQL e padrões de projeto.

Sobre o projeto

O SitePHP é um sistema de gerenciamento de tarefas que permite ao usuário criar uma conta, realizar login e administrar suas próprias tarefas.

O projeto foi desenvolvido com foco na aplicação dos conceitos de:

- PHP
- MySQL
- Arquitetura MVC
- CRUD
- Sessões
- Autenticação de usuários
- Criptografia de senhas
- Padrões de projeto

Funcionalidades

Usuários

- Cadastro de usuários
- Login
- Logout
- Controle de sessão
- Validação de e-mail
- Senhas armazenadas com hash utilizando bcrypt

Tarefas

- Criar tarefas
- Listar tarefas
- Editar tarefas
- Excluir tarefas
- Cada usuário visualiza somente suas próprias tarefas

Arquitetura MVC

O projeto utiliza o padrão arquitetural MVC:

```text
Model
 ↓
Responsável pela comunicação com o banco de dados

Controller
 ↓
Responsável pela lógica e controle das ações

View
 ↓
Responsável pela interface apresentada ao usuário
