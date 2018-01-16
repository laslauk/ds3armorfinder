
<?php 
$availability = "";
include("armors.php");
if($_GET)
{
// $availability = preg_replace('~<a\s(.*?)>~', "<span>", $availability);  
//$availability = preg_replace('~</a>~', "</span>", $availability);
  if($_GET['item'])
  {
    $item = strtolower($_GET['item']);
    $itemName = str_replace(" set","",$item);

    if(in_array($itemName, $pieces))
    {
      $address = str_replace(" ","_",ucwords($itemName)."_Set");
      $itemPage = file_get_contents("http://darksouls.wikia.com/wiki/$address");

      //Check if DS3 version exists
      $variantLink = explode("Dark Souls III</a> variant",$itemPage);
      if(count($variantLink) > 1)
      {
        $address .= "_(Dark_Souls_III)";
        $itemPage = file_get_contents("http://darksouls.wikia.com/wiki/$address");
      }

      $pagePieces = explode('<h2><span class="mw-headline" id="Availability">Availability</span><span class="editsection"><a href="',$itemPage);
      $secondPagePieces = explode('<h2><span class="mw-headline" id="Characteristics">Characteristics</span><span',$pagePieces[1]);
      $finalPiece = explode('class="sprite edit-pencil" />Edit</a></span></h2>',$secondPagePieces[0]);
      $availability = $finalPiece[1];
      $availability = preg_replace('~<a\shref="~','<a href="http://darksouls.wikia.com',$availability);
      $itemName .= " Set";
    }

    else
    {
      $itemName ="";
      $availability = '<div class="alert alert-danger"> <strong> Error </strong>: invalid item name. </div>';
    }
  } 
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>DSItemFinder</title>
  </head>
  <body>


    <div class="container"> 
        <h1>DS3 Armor Set Finder</h1> 
        <label for="item">Enter the name of the armor set.</label>
         <a href="http://darksouls.wikia.com/wiki/Dark_Souls_Wiki">Data from Dark Souls Wiki</a>

    <form>
      <div class="form-group">

        <input type="text" class="form-control typeahead" name="item" id="formGroupExampleInput" placeholder="Eg. Fire Witch">
        <button type="submit" class="btn btn-primary" id="submit-button">Find</button>
      </div>
    </form>

    <div id="results">
      <hr>
     <?php

      if($availability)
      {

        echo '<p id="itemName">'.ucwords($itemName).'</p>';
        echo $availability;
      }

    ?>
    </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="typeahead.js"></script>
    <script src="code.js"></script>
  </body>
</html>


