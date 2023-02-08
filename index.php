<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'table_test_php';
try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $db = new PDO ("mysql:host=$server; dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "OK";

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $dt = new DateTime();
    $date = $dt->format('Y-m-d H:i:s');

    $sql = "
    INSERT INTO user (nom, prenom, email, password, adresse, code_postal, pays, date_join)
    VALUES ('deboudt', 'damien', 'dam.deb@sfr.fr', 'test', '55 rue du blanc', 02498, 'France', '$date')
    ";

    //$result = $db->exec($sql);


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.
    $sql2 = "
    INSERT INTO produit (titre, prix, description, descriptionslongue)
    VALUES ('Velo Giant', 2500, 'good bike for workout', 'this is the best bike ever, great price, perfect design, awesome bike')
    ";

    //$db->exec($sql2);
    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.
    $sql3 = "
    INSERT INTO user (nom, prenom, email, password, adresse, code_postal, pays, date_join)
    VALUES ('deboudt', 'quentin', 'que.deb@sfr.fr', 'testque', '58 rue du blanc', 02789, 'France', '$date'),
           ('deboudt', 'samuel', 'sam.deb@sfr.fr', 'testsam', '54 rue du blanc', 0290, 'France', '$date')
    ";
    //$db->exec($sql3);
    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $sql4 = "
    INSERT INTO produit (titre, prix, description, descriptionslongue)
    VALUES ('Velo Trek', 7299, 'good bike for workout', 'this is the best bike ever, great price, perfect design, awesome bike'),
           ('Velo CUBE', 4699, 'good bike for workout', 'this is the best bike ever, great price, perfect design, awesome bike')
    ";
    //$db->exec($sql4);
    /**
     * 5. A l"aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.
        $db->beginTransaction();

        $insert = 'INSERT INTO user (nom, prenom, email, password, adresse, code_postal, pays, date_join) VALUES ';

        $sql5 = $insert . "('leblanc', 'Jean', 'jleb@hotmail.com', 'testleblanc', '56 rue de la forêt','03499', 'Canada', '$date')";
        $db->exec($sql5);

        $sql6 = $insert . "('leblanc', 'Jean', 'jleb2@hotmail.com', 'testleblanc', '56 rue de la forêt','5600', 'Canada', '$date')";
        $db->exec($sql6);

        $sql7 = $insert . "('leblanc', 'Jean', 'jleb3@hotmail.com', 'testleblanc', '56 rue de la forêt','0982', 'Canada', '$date')";
        $db->exec($sql7);

        $db->commit();
    /**
     * 6. A l"aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
}
catch (PDOException $e) {
    echo "Erreur de connexion à la db: " . $e->getMessage();
    return null;
}