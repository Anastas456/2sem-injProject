<div class="container">
<h1 class="mt-3">Хотите, чтобы ваше блюдо стало популярным? Заполните форму и отправьте информацию о нем!</h1>
<form name="form_add" method="post" action="?p=add-recipes" class="mt-4">
<div class="form-group">
    <label for="dish-name" class="control-label">Название блюда</label>
    <input type="text" class="form-control" name="dish-name" id="dish-name" placeholder="Название блюда" required>
    <label for="dish-desc" class="control-label">Описание блюда</label>
    <input type="text" class="form-control" name="dish-desc" id="dish-desc" placeholder="Описание блюда" required>
    <label for="dish-amount" class="control-label">Цена</label>
    <input type="number" min="0" class="form-control" name="dish-amount" id="dish-amount" placeholder="Цена" required>
    <input type="submit" class="mt-2" name="button" value="Добавить блюдо">
</div>
</form>
</div>
<?php
$password='123456789';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if( isset($_POST['button']) && $_POST['button']== 'Добавить блюдо')
{
    $mysqli = mysqli_connect('std-mysql', 'std_949', $password, 'std_949');
    if( mysqli_connect_errno() )
        echo 'Ошибка подключения к БД: '.mysqli_connect_error(); 

    if ($_POST['dish-amount']<0){
        echo '<p class="text-danger">Цена не может быть отрицательной</p>';
        exit();
    }

    $sql_res=mysqli_query($mysqli, "INSERT INTO for_user (dish_name, dish_description, dish_amount) VALUES ('".
    htmlspecialchars($_POST['dish-name'])."', '".
    htmlspecialchars($_POST['dish-desc'])."', '".
    htmlspecialchars($_POST['dish-amount'])."');");
    if( !$sql_res )
        echo '<h3 class="text-danger text-center">Запись не добавлена</h3>';
    else 
        echo '<h3 class="text-success text-center">Запись добавлена</h3>';
    mysqli_close($mysqli);    
    }
        
?>