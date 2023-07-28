function search() {
    var keyword = document.querySelector("#search input").value;
    var url = "https://indeed.com/jobs?q=" + keyword;
    window.location.href = url;
  }
  
  document.querySelector("#search button").addEventListener("click", search);