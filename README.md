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
/projeto-raiz 
│── /public # Arquivos acessíveis publicamente (index.php, CSS, JS) 
│── /app # Código principal da aplicação 
│ │── /Controllers # Lógica de controle 
│ │── /Models # Conexão com banco de dados e regras de negócio 
│ │── /Views # Arquivos de interface (HTML, PHP) 
│── /config # Configurações do projeto 
│── /database # Scripts SQL para criação e população do banco 
│── /tests # Testes automatizados 
│── .env # Variáveis de ambiente 
│── composer.json # Dependências do projeto 
│── README.md # Documentação inicial 
## 3 Configuração do Ambiente 
### **Requisitos** 
- Servidor Apache 
- PHP 8.2.0 
- MySQL  9.2.0
### **Instalação** 
1. Clone o repositório: 
 bash
 git clone https://github.com/usuario/projeto.git
 cd projeto
 
2. Instale as dependências: 
 bash
 composer install
 
3. Configure o banco de dados: 
 - Crie o banco no MySQL 
 - Execute o script SQL: 
 sql
 source database/schema.sql;
 
 - Configure as credenciais no `.env` 
4. Inicie o servidor: 
bash
 php -S localhost:8000 -t public
## 4 Estrutura do Banco de Dados 
### **Usuários (users)** 
- `id` (INT, PK, AUTO_INCREMENT) 
- `nome` (VARCHAR) 
- `email` (VARCHAR, UNIQUE) 
- `senha` (VARCHAR) 
### **Posts (posts)** 
- `id` (INT, PK, AUTO_INCREMENT) 
- `titulo` (VARCHAR) 
- `conteudo` (TEXT) 
- `usuario_id` (FK -> users.id) 
## 5 Rotas da Aplicação 
| Método | Rota | Descrição | 
|--------|-----------|----------------------------| 
| GET | `/` | Página inicial | 
| GET | `/login` | Tela de login | 
| POST | `/login` | Autenticação do usuário | 
| GET | `/posts` | Lista todos os posts | 
| POST | `/posts` | Cria um novo post | 
## 6 Segurança e Boas Práticas 
- Hash de senhas com `password_hash()` 
- Proteção contra SQL Injection com **PDO e prepared statements** 
- Proteção contra CSRF com tokens 
- Validação e sanitização de entrada de dados 
## 7 Testes 
- Testes de unidade com PHPUnit 
- Testes de integração das rotas principais 
## 8 Deploy e Hospedagem 
### **Configuração no Servidor** 
1. Configure um servidor Apache/Nginx 
2. Defina permissões corretas nas pastas 
3. Configure um sistema de logs para monitoramento 
### **Banco de Dados** 
- Backup regular do banco (`mysqldump`) 
- Indexação para melhor desempenho 
