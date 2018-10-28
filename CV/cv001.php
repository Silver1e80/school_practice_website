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
$query_CV = "SELECT cv.* FROM cv  Where cvId = 'cv001'";
$CV = mysql_query($query_CV, $cnAnime) or die(mysql_error());
$row_CV = mysql_fetch_assoc($CV);
$totalRows_CV = mysql_num_rows($CV);
?>
<!doctype html>
<html>
<!-- HEAD -->
<head>
<meta charset="utf-8">
<title>《西瓜動漫網》：<?php echo $row_CV['cvName']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">

<!-- THEME STYLES -->
<link rel="stylesheet" href="../css/layout.CV.css">

<link rel="stylesheet" href="../css/breakpoint.css">
<link rel="stylesheet" href="../css/Go_Top&Back_Home.css">
<!-- Favicon -->
<link rel="shortcut icon" href="../image/favicon/favicon.ico">

<script src="../js/html5shiv.js"type="text/javascript"></script>
<script src="../js/html5shiv-printshiv.js"type="text/javascript"></script>
<script src="../js/Go_Top&Back_Home.js" type="text/javascript"></script>
</head>
<!-- END HEAD -->

<!-- BODY -->
<body>
<div id="wrapper" class="col-12">
  <header class="col-12">
  <img id="LOGO" class="LOGOs" src="../image/Web_logo/type2.gif" alt="LOGO" title="LOGO" style="height:62.25px;float:left;">
    <div id="S-ch-Eg" class="" style="width:210px;float:right;">
      <form action="" target="_self" id="S-ch-Eg">
        <input type="search" required name="keyword" placeholder="關鍵字 ↵ " style="width:150px">
        <button type="submit" style="font-weight:bold; cursor:pointer;"> <span>搜尋</span> </button>
      </form>
    </div>
  </header>
  <div id="content" class="col-12">
    <div id="contentL" class="col-6">
     <img src="../image/CV_photo/<?php echo $row_CV['cvName']; ?>.jpg" alt="<?php echo $row_CV['cvName']; ?>" title="<?php echo $row_CV['cvName']; ?>" class="col-6">
     <p><?php echo $row_CV['cvName']; ?></p>
    </div>
    
    <div id="contentR" class="col-6">
      聲優簡介:
      <div class="IntroContentR">　　<?php echo $row_CV['cvDesc']; ?>
      </div>
  	</div>
  <footer class="col-12">
    <button onclick="topFunction()" id="TopBtn" title="Go to top">Top</button>
   <a href="../index.php" class=".Home"><button id="HomeBtn" title="回首頁">Home</button></a>
  </footer>
</div>
</body>
<!-- END BODY -->
</html>
<?php
mysql_free_result($CV);
?>
