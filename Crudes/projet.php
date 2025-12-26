<?php

require_once __DIR__ . "/../config/connect.php";


function ajouterProjet($titre, $type, $membre_id)
{
    $db = new Database();
    $pdo = $db->pdo;

    $sql = "INSERT INTO projet (titre, type, membre_id)
            VALUES (:titre, :type, :membre_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "titre" => $titre,
        "type" => $type,          
        "membre_id" => $membre_id
    ]);

    echo "✅ Projet ajouté\n";
}


function afficherProjets()
{
    $db = new Database();
    $pdo = $db->pdo;

    $sql = "
        SELECT p.id, p.titre, p.type, m.nom
        FROM projet p
        JOIN membre m ON p.membre_id = m.id
    ";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $p) {
        echo $p['id']." - ".$p['titre']." (".$p['type'].") - Membre: ".$p['nom']."\n";
    }
}


function supprimerProjet($id)
{
    $db = new Database();
    $pdo = $db->pdo;

    
    $check = $pdo->prepare("SELECT COUNT(*) FROM activite WHERE projet_id = :id");
    $check->execute(["id" => $id]);
    if ($check->fetchColumn() > 0) {
        echo "❌ Projet فيه activités، ما يمكنش يتحيد\n";
        return;
    }

    $stmt = $pdo->prepare("DELETE FROM projet WHERE id = :id");
    $stmt->execute(["id" => $id]);

    echo "🗑️ Projet supprimé\n";
}
