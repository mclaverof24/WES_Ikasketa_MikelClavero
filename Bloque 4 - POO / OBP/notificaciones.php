<?php
// 1. INTERFACES (Contratos de comportamiento)
interface Enviable {
    public function enviar(string $mensaje): bool;
}

interface Auditable {
    public function registrarLog(string $evento): void;
}

// 2. CLASE ABSTRACTA (Estructura base y reutilización de código)
abstract class CanalNotificacion {
    protected string $destinatario;

    public function __construct(string $destinatario) {
        $this->destinatario = $destinatario;
    }

    // Método concreto compartido por todas las clases hijas
    public function validarDestinatario(): bool {
        return !empty($this->destinatario);
    }
}

// 3. CLASE CONCRETA (Hereda de 1 clase abstracta e implementa MÚLTIPLES interfaces)
class EmailNotificacion extends CanalNotificacion implements Enviable, Auditable {

    // Implementación del método obligado por Enviable
    public function enviar(string $mensaje): bool {
        if (!$this->validarDestinatario()) {
            echo "Error: Destinatario no válido.<br>";
            return false;
        }
        echo "Enviando correo a <strong>{$this->destinatario}</strong> con el mensaje: '$mensaje'<br>";
        $this->registrarLog("Correo enviado con éxito.");
        return true;
    }

    // Implementación del método obligado por Auditable
    public function registrarLog(string $evento): void {
        echo "<small>LOG [EMAIL]: $evento</small><br>";
    }
}

// --- PRUEBA DE EJECUCIÓN ---

// $canal = new CanalNotificacion("test"); // ERROR FATAL: No se pueden instanciar clases abstractas

$notificador = new EmailNotificacion("aitor@example.com");

// Usamos el método heredado de la clase abstracta
if ($notificador->validarDestinatario()) {
    echo "Destinatario correcto.<br>";
}

// Usamos los métodos obligados por las interfaces
$notificador->enviar("Tu pedido ha sido procesado.");
?>