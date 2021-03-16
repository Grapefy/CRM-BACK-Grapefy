CREATE TABLE administradores (
    id_administrador SERIAL PRIMARY KEY,
    nome VARCHAR,
    email VARCHAR,
    created TIMESTAMP,
    modified TIMESTAMP
)