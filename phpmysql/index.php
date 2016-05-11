<!DOCTYPE html>
<html>
    <head>
        <title>Usuarios</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    </head>
    <body>
        <div class="container">

            <form action="#" method="POST">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" id="id" placeholder="id">
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="last_name">Apellido</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido">
                </div>
                <div class="form-group">
                    <label for="age">Edad</label>
                    <input type="text" class="form-control" name="age" id="age" placeholder="Edad">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="delete"> Eliminar
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary">
                </div>    
            </form>
            <?php
            //Se habilitan todos loe errores
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            //Se llama la clase de usaer
            require_once './controller/user.php';
            //Verificamos si llego el id del formulario
            $id = isset($_POST['id']) ? $_POST['id'] : 0 ;
            
            //Verificamos si estamos eliminando
            if(isset($_POST['delete'])){
                user::deleteUser($_POST['id']);
            
            //Verificamos si vamos a editar
            }else if($id > 0){
                user::updateUser($_POST['id'], $_POST['name'], $_POST['last_name'], $_POST['age']);
                
            //Verificamos si vamos a crear
            }else if(isset($_POST['name']) 
                    & isset($_POST['last_name'])
                    & isset($_POST['age'])){
                user::createUser($_POST['name'], $_POST['last_name'], $_POST['age']);
            }
            //Leermos los registros de la tabla
            $resultUser = user::readAllUser();
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($resultUser as $row){ ?>
                    <tr>
                        <td><?php  echo $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['last_name']; ?></td>
                        <td><?= $row['age']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>