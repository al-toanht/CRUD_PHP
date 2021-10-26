<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <?php require_once "CRUD/config.php";?>
    <section class="vh-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-10">

                    <div class="card mask-custom">
                        <div class="card-body p-4 text-white">

                            <div class="text-center pt-3 pb-2">
                                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-todo-list/check1.png"
                                    alt="Check" width="60">
                                <h2 class="my-4">Update List</h2>
                            </div>
                            <?php
                                $idtask=$_GET['idtask'];
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                                $pdo_statement = $conn->prepare("SELECT * FROM tasks where task_ID=$idtask");
                                $pdo_statement->execute();
                                $result = $pdo_statement->setFetchMode(PDO::FETCH_ASSOC);
                                if($result){
                                    while($row =  $pdo_statement ->fetch()) {
                            ?>
                            <form action="CRUD/updatetask.php?idtask=<?php echo $row['task_ID']?>" method="post">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <input type="text" id="task" name="task"
                                                class="form-control form-control-lg" id="exampleFormControlInput1"
                                                value="<?php  echo $row['Nametask'];?>">
                                            <label for="cars">Choose a priority:</label>
                                            <select id="priority" name="priority">
                                                <?php
                                                    $array=['High priority','Middle priority','Low priority'];
                                                    foreach($array as $value){
                                                ?>
                                                <option value="<?php echo $value; ?>" <?php  if ($value=="High priority") echo 'style="color: green"';
                                                     else if ($value=="Middle priority") echo 'style="color: yellow"';
                                                     else if ($value=="Low priority") echo 'style="color: red"';
                                                     if($value==$row['Priority']){
                                                       echo 'selected';
                                                     }
                                                     ?>>
                                                    <?php echo $value;?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="myButton">
                                                <button type="submit" id="submit" name="submit"
                                                    class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php }
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>