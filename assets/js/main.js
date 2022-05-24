let iconModify = document.querySelectorAll("[data-value]");

console.log("hola");
console.log(iconModify);
iconModify.forEach(icon => {
    icon.addEventListener("click", function(){
        console.log(icon.id);
        console.log(document.getElementById("form-modify"));
        //let pathMod = document.getElementById("form-modify").setAttribute("action", icon.id);
        const oldPath = document.getElementById("oldPath").setAttribute("value", icon.id);
        console.log(pathMod+" "+oldPath);
    })
});
