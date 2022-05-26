let iconModify = document.querySelectorAll("[data-value]");
const button = document.getElementById("buttonPrueba");
const divPrueba = document.getElementById("prueba");
const divPrueba1 = document.getElementById("prueba1");

console.log("hola");
console.log(iconModify);
iconModify.forEach(icon => {
    icon.addEventListener("click", function(){
        console.log(icon.id);
        console.log(document.getElementById("form-modify"));
        const oldPath = document.getElementById("oldPath").setAttribute("value", icon.id);
        console.log(pathMod+" "+oldPath);
    })
});

button.addEventListener("click", function(){
    divPrueba.style.display = "flex";
    divPrueba1.style.display = "none";
})


