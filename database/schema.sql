DROP TABLE IF EXISTS activites;
DROP TABLE IF EXISTS projets;
DROP TABLE IF EXISTS membres;

CREATE TABLE membres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE projets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    type ENUM('court', 'long') NOT NULL,
    membre_id INT NOT NULL,
    FOREIGN KEY (membre_id)
        REFERENCES membres(id)
        ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE activites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    projet_id INT NOT NULL,
    FOREIGN KEY (projet_id)
        REFERENCES projets(id)
        ON DELETE RESTRICT
) ENGINE=InnoDB;
