<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
<div class="container">
    <h1>Formulaire d'Inscription</h1>
    <form action="traitement.php" method="post">
        
        <!-- Nom -->
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <!-- Prénom -->
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Âge -->
        <div class="form-group">
            <label for="age">Âge :</label>
            <input type="number" id="age" name="age" required>
        </div>

        <!-- Sexe -->
        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <select id="sexe" name="sexe" required>
                <option value="femme">Femme</option>
                <option value="homme">Homme</option>
            </select>
        </div>

        <!-- Adresse -->
        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required>
        </div>

        <!-- Ville -->
        <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required>
        </div>

        <!-- Code postal -->
        <div class="form-group">
            <label for="code_postal">Code postal :</label>
            <input type="number" id="code_postal" name="code_postal" required>
        </div>

        <!-- Nationalité -->
        <div class="form-group">
            <label for="nationalite">Nationalité :</label>
            <select id="nationalite" name="nationalite" required>
                <?php
                // Charger les nationalités depuis un fichier .csv
                $file = "donees/nationality.csv";
                if (file_exists($file)) {
                    $rows = array_map("str_getcsv", file($file));
                    foreach ($rows as $row) {
                        echo "<option value=\"$row[0]\">" . htmlspecialchars($row[0]) . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <!-- Pays de naissance -->
        <div class="form-group">
            <label for="pays_naissance">Pays de naissance :</label>
            <select id="pays_naissance" name="pays_naissance" required>
                <?php
                // Charger les pays depuis un fichier .csv
                $file = "donees/pays.csv";
                if (file_exists($file)) {
                    $rows = array_map("str_getcsv", file($file));
                    foreach ($rows as $row) {
                        echo "<option value=\"$row[4]\">" . htmlspecialchars($row[4]) . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <!-- Présentation -->
        <div class="form-group full-width">
            <label for="presentation">Présentation :</label>
            <textarea id="presentation" name="presentation" maxlength="978"></textarea>
        </div>

        <!-- Activités de loisirs -->
        <div class="form-group full-width">
            <label for="loisirs">Activités de loisirs :</label>
            <select id="loisirs" name="loisirs[]" multiple required>
                <?php
                // Charger les activités depuis un fichier .txt
                $file = "donees/activity.txt";
                if (file_exists($file)) {
                    $activities = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    foreach ($activities as $activity) {
                        echo "<option value=\"$activity\">" . htmlspecialchars($activity) . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <!-- Mot de passe -->
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="form-group">
            <label for="confirm_password">Confirmation du mot de passe :</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <!-- Bouton d'inscription -->
        <div class="form-group full-width">
            <input type="submit" value="S'inscrire">
        </div>
    </form>
</div>