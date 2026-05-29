# Relatório de Arquitetura

**Repositório Git:** https://github.com/DiogoSilva78/biblioteca-api.git

## Visão geral

Este projeto é uma API REST para gerir uma biblioteca. Permite trabalhar com autores, livros e reservas. A base de dados usada é SQLite e a autenticação é feita com Laravel Sanctum.

## Modelo de dados

- `users`: guarda os utilizadores e o campo `role`, com os valores `admin` ou `leitor`.
- `autors`: guarda autores.
- `livros`: guarda livros e referencia `autors` através de `autor_id`.
- `reservas`: guarda pedidos de reserva feitos por leitores e referencia `users`.
- `livro_reserva`: tabela pivot entre reservas e livros, incluindo `quantidade`.
- `personal_access_tokens`: tabela usada pelo Sanctum para tokens de API.

## Relações Eloquent

- `User hasMany Reserva`
- `Autor hasMany Livro`
- `Livro belongsTo Autor`
- `Livro belongsToMany Reserva`
- `Reserva belongsTo User`
- `Reserva belongsToMany Livro`

## Autenticação e autorização

As rotas públicas são `POST /api/register` e `POST /api/login`. Depois do login, o utilizador recebe um token e usa esse token nos pedidos protegidos.

Para separar permissões foi criado o middleware `role`. O leitor pode criar reservas e ver as suas reservas. O administrador pode gerir autores, livros e reservas.

## Decisões técnicas

As respostas da API são em JSON. As validações foram feitas nos controllers com o método `validate()` do Laravel.

Nas reservas, primeiro é criado o registo da reserva e depois os livros são associados com `attach()` na tabela pivot.

## Como escalar para produção

Se o projeto fosse usado em produção, trocaria SQLite por MySQL ou PostgreSQL. Também acrescentaria rate limiting, mais testes e logs para acompanhar erros.
