let iconModify = document.querySelectorAll("[data-value]");
const button = document.getElementById("buttonPrueba");
const divPrueba = document.getElementById("prueba");
const divPrueba1 = document.getElementById("prueba1");
const chart = document.getElementById("doc");
const chart1 = document.getElementById("csv");
const chart2 = document.getElementById("jpg");
const chart3 = document.getElementById("png");
const chart4 = document.getElementById("txt");
const chart5 = document.getElementById("ppt");
const chart6 = document.getElementById("odt");
const chart7 = document.getElementById("pdf");
const chart8 = document.getElementById("zip");
const chart9 = document.getElementById("rar");
const chart10 = document.getElementById("exe");
const chart11 = document.getElementById("svg");
const chart12 = document.getElementById("mp3");
const chart13 = document.getElementById("mp4");

chart.style.backgroundColor = "purple";
chart1.style.backgroundColor = "blue";
chart2.style.backgroundColor = "red";
chart3.style.backgroundColor = "orange";
chart4.style.backgroundColor = "green";
chart5.style.backgroundColor = "yellow";
chart6.style.backgroundColor = "darkblue";
chart7.style.backgroundColor = "grey";
chart8.style.backgroundColor = "pink";
chart9.style.backgroundColor = "brown";
chart10.style.backgroundColor = "#3DED68";
chart11.style.backgroundColor = "gold";
chart12.style.backgroundColor = "#C9725F";
chart13.style.backgroundColor = "#3BC9E5";

const charts = document.querySelectorAll(".section__charts-style");
charts.forEach(type =>{
    if(type.textContent <= "1.00%"){
        type.style.width = "1%";
        type.style.color = "black";
    }else{
        type.style.width = type.textContent;
    }
})

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


