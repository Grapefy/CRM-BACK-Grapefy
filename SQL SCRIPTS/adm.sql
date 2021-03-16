CREATE TABLE administradores (
    idAdministrador SERIAL PRIMARY KEY,
    nome VARCHAR,
    email VARCHAR,
    created TIMESTAMP,
    modified TIMESTAMP
)