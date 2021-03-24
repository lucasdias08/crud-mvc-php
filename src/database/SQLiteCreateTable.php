<?php

class SQLiteCreateTable {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function createTables() {
        $commands = ['CREATE TABLE IF NOT EXISTS usuario (
                        id_usuario INTEGER PRIMARY KEY,
                        nome_usuario TEXT NOT NULL,
                        email_usuario TEXT NOT NULL,
                        senha_usuario TEXT NOT NULL,
                        cep_usuario TEXT NOT NULL,
                        phone_usuario TEXT NOT NULL
                      )',
            'CREATE TABLE IF NOT EXISTS produto (
                    id_produto INTEGER PRIMARY KEY,
                    nome_produto  TEXT NOT NULL,
                    descricao_produto  TEXT NOT NULL,
                    valor_produto  FLOAT NOT NULL,
                    quantidade_produto INTEGER NOT NULL,
                    src_img_produto  TEXT NOT NULL,
                    id_usuario_fk INTEGER NOT NULL,
                    FOREIGN KEY (id_usuario_fk)
                    REFERENCES usuario(id_usuario) ON UPDATE CASCADE
                                                    ON DELETE CASCADE)'];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }
}

?>