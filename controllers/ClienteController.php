// controllers/ClienteController.php
<?php
require_once 'models/Cliente.php';

class ClienteController {
    private $cliente;

    public function __construct($pdo) {
        $this->cliente = new Cliente($pdo);
    }

    public function index() {
        $clientes = $this->cliente->listar();
        include 'views/clientes/index.php';
    }

    public function salvar($dados) {
        $this->cliente->adicionar($dados['nome'], $dados['telefone'], $dados['email']);
        header('Location: index.php?rota=clientes');
    }
}
?>