let iconModify = document.querySelectorAll("[data-value]");

console.log("hola");
console.log(iconModify);
<<<<<<< HEAD

iconModify.forEach((icon) => {
  icon.addEventListener("click", function () {
    console.log(icon.id);
    console.log(document.getElementById("form-modify"));
    //let pathMod = document.getElementById("form-modify").setAttribute("action", icon.id);
    const oldPath = document
      .getElementById("oldPath")
      .setAttribute("value", icon.id);
    console.log(pathMod + " " + oldPath);
  });
=======
iconModify.forEach(icon => {
    icon.addEventListener("click", function(){
        console.log(icon.id);
        console.log(document.getElementById("form-modify"));
        const oldPath = document.getElementById("oldPath").setAttribute("value", icon.id);
        console.log(pathMod+" "+oldPath);
    })
>>>>>>> 4c910b2e0f42444d858e1e20c98b4d4f0e5ea45d
});
