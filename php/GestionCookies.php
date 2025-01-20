<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $language = $_POST['language'];
    setcookie('language', $language, time() + (86400 * 30), "/"); // 30 días
    header('Location: GestionCookies.php');
    exit();
}

$language = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'es';

$greetings = [
    'es' => 'Bienvenido',
    'en' => 'Welcome',
    'fr' => 'Bienvenue'
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preferencia de Idioma</title>
</head>
<body>
    <h2><?php echo $greetings[$language]; ?></h2>
    <form method="post">
        <label for="language">Elige tu idioma:</label>
        <select id="language" name="language">
            <option value="es" <?php if ($language == 'es') echo 'selected'; ?>>Español</option>
            <option value="en" <?php if ($language == 'en') echo 'selected'; ?>>Inglés</option>
            <option value="fr" <?php if ($language == 'fr') echo 'selected'; ?>>Francés</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
