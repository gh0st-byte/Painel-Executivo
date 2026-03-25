CREATE TABLE IF NOT EXISTS users_admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email_admin VARCHAR(40) UNIQUE NOT NULL,
    password_admin VARCHAR(255) NOT NULL,
    role ENUM('admin', 'executive', 'common') NOT NULL,
    CONSTRAINT chk_password_min CHECK (CHAR_LENGTH(password_admin) >= 12)
);

INSERT INTO users_admin (email_admin, password_admin, role)
SELECT
    'admin@cruzeiro.com.br',
    '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'admin'
WHERE NOT EXISTS (
    SELECT 1
    FROM users_admin
    WHERE email_admin = 'admin@cruzeiro.com.br'
);

CREATE TABLE IF NOT EXISTS fato_loja_fisica (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    data_venda DATETIME NOT NULL,
    cnpj_emp VARCHAR(20) NOT NULL,
    nom_loja VARCHAR(100) NOT NULL,
    cod_produto VARCHAR(50) NOT NULL,
    referencia VARCHAR(50) DEFAULT NULL,
    produto VARCHAR(150) DEFAULT NULL,
    categoria VARCHAR(100) DEFAULT NULL,
    marca VARCHAR(100) DEFAULT NULL,
    colecao VARCHAR(50) DEFAULT NULL,
    genero VARCHAR(50) DEFAULT NULL,
    uniforme VARCHAR(50) DEFAULT NULL,
    ano VARCHAR(10) DEFAULT NULL,
    imagem_url VARCHAR(500) DEFAULT NULL,
    quantidade_bruta INT NOT NULL,
    quantidade_devolvida INT NOT NULL,
    receita_bruta DECIMAL(12, 2) NOT NULL,
    receita_devolvida DECIMAL(12, 2) NOT NULL,
    PRIMARY KEY (id),
    KEY idx_data_venda (data_venda),
    KEY idx_loja (cnpj_emp, nom_loja),
    KEY idx_produto (cod_produto)
);

INSERT INTO fato_loja_fisica (
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
    receita_bruta,
    receita_devolvida
)
SELECT *
FROM (
    SELECT '2026-03-18 10:15:00', '12.345.678/0001-00', 'Loja Sede', 'CAM-001', 'REF-001', 'Camisa Oficial I 2026', 'Camisas', 'Cruzeiro', '2026', 'Unissex', 'Jogo', '2026', 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=400&q=80', 120, -4, 35988.00, -1199.60
    UNION ALL
    SELECT '2026-03-19 14:30:00', '12.345.678/0001-00', 'Loja Sede', 'CAM-002', 'REF-002', 'Camisa Oficial II 2026', 'Camisas', 'Cruzeiro', '2026', 'Unissex', 'Jogo', '2026', 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=400&q=80', 92, -2, 25852.00, -562.00
    UNION ALL
    SELECT '2026-03-20 16:00:00', '12.345.678/0002-91', 'Loja Mineirao', 'MOL-003', 'REF-003', 'Moletom Viagem', 'Linha Casual', 'Cruzeiro', '2026', 'Masculino', 'Viagem', '2026', 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=400&q=80', 48, -1, 14352.00, -299.00
    UNION ALL
    SELECT '2026-03-21 11:00:00', '12.345.678/0002-91', 'Loja Mineirao', 'BON-004', 'REF-004', 'Bone Aba Reta Azul', 'Acessorios', 'Cruzeiro', '2026', 'Unissex', 'Lifestyle', '2026', 'https://images.unsplash.com/photo-1521369909029-2afed882baee?auto=format&fit=crop&w=400&q=80', 76, -3, 8892.00, -351.00
    UNION ALL
    SELECT '2026-03-22 17:20:00', '12.345.678/0003-55', 'Loja BH Shopping', 'COP-005', 'REF-005', 'Copo Termico Escudo', 'Acessorios', 'Cruzeiro', '2026', 'Unissex', 'Lifestyle', '2026', 'https://images.unsplash.com/photo-1514228742587-6b1558fcf93a?auto=format&fit=crop&w=400&q=80', 140, -8, 13860.00, -792.00
    UNION ALL
    SELECT '2026-03-23 15:45:00', '12.345.678/0003-55', 'Loja BH Shopping', 'CAM-001', 'REF-001', 'Camisa Oficial I 2026', 'Camisas', 'Cruzeiro', '2026', 'Unissex', 'Jogo', '2026', 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=400&q=80', 88, -1, 26312.00, -299.00
    UNION ALL
    SELECT '2026-03-24 13:10:00', '12.345.678/0004-10', 'Loja Aeroporto', 'TRE-006', 'REF-006', 'Jaqueta Treino Staff', 'Linha Casual', 'Cruzeiro', '2026', 'Masculino', 'Treino', '2026', 'https://images.unsplash.com/photo-1548883354-94bcfe321c55?auto=format&fit=crop&w=400&q=80', 34, 0, 11866.00, 0.00
) AS seed
WHERE NOT EXISTS (
    SELECT 1
    FROM fato_loja_fisica
);

DROP VIEW IF EXISTS vw_st_loja_fisica_base;
CREATE VIEW vw_st_loja_fisica_base AS
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
FROM fato_loja_fisica;

DROP VIEW IF EXISTS vw_st_loja_fisica_diaria;
CREATE VIEW vw_st_loja_fisica_diaria AS
SELECT
    DATE(data_venda) AS data_venda,
    SUM(receita_bruta + receita_devolvida) AS receita,
    SUM(quantidade_bruta + quantidade_devolvida) AS quantidade
FROM fato_loja_fisica
GROUP BY DATE(data_venda);

DROP VIEW IF EXISTS vw_st_loja_fisica_lojas;
CREATE VIEW vw_st_loja_fisica_lojas AS
SELECT
    base.cnpj_emp,
    base.nom_loja,
    base.receita,
    base.quantidade,
    CASE
        WHEN base.quantidade = 0 THEN 0
        ELSE base.receita / base.quantidade
    END AS ticket_medio,
    CASE
        WHEN total.receita_total = 0 THEN 0
        ELSE base.receita / total.receita_total
    END AS participacao
FROM (
    SELECT
        cnpj_emp,
        nom_loja,
        SUM(receita_bruta + receita_devolvida) AS receita,
        SUM(quantidade_bruta + quantidade_devolvida) AS quantidade
    FROM fato_loja_fisica
    GROUP BY cnpj_emp, nom_loja
) AS base
CROSS JOIN (
    SELECT SUM(receita_bruta + receita_devolvida) AS receita_total
    FROM fato_loja_fisica
) AS total;

DROP VIEW IF EXISTS vw_st_loja_fisica_produtos;
CREATE VIEW vw_st_loja_fisica_produtos AS
SELECT
    base.cod_produto,
    base.referencia,
    base.produto,
    base.categoria,
    base.marca,
    base.colecao,
    base.genero,
    base.uniforme,
    base.ano,
    base.imagem_url,
    base.receita,
    base.quantidade,
    CASE
        WHEN base.quantidade = 0 THEN 0
        ELSE base.receita / base.quantidade
    END AS preco_medio,
    CASE
        WHEN total.receita_total = 0 THEN 0
        ELSE base.receita / total.receita_total
    END AS participacao_receita
FROM (
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
    FROM fato_loja_fisica
    GROUP BY
        cod_produto,
        referencia,
        produto,
        categoria,
        marca,
        colecao,
        genero,
        uniforme,
        ano,
        imagem_url
) AS base
CROSS JOIN (
    SELECT SUM(receita_bruta + receita_devolvida) AS receita_total
    FROM fato_loja_fisica
) AS total;

DROP VIEW IF EXISTS vw_st_loja_fisica_kpis;
CREATE VIEW vw_st_loja_fisica_kpis AS
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
FROM fato_loja_fisica;
