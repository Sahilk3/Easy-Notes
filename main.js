

//on load display notes
window.onload = function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "partials/_notes.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the 'result' div with the response data
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
};



// Script for search

var searchInput = document.getElementById("searchInput");
var resultDiv = document.getElementById("result");

searchInput.addEventListener("input", function() {
    var query = searchInput.value;

    if (query.length > 0) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "partials/_notes.php?query=" + encodeURIComponent(query), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the PHP script
                resultDiv.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    } else {
        // resultDiv.innerHTML = "";
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "partials/_notes.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the 'result' div with the response data
                resultDiv.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
});


  // script to toggle insert modal
  document.getElementById('insrt').addEventListener("click", () => {        
    document.getElementById('id').value=""
    document.getElementById('title').value=""
    document.getElementById('note').value=""
    var myModal = new bootstrap.Modal(document.getElementById('insertModal'))
    myModal.toggle()
  });


