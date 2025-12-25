<?php

require_once __DIR__ . "/../config/connect.php";


function ajouterActivite($description, $projet_id)
{
    $db = new Database();
    $pdo = $db->pdo;

    $sql = "INSERT INTO activites (description, projet_id)
            VALUES (:description, :projet_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "description" => $description,
        "projet_id" => $projet_id
    ]);

    echo "✅ Activité ajoutée\n";
}


function afficherActivitesParProjet($projet_id)
{
    $db = new Database();
    $pdo = $db->pdo;

    $sql = "
        SELECT a.id, a.description, p.titre
        FROM activites a
        JOIN projets p ON a.projet_id = p.id
        WHERE p.id = :id
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $projet_id]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $a) {
        echo $a['id']." - ".$a['description']." (Projet: ".$a['titre'].")\n";
    }
}


function supprimerActivite($id)
{
    $db = new Database();
    $pdo = $db->pdo;

    $stmt = $pdo->prepare("DELETE FROM activites WHERE id = :id");
    $stmt->execute(["id" => $id]);

    echo "🗑️ Activité supprimée\n";
}
