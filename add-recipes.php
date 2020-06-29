<form name="form_add" method="post" action="?p=add-recipes">
    <label for="dish-name">Название блюда</label>
    <input type="text" name="dish-name" id="dish-name" placeholder="Название блюда" required>
    <label for="dish-desc">Описание блюда</label>
    <input type="text" name="dish-desc" id="dish-desc" placeholder="Описание блюда" required>
    <label for="dish-amount">Цена</label>
    <input type="number" name="dish-amount" id="dish-amount" placeholder="Цена" required>
    <input type="submit" name="button" value="Добавить блюдо">
</form>
<?php
$password='123456789';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if( isset($_POST['button']) && $_POST['button']== 'Добавить блюдо')
{
    $mysqli = mysqli_connect('std-mysql', 'std_949', $password, 'std_949');
    if( mysqli_connect_errno() )
        echo 'Ошибка подключения к БД: '.mysqli_connect_error(); 

    if ($_POST['dish-amount']<0){
        echo 'Цена не может быть отрицательной';
        exit();
    }

    $sql_res=mysqli_query($mysqli, "INSERT INTO for_user (dish_name, dish_description, dish_amount) VALUES ('".
    htmlspecialchars($_POST['dish-name'])."', '".
    htmlspecialchars($_POST['dish-desc'])."', '".
    htmlspecialchars($_POST['dish-amount'])."');");
    if( !$sql_res )
        echo 'Запись не добавлена';
    else 
        echo 'Запись добавлена';
    mysqli_close($mysqli);    
    }
        
?>