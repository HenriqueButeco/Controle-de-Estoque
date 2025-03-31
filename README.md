# Controle-de-Estoque

# Modelo de Documentação para Aplicação PHP com MySQL
## 1 Introdução 
- **Nome do Projeto:** Controle de Estoque de Esmalte de Unhas 
- **Descrição:** Este projeto tem como objetivo criar um sistema web para controle de estoque de esmaltes de unha. A aplicação permitirá gerenciar os esmaltes disponíveis em estoque, incluindo a adição, visualização e exclusão de registros. Os esmaltes serão categorizados por marca, coleção e cor, facilitando a gestão e a organização do estoque.  
- **Tecnologias Utilizadas:** PHP, MySQL, HTML, CSS, JavaScript, Apache, Xampp.
- **Autor(es):** Dayane Aparecida de Oliveiera Moraes,
                 Felipe dos Santos Pinto,
                 Guilherme Henrique Ribeiro,
                 Henrique dos Santos Pinto.
- **Data de início:** 17/03/2025 
## 2 Estrutura do Projeto 
CONTROLE-DE-ESTOQUE/
│── Backend/
│   │── cadastro.php
│   │── conexao.php
│   │── login.php
|
│── Bd/
│    └── Dump_estoque_18_03.sql
|    └──Dump_estoque_31_03.sql
│
│── Frontend/
│   │── admin/
│   │   │── add.js
│   │   │── add.php
│   │   │── adm.php
│   │   │── edit.js
│   │   │── edit.php
│   │   └── excluir.php
│   │
│   │── css/
│   │   │── style.css
│   │   └── table.css
│   │
│   │── user/
│   │   │── user.php
│   │   └── cadast.js
│   │
│   │── cadastro.html
│   │── login.html
│   │── login.js
│
│── images/
│   └── bg.jpg
│
│── README.md

## 3 Configuração do Ambiente 
### **Requisitos** 
- Servidor Apache 
- PHP 8.2.0 
- MySQL  8.0.41.
### **Instalação** 
1. Clone o repositório: 
 bash
 git clone https://github.com/HenriqueButeco/Controle-de-Estoque.git
 cd Controle-de-Estoque
 
2. Instale as dependências: 
 bash;
 
3. Configure o banco de dados: 
 - Crie o banco no MySQL 
 - Execute o Dump SQL;
 
 - Configure as credenciais no `conexao.php` 
4. Inicie o servidor: 
bash
 php -S localhost:8000 -t public
## 4 Estrutura do Banco de Dados 
-- Schema estoque
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `estoque` DEFAULT CHARACTER SET utf8mb3 ;
USE `estoque` 
-- -----------------------------------------------------
-- Table `estoque`.`tipo_de_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estoque`.`tipo_de_usuario` (
  `id` INT NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;
-- -----------------------------------------------------
-- Table `estoque`.`cadastro_usuário`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estoque`.`cadastro_usuário` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(30) NOT NULL,
  `tipo_de_usuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Cadastro_Usuário_tipo_de_usuario_idx` (`tipo_de_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_Cadastro_Usuário_tipo_de_usuario`
    FOREIGN KEY (`tipo_de_usuario`)
    REFERENCES `estoque`.`tipo_de_usuario` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb3;
-- -----------------------------------------------------
-- Table `estoque`.`produto_estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estoque`.`produto_estoque` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(60) NOT NULL,
  `colecao` VARCHAR(95) NOT NULL,
  `Nome_da_Cor` VARCHAR(60) NOT NULL,
  `quantidade` INT NOT NULL,
  `data_de_cadastro` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8mb3;

## 5 Segurança e Boas Práticas 
- Validação e sanitização de entrada de dados
- 
## 6 Testes 
- Testes manuais de casos de uso.
- 
## 7 Deploy e Hospedagem 
### **Configuração no Servidor** 
1. Configure um servidor Apache/Nginx 
2. Defina permissões corretas nas pastas 
3. Configure um sistema de logs para monitoramento 
### **Banco de Dados** 
- Backup regular do banco (`mysqldump`) 
- Indexação para melhor desempenho 
