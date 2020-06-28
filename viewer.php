<?php
function getMenu($page)
{
    global $mysqli;
    $password='123456789';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('std-mysql', 'std_949', $password, 'std_949');

    if( mysqli_connect_errno() ) 
        return 'Ошибка подключения к БД: '.mysqli_connect_error();

    $sql_res=mysqli_query($mysqli, 'SELECT COUNT(*) FROM menu');

    if( !mysqli_errno($mysqli) && $row=mysqli_fetch_row($sql_res) )
    {
        $TOTAL=$row[0];
        if( !$TOTAL)
            return 'В таблице нет данных';
        $PAGES = ceil($TOTAL/10);
        if( $page>=$TOTAL )
            $page=$TOTAL-1;

        $sql="SELECT * FROM menu LIMIT ".($page * 10).", 10";
$sql_res=mysqli_query($mysqli, $sql);
$ret='<div class="container-fluid">
    <h1 class="mt-3">Меню</h1>
    <div class="row">';
    while( $row=mysqli_fetch_row($sql_res) )
    {
        $ret.='
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4 p-5 text-center menu-list">
            <a href="?p=menu">'.$row[1].'</a>
        </div>';
    }
    $ret.='</div></div>';
    
        if( $PAGES>1 )
        {
            $ret.='<div>';
            for($i=0; $i<$PAGES; $i++)
                if( $i != $page )
                    $ret.='<a href="?p=viewer&pg='.$i.'">'.($i+1).'</a>';
                else
                    $ret.='<span>'.($i+1).'</span>';
            $ret.='</div>';
        }
        mysqli_close($mysqli);
    return $ret;
    }

return 'Неизвестная ошибка'; 

} 
?>