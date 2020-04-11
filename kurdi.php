<?php  // header("refresh: 7");  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name=”robots” content="index, follow">
    <meta name="keywords" content="covid-19,coronavirus, COVID-19 report, coronavirus latest, how many people got coronavirus in the world">
    <meta name="author" content="Reben Faraj">
    <meta name="description" content="لێره دا ڕاس ته و خۆ ڕێژه ی توشبوانو مردوانی کۆرانا بزانه"/>
    <meta property="og:image" content="http://webdesign.me.uk/covid19/corona.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script data-ad-client="ca-pub-1591932822702274" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    <title>Live توشبوانی کۆرانا له جیهاندا</title>

  </head>

  <body>
      <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
  <a class="navbar-brand" href="kurdi.php">Live توشبوانی کۆرانا له جیهاندا</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <li class="nav-item ">
        <a class="nav-link" href="index.php">English </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="kurdi.php">کوردی <span class="sr-only">(current)</span></a>
      </li>

    </ul>

    </div>
    </div>
</nav>
<?php require('covidAPI.php');  ?>
      <div class="container" id="div_refresh">

          <div class="card">
              <div class="card-header bg-warning">
                  <?php
                $updatedDatetimeUtc = $jsonData->{'feed'}->{'updated'}->{'$t'};
                $updatedDatetime = trim(date(" d-m-Y  h:i", strtotime($updatedDatetimeUtc)));
                //    $myFormatForView = trim(date("m-d-Y h:i", $time));
                   echo '<big>Last Updated Time: ' . $updatedDatetime . "</big>\n";
                  ?>
              </div>
            <div class="card-body">
              <p class="card-title alert alert-success">
               لێره دا زانیاری ته واو له سه ر توشبوانی ڤایرۆسی کرۆ نا له جیهاندا بزانه
                <br />
              <big>WHO</big> ته وای ئه م داتایانه له داتا به یسی ڕێخراوی ته ندروستی جیهانی
                <br />
               وه رگیراوه
              </p>
              <p class="card-text">

              <?php

echo'
  <table class="table table-bordered mytable">
       <thead class="thead text-center">
           <tr>
               <th>ناوی وڵا ته کان</th>
               <th>ڕێژه ئ توشبوان</th>
               <th>ڕێژه ی مردوان</th>
               </tr>
               </thead>
  ';
    if($isEntryFound) {
      $iCounter=1;
      foreach($jsonData->{'feed'}->{'entry'} as $eachData) {
          $country = trim($eachData->{'title'}->{'$t'});
          $confirmedCases = trim($eachData->{'gsx$confirmedcases'}->{'$t'});
          $reportedDeaths = trim($eachData->{'gsx$reporteddeaths'}->{'$t'}) != '' ? trim($eachData->{'gsx$reporteddeaths'}->{'$t'}) : 0;


          echo' <tbody><tr> <td>'.$country.'</td>';
          echo' <td>'.$confirmedCases.'</td>';
          echo' <td>'.$reportedDeaths.'</td> ';

          // echo $iCounter . '. ' . $country .
          //  ' - Confirmed Cases: ' . $confirmedCases .
          //   ' - Reported Deaths: ' . $reportedDeaths . "\n";

          $iCounter++;

      }
  }


          ?>



</tr></tbody></table>
              </p>
            </div>
            <div class="card-footer text-centre">
            Developed By Reben Faraj  &copy; 2020 &nbsp;&nbsp;
            <a href="http://www.webdesign.me.uk">www.webdesign.me.uk</a>
            &nbsp; &nbsp;&nbsp;

<img src="https://hitwebcounter.com/counter/counter.php?page=7226865&style=0038&nbdigits=4&type=page&initCount=456" title="User Stats" Alt="PHP Hits Count"   border="0" >

        </div>
          </div>


      </div>
<!-- /.container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>