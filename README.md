# Biblioteca API Laravel

Projeto de API REST para uma biblioteca digital, feito em Laravel com SQLite e Sanctum.

## Requisitos

- PHP 8.2 ou superior
- Composer
- Extensao SQLite ativa no PHP

## Como iniciar

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan serve
```

A API fica em `http://127.0.0.1:8000/api`.

## Utilizadores de teste

| Role | Email | Password |
|---|---|---|
| admin | admin@biblioteca.pt | admin123 |
| leitor | joao@exemplo.pt | leitor123 |
| leitor | ana@exemplo.pt | leitor123 |

## Endpoints

| Metodo | Endpoint | Acesso |
|---|---|---|
| POST | `/api/register` | publico |
| POST | `/api/login` | publico |
| POST | `/api/logout` | autenticado |
| GET | `/api/me` | autenticado |
| GET | `/api/autores` | autenticado |
| GET | `/api/autores/{autor}` | autenticado |
| POST | `/api/autores` | admin |
| PUT/PATCH | `/api/autores/{autor}` | admin |
| DELETE | `/api/autores/{autor}` | admin |
| GET | `/api/livros` | autenticado |
| GET | `/api/livros/{livro}` | autenticado |
| POST | `/api/livros` | admin |
| PUT/PATCH | `/api/livros/{livro}` | admin |
| DELETE | `/api/livros/{livro}` | admin |
| GET | `/api/reservas` | admin |
| PATCH | `/api/reservas/{reserva}` | admin |
| GET | `/api/reservas/minhas` | leitor |
| POST | `/api/reservas` | leitor |

## Ficheiros entregues

- `.env.example`
- seeders
- colecao Postman
- relatorio de arquitetura
