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
    (1,"User","User@gmail.com","04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb"),/* password : user*/
    (2,"User2","User2@gmail.com","ca22d1343854b37baadc9b6dfa379e62e8dc4409cbef0671121c7e6eb9ea9ccd");/* password : 3il */

ALTER TABLE AUTO_INCREMENT = 3;

INSERT INTO Emploi (EmploiID, EmploiNom, FiliereID, EmploiDescription) VALUES
    (1,"Directeur de la Sécurité Informatique",1,"C'est le responsable de la sécurité d'un site/d'une entreprise, il est chargé d'établir les risques présents, puis de concevoir les protocoles de sécurité, les politiques de mot de passe, et autres actions necessaires pour mitiger les risques"),
    (2,"Pentester",1,"L'activité du pentester est de tester la sécurité d'un systeme d'information en tentant une intrusion. Cela passe par des moyens techniques, casser un chiffrage par exemple, mais aussi humains, comme demander a rentrer dans le batiment pour aller chercher ses papiers/clés de voiture/badge."),
    (3,"Dev web",2,"Le dev web concoit des pages internet, leur apparence, leur fonctionnalités, puis les met en place"),
    (4,"Data Scientist",3,"L'entrainement d'une IA passe d'abord par un bon jeu de données, et ce jeu de données doit etre préparé avec soin. Il faut aussi savoir de quel type de données on a besoin."),
    (5,"Directeur du service informatique",4,"Responsable de l'infrastructure de l'entreprise/du site dont il est chargé, il doit concevoir les differents equipements a mettre en place, leur maintenance, leurs documentations. Il met cela en place avec une equipe de techniciens qu'il dirige."),
    (6,"Architecte systemes embarqués",5,"Sa résponsabilité est la conception et l'implementation de systemes embarqués. C'est a dire de définir quelles informations seront nécessaires au fonctionnement de l'objet, et comment la traiter pour réaliser efficacement ce que l'objet doit faire. ")

ALTER TABLE AUTO_INCREMENT = 6;

INSERT INTO Formation (FormationID, FiliereID, FormationNom, FormationDescription) VALUES
    (1,1,"Bachelor Cybersécurité","Formation Bac+3 qui offre une spécialisation en alternance a partir de la 2eme année"),
    (2,1,"Master Cryptis","Formation Bac+5 qui offre deux parcours, orientés sur la théorie autour de la cryptologie, et un parcours orienté sur l'aspect technique"),
    (3),
    (),
    (),
    (),
    ()


