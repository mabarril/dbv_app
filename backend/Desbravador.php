<?php
class Desbravador {
    private $conn;
    private $table_name = "Desbravadores";

    public $id;
    public $nome;
    public $dataNascimento;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getDesbravadores() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $num = $stmt->rowCount();
        
        if($num>0){
            $desbravadores_arr=array();
            $desbravadores_arr["records"]=array();
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
        
                $desbravador_item=array(
                    "id" => $id,
                    "nome" => $nome,
                    "dataNascimento" => $dataNascimento
                );
        
                array_push($desbravadores_arr["records"], $desbravador_item);
            }
        
            http_response_code(200);
            echo json_encode($desbravadores_arr);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Nenhum desbravador encontrado."));
        }
    }

    public function getDesbravador($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->nome = $row['nome'];
            $this->dataNascimento = $row['dataNascimento'];

            $dbv = ( array(
                "id" => $id,
                "nome" => $this->nome,
                "dataNascimento" => $this->dataNascimento
            ));
            http_response_code(200);
            echo json_encode($dbv);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Nenhum desbravador encontrado."));
        }
    }

    public function createDesbravador() {
        $data = json_decode(file_get_contents("php://input"));

        if(!empty($data->nome) && !empty($data->dataNascimento)) {
            $this->nome = $data->nome;
            $this->dataNascimento = $data->dataNascimento;

            $query = "INSERT INTO " . $this->table_name . " (nome, dataNascimento) VALUES (:nome, :dataNascimento)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':dataNascimento', $this->dataNascimento);

            if($stmt->execute()) {
                http_response_code(201);
                echo json_encode(array("message" => "Desbravador criado."));
            } else {
                http_response_code(503);
                echo json_encode(array("message" => "Não foi possível criar o desbravador."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Dados incompletos. Não foi possível criar o desbravador."));
        }
    }

    public function updateDesbravador() {
        $data = json_decode(file_get_contents("php://input"));

        if(!empty($data->id) && !empty($data->nome) && !empty($data->dataNascimento)) {
            $this->id = $data->id;
            $this->nome = $data->nome;
            $this->dataNascimento = $data->dataNascimento;

            $query = "UPDATE " . $this->table_name . " SET nome = :nome, dataNascimento = :dataNascimento WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':dataNascimento', $this->dataNascimento);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()) {
                http_response_code(200);
                echo json_encode(array("message" => "Desbravador atualizado."));
            } else {
                http_response_code(503);
                echo json_encode(array("message" => "Não foi possível atualizar o desbravador."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Dados incompletos. Não foi possível atualizar o desbravador."));
        }
    }

    public function deleteDesbravador() {
        $data = json_decode(file_get_contents("php://input"));

        if(!empty($data->id)) {
            $this->id = $data->id;

            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()) {
                http_response_code(200);
                echo json_encode(array("message" => "Desbravador excluído."));
            } else {
                http_response_code(503);
                echo json_encode(array("message" => "Não foi possível excluir o desbravador."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Dados incompletos. Não foi possível excluir o desbravador."));
        }
    }
}
?>