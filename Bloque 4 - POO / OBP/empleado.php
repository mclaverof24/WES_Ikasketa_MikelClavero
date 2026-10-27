<?php
// Clase base
class Empleado {
    protected string $nombre;
    protected float $salarioBase;

    public function __construct(string $nombre, float $salarioBase) {
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
    }

    public function calcularSalario(): float {
        return $this->salarioBase;
    }

    public function getInfo(): string {
        return "Empleado: {$this->nombre} | Salario: {$this->calcularSalario()}€";
    }
}

// Clase hija que hereda de Empleado
class Gerente extends Empleado {
    private float $bono;

    public function __construct(string $nombre, float $salarioBase, float $bono) {
        // Llamar al constructor de la clase padre
        parent::__construct($nombre, $salarioBase);
        $this->bono = $bono;
    }

    // Sobrescribir el método calcularSalario
    public function calcularSalario(): float {
        // Usa el salario base del padre y le suma el bono
        return parent::calcularSalario() + $this->bono;
    }
}

// --- PRUEBA DE HERENCIA ---
$emp = new Empleado("Ion", 1500);
$ger = new Gerente("Miren", 2500, 500);

echo $emp->getInfo() . "<br>"; // Muestra 1500€
echo $ger->getInfo() . "<br>"; // Muestra 3000€ (2500 + 500)
?>