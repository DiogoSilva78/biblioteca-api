# Relatorio de Arquitetura

## Visao geral

Este projeto e uma API REST para gerir uma biblioteca. Permite trabalhar com autores, livros e reservas. A base de dados usada e SQLite e a autenticacao e feita com Laravel Sanctum.

## Modelo de dados

- `users`: guarda os utilizadores e o campo `role`, com valores `admin` ou `leitor`.
- `autors`: guarda autores.
- `livros`: guarda livros e referencia `autors` atraves de `autor_id`.
- `reservas`: guarda pedidos de reserva feitos por leitores e referencia `users`.
- `livro_reserva`: tabela pivot entre reservas e livros, incluindo `quantidade`.
- `personal_access_tokens`: tabela usada pelo Sanctum para tokens de API.

## Relacoes Eloquent

- `User hasMany Reserva`
- `Autor hasMany Livro`
- `Livro belongsTo Autor`
- `Livro belongsToMany Reserva`
- `Reserva belongsTo User`
- `Reserva belongsToMany Livro`

## Autenticacao e autorizacao

As rotas publicas sao `POST /api/register` e `POST /api/login`. Depois do login, o utilizador recebe um token e usa esse token nos pedidos protegidos.

Para separar permissoes foi criado o middleware `role`. O leitor pode criar reservas e ver as suas reservas. O administrador pode gerir autores, livros e reservas.

## Decisoes tecnicas

As respostas da API sao em JSON. As validacoes foram feitas nos controllers com o metodo `validate()` do Laravel.

Nas reservas, primeiro e criado o registo da reserva e depois os livros sao associados com `attach()` na tabela pivot.

## Como escalar para producao

Se o projeto fosse usado em producao, trocaria SQLite por MySQL ou PostgreSQL. Tambem acrescentaria rate limiting, mais testes e logs para acompanhar erros.
