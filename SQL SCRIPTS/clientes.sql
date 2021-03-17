CREATE TABLE clientes (
    id_cliente SERIAL PRIMARY KEY,
    nome VARCHAR,
    dt_nascimento DATE,
    email VARCHAR,
    created TIMESTAMP,
    modified TIMESTAMP
)