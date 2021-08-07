<?php
session_start();
include_once('connection.php');
include 'nav.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <style>
    a{
      color: black;
    }
    a:hover{
      color: gray;
    }
    .card {
    width: 143%;
    }
    </style>
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des articles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Sous titre(s)</th>
                    <th>Image</th>
                    <th>Texte</th>
                    <th>User</th>
                    <th>Date de partage</th>
                    <th>Categorie</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select *, article.id as idart, user.id as id_user from article join user on article.id_utilisateur = user.id join categorie on categorie.id=article.id_categorie";
                    $res=mysqli_query($con,$sql);
                    while($resultat = mysqli_fetch_assoc($res)){
                    ?>
                  <tr>
                    <td><a href="article.php?idart_pub=<?= $resultat['idart']?>"><?= $resultat['titre'];?></a> </td>
                    <td><a href="article.php?idart_pub=<?= $resultat['idart']?>"><?= $resultat['sous_titre'];?></a></td>
                    <td> <a href="article.php?idart_pub=<?= $resultat['idart']?>"><img src="../img_article/<?= $resultat['image_article']?>" style="    width: 224px; height: 227px;" ></a></td>
                    <td><a href="article.php?idart_pub=<?= $resultat['idart']?>"><?= substr($resultat['texte'], 0, 200);?>...</a></td>
                    <td><a href="profile.php?id_user=<?= $resultat['id_user']?>"><?= $resultat['username'];?></a></td>
                    <td><?php $r=$resultat['date_partage']; echo date("Y/m/d", strtotime("$r"))?></td>
                    <td><?= $resultat['type'];?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.html';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
