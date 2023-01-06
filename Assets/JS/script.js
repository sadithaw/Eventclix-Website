let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
	menu.classList.toggle('bx-x');
	navbar.classList.toggle('open');
}

function toggleNav() {
	var navbar = document.querySelector(".navbar");
	if (navbar.style.left === "-250px") {
		navbar.style.left = "0";
	} else {
		navbar.style.left = "-250px";
	}
}