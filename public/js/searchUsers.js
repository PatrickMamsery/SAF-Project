function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      document.getElementById("allusers").style.display = "";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        // document.getElementById("livesearch").innerHTML=this.responseText;
        // document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        document.getElementById("allusers").style.display = "none";
        resp=JSON.parse(this.responseText).results;
       
        var results_container="<table class='table table-responsive table-borderless><thead><tr><th>Name</th><th>Role</th><th># of Posts</th><th>Actions</th></tr></thead><tbody><tr>";

        for (let index = 0; index < resp.length; index++) {

            results_container+="<td>"+resp[index].fname + " " + resp[index].sname +"</td><td>"+resp[index].role_id +"</td><td>0</td><td>Actions</td></tr>"               

        }

        results_container+="</tbody></table>";
        //populate results into html
        document.getElementById("livesearch").innerHTML=results_container;
      }
    }
    xmlhttp.open("GET","/search_users/?q="+str,true);
    xmlhttp.send();
  }