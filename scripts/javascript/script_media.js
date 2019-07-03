//VIDEO FRAME ======================================================================
var videoArray = new Array("https://www.youtube.com/embed/xfD0geLKxws?start=35",
                           "https://www.youtube.com/embed/U0rsdHUrHfQ?start=618",
                           "https://www.youtube.com/embed/ItYye9h_RXg");

var videoIndex = 0;
var videoArrowLeft = document.getElementById("left_arrow");
var videoArrowRight = document.getElementById("right_arrow");

videoArrowLeft.addEventListener('click', function(e)
{
    switchVideoLink(-1);
});

videoArrowRight.addEventListener('click', function(e)
{
    switchVideoLink(1);
});

function switchVideoLink(value)
{
    // alert("test");
    videoIndex += value;
    if (videoIndex > videoArray.length - 1)
    {
        videoIndex = 0;
    }
    else if (videoIndex < 0)
    {
        videoIndex = videoArray.length - 1;
    }
    document.getElementById("video_frame").src = videoArray[videoIndex];
}


//OVERLAY SCREENSHOT ======================================================================
var screenshots = document.getElementsByClassName("screenshot"),
screenshotsLen = screenshots.length;

for (var i = 0; i < screenshotsLen; i++) 
{
    screenshots[i].addEventListener('click', function(e)
    {
        e.preventDefault(); // On bloque la redirection
        // On appelle notre fonction pour afficher les images
        // currentTarget est utilisé pour cibler le lien et non l'image
        displayImg(e.target);
    });

}

function displayImg(target) 
{
    // console.log(e.currentTarget);
    var img = new Image(),
    overlay = document.getElementById('overlay');

    img.addEventListener('load', function() {
        overlay.innerHTML = '';
        overlay.appendChild(img);
    });

    img.src = target.src;
    overlay.style.display = 'block';
    overlay.innerHTML = '<span>Loading image...</span>';
}




document.getElementById('overlay').addEventListener('click', function(e) 
{
    // currentTarget est utilisé pour cibler l'overlay et non l'image
    e.currentTarget.style.display = 'none';
});


// function updateOverlayImage(link, index) 
// {
//     for (var i = 0; i < miniScreens.length; i++) 
//     {
//         var path = "../../images/media/screenshots/screenshot" + i + ".jpg";
//         link[index].href = path;
//     }
// }


//MINI SCREENSHOT ======================================================================
var miniScreens = document.getElementsByClassName("miniScreenshot");
window.onload = function fillMiniScreenshot() 
{
    for (var i = 0; i < miniScreens.length; i++) 
    {
        var path = "../../images/media/screenshots/screenshot" + i + ".jpg";
        miniScreens[i].src = path;
    }
}

