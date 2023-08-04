// function search() {
//     var keyword = document.querySelector("#search input").value;
//     var url = "https://indeed.com/jobs?q=" + keyword;
//     window.location.href = url;
//   }

  
 
//   document.querySelector("#search button").addEventListener("click", search);

// JavaScript Code
function translate(targetLanguage) {
  // Get the elements that need to be translated
  const elementsToTranslate = [
    // Add the IDs or classes of HTML elements that need to be translated
    "text", "comment", "navbar", "home", "benefits"
    // Add more elements as needed
  ];

  // Replace this with your actual API key
  const apiKey = "";

  // Function to call the Google Translate API
  function callTranslateAPI(text, targetLanguage) {
    // Replace "en" with your website's original language code
    const sourceLanguage = "en";
    const apiUrl = `https://translation.googleapis.com/language/translate/v2?key=${apiKey}`;
    const data = {
      q: text,
      target: targetLanguage,
      source: sourceLanguage,
    };

    return fetch(apiUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((data) => data.data.translations[0].translatedText)
      .catch((error) => {
        console.error("Error translating text:", error);
        return text; // If translation fails, return the original text
      });
  }

  // Translate each element and update its content
  elementsToTranslate.forEach((elementId) => {
    const element = document.getElementById(elementId);
    const originalText = element.innerText;

    callTranslateAPI(originalText, targetLanguage)
      .then((translatedText) => {
        element.innerText = translatedText;
      })
      .catch((error) => {
        console.error("Error translating element:", elementId, error);
      });
  });
}

//about us
function scrollToAboutUs() {
  var aboutUs = document.getElementsByClassName("AboutUs");
  aboutUs.scrollIntoView({
    behavior: "smooth",
  });
}

window.onload = scrollToAboutUs;