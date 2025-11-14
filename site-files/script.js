const stars = document.querySelectorAll(".star");
const selectedStarsInput = document.getElementById("selectedStars");

let selectedRating = 0;

stars.forEach(star => {
	star.addEventListener("mouseover", () => {
		const val = parseInt(star.getAttribute("data-value"));
		highlightStars(val);
	});

	star.addEventListener("mouseout", () => {
		highlightStars(selectedRating);
	});

	star.addEventListener("click", () => {
		selectedRating = parseInt(star.getAttribute("data-value"));
		selectedStarsInput.value = selectedRating;
		highlightStars(selectedRating);
	});
});

function highlightStars(rating) {
	stars.forEach(star => {
		const val = parseInt(star.getAttribute("data-value"));
		star.classList.toggle("selected", val <= rating);
	});
}
$(document).ready(function () {
	$("#serviceSelect").select2({
		dropdownAutoWidth: true,
		width: "200",
		dropdownCssClass: "customDropdown",
	});
});

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
	showSlides((slideIndex += n));
}

function currentSlide(n) {
	showSlides((slideIndex = n));
}

function showSlides(n) {
	let i;
	let slides = document.getElementsByClassName("mySlides");
	let dots = document.getElementsByClassName("dot");
	if (n > slides.length) {
		slideIndex = 1;
	}
	if (n < 1) {
		slideIndex = slides.length;
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIndex - 1].style.display = "block";
	dots[slideIndex - 1].className += " active";
}

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


const slider = document.querySelector(".employeesTeam");
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener("mousedown", e => {
	isDown = true;
	slider.classList.add("active");
	startX = e.pageX - slider.offsetLeft;
	scrollLeft = slider.scrollLeft;
});

slider.addEventListener("mouseleave", () => {
	isDown = false;
	slider.classList.remove("active");
});

slider.addEventListener("mouseup", () => {
	isDown = false;
	slider.classList.remove("active");
});

slider.addEventListener("mousemove", e => {
	if (!isDown) return;
	e.preventDefault();
	const x = e.pageX - slider.offsetLeft;
	const walk = (x - startX) * 1.5;
	slider.scrollLeft = scrollLeft - walk;
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


document.querySelectorAll(".category").forEach(category => {
	category.addEventListener("click", () => {
		const services = category.nextElementSibling;
		services.classList.toggle("hidden");
		const arrow = category.querySelector(".arrow");

		if (services.classList.contains("hidden")) {
			arrow.classList.remove("open");
		} else {
			arrow.classList.add("open");
		}
	});
});


const searchInput = document.querySelector('.searchBar input[type="search"]');
searchInput.addEventListener("input", () => {
	const searchTerm = searchInput.value.toLowerCase();

	document.querySelectorAll(".category-block").forEach(categoryBlock => {
		let hasVisibleService = false;

		const serviceElements = categoryBlock.querySelectorAll(".serviceContainer");
		serviceElements.forEach(service => {
			const name = service.querySelector("h4").textContent.toLowerCase();
			const description = service.querySelector("p").textContent.toLowerCase();

			if (name.includes(searchTerm) || description.includes(searchTerm)) {
				service.style.display = "flex";
				hasVisibleService = true;
			} else {
				service.style.display = "none";
			}
		});


		categoryBlock.style.display = hasVisibleService ? "block" : "none";
	});
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

document.addEventListener("DOMContentLoaded", function () {
	const serviceModal = document.getElementById("bookingService");
	const openServiceModalBtn = document.querySelectorAll(".makeArrangement");
	const closeServiceModalBtn = document.getElementById("closeBookingService");

	openServiceModalBtn.forEach(btn => {
		btn.addEventListener("click", () => {
			serviceModal.classList.remove("hidden");
		});
	});

	closeServiceModalBtn.addEventListener("click", () => {
		serviceModal.classList.add("hidden");
	});

	window.addEventListener("click", function (e) {
		if (e.target === serviceModal) {
			serviceModal.classList.add("hidden");
		}
	});
});

document.addEventListener("DOMContentLoaded", () => {
	const calendarContainer = document.querySelector(".bsCalendarContainer");
	generateCalendarDates();
	requestAnimationFrame(updateVisibleMonth);

	function generateCalendarDates() {
		const today = new Date();
		const endDate = new Date();
		endDate.setMonth(endDate.getMonth() + 2);

		let currentDate = new Date(today);

		calendarContainer.innerHTML = ""; 

		while (currentDate <= endDate) {
			const dateElement = document.createElement("div");
			dateElement.classList.add("calendar-date");

			const day = currentDate.getDate().toString().padStart(2, "0");
			const month = (currentDate.getMonth() + 1).toString().padStart(2, "0");
			const year = currentDate.getFullYear();

			const dayName = currentDate
				.toLocaleDateString("pl-PL", { weekday: "short" })
				.replace(".", "");
			const dayNameCapitalized =
				dayName.charAt(0).toUpperCase() + dayName.slice(1);

			dateElement.innerHTML = `<p class='dayName'>${dayNameCapitalized}</p><p class='dayOfMonth'>${currentDate.getDate()}</p><div class='avalibleBar'></div>`;
			dateElement.dataset.date = `${year}-${month}-${day}`;
			if (currentDate.getDay() === 0) {
				dateElement.classList.add("disabled"); 
			} else {
				dateElement.addEventListener("click", () => {
					document
						.querySelectorAll(".calendar-date")
						.forEach(el => el.classList.remove("selected"));
					dateElement.classList.add("selected");
					document.getElementById("reservation_date").value =
						dateElement.dataset.date;

					clearAllEmployeeSelections();

					const startTimeStr =
						document.getElementById("reservation_time").value;

					if (startTimeStr && !doesAllServicesFitBeforeLimit(startTimeStr)) {
						alert(
							"Obecnie wybrane usługi przekraczają dopuszczalny czas dla tego dnia. Dostosuj godziny lub usuń niektóre usługi."
						);
						document
							.querySelectorAll(".hour-block")
							.forEach(el => el.classList.remove("selected"));
						document.getElementById("reservation_time").value = "";

						document.querySelectorAll(".serviceBox").forEach(box => {
							box.removeAttribute("data-reservation-time");
							box.removeAttribute("data-reservation-end-time");
						});

						document
							.querySelectorAll(".serviceTimeRange")
							.forEach(el => (el.textContent = "Nie wybrano godziny"));
					}
					disablePastHoursForToday();

					console.log("Wybrana data:", dateElement.dataset.date);
				});
			}

			calendarContainer.appendChild(dateElement);
			currentDate.setDate(currentDate.getDate() + 1);
		}
	}
});

const leftArrow = document.querySelector(".bsCalendarLeftArrow");
const rightArrow = document.querySelector(".bsCalendarRightArrow");
const calendarContainer = document.querySelector(".bsCalendarContainer");

calendarContainer.addEventListener("scroll", () => {
	clearTimeout(calendarContainer._scrollTimeout);
	calendarContainer._scrollTimeout = setTimeout(updateVisibleMonth, 100);
});

leftArrow.addEventListener("click", () => {
	calendarContainer.scrollBy({ left: -300, behavior: "smooth" });
	setTimeout(updateVisibleMonth, 400);
});

rightArrow.addEventListener("click", () => {
	calendarContainer.scrollBy({ left: 300, behavior: "smooth" });
	setTimeout(updateVisibleMonth, 400);
});

const calendarMonth = document.querySelector(".calendarMonth");

function updateVisibleMonth() {
	const containerRect = calendarContainer.getBoundingClientRect();
	const calendarDates = calendarContainer.querySelectorAll(".calendar-date");

	let closestElement = null;
	let minDistance = Infinity;

	calendarDates.forEach(dateEl => {
		const rect = dateEl.getBoundingClientRect();
		const centerX = rect.left + rect.width / 2;
		const containerCenterX = containerRect.left + containerRect.width / 2;
		const distance = Math.abs(centerX - containerCenterX);

		if (distance < minDistance) {
			minDistance = distance;
			closestElement = dateEl;
		}
	});

	if (closestElement) {
		const date = new Date(closestElement.dataset.date);
		const monthName = date
			.toLocaleDateString("pl-PL", { month: "long", year: "numeric" })
			.toUpperCase();
		calendarMonth.textContent = monthName;
	}
}

updateVisibleMonth();
function generateHourBlocks() {
	const hourContainer = document.querySelector(".hourContainer");
	if (!hourContainer) return;

	let hour = 8;
	let minutes = 30;

	while (hour < 18 || (hour === 18 && minutes === 0)) {
		const block = document.createElement("div");
		block.classList.add("hour-block");
		block.textContent = `${hour.toString().padStart(2, "0")}:${minutes
			.toString()
			.padStart(2, "0")}`;

		hourContainer.appendChild(block);

		minutes += 15;
		if (minutes === 60) {
			minutes = 0;
			hour++;
		}
	}

	const hourBlocks = document.querySelectorAll(".hour-block");
	hourBlocks.forEach(block => {
		block.addEventListener("click", () => {
			const selectedHourCheck = block.textContent.trim();


			if (!doesAllServicesFitBeforeLimit(selectedHourCheck)) {
				alert(
					"Wybrane usługi nie zmieszczą się w dostępnych godzinach tego dnia – wybierz wcześniejszą godzinę lub skróć czas usług. Upewnij się także, że wybrałeś datę wizyty."
				);
				return;
			}

			document
				.querySelectorAll(".hour-block")
				.forEach(el => el.classList.remove("selected"));

			block.classList.add("selected");

			document
				.getElementById("reservation_time")
				.dispatchEvent(new Event("input"));

			const hourText = block.textContent.trim();
			const hour = parseInt(hourText.split(":")[0]);


			if (hour >= 10 && hour < 12) {
				chooseMorning();
			} else if (hour >= 12 && hour < 17) {
				chooseAfternoon();
			} else if (hour >= 17 && hour <= 18) {
				chooseEvening();
			}

			let selectedHour;
			const selectedHourBlock = document.querySelector(".hour-block.selected");

			if (selectedHourBlock) {
				selectedHour = selectedHourBlock.textContent.trim();
			} else {
				selectedHour = null;
			}

			const durationText = (window.currentServiceDuration || "").trim();


			function calculateEndTime(start, duration) {
				if (!start || !duration) return "Brak danych";

				const [startHour, startMin] = start.split(":").map(Number);

				const hourMatch = duration.match(/(\d+)\s*h/);
				const minMatch = duration.match(/(\d+)\s*min/);

				const addHours = hourMatch ? parseInt(hourMatch[1]) : 0;
				const addMinutes = minMatch ? parseInt(minMatch[1]) : 0;

				let endHour = startHour + addHours;
				let endMin = startMin + addMinutes;

				if (endMin >= 60) {
					endHour += Math.floor(endMin / 60);
					endMin = endMin % 60;
				}

				const formattedStart = `${startHour
					.toString()
					.padStart(2, "0")}:${startMin.toString().padStart(2, "0")}`;
				window.formattedEnd = `${endHour.toString().padStart(2, "0")}:${endMin
					.toString()
					.padStart(2, "0")}`;

				return `${formattedStart} - ${window.formattedEnd}`;
			}

			let timeRange = "Nie wybrano godziny";
			if (selectedHour) {
				timeRange = calculateEndTime(selectedHour, durationText);
			}

			document.querySelector(".serviceTimeRange").textContent = timeRange;
			document.getElementById("reservation_time").value = selectedHour;
			document.getElementById("sumOfTime").textContent = durationText;
			recalculateAllTimeRanges(selectedHour);
			clearAllEmployeeSelections();
		});
	});
}

document.addEventListener("DOMContentLoaded", () => {
	generateHourBlocks();
});

const hourContainer = document.querySelector(".hourContainer");
const leftHourArrow = document.querySelector(".bsHourLeftArrow");
const rightHourArrow = document.querySelector(".bsHourRightArrow");

leftHourArrow.addEventListener("click", () => {
	hourContainer.scrollBy({ left: -200, behavior: "smooth" });
});

rightHourArrow.addEventListener("click", () => {
	hourContainer.scrollBy({ left: 200, behavior: "smooth" });
});

function scrollToHour(targetHour) {
	const container = document.querySelector(".hourContainer");
	const blocks = container.querySelectorAll(".hour-block");

	for (let block of blocks) {
		const blockHour = parseInt(block.textContent.trim().split(":")[0]);
		if (blockHour >= targetHour) {
			block.scrollIntoView({
				behavior: "smooth",
				inline: "start",
				block: "nearest",
			});
			break;
		}
	}
}

let morning = document.getElementById("morningTime");
let afternoon = document.getElementById("afternoonTime");
let evening = document.getElementById("eveningTime");

function chooseMorning() {
	morning.classList.add("chosen");
	afternoon.classList.remove("chosen");
	evening.classList.remove("chosen");

	scrollToHour(10);
}

function chooseAfternoon() {
	morning.classList.remove("chosen");
	afternoon.classList.add("chosen");
	evening.classList.remove("chosen");

	scrollToHour(12);
}

function chooseEvening() {
	morning.classList.remove("chosen");
	afternoon.classList.remove("chosen");
	evening.classList.add("chosen");

	scrollToHour(17);
}

function handleSubmit(event) {
	event.preventDefault();
	return false; 
}

document.addEventListener("DOMContentLoaded", function () {
	const openButtons = document.querySelectorAll(".openBookingModal");

	openButtons.forEach(button => {
		button.addEventListener("click", function (e) {
			e.preventDefault(); 


			const form = this.closest("form");

			const serviceID = form.querySelector(
				'[name="selected_service_id"]'
			).value;

			const serviceName = form.querySelector(
				'[name="selected_service_name"]'
			).value;
			const servicePrice = form.querySelector(
				'[name="selected_service_price"]'
			).value;
			const serviceTime = form.querySelector(
				'[name="selected_service_time"]'
			).value;

			const reservationTime = document.querySelector("reservation_time");

			const firstBox = document.querySelector(".serviceBox");

			document.querySelector(".serviceTitle").innerHTML = `
				<h4 class="serviceTitleElement">${serviceName}</h4>
            `;

			document.querySelector(".employeeBox").innerHTML = `
				Pracownik: Nie wybrano pracownika!
			`;

			document.querySelector(".servicePrice").textContent =
				servicePrice + " zł";

			document.getElementById("sumOfTime").textContent = serviceTime;

			window.currentServiceDuration = serviceTime;
			firstBox.setAttribute("data-duration", serviceTime);
			firstBox.setAttribute("data-service-id", serviceID);
			firstBox.setAttribute("data-reservation-time", reservationTime);

			document.getElementById("sumOfPriceH").textContent = servicePrice + " zł";

			document.getElementById("reservation_service_id").value = serviceID;

			document.getElementById("bookingService").classList.remove("hidden");
		});
	});

	document
		.getElementById("closeBookingService")
		.addEventListener("click", function () {
			document.getElementById("bookingService").classList.add("hidden");

			document
				.querySelectorAll(".hour-block.selected")
				.forEach(el => el.classList.remove("selected"));

			window.currentServiceDuration = null;

			document.querySelector(".serviceTimeRange").textContent =
				"Nie wybrano godziny";
		});
});

document.addEventListener("DOMContentLoaded", () => {
	const extraSearchInput = document.querySelector(
		'#bookingExtraService .businessServiceSearchBar input[type="search"]'
	);

	if (extraSearchInput) {
		extraSearchInput.addEventListener("input", () => {
			const searchTerm = extraSearchInput.value.toLowerCase();

			document
				.querySelectorAll("#bookingExtraService .category-block")
				.forEach(categoryBlock => {
					let hasVisibleService = false;

					const services = categoryBlock.querySelectorAll(".serviceContainer");
					services.forEach(service => {
						const name = service.querySelector("h4").textContent.toLowerCase();
						const desc = service.querySelector("p").textContent.toLowerCase();

						if (name.includes(searchTerm) || desc.includes(searchTerm)) {
							service.style.display = "flex";
							hasVisibleService = true;
						} else {
							service.style.display = "none";
						}
					});

					categoryBlock.style.display = hasVisibleService ? "block" : "none";
				});
		});
	}
});
document.querySelectorAll(".categoryBookingExtraService").forEach(category => {
	category.addEventListener("click", () => {
		const services = category.parentElement.querySelector(".servicesBlock");
		services.classList.toggle("hidden");
		const arrow = category.querySelector(".arrow");

		if (services.classList.contains("hidden")) {
			arrow.classList.remove("open");
		} else {
			arrow.classList.add("open");
		}
	});
});

document.addEventListener("DOMContentLoaded", () => {
	const openExtraServiceBtn = document.getElementById("addExtraService");
	const extraServiceModal = document.getElementById("bookingExtraService");
	const closeExtraServiceBtn = document.getElementById(
		"closeBookingExtraService"
	);
	const bookService = document.getElementById("bookingService");
	const returnToBookingService = document.getElementById(
		"returnToBookingService"
	);

	openExtraServiceBtn.addEventListener("click", () => {
		const dateValue = document.getElementById("reservation_date").value;
		const hourValue = document.getElementById("reservation_time").value;

		if (!dateValue || !hourValue) {
			alert("Najpierw wybierz datę i godzinę rozpoczęcia pierwszej usługi.");
			return;
		}

		extraServiceModal.classList.remove("hidden");
	});

	returnToBookingService.addEventListener("click", () => {
		extraServiceModal.classList.add("hidden");
	});

	closeExtraServiceBtn.addEventListener("click", () => {
		extraServiceModal.classList.add("hidden");
		bookService.classList.add("hidden");
	});
});

document.addEventListener("DOMContentLoaded", () => {
	const employeeChange = document.getElementById("employeeChange");
	const closeEmployeeChange = document.getElementById(
		"employeesReturnToBookService"
	);

	// const changeEmployeeBtn = document.getElementById("changeEmployee");
	// changeEmployeeBtn.addEventListener("click", () => {
	// 	employeeChange.classList.remove("hidden");
	// });

	closeEmployeeChange.addEventListener("click", () => {
		employeeChange.classList.add("hidden");
	});
});
document.querySelectorAll(".addExtraService").forEach(button => {
	button.addEventListener("click", function (e) {
		e.preventDefault();

		const form = this.closest("form");
		const serviceId = form.querySelector('[name="selected_service_id"]').value;
		const serviceName = form.querySelector(
			'[name="selected_service_name"]'
		).value;
		const servicePrice = form.querySelector(
			'[name="selected_service_price"]'
		).value;
		const extraServiceTime = form.querySelector(
			'[name="selected_service_time"]'
		).value;


		const startTime = document.getElementById("reservation_time").value;
		if (!doesNewServiceFitBeforeLimit(startTime, extraServiceTime)) {
			alert(
				"Nie możesz dodać więcej usług – łączny czas usług przekracza limit godzin pracy w wybranym dniu"
			);
			return;
		}

		const newServiceBox = document.createElement("div");
		newServiceBox.classList.add("serviceBox");
		newServiceBox.setAttribute("data-duration", extraServiceTime);
		newServiceBox.setAttribute("data-service-id", serviceId); 
		newServiceBox.innerHTML = `
		<div class="removeServiceButton" title="Usuń usługę">×</div>
			<div class="serivceBoxInformations">
				<div class="serviceTitle">
					<h4>${serviceName}</h4>
				</div>
				<div class="serviceParameters">
					<p class="servicePrice">${servicePrice} zł</p>
					<p class="serviceTimeRange"></p>
				</div>
			</div>
			<div class="serviceBoxEmployees">
				<div class="employeeBox">Pracownik: Nie wybrano pracownika</div>
				<div class="serviceButtonContainer">
					<button class="changeEmployee">Zmień</button>
				</div>
			</div>
		`;

		newServiceBox
			.querySelector(".removeServiceButton")
			.addEventListener("click", () => {
				newServiceBox.remove();
				updateSummary(); 
				recalculateAllTimeRanges(
					document.getElementById("reservation_time").value
				); 
			});

		document.querySelector(".servicesCollection").appendChild(newServiceBox);



		recalculateAllTimeRanges(startTime);


		updateSummary();
		document.getElementById("bookingExtraService").classList.add("hidden");
	});
});

function parseTimeToMinutes(timeStr) {

	let totalMinutes = 0;
	const hourMatch = timeStr.match(/(\d+)\s*h/);
	const minMatch = timeStr.match(/(\d+)\s*min/);

	if (hourMatch) totalMinutes += parseInt(hourMatch[1]) * 60;
	if (minMatch) totalMinutes += parseInt(minMatch[1]);

	return totalMinutes;
}

function formatMinutesToHours(mins) {

	const h = Math.floor(mins / 60);
	const m = mins % 60;
	if (h > 0 && m > 0) return `${h}h ${m}min`;
	if (h > 0) return `${h}h`;
	return `${m}min`;
}


function updateSummary() {
	let total = 0;
	let totalTime = 0;

	document.querySelectorAll(".serviceBox").forEach(service => {
		const price = parseFloat(
			service.querySelector(".servicePrice").textContent
		);

		const timeText = service.querySelector(".serviceTimeRange").textContent;

		const match = timeText.match(/(\d{2}:\d{2})\s*-\s*(\d{2}:\d{2})/);
		let durationMinutes = 0;

		if (match) {
			const [startH, startM] = match[1].split(":").map(Number);
			const [endH, endM] = match[2].split(":").map(Number);

			const startTotal = startH * 60 + startM;
			const endTotal = endH * 60 + endM;

			durationMinutes = endTotal - startTotal;
		}

		if (!isNaN(price)) total += price;
		if (!isNaN(durationMinutes)) totalTime += durationMinutes;
	});

	document.getElementById("sumOfPriceH").textContent = `${total.toFixed(2)} zł`;
	document.getElementById("sumOfTime").textContent =
		formatMinutesToHours(totalTime);
}

function recalculateAllTimeRanges(startTime) {
	let currentTime = startTime;

	const serviceBoxes = document.querySelectorAll(".serviceBox");

	serviceBoxes.forEach((box, i) => {
		const duration = box.getAttribute("data-duration") || "0min";
		const timeRangeElement = box.querySelector(".serviceTimeRange");
		const endTime = calculateEndTime(currentTime, duration);

		timeRangeElement.textContent = `${currentTime} - ${endTime}`;
		box.setAttribute("data-reservation-time", currentTime);
		box.setAttribute("data-reservation-end-time", endTime);
		document.getElementById("reservation_end_time").value = endTime;
		currentTime = endTime;
		const data = logServiceBoxData();
		console.log(data);
	});
}


function calculateEndTime(start, duration) {
	if (!start || !duration) return "Brak danych";

	const [startHour, startMin] = start.split(":").map(Number);

	const hourMatch = duration.match(/(\d+)\s*h/);
	const minMatch = duration.match(/(\d+)\s*min/);

	const addHours = hourMatch ? parseInt(hourMatch[1]) : 0;
	const addMinutes = minMatch ? parseInt(minMatch[1]) : 0;

	let endHour = startHour + addHours;
	let endMin = startMin + addMinutes;

	if (endMin >= 60) {
		endHour += Math.floor(endMin / 60);
		endMin = endMin % 60;
	}

	return `${endHour.toString().padStart(2, "0")}:${endMin
		.toString()
		.padStart(2, "0")}`;
}

document.addEventListener("DOMContentLoaded", () => {
	const input = document.getElementById("reservation_time");
	if (input) {
		input.addEventListener("input", e => {
			const newStartTime = e.target.value;
			recalculateAllTimeRanges(newStartTime);
			updateSummary();
		});
	}
});

function logServiceBoxData() {
	const services = [];
	document.querySelectorAll(".serviceBox").forEach(box => {
		const serviceId = box.getAttribute("data-service-id");
		const reservationTime = box.getAttribute("data-reservation-time");
		const reservationEndTime = box.getAttribute("data-reservation-end-time");
		const employeeId = box.getAttribute("data-employee-id");

		if (serviceId && reservationTime) {
			services.push({
				service_id: serviceId,
				reservation_time: reservationTime,
				employee_id: employeeId,
				reservationEndTime: reservationEndTime,
			});
		}
	});
	return services;
}

function prepareServiceDataForForm() {
	const dynamicFields = document.getElementById("dynamicServicesFields");
	dynamicFields.innerHTML = ""; 

	const serviceBoxes = document.querySelectorAll(".serviceBox");

	serviceBoxes.forEach((box, index) => {
		const serviceId = box.getAttribute("data-service-id");
		const reservationTime = box.getAttribute("data-reservation-time");
		const reservationEndTime = box.getAttribute("data-reservation-end-time");
		const employee = box.getAttribute("data-employee-id");
		if (serviceId && reservationTime) {
			const idInput = document.createElement("input");
			idInput.type = "hidden";
			idInput.name = `services[${index}][id]`;
			idInput.value = serviceId;

			const timeInput = document.createElement("input");
			timeInput.type = "hidden";
			timeInput.name = `services[${index}][time]`;
			timeInput.value = reservationTime;

			const employeeInput = document.createElement("input");
			employeeInput.type = "hidden";
			employeeInput.name = `services[${index}][employee]`;
			employeeInput.value = employee;

			const endTimeInput = document.createElement("input");
			endTimeInput.type = document.type = "hidden";
			endTimeInput.name = `services[${index}][endTime]`;
			endTimeInput.value = reservationEndTime;

			dynamicFields.appendChild(idInput);
			dynamicFields.appendChild(timeInput);
			dynamicFields.appendChild(endTimeInput);
			dynamicFields.appendChild(employeeInput);
		}
	});
}

document.getElementById("bookingForm").addEventListener("submit", function (e) {
	const serviceBoxes = document.querySelectorAll(".serviceBox");
	let formIsValid = true;

	serviceBoxes.forEach(box => {
		const time = box.getAttribute("data-reservation-time");
		const endTime = box.getAttribute("data-reservation-end-time");
		const employee = box.getAttribute("data-employee-id");


		if (!time || !endTime || !employee) {
			formIsValid = false;
		}
	});

	const date = document.getElementById("reservation_date").value;
	if (!date) formIsValid = false;

	if (!formIsValid) {
		e.preventDefault(); 
		alert(
			"Upewnij się, że każda usługa ma wybraną godzinę, czas zakończenia i pracownika oraz że ustawiona jest data."
		);
		return;
	}

	prepareServiceDataForForm(); 
});

let currentServiceBox = null;

document.addEventListener("click", function (e) {
	if (e.target.classList.contains("changeEmployee")) {
		e.preventDefault();

		currentServiceBox = e.target.closest(".serviceBox");
		const serviceId = currentServiceBox.getAttribute("data-service-id");
		const date = document.getElementById("reservation_date").value;
		const time = currentServiceBox.getAttribute("data-reservation-time");
		const endTime = currentServiceBox.getAttribute("data-reservation-end-time");

		if (!date || !time || !endTime) {
			alert(
				"Zacznij od wprowadzenia daty oraz godziny rozpoczęcia rezerwacji."
			);
			return; 
		}


		document.getElementById("selectedServiceIndex").value = serviceId;
		document.getElementById("selectedReservationDate").value = date;
		document.getElementById("selectedReservationTime").value = time;
		document.getElementById("selectedReservationEndTime").value = endTime;
		fetchEmployeeStatus();

		document.getElementById("employeeChange").classList.remove("hidden");
	}
});
// document.querySelectorAll(".changeEmployee").forEach((btn, index) => {
// 	btn.addEventListener("click", e => {
// 		const serviceBox = e.target.closest(".serviceBox");

// 		// Pobierz dane z tej konkretnej usługi
// 		const date = serviceBox.getAttribute("data-reservation-date");
// 		const time = serviceBox.getAttribute("data-reservation-time");
// 		const endTime = serviceBox.getAttribute("data-reservation-end-time");

// 		// Zapisz indeks i dane do formularza w modalu
// 		document.getElementById("selectedServiceIndex").value = index;
// 		document.getElementById("selectedReservationDate").value = date;
// 		document.getElementById("selectedReservationTime").value = time;
// 		document.getElementById("selectedReservationEndTime").value = endTime;
// 		// Otwórz modal
// 		document.getElementById("employeeChange").classList.remove("hidden");
// 	});
// });

function fetchEmployeeStatus() {
	const formData = new FormData(
		document.getElementById("employeeSelectionForm")
	);

	fetch("functionalities/get_employee_status.php", {
		method: "POST",
		body: formData,
	})
		.then(res => res.text())
		.then(html => {
			document.getElementById("employeesCotainerBox").innerHTML = html;
		})
		.catch(err => console.error("Błąd:", err));
}

document
	.querySelector("#employeesCotainerBox")
	.addEventListener("click", function (e) {
		const emp = e.target.closest(".chooseEmployee");
		if (!emp || emp.classList.contains("unavailable")) return;
		const employeeId = emp.getAttribute("data-employee-id");
		const employeeName = emp.querySelector(".employeeName").textContent.trim();

		if (currentServiceBox) {
			currentServiceBox.setAttribute("data-employee-id", employeeId);
			currentServiceBox.querySelector(
				".employeeBox"
			).textContent = `Pracownik: ${employeeName}`;
		}

		document.getElementById("employeeChange").classList.add("hidden");
	});

function clearAllEmployeeSelections() {
	document.querySelectorAll(".serviceBox").forEach(serviceBox => {
		serviceBox.removeAttribute("data-employee-id");
		const employeeBox = serviceBox.querySelector(".employeeBox");
		if (employeeBox) {
			employeeBox.textContent =
				"Pracownik:  Wybierz ponownie (zmieniono termin)";
		}
	});
}

function parseDuration(durationStr) {
	let totalMinutes = 0;
	const hourMatch = durationStr.match(/(\d+)\s*h/);
	const minMatch = durationStr.match(/(\d+)\s*min/);

	if (hourMatch) totalMinutes += parseInt(hourMatch[1]) * 60;
	if (minMatch) totalMinutes += parseInt(minMatch[1]);

	return totalMinutes;
}
function doesNewServiceFitBeforeLimit(startTimeStr, newServiceDurationStr) {
	if (!startTimeStr || !newServiceDurationStr) return false;


	const selectedDateStr = document.getElementById("reservation_date").value;
	if (!selectedDateStr) return false;

	const [year, month, day] = selectedDateStr.split("-").map(Number);
	const selectedDate = new Date(year, month - 1, day);
	const dayOfWeek = selectedDate.getDay(); 

	let limitHour = 20;
	let limitMin = 0;

	if (dayOfWeek === 6) {
		limitHour = 15;
	}

	const totalDurationMinutes = Array.from(
		document.querySelectorAll(".serviceBox")
	).reduce((sum, box) => {
		const durStr = box.getAttribute("data-duration");
		return sum + (durStr ? parseDuration(durStr) : 0);
	}, parseDuration(newServiceDurationStr)); 

	const [startHour, startMin] = startTimeStr.split(":").map(Number);
	const endMinutes = startHour * 60 + startMin + totalDurationMinutes;

	const limitMinutes = limitHour * 60 + limitMin;

	return endMinutes <= limitMinutes;
}


function doesAllServicesFitBeforeLimit(startTimeStr) {
	if (!startTimeStr) return false;

	// Pobierz wybraną datę
	const selectedDateStr = document.getElementById("reservation_date").value;
	if (!selectedDateStr) return false;

	const [year, month, day] = selectedDateStr.split("-").map(Number);
	const selectedDate = new Date(year, month - 1, day);
	const dayOfWeek = selectedDate.getDay(); 

	let limitHour = 20;
	let limitMin = 0;

	if (dayOfWeek === 6) {
		limitHour = 15; 
	}

	const [startHour, startMin] = startTimeStr.split(":").map(Number);
	const startMinutes = startHour * 60 + startMin;

	const totalServiceDuration = Array.from(
		document.querySelectorAll(".serviceBox")
	).reduce((sum, box) => {
		const durStr = box.getAttribute("data-duration");
		return sum + (durStr ? parseDuration(durStr) : 0);
	}, 0);

	const endTimeMinutes = startMinutes + totalServiceDuration;
	const limitTotalMinutes = limitHour * 60 + limitMin;

	return endTimeMinutes <= limitTotalMinutes;
}

function disablePastHoursForToday() {
	const selectedDate = document.getElementById("reservation_date").value;
	if (!selectedDate) return;

	const today = new Date();
	const selected = new Date(selectedDate);
	const isToday =
		selected.getFullYear() === today.getFullYear() &&
		selected.getMonth() === today.getMonth() &&
		selected.getDate() === today.getDate();

	if (isToday) {
		const currentHour = today.getHours();
		const currentMinute = today.getMinutes();

		document.querySelectorAll(".hour-block").forEach(block => {
			const blockTime = block.textContent.trim();
			const [blockHour, blockMin] = blockTime.split(":").map(Number);

			const blockDate = new Date();
			blockDate.setHours(blockHour, blockMin, 0, 0);

			if (blockDate <= today) {
				block.classList.add("disabled");
				block.style.pointerEvents = "none";
				block.style.opacity = "0.5";
			} else {
				block.classList.remove("disabled");
				block.style.pointerEvents = "";
				block.style.opacity = "";
			}
		});
	}
}
