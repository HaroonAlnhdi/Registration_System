const courses = [];

function addCourse() {
  const courseSelect = document.getElementById("course-select");
  const sectionSelect = document.getElementById("section-select");
  const course = courseSelect.value;
  const section = sectionSelect.value;

  if (course && section) {
    const courseObj = {
      course: course,
      section: section,
      timing: "10:00 AM - 12:30 PM",
      examTimeAndDate: "May 25, 2023, 9:00 AM",
      rooms: "Room 101, Room 102",
      credits: 3
    };

    courses.push(courseObj);

    renderTable();

    disableCourseOption(course, true);

    courseSelect.value = "";
    sectionSelect.value = "";
    sectionSelect.disabled = true;
    document.getElementById("add-course-button").disabled = true;
    document.getElementById("add-course-button").style.visibility = "hidden";
    document.getElementById("replace-course-button").disabled = true;
    document.getElementById("replace-course-button").style.visibility = "hidden";
  } else {
    const errorMessage = document.getElementById("error-message");
    errorMessage.style.display = "block";
  }
}

function replaceCourse() {
  const courseSelect = document.getElementById("course-select");
  const sectionSelect = document.getElementById("section-select");
  const course = courseSelect.value;
  const section = sectionSelect.value;

  if (course && section) {
    const index = document
      .getElementById("replace-course-button")
      .getAttribute("data-index");
    const oldCourse = courses[index].course;

    courses[index].course = course;
    courses[index].section = section;

    renderTable();

    enableCourseOption(oldCourse);
    disableCourseOption(course, true);

    courseSelect.value = "";
    sectionSelect.value = "";
    sectionSelect.disabled = true;
    document.getElementById("add-course-button").disabled = true;
    document.getElementById("add-course-button").style.visibility = "hidden";
    document.getElementById("replace-course-button").disabled = true;
    document.getElementById("replace-course-button").style.visibility = "hidden";
  } else {
    const errorMessage = document.getElementById("error-message");
    errorMessage.style.display = "block";
  }
}

function renderTable() {
  const tableBody = document.getElementById("course-table-body");
  tableBody.innerHTML = "";

  for (let i = 0; i < courses.length; i++) {
    const courseObj = courses[i];

    const row = document.createElement("tr");

    const courseCell = document.createElement("td");
    courseCell.textContent = courseObj.course;
    row.appendChild(courseCell);

    const sectionCell = document.createElement("td");
    sectionCell.textContent = courseObj.section;
    row.appendChild(sectionCell);

    const timingCell = document.createElement("td");
    timingCell.textContent = courseObj.timing;
    row.appendChild(timingCell);

    const examTimeAndDateCell = document.createElement("td");
    examTimeAndDateCell.textContent = courseObj.examTimeAndDate;
    row.appendChild(examTimeAndDateCell);

    const roomsCell = document.createElement("td");
    roomsCell.textContent = courseObj.rooms;
    row.appendChild(roomsCell);

    const creditsCell = document.createElement("td");
    creditsCell.textContent = courseObj.credits;
    row.appendChild(creditsCell);

    const actionsCell = document.createElement("td");

    const editButton = document.createElement("button");
    editButton.textContent = "Edit";
    editButton.className = "btn btn-primary btn-sm";
    editButton.onclick = function () {
      editCourse(i);
    };
    actionsCell.appendChild(editButton);

    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Delete";
    deleteButton.className = "btn btn-danger btn-sm";
    deleteButton.onclick = function () {
      deleteCourse(i);
    };
    actionsCell.appendChild(deleteButton);

    row.appendChild(actionsCell);

    tableBody.appendChild(row);
  }
}

function editCourse(index) {
  const courseObj = courses[index];

  const courseSelect = document.getElementById("course-select");
  courseSelect.value = courseObj.course;

  const sectionSelect = document.getElementById("section-select");
  sectionSelect.value = courseObj.section;
  sectionSelect.disabled = false;

  const addButton = document.getElementById("add-course-button");
  addButton.disabled = true;
  addButton.style.visibility = "hidden";

  const replaceButton = document.getElementById("replace-course-button");
  replaceButton.disabled = false;
  replaceButton.style.visibility = "visible";
  replaceButton.setAttribute("data-index", index);

  const errorMessage = document.getElementById("error-message");
  errorMessage.style.display = "none";
}

function deleteCourse(index) {
  const course = courses[index].course;

  courses.splice(index, 1);

  renderTable();

  enableCourseOption(course);
}

function disableCourseOption(course, disable) {
  const courseOptions = document.querySelectorAll(
    `#course-select option[value="${course}"]`
  );

  for (let i = 0; i < courseOptions.length; i++) {
    courseOptions[i].disabled = disable;
  }
}

function enableCourseOption(course) {
  const courseOptions = document.querySelectorAll(
    `#course-select option[value="${course}"]`
  );

  for (let i = 0; i < courseOptions.length; i++) {
    courseOptions[i].disabled = false;
  }
}

window.onload = function () {
  const courseSelect = document.getElementById("course-select");
  courseSelect.onchange = function () {
    const sectionSelect = document.getElementById("section-select");
    sectionSelect.disabled = false;

    const course = courseSelect.value;
    const section = sectionSelect.value;

    if (course && section) {
      document.getElementById("add-course-button").disabled = false;
      document.getElementById("add-course-button").style.visibility = "visible";
    } else {
      document.getElementById("add-course-button").disabled = true;
      document.getElementById("add-course-button").style.visibility = "hidden";
    }

    const errorMessage = document.getElementById("error-message");
    errorMessage.style.display = "none";
  };

  const sectionSelect = document.getElementById("section-select");
  sectionSelect.onchange = function () {
    const course = courseSelect.value;
    const section = sectionSelect.value;

    if (course && section) {
      document.getElementById("add-course-button").disabled = false;
      document.getElementById("add-course-button").style.visibility = "visible";
    } else {
      document.getElementById("add-course-button").disabled = true;
      document.getElementById("add-course-button").style.visibility = "hidden";
    }

    const errorMessage = document.getElementById("error-message");
    errorMessage.style.display = "none";
  };

  const addButton = document.getElementById("add-course-button");
  addButton.onclick = addCourse;

  const replaceButton = document.getElementById("replace-course-button");
  replaceButton.onclick = replaceCourse;
  replaceButton.style.visibility = "hidden";
  replaceButton.disabled = true;
};