# Livraria Virtual

Sistema de gerenciamento de livros inspirado na [Estante Virtual](https://www.estantevirtual.com.br/), desenvolvido com Laravel 13, Tailwind CSS v4 e FrankenPHP via Laravel Octane.

## Funcionalidades

- **Homepage** com carrossel de banners, livros em destaque e autores
- **Acervo de livros** com listagem paginada
- **Cadastro, edição e exclusão de livros** (apenas administradores)
- **Autenticação** com login/logout
- **Controle de acesso** por papéis (admin/usuário)

## Papéis de Usuário

| Papéis | Visualizar | Cadastrar | Editar | Excluir |
|--------|:----------:|:---------:|:------:|:-------:|
| Admin  | ✅ | ✅ | ✅ | ✅ |
| Usuário | ✅ | ❌ | ❌ | ❌ |

## Credenciais de teste

| Papel | E-mail | Senha |
|-------|--------|-------|
| Admin | admin@example.com | password |
| Usuário | user@example.com | password |

## Instalação

### Com Docker (recomendado)

```bash
# Construir e iniciar os containers
docker compose up -d

# Executar migrations e seeds
docker exec laravel-app php artisan migrate:fresh --seed

# Acessar o sistema
# http://localhost:8000
```

### Instalação local

```bash
# Instalar dependências
composer install
npm install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

# Migrar e semear banco de dados
php artisan migrate:fresh --seed

# Compilar assets
npm run build

# Iniciar servidor com Octane ( FrankenPHP )
php artisan octane:start --server=frankenphp --host=0.0.0.0 --port=8000
```

## Estrutura do projeto

```
app/
├── Actions/          # Ações de negócio (ListBooks, StoreBook, etc.)
├── Enums/            # Enums (UserRole)
├── Http/
│   ├── Controllers/  # BookController
│   ├── Middleware/    # AdminOnly
│   └── Requests/     # StoreBookRequest, UpdateBookRequest
├── Models/           # Book, User
database/
├── factories/        # BookFactory
├── migrations/       # Migrations do banco
└── seeders/          # BookSeeder, DatabaseSeeder
resources/views/
├── layouts/          # home.blade.php (layout principal)
├── books/            # index, show, create, edit
├── home.blade.php    # Página inicial
└── auth/             # login
```

## Testes

```bash
# Rodar todos os testes
php artisan test --compact

# Rodar um arquivo específico
php artisan test --compact tests/Feature/BookControllerTest.php
```

## Tecnologias

- **Backend:** Laravel 13, PHP 8.3
- **Frontend:** Tailwind CSS v4, Blade
- **Servidor:** FrankenPHP via Laravel Octane
- **Container:** Docker
- **Banco:** SQLite (desenvolvimento)
- **Testes:** PHPUnit
