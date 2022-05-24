let folders = document.querySelectorAll("[data]");

console.log("hola");
console.log(folders);
Array.from(folders).forEach(fold => {
    fold.addEventListener("click", function(){
        console.log(fold.id);
    })
})
