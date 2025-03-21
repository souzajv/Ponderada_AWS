
# Documentação de Implementação da Aplicação Web com Express e SQLite

## Descrição do Repositório

Este repositório contém a implementação de uma aplicação web simples utilizando **Node.js** com **Express** e **SQLite**. A aplicação permite cadastrar e listar usuários em um banco de dados SQLite.

## Funcionalidades

- **Criar** um usuário com nome, idade, e email.
- **Listar** todos os usuários cadastrados.

## Passos para Execução

### Passo 1: Instalar Dependências

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/minha-aplicacao-web.git
   ```

2. Acesse a pasta do projeto:
   ```bash
   cd minha-aplicacao-web
   ```

3. Instale as dependências:
   ```bash
   npm install
   ```

### Passo 2: Rodar o Servidor

1. Inicie o servidor:
   ```bash
   node server.js
   ```

2. Acesse a aplicação no navegador em:
   [http://localhost:3000](http://localhost:3000)

### Passo 3: Testar as Funcionalidades

- **Criar Usuário:** Na página inicial, insira os dados do usuário (nome, idade e email) e clique em "Criar Usuário".
- **Listar Usuários:** A lista de usuários cadastrados será exibida abaixo do formulário de cadastro.

## Estrutura do Código

### `server.js`

O arquivo `server.js` é responsável pela criação do servidor web com o Express e pela conexão com o banco de dados SQLite. Ele contém:

- **Criação de Tabela**: A tabela `usuarios` com os campos `id`, `nome`, `idade`, `email`, e `data_criacao`.
- **Endpoints**:
  - **POST /usuarios**: Para criar um novo usuário.
  - **GET /usuarios**: Para listar todos os usuários.

### `index.html`

O arquivo `index.html` contém a interface de usuário para a criação e listagem de usuários. Ele se comunica com o servidor via requisições AJAX para exibir e cadastrar usuários.

## Instruções para o Deploy

### Passo 4: Criar um Repositório no GitHub

1. Crie um repositório no GitHub chamado "minha-aplicacao-web".
2. Adicione todos os arquivos do projeto ao repositório e faça o primeiro commit:
   ```bash
   git init
   git add .
   git commit -m "Primeiro commit com a aplicação e banco de dados"
   git branch -M main
   git remote add origin https://github.com/seu-usuario/minha-aplicacao-web.git
   git push -u origin main
   ```

### Passo 5: Preparar o Vídeo Demonstrativo na AWS

1. **Configurar a Instância EC2**:
   - Crie uma máquina EC2 na AWS com o sistema operacional desejado.
   - Instale o **Node.js** e o **SQLite**.
   
2. **Subir o Código para a Instância**:
   - Utilize `scp` ou configure o Git para clonar o repositório na instância EC2.
   
3. **Rodar a Aplicação no EC2**:
   - Execute o servidor com o comando `node server.js`.
   - Acesse a aplicação pela URL pública da instância EC2.

4. **Gravar o Vídeo**:
   - Grave um vídeo de até 5 minutos demonstrando a execução da aplicação na AWS.
   - Faça uma narração explicando como foi realizado o deploy e o funcionamento dos serviços/máquinas.

### Passo 6: Adicionar Link do Vídeo no README

Após o upload do vídeo na plataforma de sua escolha (como YouTube), adicione o link do vídeo no arquivo `README.md`:

```markdown
## Vídeo de Demonstração

Aqui está o vídeo demonstrando a execução do projeto na AWS:

[Link para o vídeo](URL_DO_VIDEO)
```

## Conclusão

Essa aplicação web simples permite o cadastro e listagem de usuários utilizando **Express** e **SQLite**. O deploy foi realizado em uma máquina EC2 da AWS e a aplicação foi testada localmente e na nuvem. A documentação descreve os passos para configurar, rodar e testar a aplicação, bem como para realizar o deploy na AWS.
