// 1. Add an click event to a button that toggles it's class (add some style to the class)

$(function() {
  $(".primary").on("click", toggleClass);

  function toggleClass() {
    $("button").toggleClass("btn-shadow");
  }
});

// 2. Create an HTML element, append a new one to it and one before

// 3. Add a button to an element that when clicked scrolls 50% of the element height;

// 4. Create an ajax request that prints response data to the page (style it, make it look nice)
