<?php 

  include_once("./config/url.php");
  include_once("./config/connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.8/css/bootstrap.min.css" integrity="sha512-2bBQCjcnw658Lho4nlXJcc6WkV/UxpE/sAokbXPxQNGqmNdQrWqtw26Ns9kFF/yG792pKR1Sx8/Y1Lf1XN4GKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
  
  <title>Agenda de Contatos</title>
</head>
<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?= $BASE_URL ?>index.php">
      <img src="<?= $BASE_URL ?>img/logo.svg" alt="Agenda">
    </a>
    <div class="navbar-nav">
      <a href="<?= $BASE_URL ?>index.php" class="nav-link active" id="home- active">Agenda</a>
      <a href="<?= $BASE_URL ?>create.php" class="nav-link active" id="home-link">Adicionar Contato</a>
    </div>
  </nav>
</header>