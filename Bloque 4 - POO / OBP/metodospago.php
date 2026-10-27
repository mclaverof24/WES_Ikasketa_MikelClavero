<?php
// Contrato / Interfaz
interface MetodoPago {
    public function pagar(float $cantidad): string;
}

// Implementación 1
class PagoTarjeta implements MetodoPago {
    private string $numeroTarjeta;

    public function __construct(string $numeroTarjeta) {
        $this->numeroTarjeta = $numeroTarjeta;
    }

    public function pagar(float $cantidad): string {
        return "Procesado pago de {$cantidad}€ con tarjeta finalizada en " . substr($this->numeroTarjeta, -4);
    }
}

// Implementación 2
class PagoPayPal implements MetodoPago {
    private string $email;

    public function __construct(string $email) {
        $this->email = $email;
    }

    public function pagar(float $cantidad): string {
        return "Procesado pago de {$cantidad}€ desde la cuenta de PayPal ({$this->email})";
    }
}

// --- POLIMORFISMO EN ACCIÓN ---
function procesarCompra(MetodoPago $metodo, float $monto) {
    echo $metodo->pagar($monto) . "<br>";
}

$tarjeta = new PagoTarjeta("1234567890129999");
$paypal = new PagoPayPal("aitor@example.com");

procesarCompra($tarjeta, 49.99);
procesarCompra($paypal, 15.50);
?>