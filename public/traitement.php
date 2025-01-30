<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $sexe = $_POST['sexe'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $nationalite = $_POST['nationalite'];
    $pays_naissance = $_POST['pays_naissance'];
    $presentation = $_POST['presentation'];
    $loisirs = implode(", ", $_POST['loisirs']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $consentement = isset($_POST['consentement']) ? "Oui" : "Non";

    // Vérifier si l'email existe déjà dans le fichier utilisateur.txt
    $fichier_utilisateur = "utilisateur.txt";
    $email_existe = false;
    if (file_exists($fichier_utilisateur)) {
        $utilisateurs = file($fichier_utilisateur, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($utilisateurs as $utilisateur) {
            $donnees = explode(";", $utilisateur);
            if ($donnees[2] == $email) {  // Vérifier si l'email correspond
                $email_existe = true;
                break;
            }
        }
    }

    if ($email_existe) {
        // Afficher un message d'erreur et réhydrater le formulaire
        echo "Une erreur est survenue. Cet email est déjà enregistré.<br>";
        
        // Réhydrater le formulaire avec les valeurs saisies
        $form_values = [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => '',
            'age' => $age,
            'sexe' => $sexe,
            'adresse' => $adresse,
            'ville' => $ville,
            'code_postal' => $code_postal,
            'nationalite' => $nationalite,
            'pays_naissance' => $pays_naissance,
            'presentation' => $presentation,
            'loisirs' => $_POST['loisirs'] ?? [],
        ];
        
        // Réafficher le formulaire avec les valeurs pré-remplies
        include 'formulaire.php';  // Inclure à nouveau le formulaire avec les données pré-remplies
    } else {
        // Vérifier si les mots de passe correspondent
        if ($password !== $confirm_password) {
            die("Les mots de passe ne correspondent pas.");
        }

        // Enregistrer les données dans le fichier utilisateur.txt
        $fichier = "utilisateur.txt";
        $ligne = "$nom;$prenom;$email;$age;$sexe;$adresse;$ville;$code_postal;$nationalite;$pays_naissance;$presentation;$loisirs;$password;$consentement\n";

        // Si l'ajout est réussi, afficher un message
        if (file_put_contents($fichier, $ligne, FILE_APPEND)) {
            echo "Inscription réussie $nom $prenom !";
        } else {
            echo "Erreur durant l'enregistrement des données.";
        }
    }
}
?>

