<?php
$password='123456789';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('std-mysql', 'std_949', $password, 'std_949');
   
if( mysqli_connect_errno() )
    echo 'Ошибка подключения к БД: '.mysqli_connect_error();  
if( isset($_GET['id']) && $_GET['p'] == 'delete-recipes')
{
    $sql_res=mysqli_query($mysqli, "DELETE FROM for_user WHERE id=".$_GET['id']);
    echo '<h3 class="text-success text-center del_good">Запись успешно удалена</h3>';
}
    $sql_res=mysqli_query($mysqli, 'SELECT * FROM for_user');
    if($sql_res)
    {
        echo '<div class="container del"><div class="row del__div">';
        while( $row=mysqli_fetch_row($sql_res) )
        {
            echo '
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 p-4 del__div__dish-list">
            <h3>Название: '.$row[1].'</h3>
            <p>Описание: '.$row[2].'</p>
            <p>Цена: '.$row[3].'</p>
            <a href="?p=delete-recipes&id='.$row[0].'">Удалить</a>
            </div>';
        }
        echo '</div></div>';
        mysqli_close($mysqli);
    } 
    else
    echo 'Ошибка базы данных';
?>