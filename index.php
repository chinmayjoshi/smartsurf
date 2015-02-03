<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>
Focussed Net
</title>
<head>
 <link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.css" media="screen">
 <link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="input-group col-lg-6">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="query">
                    <span class="input-group-btn">
                      <button class="btn btn-default"  type="button" onclick="search()">Search</button>
                    </span>
                  </div>
</div>
<div class="row">
<div class ="col-lg-6">
<h1>Youtube</h1>
<div id="search-container">
 
</div>
</div>
<div class ="col-lg-6">
<h1>
Quora
</h1>
<!-- 4:3 aspect ratio -->
<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" ></iframe>
</div>
</div>
</div>
<div class="row">
<div class ="col-lg-6">
<h1>
Blogs
</h1>
<!-- 4:3 aspect ratio -->
<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src=""></iframe>
</div>
</div>
<div class ="col-lg-6">
<h1>
others Reads
</h1>
<!-- 4:3 aspect ratio -->
<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src=""></iframe>
</div>
</div>
</div>  
</div>
</body>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootswatch.js"></script>
<script>
function loadAPIClientInterfaces() {
  console.log("check");
  gapi.client.load('youtube', 'v3', function() {
    handleAPILoaded();
  });
}
function handleAPILoaded() {
  $('#search-button').attr('disabled', false);
}
function search() {
  console.log("hello")
  var q = $('#query').val();
  var request = gapi.client.youtube.search.list({
    q: q,
    part: 'snippet',
    key:'AIzaSyC57PUVKbxSFpIMZ_TLL3fuVf1rgcUL2Xs'
  });

  request.execute(function(response) {
    var str = JSON.stringify(response.result);
    var jsonObj = JSON.parse(str);
    console.log(jsonObj);
    var html ="";
    for(var i=0;i<jsonObj.items.length;i++)
    {
    if(jsonObj.items[i].id.videoId)
    {
      link = "https://www.youtube.com/watch?v="+jsonObj.items[i].id.videoId
      html += "<br><a href =\""+link+"\">"+jsonObj.items[i].snippet.title+"</a>";
      html += "<img src=\""+jsonObj.items[i].snippet.thumbnails.default.url+"\"></img>"
    }
    }
    $('#search-container').html('<pre>' + html + '</pre>');
  });
}

</script>
 <script src="https://apis.google.com/js/client.js?onload=loadAPIClientInterfaces"></script>
 </html>