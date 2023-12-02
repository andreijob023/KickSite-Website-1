const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })
}

/*log-in_display script*/
const enllogbutton = document.getElementById("enllog-button");/*creating two buttons for the enrollee and admin log in section*/
const adlogbutton = document.getElementById("adlog-button");
const container = document.querySelector(".container");

enllogbutton.addEventListener("click", () => { /*this sction display the function  to add the class change)*/
  container.classList.toggle("change");
});
adlogbutton.addEventListener("click", () => {
  container.classList.toggle("change");
});

