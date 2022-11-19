 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

 <html xmlns="http://www.w3.org/1999/xhtml">

 <head>
   <title>Faculty of Dentistry</title>
   <meta name="keywords" content="Dentistry, الطب, المكتبة الفديوية, e-learning, Multimedia, Babylon University">
   <meta name="author" content="Mohammed Ridha Mohammed">
   <meta name="HandheldFriendly" content="True" />
   <meta name="MobileOptimized" content="320" />
   <meta name="apple-mobile-web-app-capable" content="yes" />
   <meta name="msapplication-TileColor" content="#222222" />
   <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
   <meta property="og:site_name" content="University of Babylon" />
   <meta property="og:type" content="university" />
   <meta property="og:title" content="University of Babylon" />
   <meta property="og:url" content="http://www.uobabylon.edu.iq/" />
   <meta name="majestic-site-verification" content="MJ12_09cc9d5c-cd48-4b1f-8d17-b22564a80f78" />
   <meta content="University of Babylon is devoted to excellence in teaching, learning, and research, University of Babylon is made up of 19 Faculty of academy." name="description" />
   <link rel="shortcut icon" href="http://www.uobabylon.edu.iq/nt/images/babylon.ico" />
   <meta name="keywords" content="University of Babylon, College, Education, Innovation, Teaching, Learning" />
   <meta content="شبكة جامعة بابل الالكترونية" name="copyright" />
   <style type="text/css">
     .body {
       background-color: #222222;
     }

     .video {
       width: 25%;
       height: 222px;
       padding: 10px;
     }

     .sub {
       width: 100%;
       height: 100%;
       background-color: #444444;
     }

     .thum {
       height: 130px;
       width: 100%;
       background-repeat: no-repeat;
       background-size: cover;
       background-position: center;
       text-align: center;
     }

     .title {
       color: #FFCC33;
       font-size: 18px;
       padding: 0px 10px;
       display: block;
       height: 25px;
       overflow: hidden;
     }

     .date {
       color: #AAAAAA;
       display: block;
       padding: 0px 10px;
     }

     .play-btn {
       width: 50px;
       height: 50px;
       text-align: center;
       border-radius: 360px;
       border: #EEEEEE 1px solid;
       background-color: #222222;
       opacity: 0.5;
       color: #FFFFFF;
       padding: 5px;
       margin: auto;
       top: 25px;
       font-size: 30px;
       vertical-align: middle;
       position: relative;
     }

     .teacher {
       display: block;
       height: 20px;
       font-size: 16px;
       font-weight: 700;
       color: #fff;
       position: relative;
       text-shadow: 5px 5px 3px #000000;
       overflow: hidden;
     }

     .play-btn:hover {
       color: #669933;
       cursor: pointer;
     }

     .a {
       top: 30px;
     }
   </style>
 </head>

 <body>

   <?php
    require("header.php");
    $id = 26;
    $perpage = 24;
    if (isset($_GET['page'])) {
      if (!empty($_GET['page'])) {
        $start =  $perpage * ($_GET['page'] - 1);
      } else {
        $start = 0;
      }
    } else {
      $start = 0;
    }
    ?>
   <div class="container">
     <div class="col-md-12 body" id="body">
       <?php
        require("script/dbconnection.php");
        $sql = "select count(*) as count from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
    where
    media.college_id=?";
        $coun = getData($con, $sql, [$id]);
        $count = $coun[0]['count'];
        $pages = ceil($count / $perpage);
        $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
    where
    media.college_id=? limit " . $start . "," . $perpage;

        $data = getData($con, $query, [$id]);

        foreach ($data as $row) {
          echo '<div class="col-sm-3 video">
  <div class="sub">
    <div class="thum" style="background-image:url(' . $row["snap_path"] . ')"><span class="teacher">'
            . $row["teacher_name_e"] .
            '</span><a class="" href="show.php?v=' . $row["media_id"] .
            '&title=' . $row["title"] . '&teacher=' . $row["teacher_name_a"] . '"><div class="play-btn"><span class="glyphicon glyphicon-play"></span></div></a><span class="teacher a">' . $row["teacher_name_a"] . '</span>
    </div>
    <span class="title">' . $row["title"] . '</span>
    <span class="date">' . $row["time"] . '</span>
  </div>
</div>';
        }
        ?>
     </div>
     <div>
       <ul class="pagination">


         <?php
          for ($x = 1; $x <= $pages; $x++) {
            echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . $x . "'>" . $x . "</a></li>  ";
          }
          ?>
       </ul>
     </div>
   </div>
 </body>

 </html>