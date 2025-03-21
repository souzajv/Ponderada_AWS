const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const app = express();
const port = 3000;

//configuração do banco de dados
const db = new sqlite3.Database('./database.db');

//middleware para permitir parsing do body da requisição
app.use(express.json());

//criação da tabela
db.serialize(() => {
    db.run("CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY, nome TEXT, idade INTEGER, email TEXT, data_criacao TEXT)");
});

//endpoint para criar um novo registro
app.post('/usuarios', (req, res) => {
    const { nome, idade, email } = req.body;
    const dataCriacao = new Date().toISOString();
    db.run("INSERT INTO usuarios (nome, idade, email, data_criacao) VALUES (?, ?, ?, ?)", [nome, idade, email, dataCriacao], function (err) {
        if (err) {
            return res.status(500).json({ message: 'Erro ao criar usuário', error: err });
        }
        res.status(201).json({ id: this.lastID, nome, idade, email, data_criacao: dataCriacao });
    });
});

//endpoint para listar todos os registros
app.get('/usuarios', (req, res) => {
    db.all("SELECT * FROM usuarios", [], (err, rows) => {
        if (err) {
            return res.status(500).json({ message: 'Erro ao buscar usuários', error: err });
        }
        res.json(rows);
    });
});

app.listen(port, () => {
    console.log(`Servidor rodando na http://localhost:${port}`);
});
