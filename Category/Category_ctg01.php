<?php require_once('../Connections/cnAnime.php'); ?>
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
$query_ctg01_belong = "SELECT `category`.`category_Name`, `animation`.`aName`, `animation`.`aId` FROM `animation` LEFT JOIN `belong` ON `animation`.`aId` = `belong`.`aId` LEFT JOIN `category` ON `category`.`categoryId` = `belong`.`categoryId`  WHERE  `category`.`categoryId` = 'ctg01'";
$ctg01_belong = mysql_query($query_ctg01_belong, $cnAnime) or die(mysql_error());
$row_ctg01_belong = mysql_fetch_assoc($ctg01_belong);
$totalRows_ctg01_belong = mysql_num_rows($ctg01_belong);
?>
<!doctype html>
<html>
<!-- HEAD -->
<head>
<meta charset="utf-8">
<title>《西瓜動漫網》<?php echo $row_ctg01_belong['category_Name']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">

<!-- THEME STYLES -->
<link rel="stylesheet" href="../css/layout.Category.css">

<link rel="stylesheet" href="../css/breakpoint.css">
<link rel="stylesheet" href="../css/Go_Top&Back_Home.css">
<!-- Favicon -->
<link rel="shortcut icon" href="../image/favicon/favicon.ico">

<script src="../js/html5shiv.js" type="text/javascript"></script>
<script src="../js/html5shiv-printshiv.js" type="text/javascript"></script>
<script src="../js/Go_Top&Back_Home.js" type="text/javascript"></script>
</head>
<!-- END HEAD -->

<!-- BODY -->
<body>
<div id="wrapper" class="col-12">
  <header class="col-12">
  	<img id="LOGO" class="LOGOs" src="../image/Web_logo/type2.gif" alt="LOGO" title="LOGO" style="height:62.25px;">
    <div id="S-ch-Eg" class="" style="width:210px;float:right;">
      <form action="" target="_self" id="S-ch-Eg">
        <input type="search" required name="keyword" placeholder="關鍵字 ↵ " style="width:150px">
        <button type="submit" style="font-weight:bold; cursor:pointer;"> <span>搜尋</span> </button>
      </form>
    </div>
  </header>
  <nav>
  	<div id="navCategory" class="col-12">
      <span id="<?php echo $row_ctg01_belong['category_Name']; ?>"><?php echo $row_ctg01_belong['category_Name']; ?></span>
    </div>
  </nav>
  	<div id="content" class="col-12">
    <div class="center">
<!-- ========================================================= -->
<?php do{ ?>
<a href="../Info/<?php echo $row_ctg01_belong['aId']; ?>.php">
    <div id="<?php echo $row_ctg01_belong['aName']; ?>" class="photolist">
      <p>
      	<img src="../image/Animation/<?php echo $row_ctg01_belong['aName']; ?>_46.jpg" title="<?php echo $row_ctg01_belong['aName']; ?>" alt="<?php echo $row_ctg01_belong['aName']; ?>">
      </p>
	  <p class="p-font-family"><?php echo $row_ctg01_belong['aName']; ?></p>
    </div>
</a>
<?php }while($row_ctg01_belong = mysql_fetch_assoc($ctg01_belong)); ?>
<!-- ========================================================= -->
<!-- 一頁12部動漫 -->
    </div>
  </div>
  <nav>
  	<div id="navCupdown" class="col-12">
      <div class="pagination">
      <div class="V-center">
  		<a href="#footer">&laquo;</a>
  		<a href="#footer" class="active">1</a>
  		<a href="#footer">&raquo;</a>
	  </div>
      </div>
    </div>
  </nav>
  <footer class="col-12">
  <button onclick="topFunction()" id="TopBtn" title="Go to top">Top</button>
   <a href="../index.php" class=".Home"><button id="HomeBtn" title="回首頁">Home</button></a>
  </footer>
</div>

</body>
<!-- END BODY -->
</html>
<?php
mysql_free_result($ctg01_belong);
?>
