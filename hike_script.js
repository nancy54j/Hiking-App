//banner image scroll button
var imgPos=0;
function scroll_left() {
    imgPos++;
    document.getElementById("img1").style.background = "url("+links[imgPos]+") no-repeat center / cover";
    document.getElementById("img2").style.background = "url("+links[imgPos+1]+") no-repeat center / cover";
    document.getElementById("img3").style.background = "url("+links[imgPos+2]+") no-repeat center / cover";
  
};

function scroll_right() {
    if(imgPos>1){
    imgPos--;
    document.getElementById("img1").style.background = "url("+links[imgPos]+") no-repeat center / cover";
    document.getElementById("img2").style.background = "url("+links[imgPos+1]+") no-repeat center / cover";
    document.getElementById("img3").style.background = "url("+links[imgPos+2]+") no-repeat center / cover";
    }
};


function clearTextArea() {
var myTxtArea = document.getElementById('post-input');
myTxtArea.value = myTxtArea.value='';
}
clearTextArea();

function addPost() {

  
var dropDown = document.getElementById("dropdown");
var transport = dropDown.options[dropDown.selectedIndex].value;
  
    
var text_par = document.getElementById("post-input").value;

var date = document.getElementById("date-going").value;

 if (text_par == "" || date=="" || transport==""){
   alert("Value Needed");
   return;
 }
  
var div = document.getElementById('network-box');
$( "#network-box" ).append('<div class="row"><div id="profile-pic-posted"></div><div class="arrow-left"></div><div class="hiking-post"><div class="hiking-post-top"><div class="row"><p class="col">'+text_par+'</p></div></div><div class="row"><div class="arrow-left-grey"></div><div class="hiking-post-bottom"><div class="row"><div class="col center">'+date+'</div><div class="col center">'+transport+'</div><div class="col center"><button class="btn connect-btn" onclick="connect()">Connect</button></div></div></div></div></div></div>');
  
 clearTextArea();
}

function connect(){
  
  
}