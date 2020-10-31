<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <?php 
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', '');
      define('DB_NAME', 'book');

      $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
      
      if($link === false){
        die("ERROR: Tidak bisa connect. " . mysqli_connect_error());
      }

      if(isset($_POST['submitCategory'])){
          $id = $_POST['id'];
          $name = $_POST['name'];

          $sql = "INSERT INTO category_tb(id,name) VALUES('$id','$name')";
          $result = mysqli_query($link, $sql);
      }

      if(isset($_POST['submitWriter'])){
        $id = $_POST['id'];
        $name = $_POST['name'];

        $sql = "INSERT INTO writer_tb(id,name) VALUES('$id','$name')";
        $result = mysqli_query($link, $sql);
      }

      if(isset($_POST['submitBook'])){
        
        $id = $_POST['id'];
        $name = $_POST['title'];
        $category_id = $_POST['category'];
        $writer_id = $_POST['writer'];
        $publication_year = $_POST['publicationYear'];
        $image = $_FILES['foto']['name'];
        file_get_contents($image['foto']); 

        $sql = "INSERT INTO book_tb(id,name,category_id,writer_id,publication_year,img) VALUES('$id','$name','$category_id','$writer_id', '$publication_year', '$image')";
        $result = mysqli_query($link, $sql);
      }

      if(isset($_POST['deleteWriter']) and is_numeric($_POST['deleteWriter']))
      {
        $delete = $_POST['deleteWriter'];
        $sql = "DELETE FROM writer_tb where `id` = '$delete'"; 
        $result = mysqli_query($link, $sql);
      }

      if(isset($_POST['deleteCategory']) and is_numeric($_POST['deleteCategory']))
      {
        $delete = $_POST['deleteCategory'];
        $sql = "DELETE FROM category_tb where `id` = '$delete'"; 
        $result = mysqli_query($link, $sql);
      }

      if(isset($_POST['editWriter']))
      {
        echo "test";
        $id = $_POST['id'];
        $name = $_POST['name'];
        
        $sql = "UPDATE writer_tb SET name='$name' WHERE id=$id"; 
        $result = mysqli_query($link, $sql);
      }

      if(isset($_POST['editCategory']))
      {
        echo "test";
        $id = $_POST['id'];
        $name = $_POST['name'];
        
        $sql = "UPDATE category_tb SET name='$name' WHERE id=$id"; 
        $result = mysqli_query($link, $sql);
      }


    ?>


    <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      * {box-sizing: border-box;}

      /* Button used to open the contact form - fixed at the bottom of the page */
      table, th, td {
        border: 1px solid black;
      }

      img {
        float: left;
        width:  100px;
        height: 500px;
        object-fit: cover;
      }
      .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        top: 23px;
        right: 28px;
        width: 280px;
      }

      .open-button2 {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        top: 23px;
        right: 328px;
        width: 280px;
      }

      .open-button3 {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        top: 23px;
        right: 628px;
        width: 280px;
      }

      /* The popup form - hidden by default */
      .form-popup {
        display: none;
        position: fixed;
        top: 0;
        right: 10px;
        border: 3px solid #f1f1f1;
        z-index: 9;
      }

      .form-popup2 {
        display: none;
        position: fixed;
        top: 0;
        right: 310px;
        border: 3px solid #f1f1f1;
        z-index: 9;
      }

      .form-popup3 {
        display: none;
        position: fixed;
        top: 0;
        right: 610px;
        border: 3px solid #f1f1f1;
        z-index: 9;
      }

      

      /* Add styles to the form container */
      .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
      }

      /* Full-width input fields */
      .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
      }

      /* When the inputs get focus, do something */
      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }

      /* Set a style for the submit/login button */
      .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
      }

      /* Add a red background color to the cancel button */
      .form-container .cancel {
        background-color: red;
      }

      /* Add some hover effects to buttons */
      .form-container .btn:hover, .open-button:hover {
        opacity: 1;
      }

      .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
      }

      /* On mouse-over, add a deeper shadow */
      .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      }

      /* Add some padding inside the card container */
      .container {
        padding: 20px 16px;
      }
    </style>

</head>
<body>
    <div class="row p-2">
        <div class="col-md-4">
            <h1>Dumb library</h2>
        </div>
        <div class="col-md-8 text-right">                   
            <button onClick="openFormBook()" class="btn btn-primary">Tambahkan Buku</button>           
            <button onClick="openFormWriter()" class="btn btn-primary">Tambahkan Penulis</button>
            <button onClick="openFormCategory()" class="btn btn-primary">Tambahkan Category</button>

            <div class="form-popup" id="formCategory">
                <form method="POST" class="form-container">
                    <h1>Data Category</h1>
                    <label for="Id"><b>Id</b></label>
                    <input type="text" placeholder="Input Id" name="id">

                    <label for="Name"><b>Nama</b></label>
                    <input type="text" placeholder="Input Nama Category" name="name">

                    <button type="submit" name="submitCategory">Tambahkan</button>
                    <button type="reset" onClick="closeFormCategory()">Batalkan</button>      
                </form>
            </div>

            <div class="form-popup2" id="formWriter">
                <form method="POST" class="form-container">
                    <h1>Data Penulis</h1>
                    <label for="Id"><b>Id</b></label>
                    <input type="text" placeholder="Input Id" name="id">

                    <label for="Name"><b>Nama</b></label>
                    <input type="text" placeholder="Input Nama Penulis" name="name">

                    <button type="submit" name="submitWriter">Tambahkan</button>
                    <button type="reset" onClick="closeFormWriter()">Batalkan</button>
                </form>
            </div>

            <div class="form-popup3" id="formBook">
                <form method="POST" class="form-container">
                    <h1>Data Buku</h1>
                    <label for="Id"><b>Id</b></label>
                    <input type="text" placeholder="Input Id" name="id">

                    <label for="Title"><b>Judul</b></label>
                    <input type="text" placeholder="Input Judul Buku" name="title">

                    <label for="Category"><b>Category</b></label>
                    <select name="category" id="category">
                        <option disabled selected> Pilih </option>
                        <?php 
                            $sql= "SELECT * FROM category_tb";
                            $result = $link->query($sql);

                            //while ($data=mysqli_fetch_array($sql)){
                            while ($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                        <?php
                            }
                        ?>
                    </select>
                    <br>
                    <label for="Writer"><b>Writer</b></label>
                    <select name="writer" id="writer">
                        <option disabled selected> Pilih</option>
                        <?php 
                        $sql = "SELECT * FROM writer_tb";
                        $result = $link->query($sql);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                        <?php 
                        }
                        ?>
                    </select>
                    <br><br>
                    <label for="Publication"><b>Publication Year</b></label>
                    <input type="text" placeholder="Input Tahun Rilisnya Buku" name="publicationYear">
                    <br>
                    <label for="foto"><b>Foto</b></label>
                    <input type="file" name="foto" id="foto">                   
                    <br> <br>
                    <button type="submit" name="submitBook">Tambahkan</button>
                    <button type="cancel" onClick="closeFormBook()">Batalkan</button>                
                </form>
            </div>
        </div>
    </div>
    <div class="row p-4"><h2>List Buku</h2></div>                   
    <div class="row p-5">
        
        <?php 
            $sql = "SELECT * FROM book_tb";
            $result = mysqli_query($link, $sql);

            while($row= mysqli_fetch_assoc($result)){ ?>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top " src="<?php echo $row['img'];?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name'];?></h5>
                        <button type="button" class="btn btn-primary" 
                            data-id="<?php echo $row['id']; ?>" 
                            data-name="<?php echo $row['name']; ?>"
                            data-category-id="<?php echo $row['category_id']; ?>" 
                            data-writer-id="<?php echo $row['writer_id']; ?>"
                            data-publication-year="<?php echo $row['publication_year']; ?>"
                            data-img="<?php echo $row['img']; ?>"

                            onclick="$('#idDBook').val($(this).data('id')); 
                            $('#nameDBook').val($(this).data('name')); 
                            $('#categoryDBook').val($(this).data('category-id'));
                            $('#writerDBook').val($(this).data('writer-id'));
                            $('#publicationDBook').val($(this).data('publication-year'));
                            $('#imgDBook').val($(this).data('img'));
                            $('#ModalDetailBook').modal('show');">Detail</button>
                        
                        <button type="button" class="btn btn-primary" 
                            data-id="<?php echo $row['id']; ?>" 
                            data-name="<?php echo $row['name']; ?>"
                            data-category-id="<?php echo $row['category_id']; ?>" 
                            data-writer-id="<?php echo $row['writer_id']; ?>"
                            data-publication-year="<?php echo $row['publication_year']; ?>"
                            data-img="<?php echo $row['img']; ?>"
                            
                            onclick="$('#idBook').val($(this).data('id')); 
                            $('#nameBook').val($(this).data('name')); 
                            $('#categoryBook').val($(this).data('category-id'));
                            $('#writerBook').val($(this).data('writer-id'));
                            $('#publicationBook').val($(this).data('publication-year'));
                            $('#imgBook').val($(this).data('img'));
                            $('#ModalBook').modal('show');">Edit</button>
                    </div>
                </div>
        <?php } ?>
        
    </div>
    
    <div class="row p-4"><h2>List Penulis</h2></div>   
    <div class="row p-5">
        
        <?php 
            $sql = "SELECT * FROM writer_tb";
            $result = mysqli_query($link, $sql); ?>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>       
                    </tr>
                <?php
                    while($row= mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><button type="submit" name="deleteWriter" value="<?php echo $row['id']; ?>">Hapus</button></td>
                            <td><button type="button" class="btn btn-primary" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" onclick="$('#id').val($(this).data('id')); $('#name').val($(this).data('name')); $('#ModalWriter').modal('show');">Edit</button></td>
                        </tr>
                <?php } ?>
                </table>
            </form>
    </div>

    <div class="row p-4"><h2>List Kategori</h2></div>                   
    <div class="row p-5">
        <?php 
            $sql = "SELECT * FROM category_tb";
            $result = mysqli_query($link, $sql); ?>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>       
                    </tr>
                <?php
                    while($row= mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            
                            <td><button type="submit" name="deleteCategory" value="<?php echo $row['id']; ?>">Hapus</button></td>
                            <td><button type="button" class="btn btn-primary" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" onclick="$('#idCate').val($(this).data('id')); $('#nameCate').val($(this).data('name')); $('#ModalCategory').modal('show');">Edit</button></td>
                        </tr>
                <?php } ?>
                </table>
            </form>
    </div>

    <!-- Modal Category-->
    <div class="modal fade" id="ModalCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST">
        <div class="modal-body">
            <label for="Id"><b>Id</b></label>
            <input type="text" class="form-control" id="idCate" name="id">
            <br>
            <label for="Name"><b>Nama</b></label>
            <input type="text" class="form-control" id="nameCate" name="name">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" name="editCategory" id="editCategory" data-id="id" class="btn btn-primary">Simpan</button>          
        </div>
        </form>
        </div>
        </div>
    </div>

    <!-- Modal Writer-->
    <div class="modal fade" id="ModalWriter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Writer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" class="form-container">
            <div class="modal-body">
                <label for="Id"><b>Id</b></label>
                <input type="text" class="form-control" id="id" name="id">
                <br>
                <label for="Name"><b>Nama</b></label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="submit" name="editWriter" id="editWriter" data-id="id" class="btn btn-primary">Simpan</button>           
            </div>
        </form>
        </div>
        </div>
    </div>

    <!-- Modal Book-->
    <div class="modal fade" id="ModalBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" class="form-container">
            <div class="modal-body">
                <label for="Id"><b>Id</b></label>
                <input type="text" class="form-control" id="idBook" name="id">
                <br>
                <label for="Name"><b>Nama</b></label>
                <input type="text" class="form-control" id="nameBook" name="name">
                <br>
                <label for="Category_id"><b>Category Id</b></label>
                <input type="text" class="form-control" id="categoryBook" name="category_id">
                <br>
                <label for="Writer_id"><b>Writer Id</b></label>
                <input type="text" class="form-control" id="writerBook" name="writer_id">
                <br>
                <label for="Publication_year"><b>Publication Year</b></label>
                <input type="text" class="form-control" id="publicationBook" name="publication_year">
                <br>
                <label for="img"><b>Image</b></label>
                <input type="text" class="form-control" id="imgBook" name="img">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="submit" name="editWriter" id="editWriter" data-id="id" class="btn btn-primary">Simpan</button>           
            </div>
        </form>
        </div>
        </div>
    </div>

    <div class="modal fade" id="ModalDetailBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" class="form-container">
            <div class="modal-body">
                <table></table>
                <label for="Id"><b>Id</b></label>
                <input type="text" class="form-control" id="idDBook" name="id" disabled>
                <br>
                <label for="Name"><b>Nama</b></label>
                <input type="text" class="form-control" id="nameDBook" name="name" disabled>
                <br>
                <label for="Category_id"><b>Category Id</b></label>
                <input type="text" class="form-control" id="categoryDBook" name="category_id" disabled>
                <br>
                <label for="Writer_id"><b>Writer Id</b></label>
                <input type="text" class="form-control" id="writerDBook" name="writer_id" disabled>
                <br>
                <label for="Publication_year"><b>Publication Year</b></label>
                <input type="text" class="form-control" id="publicationDBook" name="publication_year" disabled>
                <br>
                <label for="img"><b>Image</b></label>
                <input type="text" class="form-control" id="imgDBook" name="img" disabled>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Lanjutkan</button>          
            </div>
        </form>
        </div>
        </div>
    </div>
    
    
    
    <script>
        function openFormCategory() {
            document.getElementById("formCategory").style.display = "block";
            document.getElementById("formWriter").style.display = "none";
            document.getElementById("formBook").style.display = "none";
        }

        function closeFormCategory() {
            document.getElementById("formCategory").style.display = "none";
        } 

        function openFormWriter() {
            document.getElementById("formWriter").style.display = "block";
            document.getElementById("formCategory").style.display = "none";
            document.getElementById("formBook").style.display = "none";
        }

        function closeFormWriter() {
            document.getElementById("formWriter").style.display = "none";
        }

        function openFormBook() {
            document.getElementById("formCategory").style.display = "none";
            document.getElementById("formWriter").style.display = "none";
            document.getElementById("formBook").style.display = "block";
        
        }

        function closeFormBook() {
            document.getElementById("formBook").style.display = "none";
        }


        
    </script>

  
</body>
</html>

