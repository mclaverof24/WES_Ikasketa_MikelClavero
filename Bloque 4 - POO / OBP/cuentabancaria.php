<?php
class CuentaBancaria {
    // Atributos con visibilidad
    public string $titular;
    private float $saldo;

    // Constructor para inicializar propiedades al instanciar
    public function __construct(string $titular, float $saldoInicial = 0.0) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Método getter para consultar el saldo privado
    public function getSaldo(): float {
        return $this->saldo;
    }

    // Método para ingresar dinero
    public function ingresar(float $cantidad): void {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
            echo "Ingreso exitoso de {$cantidad}€. Nuevo saldo: {$this->saldo}€<br>";
        }
    }

    // Método para retirar dinero con validación
    public function retirar(float $cantidad): void {
        if ($cantidad <= $this->saldo) {
            $this->saldo -= $cantidad;
            echo "Retiro exitoso de {$cantidad}€. Saldo restante: {$this->saldo}€<br>";
        } else {
            echo "Error: Saldo insuficiente en la cuenta.<br>";
        }
    }
}

// --- PRUEBA DE LA CLASE ---
$miCuenta = new CuentaBancaria("Aitor", 100.0);

echo "Titular: " . $miCuenta->titular . "<br>";
echo "Saldo inicial: " . $miCuenta->getSaldo() . "€<br><br>";

$miCuenta->ingresar(50);
$miCuenta->retirar(30);
$miCuenta->retirar(200); // Intento fallido de retiro
?>