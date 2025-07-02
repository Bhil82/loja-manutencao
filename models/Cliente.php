//models/Cliente.php
<?php
class Cliente {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionar($nome, $telefone, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (nome, telefone, email) VALUES (?, ?, ?)");
        return $stmt->execute([$nome, $telefone, $email]);
    }
}
?>