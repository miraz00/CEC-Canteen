document.querySelector("main").classList.add("pre-enter");
document.querySelector("main").classList.remove("with-hover");

setTimeout(function() {
  document.querySelector("main").classList.add("on-enter");
}, 500);

setTimeout(function() {
  document.querySelector("main").classList.remove("pre-enter", "on-enter");

  setTimeout(function() {
    document.querySelector("main").classList.add("with-hover");
  }, 50);
}, 3000);

document.querySelector("h1").addEventListener("click", function() {
  var siblings = Array.from(this.parentNode.children);

  siblings.forEach(function(element) {
    element.classList.remove("active");
  });

  this.classList.add("active");

  if (this.id === "link-signup") {
    document.querySelector("#form-login").classList.remove("active");
    document.querySelector("#intro-login").classList.remove("active");

    setTimeout(function() {
      document.querySelector("#form-signup").classList.add("active");
      document.querySelector("#intro-signup").classList.add("active");
    }, 50);
  } else {
    document.querySelector("#form-signup").classList.remove("active");
    document.querySelector("#intro-signup").classList.remove("active");

    setTimeout(function() {
      document.querySelector("#form-login").classList.add("active");
      document.querySelector("#intro-login").classList.add("active");
    }, 50);
  }
});

///////////////////////////////////////////////////////////////////////////////////////////////////////
