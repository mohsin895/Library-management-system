<?php
require_once 'header.php';
?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li></i><a href="javascript:avoid(0)">Manage Books</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Books</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th> Book Name</th>
                                <th>Book Image</th>
                                <th>Publication Name</th>
                                <th>Author Name</th>
                                <th>Purches Date</th>
                                <th>Book Price</th>
                                <th>Book Quentity</th>
                                <th>Availabe Quentity</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = mysqli_query($con,"SELECT * FROM `books`");
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                   <td><?= $row['book_name']?></td>
                                   <td><img style="width: 50px" src="../images/books/<?= $row['book_image']?>" alt=""></td>
                                    <td><?= $row['book_publication_name']?></td>
                                   <td><?= $row['book_author_name']?></td>
                                   <td><?= date('d-M-Y',strtotime($row['book_purchas_date']))?></td>
                                   <td><?= $row['book_price']?></td>
                                   <td><?= $row['book_qty']?></td>
                                   <td><?= $row['book_availabel_qty']?></td>
                                    <td>
                                        <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id']?>"><i class="fa fa-eye"></i> </a>
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id']?>"><i class="fa fa-pencil"></i> </a>
                                        <a href="detete.php?bookdelete=<?=base64_encode($row['id'])?>" class="btn btn-danger" onclick="return confirm('Are you want to delete?')"><i class="fa fa-trash-o"></i> </a>
                                </td>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
/*
$result = mysqli_query($con,"SELECT * FROM `books`");
while ($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
   $book_info = mysqli_query($con,"SELECT * FROM `books` WHERE `id`='$id'");
   $book_info_row = mysqli_fetch_assoc(  $book_info);

    ?>
    <!---model---->
    <div class="modal fade" id="book-update-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Info</h4>
                </div>
                <div class="modal-body">

                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form  method="post" action="">
                                        <div class="form-group">
                                            <label for="book_name" >Book Name</label>
                                                <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name" value="<?=  $book_info_row ['book_name']?>" required>
                                                <input type="hidden" class="form-control"  value="<?=  $book_info_row ['id']?>" name="id">

                                        </div>

                                        <div class="form-group">
                                            <label for="book_author_name" > Author Name</label>
                                                <input type="text" class="form-control" id="book_author_name" placeholder="Book Author Name" name="book_author_name" value="<?=  $book_info_row ['book_author_name']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name" > Publication Name</label>
                                                <input type="text" class="form-control" id="book_publication_name" placeholder="Book Publication Name" name="book_publication_name" value="<?=  $book_info_row ['book_publication_name']?>" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchas_date" > Purchas Date</label>

                                                <input type="date" class="form-control" id="book_purchas_date" placeholder="Book Purches date" name="book_purchas_date" value="<?=  $book_info_row ['book_purchas_date']?>" required>


                                        </div>
                                        <div class="form-group">
                                            <label for="book_price" >Book Price</label>

                                                <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price" value="<?=  $book_info_row ['book_price']?>" required>


                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty" >Book Quentity</label>

                                                <input type="number" class="form-control" id="book_qty" placeholder="Book Quentity" name="book_qty" value="<?=  $book_info_row ['book_qty']?>" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="book_availabel_qty" >Available Quenty</label>

                                                <input type="number" class="form-control" id="book_availabel_qty" placeholder="Available Quentity" name="book_availabel_qty" value="<?=  $book_info_row ['book_availabel_qty']?>" required>

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="update-book" class="btn btn-primary"><i class="fa fa-save"></i>Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
}
*/
?>

<?php
$result = mysqli_query($con,"SELECT * FROM `books`");
while ($row = mysqli_fetch_assoc($result)){
    ?>
    <!---model---->
    <div class="modal fade" id="book-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr><th class="text-danger text-bold">Author Informaton</th>
                            <th class="text-bold text-danger">Book Information</th></tr>
                        <tr>
                            <th> Book Name</th>
                            <td><?= $row['book_name']?></td>
                        </tr>
                        <tr>
                            <th>Book Image</th>
                            <td><img style="width: 50px" src="../images/books/<?= $row['book_image']?>" alt=""></td>

                        </tr>
                        <tr>
                            <th>Publication Name</th>
                            <td><?= $row['book_publication_name']?></td>

                        </tr>
                        <tr>
                            <th>Author Name</th>
                            <td><?= $row['book_author_name']?></td>

                        </tr>
                        <tr>
                            <th>Purches Date</th>
                            <td><?= date('d-M-Y',strtotime($row['book_purchas_date']))?></td>

                        </tr>
                        <tr>
                            <th>Book Price</th>
                            <td><?= $row['book_price']?></td>

                        </tr>
                        <tr>
                            <th>Book Quentity</th>
                            <td><?= $row['book_qty']?></td>

                        </tr>
                        <tr>
                            <th>Availabe Quentity</th>
                            <td><?= $row['book_availabel_qty']?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
}


?>
<?php

$result = mysqli_query($con,"SELECT * FROM `books`");
while ($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
   $book_info = mysqli_query($con,"SELECT * FROM `books` WHERE `id`='$id'");
   $book_info_row = mysqli_fetch_assoc(  $book_info);

    ?>
    <!---model---->
    <div class="modal fade" id="book-update-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Info</h4>
                </div>
                <div class="modal-body">

                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form  method="post" action="">
                                        <div class="form-group">
                                            <label for="book_name" >Book Name</label>
                                                <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name" value="<?=  $book_info_row ['book_name']?>" required>
                                                <input type="hidden" class="form-control"  value="<?=  $book_info_row ['id']?>" name="id">

                                        </div>

                                        <div class="form-group">
                                            <label for="book_author_name" > Author Name</label>
                                                <input type="text" class="form-control" id="book_author_name" placeholder="Book Author Name" name="book_author_name" value="<?=  $book_info_row ['book_author_name']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name" > Publication Name</label>
                                                <input type="text" class="form-control" id="book_publication_name" placeholder="Book Publication Name" name="book_publication_name" value="<?=  $book_info_row ['book_publication_name']?>" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchas_date" > Purchas Date</label>

                                                <input type="date" class="form-control" id="book_purchas_date" placeholder="Book Purches date" name="book_purchas_date" value="<?=  $book_info_row ['book_purchas_date']?>" required>


                                        </div>
                                        <div class="form-group">
                                            <label for="book_price" >Book Price</label>

                                                <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price" value="<?=  $book_info_row ['book_price']?>" required>


                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty" >Book Quentity</label>

                                                <input type="number" class="form-control" id="book_qty" placeholder="Book Quentity" name="book_qty" value="<?=  $book_info_row ['book_qty']?>" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="book_availabel_qty" >Available Quenty</label>

                                                <input type="number" class="form-control" id="book_availabel_qty" placeholder="Available Quentity" name="book_availabel_qty" value="<?=  $book_info_row ['book_availabel_qty']?>" required>

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i>Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
}


if(isset($_POST['update_book'])){
    $id =$_POST['id'];
    $book_name =$_POST['book_name'];
    $book_author_name =$_POST['book_author_name'];
    $book_publication_name =$_POST['book_publication_name'];
    $book_purchas_date =$_POST['book_purchas_date'];
    $book_price =$_POST['book_price'];
    $book_qty =$_POST['book_qty'];
    $book_availabel_qty =$_POST['book_availabel_qty'];
    $libraian_username= $_SESSION['libraian_username'];


    $result = mysqli_query($con,"UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchas_date`='$book_purchas_date',`book_price`='$book_price',`book_qty`='$book_qty',`book_availabel_qty`='$book_availabel_qty',`libraian_username`='$libraian_username' WHERE `id`='$id'");

    if ($result){
        ?>
        <script type="text/javascript">
            alert('Book Update Successfully');
            javasript:history.go(-1);

        </script>
        <?php

    }else{

        ?>
        <script type="text/javascript">
            alert('Book not Update !');

        </script>
        <?php
    }
}
?>

<?php
require_once 'footer.php';
?>