<?php
include_once "./app/ConecDB/Conection.php";
include_once "./app/DAO/UsuarioDAO.php";
include_once "./app/model/Usuario.php";


$usuario = new Usuario();
$usuariodao = new UsuarioDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha256-LA89z+k9fjgMKQ/kq4OO2Mrf8VltYml/VES+Rg0fh20=" crossorigin="anonymous">
    <title>CRUD</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                CRUD PHP POO
            </a>
        </div>
    </nav>
    <div class="container">
        <form action="app/Controller/Controller.php" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <label>Nome</label>
                    <input type="text" name="name" value="" autofocus class="form-control" require />
                </div>
                <div class="col-md-5">
                    <label>Sobrenome</label>
                    <input type="text" name="surname" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Idade</label>
                    <input type="number" name="age" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Sexo</label>
                    <select name="gender" class="form-control">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Idade</th>
                        <th>Sexo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuariodao->read() as $usuario) : ?>
                        <tr>
                            <td><?= $usuario->getId() ?></td>
                            <td><?= $usuario->getName() ?></td>
                            <td><?= $usuario->getSurname() ?></td>
                            <td><?= $usuario->getAge() ?></td>
                            <td><?= $usuario->getGender()?></td>
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $usuario->getId() ?>">
                                    Editar
                                </button>
                                <a href="app/Controller/Controller.php?del=<?= $usuario->getId() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>
                        
                        <div class="modal fade" id="editar><?= $usuario->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controller/Controller.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="name" value="<?= $usuario->getName() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-7">
                                                    <label>Sobrenome</label>
                                                    <input type="text" name="surname" value="<?= $usuario->getSurname() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Idade</label>
                                                    <input type="number" name="age" value="<?= $usuario->getAge() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Sexo</label>
                                                    <select name="sexo" class="form-control">
                                                        <?php if ($usuario->getGender() == 'F') : ?>
                                                            <option value="F">Feminino</option>
                                                            <option value="M">Masculino</option>
                                                        <?php else : ?>
                                                            <option value="M">Masculino</option>
                                                            <option value="F">Feminino</option>
                                                        <?php endif ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $usuario->getId() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Cadastrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha256-5+02zu5UULQkO7w1GIr6vftCgMfFdZcAHeDtFnKZsBs=" crossorigin="anonymous"></script></script>
</body>

</html>