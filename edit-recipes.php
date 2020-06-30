<?php
$password='123456789';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('std-mysql', 'std_949', $password, 'std_949');
if( mysqli_connect_errno() ) 
{
    echo 'Ошибка подключения к БД: '.mysqli_connect_error();
}
if( isset($_POST['button']) && $_POST['button']== 'Изменить')
{
    $sql_res=mysqli_query($mysqli, "UPDATE for_user SET dish_name='".
    htmlspecialchars($_POST['dish-name'])."', dish_description='".
    htmlspecialchars($_POST['dish-desc'])."', dish_amount='".
    htmlspecialchars($_POST['dish-amount'])."'
    WHERE id=".$_GET['id']);
    echo '<p class="text-success m-3">Данные изменены</p>'; 
}

$currentROW=array();
if (isset($_GET['id'])){
    $sql_res=mysqli_query($mysqli, 'SELECT * FROM for_user WHERE id='.$_GET['id'].' LIMIT 1');
    $currentROW=mysqli_fetch_row($sql_res);
}
if (!$currentROW){
    $sql_res=mysqli_query($mysqli, 'SELECT * FROM for_user LIMIT 1');
    $currentROW=mysqli_fetch_row($sql_res);
}
$sql_res=mysqli_query($mysqli, 'SELECT * FROM for_user');
if($sql_res)
{
    echo '<div>';
    while( $row=mysqli_fetch_row($sql_res) )
    {
        if($currentROW[0]==$row[0])
            echo '<div>'.$row[0].' | '.$row[1].' | '.$row[2].' | '.$row[3].'</div>';
        else
            echo '<a href="?p=edit-recipes&id='.$row[0].'">'.$row[0].' | '.$row[1].' | '.$row[2].' | '.$row[3].'</a><br>';
    }
    echo '</div>';

    if( $currentROW )
    {
        echo '<div class="container">
        <h1 class="mt-3">Изменить запись</h1>
        <form name="form_edit" method="post" action="?p=edit-recipes&id='.$currentROW[0].'" class="mt-4">
        <div class="form-group">
            <label for="dish-name" class="control-label">Название блюда </label>
            <input type="text" class="form-control" name="dish-name" id="dish-name" value="'.
            $currentROW[1].'" required autofocus>
            <label for="dish-desc" class="control-label">Описание блюда</label>
            <input type="textarea" class="form-control" name="dish-desc" id="dish-desc" value="'.
            $currentROW[2].'" required>
            <label for="dish-amount" class="control-label">Цена блюда</label>
            <input type="number" class="form-control" name="dish-amount" id="dish-amount" value="'.
            $currentROW[3].'"><br>
            
            <input type="submit" name="button" value="Изменить">
            </div>
            </form>
            </div>';
    }
    else 
        echo '<p class="text-warning">Записей пока нет</p>';
    mysqli_close($mysqli);
}
else
    echo '<p class="text-danger">Ошибка базы данных</p>'; 

?>