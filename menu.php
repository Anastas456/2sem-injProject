<?php
function getDishes($page)
{
    // global $mysqli;
    $password='123456789';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('std-mysql', 'std_949', $password, 'std_949');
    
    if( mysqli_connect_errno() ) 
        return 'Ошибка подключения к БД: '.mysqli_connect_error();

    $sql_res=mysqli_query($mysqli, 'SELECT COUNT(*) FROM dishes');

    if( !mysqli_errno($mysqli) && $row=mysqli_fetch_row($sql_res) )
    {
        $TOTAL=$row[0];
        if( !$TOTAL)
            return 'В таблице нет данных'; 
        $PAGES = ceil($TOTAL/10);
        if( $page>=$TOTAL )
            $page=$TOTAL-1; 
        $sql="SELECT * FROM dishes LIMIT ".($page * 10).", 10";
        $sql_res=mysqli_query($mysqli, $sql);
        $ret='<div class="container-fluid">
        <h1 class="mt-3">Наши блюда</h1>
        <div class="row">'; 
        while( $row=mysqli_fetch_row($sql_res) ) 
        {
            $ret.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 p-5 dish-list">
            <h5 class="text-center">'.$row[2].'</h5>
            <p class="text-muted">'.$row[3].'</p>
            <p class="text-left">'.$row[4].' г</p>
            <p class="text-right text-info">'.$row[5].' руб</p>
            <button type="button" class="btn btn-lg mb-0 bg-dark text-light">Заказать</button>
        </div>';
        }
        $ret.='</div></div>';
        
        if( $PAGES>1 ) 
        {
            $ret.='<div id="pages">';
            for($i=0; $i<$PAGES; $i++){
                if( $i != $page )
                    $ret.='<a href="?p=menu&pg='.$i.'" class="m-2">'.($i+1).' страница</a>';
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