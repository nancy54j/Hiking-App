<?php include 'get_api.php';


//specifications
$summary = $hikeAPI->trails[5]->summary;
$name = ($hikeAPI->trails[5]->name)." Hike";
$difficulty = $hikeAPI->trails[5]->difficulty;
$ascent = $hikeAPI->trails[5]->ascent; //feet
$distance = $hikeAPI->trails[5]->length; //miles
$longitude = $hikeAPI->trails[5]->longitude;
$latitude = $hikeAPI->trails[5]->latitude;



$url = "https://www.bing.com/images/search?&q=".str_replace(" ",",",$name)."&qft=+filterui:imagesize-large&FORM=IRFLTR";

$output = getPage($url);

//matches image srcs to urlMatches using regex 
preg_match_all('!<a class="thumb" target="_blank" href="(.*?)"!', $output, $urlMatches);

//save all matches in array called urlLinks 
$urlLinks = $urlMatches[1];
$jsonLinks = json_encode($urlLinks);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="styles_sheet.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>



<h1 id="hike-name">Mountain Name</h1>
<hr>
<div class="row" id="pictures">
    <div class="col-2"><i class="fa fa-angle-left" id="left-img-scroll" onclick="scroll_left()"></i></div>
    <div class="col img" id="img1" style="background: url('<?php echo $urlLinks[0]?>') no-repeat center / cover;"></div>
    <div class="col img" id="img2" style="background: url('<?php echo $urlLinks[1]?>') no-repeat center / cover;"></div>
    <div class="col img" id="img3" style="background: url('<?php echo $urlLinks[2]?>') no-repeat center / cover;"></div>
    <div class="col-2"><i class="fa fa-angle-right" id="right-img-scroll" onclick="scroll_right()"></i></div>
</div>
<hr>
<div class="row">
    <div class="col" id="network-box">
        <div class="row">
            <div id="profile-pic-posted"></div>
            <div class="arrow-left"></div>
            <div class="hiking-post">
                <div class="hiking-post-top">

                    <div class="row">
                        <p class="col">looking for cool chill people for a sunday hike! if you love music and brownies, come hang :)))</p>
                    </div>
                </div>
                <div class="row">
                    <div class="arrow-left-grey"></div>
                    <div class="hiking-post-bottom">
                        <div class="row">
                            <div class="col center">08-16-2018</div>
                            <div class="col center">Driving</div>
                            <div class="col center"><button class="btn connect-btn" onclick="connect()">Connect</button></div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col">

        <div id="map"></div>


        <div id="new-post">
            <nav class="navbar navbar-default">
                Make new post
            </nav>
            <div class="row middle-text-box">
                <div id="profile-pic"></div>
                <textarea id="post-input" maxlength="250" row=5 col=4 5 placeholder="Write something...">
        </textarea>
            </div>
            <hr>
            <div class="row">
                <i class="far fa-calendar-alt icon-format"></i>
                <input id="date-going" type="date" id="start" name="trip" min="2018-01-01" max="2018-12-31" />
                <i class="fas fa-walking icon-format" id="select-transport"></i>
                <select id="dropdown">
  <option>Driving</option>
  <option>Looking for Drivers</option>
  <option>Bussing</option>
  <option>Hitchiking</option>
</select>
                <button class="btn" id="submit-button" onclick="addPost()">Submit</button>
            </div>
        </div>

    </div>
</div>



<!--maps-->


<script>
    function initMap() {

        var uluru = {
            lat: <?php echo $latitude ?>,
            lng: <?php echo $longitude ?>
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

    var links = JSON.parse('<?= $jsonLinks; ?>');;

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeqGnKcLeOKBLNVI3-U1ndh9RdJlA1j-k&callback=initMap" async defer>


</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="hike_script.js">
</script>


