window.addEventListener('load', function () {
    "use strict";

    /* Build the URLs */
    const URL_OFFERS = 'getOffers.php';
    const URL_OFFERS_JSON = URL_OFFERS + '?useJSON';

    /* Buid the callbacks */
    const htmlCallback = function (data) {
        document.getElementById("offers").innerHTML = data;
    }

    const jsonCallback = function (json) {
	    let html = "<p>\"" + json.bookTitle + "\"<br>";
         html += "<span class = 'category'>Category: " + json.catDesc + "</span><br>";
         html += "<span class = 'price'>Price: " + json.bookPrice + "</span><br></p>";

    	document.getElementById("JSONoffers").innerHTML = html;
}

/* General purpose function */
    const fetchOffer = function(URL, callback) {
        fetch(URL)
          .then(
            function(response) {
                 const contentType = response.headers.get('content-type');
              if (contentType.includes('application/json')) {
                return response.json();
              }
              return response.text();
          })
          .then(
            function(data) {
                 callback(data);
          })
          .catch(
            function(err) {
              console.log("Something went wrong!", err);
          });
    }

    /* call the functions and set reload to 5 seconds */
    const mainHTML = function () {
        fetchOffer(URL_OFFERS, htmlCallback);
    }

    const mainJSON = function() {
      fetchOffer(URL_OFFERS_JSON, jsonCallback);
    }

    mainHTML();
    setInterval(mainHTML, 5000);

    mainJSON(); 
    setInterval(mainJSON, 5000);

});