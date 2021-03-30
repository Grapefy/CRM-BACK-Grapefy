CREATE TABLE salarios (
    id_salario SERIAL PRIMARY KEY,
    cargo_id INTEGER,
    adicional_valor DOUBLE PRECISION,
    descricao_adicional VARCHAR,
    salario_liquido DOUBLE PRECISION
);

ALTER TABLE "salarios" ADD FOREIGN KEY ("cargo_id") REFERENCES "cargos" ("id_cargo");