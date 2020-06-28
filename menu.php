<?php
function getDishes($page)
{
    global $mysqli;
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
    $ret='<table><tr><th>ID</th><th>Menu id</th><th>Название</th><th>Описание</th><th>Вес в г</th><th>Цена в руб</th></tr>'; 
        while( $row=mysqli_fetch_row($sql_res) ) 
        {
            $ret.='
            <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
                <td>'.$row[2].'</td>
                <td>'.$row[3].'</td>
                <td>'.$row[4].'</td>
                <td>'.$row[5].'</td>
            </tr>';
        }
        $ret.='</table>';
        
            if( $PAGES>1 ) 
            {
                $ret.='<div id="pages">';
                for($i=0; $i<$PAGES; $i++)
                    if( $i != $page )
                        $ret.='<a href="?p=menu&pg='.$i.'">'.($i+1).'</a>';
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