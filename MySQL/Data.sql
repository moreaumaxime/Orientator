USE Orientator;


INSERT INTO Images (ImageID, ImageEmplacement) VALUES 
    (1,"OrientatorLogo.png"),
    (2,"bg.png");
ALTER TABLE Images AUTO_INCREMENT = 3 ;

INSERT INTO Filiere (FiliereID, FiliereNom, FiliereSlogan, FiliereDescription, ImageID) VALUES
    (1,"Cybersécurité","Empechez les hackers de nuire","Cette branche de l'informatique comporte plusieurs domaines, de la sécurité de l'information a la sécurité des systèmes, en passant par la sécurité offensive (les hackers ne sont pas tous mal intentionnés)",1),
    (2,"Developpement","Creez des applications","Le developpement est vaste, les pricipaux domaines sont le developpement web (vous voyez cette page internet? quelqun l'a codée), le developpement d'applications (comme des jeux vidéos par exemple) et le devOps",1),
    (3,"IA","Creez le prochain SkyNet","Cette branche de l'informatique est en constante revolution et contribue a des avancées en matiere médicale, en embarqué pour des robots autonomes, ou encore avec les IA generatives.",1),
    (4,"Infrastructure","Parce que l'internet a besoin de cables, beacoup de cables","Pour se connecter a un serveur, il faut qu'il soit configuré, il faut s'occuper de sécuriser des connexions, faire du load balancing, et autres choses qu'il faudra maintenir a disposition des utilisateurs",1),
    (5,"Robotique/IoT","Ta montre? connectée.\nTon frigo? connecté.\nTon roomba?\n.connecté","L'IoT rassemble tout objet connecté, de la voiture autonome au petit robot aspirateur, leurs capteurs leurs permettent de décider de leur comportement.",1);
ALTER TABLE Filiere AUTO_INCREMENT = 6 ;

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

ALTER TABLE Entreprise AUTO_INCREMENT = 10;

INSERT INTO Utilisateurs (UtilisateurID, UtilisateurUsername, UtilisateurEmail, UtilisateurHash ) VALUES
    (1,"User","User@gmail.com","04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb"),
    (2,"User2","User2@gmail.com","ca22d1343854b37baadc9b6dfa379e62e8dc4409cbef0671121c7e6eb9ea9ccd");

ALTER TABLE AUTO_INCREMENT = 3;
