<?php use App\Core\Auth;?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link  rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $titulo ?></title>
  </head>
  <body>
    <nav>
      <ul><li><strong><a href="<?= url_to('./')?>">Bodega</a></strong></li></ul>
      <ul>
        <li>
          <details class="dropdown">
          <summary>Produtos</summary>
          <ul>
            <li><a href="produtos">Listar</a></li>
            <li><a href="produtos/cadastrar">Cadastrar</a></li>
          </ul>
        </details>
      </li>
      <?php if(!Auth::check()):?>
        <li><a href="<?=url_to('usuario/cadastrar')?>">Cadastrar</a></li>
        <li><a href="<?=url_to('auth')?>">Login</a></li>
      <?php else:?>
        <li>
          <p>Bem vindo<?= Auth::user()?></p>
          <p>Seu email é<?= Auth::email() ?></p>
        </li>
        <li><a href="<?=url_to('auth/logout')?>">Logout</a></li>
      <?php endif?>
      </ul>
    </nav>