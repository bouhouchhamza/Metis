<?php

require_once __DIR__ . "/../Crudes/membre.php";
require_once __DIR__ . "/../Crudes/projet.php";
require_once __DIR__ . "/../Crudes/activite.php";

while (true) {
    echo "\n=============================\n";
    echo "        MENU PRINCIPAL       \n";
    echo "=============================\n";
    echo "1. Ajouter un membre\n";
    echo "2. Afficher les membres\n";
    echo "3. Modifier un membre\n";
    echo "4. Supprimer un membre\n";
    echo "-----------------------------\n";
    echo "5. Ajouter un projet\n";
    echo "6. Afficher les projets\n";
    echo "7. Supprimer un projet\n";
    echo "-----------------------------\n";
    echo "8. Ajouter une activité\n";
    echo "9. Afficher activités d’un projet\n";
    echo "10. Supprimer une activité\n";
    echo "-----------------------------\n";
    echo "0. Quitter\n";
    echo "Choix: ";

    $choix = trim(fgets(STDIN));

    switch ($choix) {

        case 1:
            echo "Nom: ";
            $nom = trim(fgets(STDIN));
            echo "Email: ";
            $email = trim(fgets(STDIN));

            $m = new Membre($nom, $email);
            ajouterMembre($m);
            break;

        case 2:
            afficherMembres();
            break;

        case 3:
            echo "ID du membre: ";
            $id = trim(fgets(STDIN));
            echo "Nouveau nom: ";
            $nom = trim(fgets(STDIN));
            echo "Nouvel email: ";
            $email = trim(fgets(STDIN));

            modifierMembre($id, $nom, $email);
            break;

        case 4:
            echo "ID du membre: ";
            $id = trim(fgets(STDIN));
            supprimerMembre($id);
            break;

        case 5:
            echo "Titre du projet: ";
            $titre = trim(fgets(STDIN));
            echo "Type (court / long): ";
            $type = trim(fgets(STDIN));
            echo "ID du membre: ";
            $membre_id = trim(fgets(STDIN));

            ajouterProjet($titre, $type, $membre_id);
            break;

        case 6:
            afficherProjets();
            break;

        case 7:
            echo "ID du projet: ";
            $id = trim(fgets(STDIN));
            supprimerProjet($id);
            break;

        case 8:
            echo "Description activité: ";
            $desc = trim(fgets(STDIN));
            echo "ID du projet: ";
            $projet_id = trim(fgets(STDIN));

            ajouterActivite($desc, $projet_id);
            break;

        case 9:
            echo "ID du projet: ";
            $projet_id = trim(fgets(STDIN));
            afficherActivitesParProjet($projet_id);
            break;

        case 10:
            echo "ID de l’activité: ";
            $id = trim(fgets(STDIN));
            supprimerActivite($id);
            break;

        case 0:
            echo "Au revoir 👋\n";
            exit;

        default:
            echo "❌ Choix invalide\n";
    }
}
