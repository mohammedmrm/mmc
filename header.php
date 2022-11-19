<?php session_start();?>

<head>

<meta name="keywords" content="الطب, المكتبة الفديوية, e-learning, Multimedia, Babylon University">
<meta name="author" content="Mohammed Ridha Mohammed">
<meta name="msapplication-TileColor" content="#222222" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta property="og:site_name" content="University of Babylon" />
<meta property="og:type" content="university" />
<meta property="og:title" content="University of Babylon" />
<meta property="og:url" content="http://www.uobabylon.edu.iq/" />
<meta property="og:description" content="University of Babylon is devoted to excellence in teaching, learning, and research, University of Babylon is made up of 19 Faculty of academy." />
<meta property="og:image" content="http://uobabylon.edu.iq/logo.png" />
<meta content="University of Babylon is devoted to excellence in teaching, learning, and research, University of Babylon is made up of 19 Faculty of academy." name="description" /><link rel="shortcut icon" href="http://www.uobabylon.edu.iq/nt/images/babylon.ico" /><meta name="keywords" content="University of Babylon, College, Education, Innovation, Teaching, Learning" />
<meta content="شبكة جامعة بابل الالكترونية" name="copyright" />

  <link rel="stylesheet" href="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/toast.css" />
  <script src="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/jquery-1.11.3.min.js" ></script>
  <script src="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js" ></script>
  <script src="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/toast.js" ></script>
  <script src="js/getUrlPram.js" ></script>
  <script src="js/getColleges.js" ></script>
<link rel="stylesheet" href="../flowplayer-7.0.4/skin/skin.css">
<script src="../flowplayer-7.0.4/flowplayer.min.js"></script>
  <style type="text/css">
  body{
    overflow-x: hidden;
    overflow-y: scroll;
    direction: rtl;
  }

    .un-logo {
      background-image: url(img/logo.png);
      background-position: center;
      background-size: contain;
      height: 140px;
      background-repeat: no-repeat;
    }
    .bg {
       background-image: linear-gradient(to right, #CCC , #000033);
    }
    .head-title {
      text-align: center;
      color: #ddd;
    }
    .mmc-logo {
      background-image:url(img/9.png);
      background-position: center;
      background-size: contain;
      height: 140px;
      background-repeat: no-repeat;
    }
    .list {
      height: 25px;
      background-color: #3300CC;
      margin-bottom:5px;
    }
    .list ul {
      list-style: none;
    }
    .list ul li{
      float: left;
      padding-right: 10px;
      padding-left: 10px;
      height: 25px;
      display: inline-block;
      border-right: 2px solid #ddd;
    }

    .list ul li a{
      color: #ddd;
    }
.search-btn,.search-txt,.search-sel {
  height: 25px;
  position: relative;
  margin:0px;
  padding: 0px;
  min-width: 40px;
  border: none;
  float: left;
}
  .search-sel {
    border-bottom-left-radius: 3px;
    border-top-left-radius: 3px;
    border-right: 1px solid #888888;
    width: 80px;
    display: inline-block;
    float: left;
  }
  .search-btn {
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
  }
   .search-btn:hover {
     color: #6600FF;
  }
  .header{
    position: relative;
    top:-18px;
  }
   .s-list1{
    left:450px;
   }
   .s-list2{
    left:100px;
   }
  .sub-list {
    position: absolute;
    z-index: 10;
    top:25px;
    display: none;
  }

  .sub-list li {
    display: block !important;
    float:none !important;
    background-color: #777777;
    width: 200px;
    height: auto !important;
    padding: 5px !important;
    text-align: right;

  }
  .sub-list li a {
     text-decoration:none;
     text-align: right;
     color: #fff !important;

  }

  .sub-list li:hover {
    color: #000000;
    background-color: #6699FF;
  }

  .more:hover .sub-list {
    display:block;
  }
  .log {
    padding-top:30px;
    padding-left:0px;
    color: #FCFCFC;
    text-align: center;
  }

  .lv{
    text-align: center;
    display: block;
    vertical-align: middle;
    color: #FFFFFF;
    font-size: 38px;
    padding: 35px;
  }
  .mmc, .un {
    text-align: center;
    color: #FFFFFF;
    margin-top:-8px !Important;
    font-size: 20px;
  }

   .
  .log ul{
    list-style: none;
  }
  .log ul li{
    list-style: none;
  }
  .log a{
    color: #FBFBFB;
  }
  </style>
</head>
<body>
<?php if(file_exists("analyticstracking.php")){ include_once("analyticstracking.php");}  ?>
<div class="row header">
<div class="col-md-12 bg">
  <div class="row ">
    <div class="col-md-1">
    </div>
    <div class="col-md-9">
      <div class="col-sm-3">
        <div class="mmc-logo">
          <!-- multi Media centre logo goes here "displayed using intrenal css class "mmc-logo" -->
        </div>
        <!--<h2 class="mmc">مركز الوسائط المتعددة</h2> -->
      </div>
      <div class="col-sm-6 head-title">
         <h2 class="lv">مركز الوسائط المتعددة والتعليم الالكتروني</h2>
      </div>
      <div class="col-sm-3">
          <div class="un-logo">
             <!-- University of babylon logo goes here "displayed using intrenal css class "un-logo" -->
          </div>
          <!--<h2 class="un">جامعـــــة بابــــل</h2> -->
      </div>
    </div>

    <div class="col-md-2 log">
        <?php if(!isset($_SESSION['login'])){?>
        <ul>
           <li>
            <a href="login.php">
               <span class="glyphicon glyphicon-lock"></span>
               Login
            </a>
           </li>
        </ul>
        <?php }else{ ?>
        <ul>
           <li> Wellcome,
            <a href="adminControl.php">
               <span class=""></span>
               <?php echo $_SESSION['name']; ?>
            </a>
           </li>
        </ul>
        <a href="logout.php">Sign out</a>
        <?php } ?>
    </div>
  </div>

</div>
<div class="col-md-12 list">
  <div class="col-sm-8">
    <ul>
        <li><a href="videoLib.php">
           <span class="glyphicon glyphicon-home"></span>
            Home</a>
         </li>
        <li><a href="news.php">
            <span class="glyphicon glyphicon-menu-hamburger"></span>
            News
        </a></li>
        <li class="more">
          <a href="">
              <span class="glyphicon glyphicon-cloud-upload"></span>
              Upload
          </a>
          <ul class="sub-list s-list2">
             <li>
              <a href="upload.php">Video</a>
             </li>
             <li>
              <a href="uploadCourse.php">Course</a>
             </li>
             <li>
              <a href="uploadURL.php">URL Lecture</a>
             </li>
          </ul>
        </li>
        <li>
         <a href="listcourses.php">
            <span class="glyphicon glyphicon-link"></span>
            Interractive Lectures
         </a>
        </li>
        <!---<li><a href="systems.php">
            <span class="glyphicon glyphicon-link"></span>
            Enrolment System
        </a></li> -->
        <li class="more">
        <a href="#">
           <span class="glyphicon glyphicon-option-vertical"></span>
            Colleges&nbsp;
           <span class="glyphicon glyphicon-menu-down"></span>
        </a>
            <ul class="sub-list s-list1">
             <li>
              <a href="FacultyOfMedicine.php">كلية الطب</a>
             </li>
             <li>
                <a href="FacultyOfPharmacy.php">كلية الصيدلة</a>
             </li>
             <li>
                <a href="FacultyOFDentistry.php">كلية طب الاسنان</a>
             </li>
             <li>
                <a href="FacultyOfEngineering.php">كلية الهندسة</a>
             </li>
             <li>
                <a href="FacultyOfinformationTechnology.php">كلية تكنولوجيا المعلومات</a>
             </li>
             <li>
                <a href="FacultyOfMaterialsEngineering.php">كلية هندسة المواد</a>
             </li>
             <li>
                <a href="FacultyOfScience.php">كلية العلوم</a>
             </li>
             <li>
                <a href="FacultyOfEducationofHumanitiesstudies.php">كلية التربية للدراسات الانسانية</a>
             </li>
             <li>
                <a href="FacultyOfArts.php">كلية الاداب</a>
             </li>
             <li>
                <a href="FacultyOfFineArt.php">كلية الفنون الجميلة</a>
             </li>
            <li>
                <a href="FacultyOfLaw.php">كلية القانون</a>
             </li>
            <li>
                <a href="FacultyOfScienceWSCI.php">كلية علوم البنات</a>
             </li>
            <li>
                <a href="FacultyOfEducationforPureScience.php">كلية التربية للعلوم الصرفة</a>
            </li>
            <li>
                <a href="FacultyOfBasicEducation.php">كلية التربية الاساسية</a>
            </li>
            <li>
                <a href="FacultyOfphysicalEducationandSportScience.php">كلية التربية البدنية وعلوم الرياضة</a>
            </li>
            <li>
                <a href="FacultyOfNursing.php">كلية التمريض</a>
            </li>
            <li>
                <a href="FacultyOfAdministrationandEconomics.php">كلية الادارة والاقتصاد</a>
            </li>
            <li>
                <a href="FacultyOfEngineeringAl_Musaib.php">كلية الهندسة - المسيب</a>
            </li>
            <li>
                <a href="FacultyOfQuranicStudies.php">كلية الدراسات القرانية</a>
            </li>
            <li>
                <a href="FacultyOfMedicenOfHamorabi.php">كلية طب حمورابي</a>
            </li>
             <li>
                <a href="Facultycomunty.php">خدمة المجتمع</a>
            </li>
            </ul>
        </li>
        <li>
         <a href="url.php">
            <span class="glyphicon glyphicon-link"></span>
            External Intractive Lectures
         </a>
        </li>
    </ul>
  </div>
  <div class="col-xs-4">
    <div class="">
      <div class="input-group">
        <select class="search-sel" id="search-sel">
            <option>All</option>
        </select>
        <input type="text" placeholder="Search..." id="search-txt" class="search-txt"/>
        <button type="button" id="search-btn" class="search-btn btn" >
          &nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;
        </button>
       </div>
    </div>
  </div>
</div>
</div>
</body>
<script>
getColleges($("#search-sel"),"script/_getColleges.php");
$('#search-btn').click(function(){
  window.location =""+
  "search.php?q="+$("#search-txt").val()+"&c="+$("#search-sel").val()+"&p=1";
})
</script>