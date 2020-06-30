<nav class="navbar navbar-expand-md bg-light navbar-light navigation">
    <a class="navbar-brand navigation__logo" href="index.php">
        Кухня друга Педро
    </a>

    <button class="navbar-toggler navigation__button" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon navigation__button__icon"></span>
    </button>

    <div class="collapse navbar-collapse navigation__menu" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto navigation__menu__ul">
        <?php
            if( !isset($_GET['p']) ) 
                $_GET['p']='viewer';
            echo '<li class="nav-item navigation__menu__ul__li';
            if( $_GET['p'] == 'viewer' ) 
                echo ' active'; 
            echo '"><a class="nav-link" href="?p=viewer"';
            echo '>Главная</a></li>';

            echo '<li class="nav-item navigation__menu__ul__li';
            if( $_GET['p'] == 'menu' ) 
                echo ' active';
            echo '"><a class="nav-link" href="?p=menu"';
            echo '>Меню</a></li>';

            echo '<li class="nav-item navigation__menu__ul__li';
            if( $_GET['p'] == 'recipes' ) 
                echo ' active';
            echo '"><a class="nav-link" href="?p=recipes"';
            echo '>Новые рецепты</a></li>';

            echo '<li class="nav-item navigation__menu__ul__li';
            if( $_GET['p'] == 'add-recipes' ) 
                echo ' active';
            echo '"><a class="nav-link" href="?p=add-recipes"';
            echo '>Добавление рецептов</a></li>';

            echo '<li class="nav-item navigation__menu__ul__li';
            if( $_GET['p'] == 'edit-recipes' ) 
                echo ' active';
            echo '"><a class="nav-link" href="?p=edit-recipes"';
            echo '>Редактирование рецептов</a></li>';

            echo '<li class="nav-item navigation__menu__ul__li';
            if( $_GET['p'] == 'delete-recipes' ) 
                echo ' active';
            echo '"><a class="nav-link" href="?p=delete-recipes"';
            echo '>Удаление рецептов</a></li>';

        ?>
        </ul>
    </div>
</nav>