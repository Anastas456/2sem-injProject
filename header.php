<nav class="navbar navbar-expand-md bg-light navbar-light">
    <a class="navbar-brand" href="index.php">
        Кухня друга Педро
    </a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
        <?php
            if( !isset($_GET['p']) ) 
                $_GET['p']='viewer';
            echo '<li class="nav-item';
            if( $_GET['p'] == 'viewer' ) 
                echo ' active'; 
            echo '"><a class="nav-link" href="?p=viewer"';
            echo '>Главная</a></li>';

            echo '<li class="nav-item';
            if( $_GET['p'] == 'menu' ) 
                echo ' active';
            echo '"><a class="nav-link" href="?p=menu"';
            echo '>Меню</a></li>';

            echo '<li class="nav-item';
            if( $_GET['p'] == 'arg' ) 
                echo ' active';
            echo '"><a class="nav-link" href="?p=arg"';
            echo '>Информация по ценам</a></li>';

            // if ($_GET['p']){
            //     echo '<div class="submenu">';
            //     echo '<a href="?p=viewer&sort= byid"'; // первый пункт подменю
            //     if( !isset($_GET['sort']) || $_GET['sort'] == 'max' )
            //         echo ' class="selected"';
            //     echo '>Max</a>';
            //     echo '<a href="?p=viewer&sort=min"'; // второй пункт подменю
            //     if( isset($_GET['sort']) && $_GET['sort'] == 'min' )
            //         echo ' class="selected"';
            //     echo '>Min</a>';
            //     echo '</div>'; // конец подменю
            // }

            echo '<li class="nav-item';
            if( $_GET['p'] == 'recipes' ) 
                echo ' active';
            echo '"><a class="nav-link" href="?p=recipes"';
            echo '>Новые рецепты</a></li>';

            // echo '<li class="nav-item';
            // if( $_GET['p'] == 'edit' ) 
            //     echo ' active';
            // echo '"><a class="nav-link" href="/?p=edit"';
            // echo '>Редактирование записи</a></li>';

            // echo '<li class="nav-item';
            // if( $_GET['p'] == 'delete' ) 
            //     echo ' active';
            // echo '"><a class="nav-link" href="/?p=delete"';
            // echo '>Удаление записи</a></li>';

        ?>
        </ul>
    </div>
</nav>

