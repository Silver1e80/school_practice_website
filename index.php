<?php require_once('Connections/cnAnime.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_cnAnime, $cnAnime);
$query_animation_index = "SELECT * FROM animation ORDER BY aId ASC";
$animation_index = mysql_query($query_animation_index, $cnAnime) or die(mysql_error());
$row_animation_index = mysql_fetch_assoc($animation_index);
$totalRows_animation_index = mysql_num_rows($animation_index);

mysql_select_db($database_cnAnime, $cnAnime);
$query_category_index = "SELECT * FROM category ORDER BY categoryId ASC";
$category_index = mysql_query($query_category_index, $cnAnime) or die(mysql_error());
$row_category_index = mysql_fetch_assoc($category_index);
$totalRows_category_index = mysql_num_rows($category_index);
?>
<!doctype html>
<html>
<!-- HEAD -->
<head>
<meta charset="utf-8">
<title>《西瓜動漫網》</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">

<!-- THEME STYLES -->
<link rel="stylesheet" href="css/layout.css">

<link rel="stylesheet" href="css/breakpoint.css">
<link rel="stylesheet" href="css/slideshow.css">
<link rel="stylesheet" href="css/Go_Top&Back_Home.css">
<!-- Favicon -->
<link rel="shortcut icon" href="image/favicon/favicon.ico">

<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/html5shiv-printshiv.js" type="text/javascript"></script>
<script src="js/Go_Top&Back_Home.js" type="text/javascript"></script>
</head>
<!-- END HEAD -->

<!-- BODY -->
<body>
<div id="wrapper" class="col-12">
  <header class="col-12">
    <div id="S-ch-Eg" class="" style="width:210px;float:right;">
      <form action="" target="_self" id="S-ch-Eg">
        <input type="search" required name="keyword" placeholder="關鍵字 ↵ " style="width:150px">
        <button type="submit" style="font-weight:bold; cursor:pointer;"> <span>搜尋</span> </button>
      </form>
    </div>
  </header>
  <div id="content" class="col-12">
  
    <div id="contentL" class="col-6">
     <img src="image/Web_logo/LOGO.jpg" alt="LOGO" title="LOGO" class="col-6" style="width:100%;height:325px;">
    </div>
    
    <div id="contentR" class="col-6">
      <div class="slideshow-container">
        <?php do { ?>
        <div class="mySlides fade">
          <img src="image/Animation/<?php echo $row_animation_index['aName']; ?>_64.jpg" alt="<?php echo $row_animation_index['aName']; ?>"  style="width:100%;height:325px;">
          <div class="text"><?php echo $row_animation_index['aName']; ?></div>
        </div>
        <?php } while($row_animation_index = mysql_fetch_assoc($animation_index)); ?>
          <!-- <a class="prev round" onclick="plusSlides(-1)">&laquo;</a> -->
          <!-- <a class="next round" onclick="plusSlides(1)">&raquo;</a> -->
        <div id="dots">
      	  <span class="dot" onclick="currentSlide(1)"></span>
       	  <span class="dot" onclick="currentSlide(2)"></span>
       	  <span class="dot" onclick="currentSlide(3)"></span>
       	  <span class="dot" onclick="currentSlide(4)"></span>
       	  <span class="dot" onclick="currentSlide(5)"></span>
      	</div>
        </div>
      </div>
  	</div>
  <nav class="col-12 nav">
      <div class="text-center">
      <?php do { ?>
        <div id="<?php echo $row_category_index['category_Name']; ?>"><li><a href="Category/Category_<?php echo $row_category_index['categoryId']; ?>.php"><?php echo $row_category_index['category_Name']; ?></a></li></div> <?php } while($row_category_index = mysql_fetch_assoc($category_index)); ?>
  </nav>
  <footer class="col-12">
    <button onclick="topFunction()" id="TopBtn" title="Go to top">Top</button>
  </footer>
</div>
<script src="js/slideshow.js" type="text/javascript"></script>
</body>
<!-- END BODY -->
</html>
<?php
mysql_free_result($category_index);

mysql_free_result($animation_index);
?>
