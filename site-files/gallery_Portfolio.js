var map = L.map("map").setView([51.76784089497635, 19.4447362706049], 17); // Łódź
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
	attribution: "© OpenStreetMap",
}).addTo(map);

L.marker([51.76784089497635, 19.4447362706049])
	.addTo(map)
	.bindPopup("Maniura Studio - Łódź")
	.openPopup();

const toggleButton = document.getElementById("toggleButton");
const textAbout = document.getElementById("textAbout");
const arrow = document.getElementById("arrow");

toggleButton.addEventListener("click", () => {
	textAbout.classList.toggle("collapsed");

	if (textAbout.classList.contains("collapsed")) {
		toggleButton.firstChild.textContent = "ROZWIŃ ";
		arrow.textContent = "˅";
	} else {
		toggleButton.firstChild.textContent = "ZWIŃ ";
		arrow.textContent = "˄";
	}
});

const days = [
	"Niedziela",
	"Poniedziałek",
	"Wtorek",
	"Środa",
	"Czwartek",
	"Piątek",
	"Sobota",
];
const hours = [
	"Zamknięte",
	"08:30 - 20:00",
	"08:30 - 20:00",
	"08:30 - 20:00",
	"08:30 - 20:00",
	"08:30 - 20:00",
	"08:30 - 15:00",
];

const today = new Date().getDay();

document.getElementById("today-name").textContent = days[today];
document.getElementById("today-hours").textContent = hours[today];

const listItems = document.querySelectorAll("#week-hours li");
listItems.forEach(li => {
	if (parseInt(li.dataset.day) === today) {
		li.classList.add("today");
	}
});

const openingHours = document.getElementById("openingHours");
const toggleBtn = document.getElementById("toggle-week");
const weekHours = document.getElementById("week-hours");

toggleBtn.addEventListener("click", () => {
	weekHours.classList.toggle("hidden");
	toggleBtn.classList.toggle("open");

	if (toggleBtn.classList.contains("open")) {
		openingHours.classList.add("expanded");
	} else {
		openingHours.classList.remove("expanded");
	}
});

document.addEventListener("DOMContentLoaded", function () {
	const modal = document.getElementById("bookingReservation");
	const openModalBtn = document.querySelector(".bookManicure");
	const closeModalBtn = document.getElementById("closeReservation");

	openModalBtn.addEventListener("click", () => {
		modal.classList.remove("hidden");
	});

	closeModalBtn.addEventListener("click", () => {
		modal.classList.add("hidden");
	});

	window.addEventListener("click", function (e) {
		if (e.target === modal) {
			modal.classList.add("hidden");
		}
	});
});
