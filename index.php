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
                                <h2 class="my-4">Task List</h2>
                            </div>
                            <form action="CRUD/Addtask.php" method="post">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <input type="text" id="task" name="task"
                                                class="form-control form-control-lg" id="exampleFormControlInput1"
                                                placeholder="Add new task" required>
                                            <label for="cars">Choose a priority:</label>
                                            <select id="priority" name="priority">
                                                <option value="High priority" style="color: red">High priority
                                                </option>
                                                <option value="Middle priority" style="color: yellow">Middle priority
                                                </option>
                                                <option value="Low priority" style="color: green">Low priority</option>
                                            </select>
                                            <div class="myButton">
                                                <button type="submit" id="submit" name="submit"
                                                    class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table text-white mb-0">
                                <?php $sql= "select * from tasks" ;
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                 ?>
                                <thead>
                                    <tr>
                                        <th scope="col">Task</th>
                                        <th scope="col">Priority</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  while($row = mysqli_fetch_assoc($result)) {?>
                                    <tr class="fw-normal">
                                        <td class="align-middle">
                                            <span><?php  echo $row['Nametask']?></span>
                                        </td>
                                        <td class="align-middle">
                                            <h6 class="mb-0">
                                                <?php if($row['Priority']==='High priority'){
                                                    echo "<span class='badge bg-danger'> ".  $row['Priority']."</span>";
                                                }else if($row['Priority']==='Middle priority'){
                                                    echo "<span class='badge bg-warning'> ".  $row['Priority']."</span>";
                                                }else if($row['Priority']==='Low priority'){
                                                    echo "<span class='badge bg-success'> ".  $row['Priority']."</span>";
                                                } ?>
                                            </h6>
                                        </td>
                                        <td class="align-middle">
                                            <a href="Viewupdate.php?idtask=<?php echo $row ['task_ID']; ?>"
                                                class="text-info" data-mdb-toggle="tooltip" title="Edit todo"><i
                                                    class="fas fa-pencil-alt me-3"></i></a>
                                            <a href="CRUD/Deletetask.php?idtask=<?php echo $row ['task_ID']; ?>"
                                                data-mdb-toggle="tooltip" title="Remove"><i
                                                    class="fas fa-trash-alt fa-lg text-warning"></i></a>
                                        </td>
                                    </tr>
                                    <?php }?>

                                </tbody>
                                <?php }?>

                            </table>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>