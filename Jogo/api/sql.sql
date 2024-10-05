CREATE TABLE Jogadores (
    idJogador INT(11) NOT NULL AUTO_INCREMENT,
    nomeJogador CHAR(150) NOT NULL,
    PRIMARY KEY (idJogador)
);

CREATE TABLE Respostas (
    idResposta INT(11) NOT NULL AUTO_INCREMENT,
    escolha TINYINT(1) NOT NULL,
    idJogador INT(11),
    PRIMARY KEY (idResposta),
    FOREIGN KEY (idJogador) REFERENCES Jogadores(idJogador) ON DELETE CASCADE
);