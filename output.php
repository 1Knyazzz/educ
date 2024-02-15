<?php
    $title = 'output';
    require 'static/header.php';
    require 'FeedbackRepository.php';


$page =isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = $limit * ($page-1);

$selectDB = new FeedbackRepository();
$totalPage= $selectDB ->selectPagen($limit);

# запрос данных
$result = $selectDB -> queryOut($limit, $offset)
?><h1>output</h1>
<div class='container'>
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1>TEST</h1>
            </div>
        </div>
        <div class="col-md-3">
            <h1>NAVIG</h1>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php $i = 1;
                    while($i <= $totalPage):
                        $i++;?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $i-1?>"><?php echo $i-1?></a>
                        </li>
                    <?php endwhile;?>
                </ul>
            </nav>
        </div>
        <?php foreach($result as $out): ?>
        <div id="myCarousel" class="col-md-20" data-ride="carousel">
            <ul class="list-group col-sm-20">
                <li lass="list-group-item active">
                    <h4><?=$out['username']?> <?=$out['password']?> <?=$out['email']?> <?=$out['number']?> <?=$out['description']?></h4>
                    <br>
                </li>
            </ul>
            <?php endforeach;?>
    </div>
    </div>
<?php
    require 'static/footer.php';
?>