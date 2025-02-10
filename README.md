# Library Management System

Este é um projeto de gestão de livros desenvolvido em Laravel 11.

## Requisitos

- **PHP** >= 8.3
- **MySQL** >= 8.0.33
- **Laravel** 11
- **Vue.js** 3 (para o Teste 6)
- **IDE** (PhpStorm ou VS Code)

## Instalação

Clone o repositório:

```sh
git clone https://github.com/r-andomguy/library-project.git
cd library-project
```

Instale as dependências do Laravel:

```sh
composer install
```

Copie o arquivo de configuração:

```sh
cp .env.example .env
```

Configure o banco de dados no arquivo `.env` e execute as migrações:

```sh
php artisan migrate --seed
```

Gere a chave da aplicação:

```sh
php artisan key:generate
```

Inicie o servidor:

```sh
php artisan serve
```

## Funcionalidades
```
funcionalidades completas estão na branch master.
```
### CRUD de Livros (branch: tarefa_1)

- Criar, editar, visualizar e excluir livros.
- Cada livro possui título, descrição, data de publicação e um autor.
- Seeder para preencher 10 autores automaticamente.

### API de Autores (branch: tarefa_2)

- API para gestão de autores com autenticação via Laravel Sanctum.
- Endpoint para listar livros de um autor específico.
- Impede a exclusão de autores com livros associados.

### Upload e Processamento de Imagens (branch: tarefa_3)

- Upload de capas de livros (somente **JPG** e **PNG**).
- Redimensionamento automático para **200x200**.
- Exibição da imagem no detalhe do livro.
- Limite de **2MB** por arquivo.

### Middleware de Acesso (branch: tarefa_4)

- Middleware para verificar se o usuário é **administrador**.
- Proteção das rotas administrativas.
- Retorno de erro **403 (Forbidden)** para usuários não autorizados.

### Agendamento de Tarefas (branch: tarefa_5)

- Comando Artisan para limpar registros antigos de logs (mais de **30 dias**).
- Agendamento diário **à meia-noite**.
- Registro da execução em um log de sistema.

