<?php

/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 8/11/2015
 * Time: 1:58 PM
 */

class Template
{

    function Heading()
    {
        $css = implode(',', css());
        $css = explode(',', $css);
        $js = implode(',', script());
        $js = explode(',', $js);
        $kelas = implode(',', kelas());
        $kelas = explode(',', $kelas);
        echo '<head>';
        echo '<meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
        echo '<link rel="icon" href="img/favicon.ico" type="image/x-icon" />';
            $path = PATH;
        for ($i = 0; $i < count($css); $i++) {
            echo '<link href="' . $path . 'plugins/' . $css[$i] . '" rel="stylesheet" type="text/css"/>';
            //echo $path.'plugins/' . $css[$i].'</br>' ;
        }
        for ($i = 0; $i < count($js); $i++) {
            echo '<script type="text/javascript" src="' . $path . 'plugins/' . $js[$i] . '"></script>';
              // echo $path.'plugins/' . $js[$i].'</br>' ;
        }
        for ($i = 0; $i < count($kelas); $i++) {
            require_once $path . 'plugins/' . $kelas[$i] . '';
             //echo $path.'plugins/' . $kelas[$i].'</br>' ;
        }
        echo '<title>' . judul() . '</title>';
        echo '</head>';
        flush();
    }

    function page($db)
    {
        $query = "SELECT * FROM page WHERE hps=0 ORDER BY urut";
        $result = $db->query($query);

        while ($row = $result->fetch()) {
            echo '<li class="scroll">';
            if(one_page=='0'){
                echo '<a href="?page_menu=' . $row['kata_id'] . '">';
            }
            if(one_page=='1') {
                echo '<a href="#' . $row['kata_id'] . '">';

            }
                echo $row['nama'] . '</a></li>';
        }

    }

    function tema()
    {
        /*
        $db = new Database();
        $db = $db->connect();
        $query = "SELECT * FROM tema WHERE aktiv=1 LIMIT 1 ";
        $result = $db->query($query);
        $row = $result->fetch();
        */
        $url = SERVER_APLIKASI . "/view/view/default";
        define('one_page', 1);
        define('path_thema', 'view/view/default');
        return $url;
    }
    function content(){
        $db = new Database();
        $db = $db->connect();

        $query="SELECT * FROM konten WHERE 1 AND status='1'";
        if(isset($_GET['page_menu'])){
            $query.=" AND kata_id='".$_GET['page_menu']."'";
        }
        $query.=" ORDER BY URUT";
        $result=$db->query($query);
        while($row=$result->fetch()){
            echo '<section id="'.$row['kata_id'].'">'.$row['konten'].'</section>';

        }
    }

}

?>