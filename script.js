function loadProjects() {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var projects = JSON.parse(this.responseText);
            var html = "<ul>";
            var list = document.getElementById("project-list");
            for (var i = 0; i < projects.length; i++) {
                html += "<li> <a href='" + projects[i].html_url + "'><div> <h3>" + projects[i].name + "</h3><p>" + projects[i].description + "</p><span id='gh-info'><img src='img/GitHub-Mark-32px.png'/> Language: " + projects[i].language + "<br/>Last commit: " + projects[i].pushed_at.split("T")[0] + " </span></div></a></li>";
            }

            html += "</ul>";
            list.innerHTML = html;
        }
        console.log(commitUrl);
        getCommitCount(commitUrl, projectName);
    }

    xhttp.open("GET", "https://api.github.com/users/joshoxe/repos?sort=updated", true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send();
}