<html>
    <head> <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="adminpanelstyle.css?version51"/></head>
<body>
<div class="sidebar">
    <ul>
        <li><a href="javascript:void(0)" style="color: white;" class="main">Quiz Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="gamecorner.php">View Table</a></li>
                <li><a href="quizadd.php">Add to Table</a></li>
            </ul></li>
        <li><a href="javascript:void(0)" style="color: white;" class="main">Meme Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="memecorner.php">View Table</a></li>
                <li><a href="memeEdit.php">Add to Table</a></li>
            </ul></li>
        <li><a href="javascript:void(0)" style="color: white;" class="main">Review Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="reviewcorner.php">View Table</a></li>
                <li><a href="reviewEdit.php">Add to Table</a></li>
            </ul></li>
        <li><a href="javascript:void(0)" style="color: white;" class="main">News Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="newscorner.php">View Table</a></li>
                <li><a href="addnews.php">Add to Table</a></li>
            </ul></div>
</body>   
</html>
<script>
  window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");  
    $('#level').val(selItem);
    }
    $('.submit').click(function() { 
        var selVal = $("#level").val();
        sessionStorage.setItem("SelItem", selVal);
    });
</script>
