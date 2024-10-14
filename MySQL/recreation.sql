CREATE DATABASE IF NOT EXISTS Orientator;
DROP DATABASE Orientator;
CREATE DATABASE Orientator;


USE Orientator;
CREATE TABLE Images(
ImageID INT AUTO_INCREMENT,
ImageEmplacement VARCHAR(50) NOT NULL,
PRIMARY KEY(ImageID),
UNIQUE(ImageEmplacement)
);

CREATE TABLE Utilisateur(
UtilisateurID INT AUTO_INCREMENT,
UtilisateurEmail VARCHAR(100),
UtilisateurHash CHAR(64),
UtilisateurUsername VARCHAR(50),
PRIMARY KEY(UtilisateurID)
);

CREATE TABLE Resultats(
    ResultatsID INT AUTO_INCREMENT,
    UtilisateurID INT NOT NULL,
    cybersecurite DECIMAL(5,2),
    developpement DECIMAL(5,2),
    IA DECIMAL(5,2),
    infrastructure DECIMAL(5,2),
    robotique DECIMAL(5,2),
    PRIMARY KEY(ResultatsID),
    FOREIGN KEY(UtilisateurID) REFERENCES Utilisateur(UtilisateurID) ON DELETE CASCADE
);

CREATE TABLE Filiere(
FiliereID INT AUTO_INCREMENT,
FiliereNom VARCHAR(60),
FiliereDescription VARCHAR(400),
FiliereSlogan VARCHAR(60),
ImageID INT,
PRIMARY KEY(FiliereID),
FOREIGN KEY(ImageID) REFERENCES Images(ImageID)
);

CREATE TABLE Formation(
FormationID INT AUTO_INCREMENT,
FormationNom VARCHAR(70),
FormationDescription VARCHAR(400),
FiliereID INT NOT NULL,
PRIMARY KEY(FormationID),
FOREIGN KEY(FiliereID) REFERENCES Filiere(FiliereID)
);

CREATE TABLE Entreprises(
EntreprisesID INT AUTO_INCREMENT,
EntrepriseNom VARCHAR(60),
FiliereID INT NOT NULL,
ImageID INT NOT NULL,
PRIMARY KEY(EntreprisesID),
FOREIGN KEY(ImageID) REFERENCES Images(ImageID),
FOREIGN KEY(FiliereID) REFERENCES Filiere(FiliereID) ON DELETE CASCADE
);

CREATE TABLE Emploi(
EmploiID INT AUTO_INCREMENT,
EmploiNom VARCHAR(60),
EmploiDescription VARCHAR(400),
FiliereID INT NOT NULL,
PRIMARY KEY(EmploiID),
FOREIGN KEY(FiliereID) REFERENCES Filiere(FiliereID) ON DELETE CASCADE
);


CREATE TABLE ImagesArticleFiliere(
FiliereID INT NOT NULL,
ImageID INT NOT NULL,
PRIMARY KEY(FiliereID, ImageID),
FOREIGN KEY(FiliereID) REFERENCES Filiere(FiliereID) ON DELETE CASCADE,
FOREIGN KEY(ImageID) REFERENCES Images(ImageID) ON DELETE CASCADE
);
