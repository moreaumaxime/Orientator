USE Orientator;
CREATE DATABASE IF NOT EXISTS Orientator;
DROP DATABASE Orientator;
CREATE DATABASE Orientator;






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
    FiliereSlogan VARCHAR(150),
    ImageID INT,
    PRIMARY KEY(FiliereID),
    FOREIGN KEY(ImageID) REFERENCES Images(ImageID) ON DELETE SET NULL
);

CREATE TABLE Formation(
    FormationID INT AUTO_INCREMENT,
    FormationNom VARCHAR(70),
    FormationDescription VARCHAR(400),
    FiliereID INT NOT NULL,
    PRIMARY KEY(FormationID),
    FOREIGN KEY(FiliereID) REFERENCES Filiere(FiliereID) ON DELETE CASCADE
);

CREATE TABLE Entreprises(
    EntreprisesID INT AUTO_INCREMENT,
    EntrepriseNom VARCHAR(100),
    FiliereID INT NOT NULL,
    ImageID INT NOT NULL,
    PRIMARY KEY(EntreprisesID),
    FOREIGN KEY(ImageID) REFERENCES Images(ImageID) ON DELETE CASCADE,
    FOREIGN KEY(FiliereID) REFERENCES Filiere(FiliereID) ON DELETE CASCADE
);

CREATE TABLE Emploi(
    EmploiID INT AUTO_INCREMENT,
    EmploiNom VARCHAR(100),
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


INSERT INTO Images (ImageID, ImageEmplacement) VALUES 
    (1,"OrientatorLogo.png"),
    (2,"bg.png"),
    (3,"Images/bannerSecu.jpg"),
    (4,"Images/bannerIoT.png"),
    (5,"Images/bannerIA.png");

ALTER TABLE Images AUTO_INCREMENT = 3;


INSERT INTO Filiere (FiliereID, FiliereNom, FiliereSlogan, FiliereDescription, ImageID) VALUES
    (1,"Cybersécurité","Empechez les hackers de nuire","Cette branche de l'informatique comporte plusieurs domaines, de la sécurité de l'information à la sécurité des systèmes, en passant par la sécurité offensive (les hackers ne sont pas tous mal intentionnés)",3),
    (2,"Développement","Créez des applications","Le développement est vaste. Les principaux domaines sont le développement web (vous voyez cette page internet? quelqu'un l'a codée), le développement d'applications (comme des jeux vidéo par exemple) et le DevOps",1),
    (3,"IA","Créez le prochain SkyNet","Cette branche de l'informatique est en constante révolution et contribue à des avancées en matière médicale, en embarqué pour des robots autonomes, ou encore avec les IA génératives.",5),
    (4,"Infrastructure","Parce que l'internet a besoin de câbles, beaucoup de câbles","Pour se connecter à un serveur, il faut qu'il soit configuré, il faut s'occuper de sécuriser des connexions, faire du load balancing, et autres choses qu'il faudra maintenir à disposition des utilisateurs",1),
    (5,"Robotique/IoT","Ta montre? connectée.\nTon frigo? connecté.\nTon roomba?\n...connecté","L'IoT rassemble tout objet connecté, de la voiture autonome au petit robot aspirateur. Leurs capteurs leur permettent de décider de leur comportement.",4);
ALTER TABLE Filiere AUTO_INCREMENT = 6;

INSERT INTO Entreprises (EntreprisesID, EntrepriseNom, ImageID, FiliereID) VALUES 
    (1,"Capgemini",1,1),
    (2,"Cloudflare",1,1),
    (3,"Capgemini",1,2),
    (4,"CGI",1,2),
    (5,"OpenAI",1,3),
    (6,"Cisco",1,4),
    (7,"Capgemini",1,4),
    (8,"Software AG",1,5),
    (9,"Samsung",1,5);
ALTER TABLE Entreprises AUTO_INCREMENT = 10;


INSERT INTO Utilisateur (UtilisateurID, UtilisateurUsername, UtilisateurEmail, UtilisateurHash) VALUES
    (1,"User","User@gmail.com","04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb"), /* password : user */
    (2,"User2","User2@gmail.com","ca22d1343854b37baadc9b6dfa379e62e8dc4409cbef0671121c7e6eb9ea9ccd"); /* password : 3il */
ALTER TABLE Utilisateur AUTO_INCREMENT = 3;

INSERT INTO Emploi (EmploiID, EmploiNom, FiliereID, EmploiDescription) VALUES
    (1,"Directeur de la Sécurité Informatique",1,"C'est le responsable de la sécurité d'un site/d'une entreprise, il est chargé d'établir les risques présents, puis de concevoir les protocoles de sécurité, les politiques de mot de passe, et autres actions nécessaires pour mitiger les risques."),
    (2,"Pentester",1,"L'activité du pentester est de tester la sécurité d'un système d'information en tentant une intrusion. Cela passe par des moyens techniques, casser un chiffrage par exemple, mais aussi humains, comme demander à rentrer dans le bâtiment pour aller chercher ses papiers/clés de voiture/badge."),
    (3,"Dev web",2,"Le dev web conçoit des pages internet, leur apparence, leur fonctionnalités, puis les met en place."),
    (4,"Data Scientist",3,"L'entraînement d'une IA passe d'abord par un bon jeu de données, et ce jeu de données doit être préparé avec soin. Il faut aussi savoir de quel type de données on a besoin."),
    (5,"Directeur du service informatique",4,"Responsable de l'infrastructure de l'entreprise/du site dont il est chargé, il doit concevoir les différents équipements à mettre en place, leur maintenance, leurs documentations. Il met cela en place avec une équipe de techniciens qu'il dirige."),
    (6,"Architecte systèmes embarqués",5,"Sa responsabilité est la conception et l'implémentation de systèmes embarqués. C'est-à-dire définir quelles informations seront nécessaires au fonctionnement de l'objet, et comment la traiter pour réaliser efficacement ce que l'objet doit faire.");
ALTER TABLE Emploi AUTO_INCREMENT = 7;

INSERT INTO Formation (FormationID, FiliereID, FormationNom, FormationDescription) VALUES
    (1,1,"Bachelor Cybersécurité","Formation Bac+3 qui offre une spécialisation en alternance à partir de la 2ème année"),
    (2,1,"Master Cryptis","Formation Bac+5 qui offre deux parcours, orientés sur la théorie autour de la cryptologie, et un parcours orienté sur l'aspect technique"),
    (3,2,"Ingénieur en informatique","Bac+5 qui offre les compétences nécessaires en gestion de projet et les connaissances technologiques requises pour faire du développement."),
    (4,3,"Mastère Expert en Intelligence Artificielle","Apprenez à modéliser une Intelligence Artificielle qui parcourt une vaste quantité de données."),
    (5,4,"Administrateur d'infrastructures sécurisées","Concevoir et mettre en place des systèmes qui peuvent évoluer dans le temps et participer à la gestion de leur sécurité."),
    (6,5,"Licence informatique spécialité robotique de prototypage","Formation Bac+3 ouvrant sur divers métiers de la robotique, notamment en prototypage et en intégration robotique.");
ALTER TABLE Formation AUTO_INCREMENT = 7;
