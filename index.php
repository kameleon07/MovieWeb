<!DOCTYPE html>
<html>
<head>
  <title>
    Search
  </title>
</head>
<body>
  <input id="nm" type="text" name="nm">
  <p id="data"></p>
  <button onclick="showHint(document.getElementById('nm').value,'2011-07-15')">Click Me</button>
</body>
<script type="text/javascript">
  
  function showHint(str,date) {
    if (str.length == 0) { 
        document.getElementById("data").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("data").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "php/getFilmID.php?t="+str+"&d="+ date, true);
        xmlhttp.send();
    }
  }

</script>
</html>