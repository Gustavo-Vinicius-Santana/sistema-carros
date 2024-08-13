# Sistema de Gerenciamento de veiculos

Este é um sistema web desenvolvido utilizando HTML, CSS, JavaScript, PHP e MySQL. Ele oferece funcionalidades básicas para gerenciar informações de usuários e seus dados associados, juntamente com seus veiculos.

## Tecnologias Utilizadas

- **HTML**: Estruturação das páginas web.
- **CSS**: Estilização e layout das páginas.
- **JavaScript**: Interações dinâmicas e validações no lado do cliente.
- **PHP**: Lógica de backend e interação com o banco de dados.
- **MySQL**: Banco de dados para armazenamento de informações.

## Funcionalidades

- Cadastro de usuários
- Edição de informações de usuários
- Deleção de usuários
- Listagem de usuários

## Requisitos

- Servidor local com suporte a PHP (recomendado [XAMPP](https://www.apachefriends.org/index.html) ou [WAMP](http://www.wampserver.com/en/))
- Banco de dados MySQL

## Instalação e Configuração

1. **Clonar o Repositório**

   Clone este repositório para o seu ambiente local:

   ```bash
   git clone https://github.com/Gustavo-Vinicius-Santana/sistema-carros
   cd sistema-carros

2. **Configurar Banco de Dados**

    - Abra o painel de controle do XAMPP/WAMP e inicie os serviços Apache e MySQL.

    - Acesse o phpMyAdmin no navegador através de http://localhost/phpmyadmin.

    - Crie um banco de dados chamado sistema_db.

    - Importe o arquivo bd_sistema_carro.sql que está na raiz do projeto para criar as tabelas necessárias.

3. **Executar o Projeto**

    Coloque todos os arquivos do projeto na pasta htdocs do XAMPP ou na pasta www do WAMP.

    Acesse o sistema no navegador através de http://localhost/nome-do-projeto.


## Como Usar
- Navegue pelas funcionalidades do sistema utilizando a interface web.

- Adicione, edite ou remova informações conforme necessário.

- Visualize as informações cadastradas em tabelas na interface.