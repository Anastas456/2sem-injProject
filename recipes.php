<?php
function getRecipes($page)
{
    // global $mysqli;
    $password='123456789';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('std-mysql', 'std_949', $password, 'std_949');
    
    if( mysqli_connect_errno() ) 
        return 'Ошибка подключения к БД: '.mysqli_connect_error();

    $sql_res=mysqli_query($mysqli, 'SELECT COUNT(*) FROM for_user');

    if( !mysqli_errno($mysqli) && $row=mysqli_fetch_row($sql_res) )
    {
        $TOTAL=$row[0];
        if( !$TOTAL)
            return 'В таблице нет данных'; 
        $PAGES = ceil($TOTAL/12);
        if( $page>=$TOTAL )
            $page=$TOTAL-1; 
        $sql="SELECT * FROM for_user LIMIT ".($page * 12).", 12";
        $sql_res=mysqli_query($mysqli, $sql);
        $ret='<div class="container-fluid recipes">
        <h1 class="mt-3 recipes__h1">Новые рецепты</h1>
        <p class="recipes__p">Тут храниться список блюд, которые в скором времени войдут в наше меню</p>
        <div class="row resipes__div">'; 
        while( $row=mysqli_fetch_row($sql_res) ) 
        {
            $ret.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 p-5 recipes__div__dish-list">
            <h5 class="text-center">'.$row[1].'</h5>
            <p class="text-muted">'.$row[2].'</p>
            <p class="text-right text-info">'.$row[3].' руб</p>
        </div>';
        }
        $ret.='</div></div>';
        
        if( $PAGES>1 ) 
        {
            $ret.='<div class="recipes__pages">';
            for($i=0; $i<$PAGES; $i++){
                if( $i != $page )
                    $ret.='<a href="?p=recipes&pg='.$i.'" class="m-2">'.($i+1).' страница</a>';
                else 
                    $ret.='<span class="m-2">'.($i+1).' страница</span>';
            }
            $ret.='</div>';
            
        }
        mysqli_close($mysqli);
        return $ret; 
        }
return 'Неизвестная ошибка'; 

} 
?>