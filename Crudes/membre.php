<?php

require_once __DIR__ . "/../config/connect.php";
require_once __DIR__ . "/../classes/membre.php";


function ajouterMembre(Membre $membre)
{
    $db = new Database();
    $pdo = $db->pdo;

    $sql = "INSERT INTO membre (nom, email) VALUES (:nom, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "nom"   => $membre->getNom(),
        "email" => $membre->getEmail()
    ]);

    echo "✅ Membre ajouté\n";
}


function afficherMembres()
{
    $db = new Database();
    $pdo = $db->pdo;

    $sql = "SELECT * FROM membre";
    $stmt = $pdo->query($sql);

    $membres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($membres as $m) {
        echo $m['id'] . " - " . $m['nom'] . " - " . $m['email'] . "\n";
    }
}


function modifierMembre($id, $nom, $email)
{
    $db = new Database();
    $pdo = $db->pdo;

    $sql = "UPDATE membre SET nom = :nom, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "id"    => $id,
        "nom"   => $nom,
        "email" => $email
    ]);

    echo "✏️ Membre modifié\n";
}


function supprimerMembre($id)
{
    $db = new Database();
    $pdo = $db->pdo;

    
    $check = $pdo->prepare("SELECT COUNT(*) FROM projet WHERE membre_id = :id");
    $check->execute(["id" => $id]);
    $count = $check->fetchColumn();

    if ($count > 0) {
        echo "❌ Impossible de supprimer (membre a des projets)\n";
        return;
    }

    $sql = "DELETE FROM membre WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $id]);

    echo "🗑️ Membre supprimé\n";
}
