<?php
session_start();
include_once('connection.php');
include('../PAGES/nbr_onligne.php');
include 'nav.php';

?>
<!doctype html>
<html>
    <head>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="CSS/app.css">
    </head>
    <body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <div class="content-header"> <div class="container-fluid"></div> </div>
        <!-- /.content-header -->

        <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                            <?php
                                    $sql = "SELECT count(*) as nb FROM `user` ";
                                    $res = mysqli_query($con,$sql);
                                    $ressql = mysqli_fetch_assoc($res);
                                    ?>
                                <h3><?= $ressql['nb'];?></h3>
                                <p>Nombre de compte crées</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $count_users;?></h3>

                            <p>Nombre des utilisateur en ligne</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $sqlarticle="SELECT count(*) as nbarticle FROM article ";
                            $reart = mysqli_query($con,$sqlarticle);
                            $res=mysqli_fetch_assoc($reart);
                            ?>
                            <h3><?= $res['nbarticle'];?></h3>

                            <p>Nombre des articles</p>
                        </div>
                        <div class="icon">
                            <span class="iconify" data-icon="ion-book" data-inline="false"></span>
                        </div>
                        </div>
                    </div>
                
                <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                <!-- Left col -->
                    <section class="col-lg-6 connectedSortable">
                                        <div class="main-section">
                        <div class="add-section">
                            <form action="app/add.php" method="POST" autocomplete="off">
                                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                                    <input type="text"   name="title"  style="border-color: #ff6666" placeholder="This field is required" />
                                <button type="submit">Ajouter   </button>

                                <?php }else{ ?>
                                <input type="text"   name="title"  placeholder="What do you need to do?" />
                                <button type="submit">Ajouter </button>
                                <?php } ?>
                            </form>
                        </div>
                        <?php 
                            $todos = "SELECT * FROM todos ORDER BY id_todos  DESC";
                            $restodos=mysqli_query($con,$todos);
                            $num=mysqli_num_rows($restodos);
                        ?>
                        <div class="show-todo-section">
                                <?php if($num<= 0){ ?>
                                    <div class="todo-item">
                                        <div class="empty">
                                            <img src="img/f.png" width="100%" />
                                            <img src="img/Ellipsis.gif" width="80px">
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php while($todo =mysqli_fetch_assoc($restodos)) { ?>
                                    <div class="todo-item">
                                        <span id="<?php echo $todo['id_todos']; ?>" class="remove-to-do">x</span>
                                        <?php if($todo['checked']){ ?> 
                                            <input type="checkbox" class="check-box"  data-todo-id ="<?php echo $todo['id_todos']; ?>"  checked />
                                            <h2 class="checked"><?php echo $todo['title'] ?></h2>
                                        <?php }else { ?>
                                            <input type="checkbox"   data-todo-id ="<?php echo $todo['id_todos']; ?>" class="check-box" />
                                            <h2><?php echo $todo['title'] ?></h2>
                                        <?php } ?>
                                        <br>
                                        <small>created: <?php echo $todo['date_time'] ?></small> 
                                    </div>
                                <?php } ?>
                        </div>
                        </div>

                        <script src="js/jquery-3.2.1.min.js"></script>

                        <script>
                            $(document).ready(function(){
                                $('.remove-to-do').click(function(){
                                    const id = $(this).attr('id');
                                    
                                    $.post("app/remove.php", 
                                        {
                                            id: id
                                        },
                                        (data)  => {
                                            if(data){
                                                $(this).parent().hide(600);
                                            }
                                        }
                                    );
                                });

                                $(".check-box").click(function(e){
                                    const id = $(this).attr('data-todo-id');
                                    
                                    $.post('app/check.php', 
                                        {
                                            id: id
                                        },
                                        (data) => {
                                            if(data != 'error'){
                                                const h2 = $(this).next();
                                                if(data === '1'){
                                                    h2.removeClass('checked');
                                                }else {
                                                    h2.addClass('checked');
                                                }
                                            }
                                        }
                                    );
                                });
                            });
                        </script>
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-6 connectedSortable">
                                        <div class="calendar dark">
                            <div class="calendar-header">
                                <span class="month-picker" id="month-picker">February</span>
                                <div class="year-picker">
                                    <span class="year-change" id="prev-year">
                                        <pre><</pre>
                                    </span>
                                    <span id="year">2021</span>
                                    <span class="year-change" id="next-year">
                                        <pre>></pre>
                                    </span>
                                </div>
                            </div>
                            <div class="calendar-body">
                                <div class="calendar-week-day">
                                    <div>Sun</div>
                                    <div>Mon</div>
                                    <div>Tue</div>
                                    <div>Wed</div>
                                    <div>Thu</div>
                                    <div>Fri</div>
                                    <div>Sat</div>
                                </div>
                                <div class="calendar-days"></div>
                            </div>
                           
                            <div class="month-list"></div>
                        </div>
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
            </section>
        <!-- /.content -->
    </div>
    <?php include 'footer.html';?>
    <script src="js/app.js"></script>
    </body>
</html>