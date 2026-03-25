CREATE SCHEMA gold;


-- tabela principal

CREATE TABLE gold.fato_loja_fisica (
    id INT IDENTITY(1,1) PRIMARY KEY,

    data_venda DATETIME NOT NULL,
    cnpj_emp VARCHAR(20) NOT NULL,
    nom_loja VARCHAR(100) NOT NULL,

    cod_produto VARCHAR(50) NOT NULL,
    referencia VARCHAR(50),
    produto VARCHAR(150),
    categoria VARCHAR(100),
    marca VARCHAR(100),
    colecao VARCHAR(50),
    genero VARCHAR(50),
    uniforme VARCHAR(50),
    ano VARCHAR(10),
    imagem_url VARCHAR(500),

    quantidade_bruta INT NOT NULL,
    quantidade_devolvida INT NOT NULL,

    receita_bruta DECIMAL(12,2) NOT NULL,
    receita_devolvida DECIMAL(12,2) NOT NULL
);


--views

CREATE VIEW gold.vw_st_loja_fisica_base AS
SELECT
    data_venda,
    cnpj_emp,
    nom_loja,
    cod_produto,
    referencia,
    produto,
    categoria,
    marca,
    colecao,
    genero,
    uniforme,
    ano,
    imagem_url,

    quantidade_bruta,
    quantidade_devolvida,
    (quantidade_bruta + quantidade_devolvida) AS quantidade_liquida,

    receita_bruta,
    receita_devolvida,
    (receita_bruta + receita_devolvida) AS receita_liquida
FROM gold.fato_loja_fisica;


--view Diária

CREATE VIEW gold.vw_st_loja_fisica_diaria AS
SELECT
    CAST(data_venda AS DATE) AS data_venda,
    SUM(receita_bruta + receita_devolvida) AS receita,
    SUM(quantidade_bruta + quantidade_devolvida) AS quantidade
FROM gold.fato_loja_fisica
GROUP BY CAST(data_venda AS DATE);


--view Lojas

CREATE VIEW gold.vw_st_loja_fisica_lojas AS
WITH base AS (
    SELECT
        cnpj_emp,
        nom_loja,
        SUM(receita_bruta + receita_devolvida) AS receita,
        SUM(quantidade_bruta + quantidade_devolvida) AS quantidade
    FROM gold.fato_loja_fisica
    GROUP BY cnpj_emp, nom_loja
),
total AS (
    SELECT SUM(receita) AS receita_total FROM base
)
SELECT
    b.cnpj_emp,
    b.nom_loja,
    b.receita,
    b.quantidade,
    CASE WHEN b.quantidade = 0 THEN 0 ELSE b.receita / b.quantidade END AS ticket_medio,
    CASE WHEN t.receita_total = 0 THEN 0 ELSE b.receita / t.receita_total END AS participacao
FROM base b
CROSS JOIN total t;


--view Produtos

CREATE VIEW gold.vw_st_loja_fisica_produtos AS
WITH base AS (
    SELECT
        cod_produto,
        referencia,
        produto,
        categoria,
        marca,
        colecao,
        genero,
        uniforme,
        ano,
        imagem_url,

        SUM(receita_bruta + receita_devolvida) AS receita,
        SUM(quantidade_bruta + quantidade_devolvida) AS quantidade
    FROM gold.fato_loja_fisica
    GROUP BY
        cod_produto, referencia, produto, categoria,
        marca, colecao, genero, uniforme, ano, imagem_url
),
total AS (
    SELECT SUM(receita) AS receita_total FROM base
)
SELECT
    b.*,
    CASE WHEN b.quantidade = 0 THEN 0 ELSE b.receita / b.quantidade END AS preco_medio,
    CASE WHEN t.receita_total = 0 THEN 0 ELSE b.receita / t.receita_total END AS participacao_receita
FROM base b
CROSS JOIN total t;


--view KPIs

CREATE VIEW gold.vw_st_loja_fisica_kpis AS
SELECT
    MIN(data_venda) AS data_min,
    MAX(data_venda) AS data_max,
    SUM(receita_bruta + receita_devolvida) AS receita_total,
    SUM(quantidade_bruta + quantidade_devolvida) AS itens_vendidos,
    CASE
        WHEN SUM(quantidade_bruta + quantidade_devolvida) = 0 THEN 0
        ELSE SUM(receita_bruta + receita_devolvida) / SUM(quantidade_bruta + quantidade_devolvida)
    END AS ticket_medio,
    SUM(receita_bruta + receita_devolvida) * 0.10 AS royalties
FROM gold.fato_loja_fisica;


-- indeces para performance

CREATE INDEX idx_data_venda ON gold.fato_loja_fisica(data_venda);
CREATE INDEX idx_loja ON gold.fato_loja_fisica(cnpj_emp, nom_loja);
CREATE INDEX idx_produto ON gold.fato_loja_fisica(cod_produto);

