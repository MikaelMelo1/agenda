<?php
  session_start();

  include_once("connection.php");
  include_once("url.php");

  $id = '';

  $data = $_POST;

  if(!empty ($data)) {
    //cria contato
    if($data['type'] === 'create') {
      $name = $data['name'];
      $phone = $data['phone'];
      $observations = $data['observations'];

      $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":phone", $phone);
      $stmt->bindParam(":observations", $observations);

      try {
        $stmt->execute();
        $_SESSION['msg'] = "Contato criado com sucesso!";
      } catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
        $_SESSION['msg'] = "Erro: Contato não criado.";
      }
 //redirect home
 header("Location: " . $BASE_URL . "../index.php");
    //atualiza contato
    } else if($data['type'] === 'edit') {
      $name = $data['name'];
      $phone = $data['phone'];
      $observations = $data['observations'];
      $id = $data['id'];

      $query = "UPDATE contacts SET name = :name, phone = :phone, observations = :observations WHERE id = :id";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":phone", $phone);
      $stmt->bindParam(":observations", $observations);
      $stmt->bindParam(":id", $id);

      try {
        $stmt->execute();
        $_SESSION['msg'] = "Contato atualizado com sucesso!";
      } catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
        $_SESSION['msg'] = "Erro: Contato não atualizado.";
      }
header("Location: " . $BASE_URL . "../index.php");
    //deleta contato
    } else if($data['type'] === 'delete') {
      $id = $data['id'];

      // remove o contato do banco
      $query = "DELETE FROM contacts WHERE id = :id";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":id", $id);

      try {
        $stmt->execute();
        $_SESSION['msg'] = "Contato removido com sucesso!";
      } catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
        $_SESSION['msg'] = "Erro: Contato não removido.";
      }
      header("Location: " . $BASE_URL . "../index.php");
    }
  }

if(!empty($_GET['id'])) {
  $id = $_GET['id'];
}

if (!empty($id)) {
  // retorna dado de um contato
  $query = "SELECT * FROM contacts WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  $contact = $stmt->fetch();
} else {
  // retorna todos os contatos
  $contacts = [];
  $query = "SELECT * FROM contacts";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $contacts = $stmt->fetchAll();
}

// fecha conexão

$conn = null;
?>