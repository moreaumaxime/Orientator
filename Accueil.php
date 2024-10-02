<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - Site d'Orientation</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            padding: 50px;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
        }

        p {
            font-size: 1.2em;
            color: #555;
            margin-top: 20px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1em;
            margin-top: 20px;
            cursor: pointer;
            border: none;
        }

        .quiz-container {
            margin-top: 30px;
            display: none;
        }

        .results {
            margin-top: 20px;
        }

        .quiz-question {
            font-size: 1.2em;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Section d'Accueil -->
        <div id="welcome-message">
            <h1>BIENVENUE SUR LE SITE D'ORIENTATION DES NOUVEAUX ÉTUDIANTS</h1>
            <p>Vous avez eu votre baccalauréat et vous ne savez pas quoi faire, pas de doute, nous sommes là pour vous aider.<br>
               En passant ce quiz, nous vous proposerons différentes branches adaptées à votre domaine en fonction des réponses que vous avez fournies pendant le quiz.
            </p>
            <button class="button" id="start-quiz-btn">QUIZZ</button>
        </div>

        <!-- Section de Quizz -->
        <div class="quiz-container" id="quiz-container">
            <div class="quiz-question">
                <p>1. Quel domaine vous attire le plus ?</p>
                <input type="radio" name="question1" value="Informatique"> Informatique<br>
                <input type="radio" name="question1" value="Médecine"> Médecine<br>
                <input type="radio" name="question1" value="Ingénierie"> Ingénierie<br>
            </div>

            <div class="quiz-question">
                <p>2. Préférez-vous travailler avec des machines ou des humains ?</p>
                <input type="radio" name="question2" value="Machines"> Machines<br>
                <input type="radio" name="question2" value="Humains"> Humains<br>
            </div>

            <button class="button" id="submit-quiz-btn">Soumettre</button>
        </div>

        <!-- Section des résultats -->
        <div class="results" id="results-container">
            <!-- Les résultats du quiz s'afficheront ici -->
        </div>
    </div>

    <script>
        // Afficher le quiz lors du clic sur le bouton QUIZZ
        document.getElementById('start-quiz-btn').addEventListener('click', function () {
            document.getElementById('quiz-container').style.display = 'block';
        });

        // Soumettre le quiz et afficher les résultats
        document.getElementById('submit-quiz-btn').addEventListener('click', function () {
            const question1 = document.querySelector('input[name="question1"]:checked');
            const question2 = document.querySelector('input[name="question2"]:checked');

            if (question1 && question2) {
                let resultsHTML = "<h2>Résultats</h2>";

                // Afficher les filières et universités françaises en fonction du domaine choisi
                if (question1.value === "Informatique") {
                    resultsHTML += "<p>Filières suggérées : <strong>Informatique, Développement logiciel, Cybersécurité</strong></p>";
                    resultsHTML += "<p>Universités en France :</p>";
                    resultsHTML += "<ul><li><a href='https://www.sorbonne-universite.fr/' target='_blank'>Sorbonne Université</a></li>";
                    resultsHTML += "<li><a href='https://www.polytechnique.edu/' target='_blank'>École Polytechnique</a></li>";
                    resultsHTML += "<li><a href='https://www.u-paris.fr/' target='_blank'>Université de Paris</a></li></ul>";
                } else if (question1.value === "Médecine") {
                    resultsHTML += "<p>Filières suggérées : <strong>Médecine, Chirurgie, Biologie</strong></p>";
                    resultsHTML += "<p>Universités en France :</p>";
                    resultsHTML += "<ul><li><a href='https://www.univ-paris5.fr/' target='_blank'>Université Paris Descartes</a></li>";
                    resultsHTML += "<li><a href='https://www.univ-amu.fr/' target='_blank'>Aix-Marseille Université</a></li>";
                    resultsHTML += "<li><a href='https://medecine.univ-lille.fr/' target='_blank'>Université de Lille - Faculté de Médecine</a></li></ul>";
                } else if (question1.value === "Ingénierie") {
                    resultsHTML += "<p>Filières suggérées : <strong>Génie civil, Génie mécanique, Électricité</strong></p>";
                    resultsHTML += "<p>Universités en France :</p>";
                    resultsHTML += "<ul><li><a href='https://www.centralesupelec.fr/' target='_blank'>CentraleSupélec</a></li>";
                    resultsHTML += "<li><a href='https://www.minesparis.psl.eu/' target='_blank'>Mines ParisTech</a></li>";
                    resultsHTML += "<li><a href='https://www.utc.fr/' target='_blank'>Université de Technologie de Compiègne (UTC)</a></li></ul>";
                }

                document.getElementById('results-container').innerHTML = resultsHTML;
            } else {
                alert('Veuillez répondre à toutes les questions.');
            }
        });
    </script>

</body>

</html>
