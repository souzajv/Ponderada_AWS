# Aplicação Web com Banco de Dados PostgreSQL na AWS

## Descrição do Repositório

Este repositório contém o código de uma aplicação web simples utilizando **PHP** para fazer **cadastro de usuários** em um banco de dados **PostgreSQL** hospedado no **Amazon RDS**. A aplicação é composta por um formulário de cadastro onde o usuário pode inserir **Nome**, **Email** e **Data de Nascimento**, e esses dados são armazenados em uma tabela no banco de dados. Além disso, a página exibe todos os dados cadastrados na tabela.

### Tecnologias Utilizadas:
- **PHP**: Para criar a aplicação web.
- **PostgreSQL**: Banco de dados utilizado para armazenar os dados dos usuários.
- **Amazon RDS**: Serviço gerenciado de banco de dados da AWS, onde o PostgreSQL está hospedado.

## Como Executar

1. **Criar a Instância RDS**:
   - Siga o tutorial da AWS para configurar a instância de banco de dados PostgreSQL no **Amazon RDS**.
   (link)[https://docs.aws.amazon.com/pt_br/AmazonRDS/latest/UserGuide/TUT_WebAppWithRDS.html]

2. **Configurar as credenciais no PHP**:
   - No arquivo `dbinfo.inc`, configure as credenciais do seu banco de dados PostgreSQL no Amazon RDS.

3. **Subir a aplicação PHP** para o servidor Apache:
   - Coloque os arquivos PHP no diretório `/var/www/html/` ou equivalente (assim como no tutorial).

4. **Acessar a aplicação**:
   - Abra o navegador e acesse:
    http://<ip-publico-da-instancia>/SamplePage.php

5. **Vídeo de Demonstração**:
- Aqui está o vídeo demonstrando a execução do projeto na AWS:

[Link para o vídeo](https://youtu.be/95mAtdj68ZU)
