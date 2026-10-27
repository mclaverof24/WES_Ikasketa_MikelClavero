<?php
require_once 'conexion.php';

$mensaje = "";
$jugadorEditar = null;

// ==========================================
// 1. CREATE (Añadir nuevo jugador)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'crear') {
    $nombre = trim($_POST['nombre']);
    $posicion = trim($_POST['posicion']);
    $dorsal = (int)$_POST['dorsal'];
    $goles = (int)$_POST['goles'];

    if (!empty($nombre) && !empty($posicion) && $dorsal > 0) {
        try {
            $sql = "INSERT INTO jugadores (nombre, posicion, dorsal, goles) VALUES (:nombre, :posicion, :dorsal, :goles)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':posicion' => $posicion,
                ':dorsal' => $dorsal,
                ':goles' => $goles
            ]);
            $mensaje = "✓ Jugador fichado con éxito.";
        } catch (PDOException $e) {
            $mensaje = "Error al registrar jugador: " . $e->getMessage();
        }
    }
}

// ==========================================
// 2. DELETE (Eliminar/Vender jugador)
// ==========================================
if (isset($_GET['action']) && $_GET['action'] === 'eliminar') {
    $id = (int)$_GET['id'];
    try {
        $sql = "DELETE FROM jugadores WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        header("Location: plantilla.php");
        exit();
    } catch (PDOException $e) {
        $mensaje = "Error al eliminar: " . $e->getMessage();
    }
}

// ==========================================
// 3. UPDATE - Cargar datos a editar
// ==========================================
if (isset($_GET['action']) && $_GET['action'] === 'editar') {
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM jugadores WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $jugadorEditar = $stmt->fetch();
}

// UPDATE - Guardar cambios realizados
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'actualizar') {
    $id = (int)$_POST['id'];
    $nombre = trim($_POST['nombre']);
    $posicion = trim($_POST['posicion']);
    $dorsal = (int)$_POST['dorsal'];
    $goles = (int)$_POST['goles'];

    try {
        $sql = "UPDATE jugadores SET nombre = :nombre, posicion = :posicion, dorsal = :dorsal, goles = :goles WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':posicion' => $posicion,
            ':dorsal' => $dorsal,
            ':goles' => $goles,
            ':id' => $id
        ]);
        header("Location: plantilla.php");
        exit();
    } catch (PDOException $e) {
        $mensaje = "Error al actualizar: " . $e->getMessage();
    }
}

// ==========================================
// 4. READ (Obtener todos los jugadores)
// ==========================================
$stmt = $pdo->query("SELECT * FROM jugadores ORDER BY dorsal ASC");
$jugadores = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de la Plantilla de Fútbol</title>
</head>
<body>

    <h2>⚽ Gestión de la Plantilla de Fútbol (PDO CRUD)</h2>

    <?php if (!empty($mensaje)): ?>
        <p style="color: green;"><strong><?php echo $mensaje; ?></strong></p>
    <?php endif; ?>

    <!-- FORMULARIO DE REGISTRO / EDICIÓN -->
    <h3><?php echo $jugadorEditar ? "Editar Ficha de {$jugadorEditar['nombre']}" : "Fichar Nuevo Jugador"; ?></h3>
    
    <form method="POST" action="plantilla.php">
        <input type="hidden" name="action" value="<?php echo $jugadorEditar ? 'actualizar' : 'crear'; ?>">
        
        <?php if ($jugadorEditar): ?>
            <input type="hidden" name="id" value="<?php echo $jugadorEditar['id']; ?>">
        <?php endif; ?>

        <label for="nombre">Nombre completo:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo $jugadorEditar['nombre'] ?? ''; ?>" required><br><br>

        <label for="posicion">Posición:</label><br>
        <select id="posicion" name="posicion" required>
            <?php 
            $posiciones = ['Portero', 'Defensa', 'Centrocampista', 'Delantero'];
            foreach ($posiciones as $pos) {
                $selected = ($jugadorEditar && $jugadorEditar['posicion'] === $pos) ? 'selected' : '';
                echo "<option value='$pos' $selected>$pos</option>";
            }
            ?>
        </select><br><br>

        <label for="dorsal">Dorsal (#):</label><br>
        <input type="number" id="dorsal" name="dorsal" min="1" max="99" value="<?php echo $jugadorEditar['dorsal'] ?? ''; ?>" required><br><br>

        <label for="goles">Goles anotados:</label><br>
        <input type="number" id="goles" name="goles" min="0" value="<?php echo $jugadorEditar['goles'] ?? '0'; ?>" required><br><br>

        <button type="submit"><?php echo $jugadorEditar ? 'Guardar Cambios' : 'Fichar Jugador'; ?></button>
        <?php if ($jugadorEditar): ?>
            <a href="plantilla.php">Cancelar edición</a>
        <?php endif; ?>
    </form>

    <hr>

    <!-- TABLA DE JUGADORES -->
    <h3>Plantilla Actual</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Dorsal</th>
                <th>Nombre</th>
                <th>Posición</th>
                <th>Goles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($jugadores)): ?>
                <tr><td colspan="5">No hay jugadores registrados en la plantilla.</td></tr>
            <?php else: ?>
                <?php foreach ($jugadores as $j): ?>
                    <tr>
                        <td><strong>#<?php echo $j['dorsal']; ?></strong></td>
                        <td><?php echo htmlspecialchars($j['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($j['posicion']); ?></td>
                        <td>⚽ <?php echo $j['goles']; ?></td>
                        <td>
                            <a href="plantilla.php?action=editar&id=<?php echo $j['id']; ?>">Editar</a> | 
                            <a href="plantilla.php?action=eliminar&id=<?php echo $j['id']; ?>" onclick="return confirm('¿Dar de baja a este jugador?');">Baja</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>