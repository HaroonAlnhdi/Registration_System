function calculateGPA() {
	let creditTotal = 0;
	let gradeTotal = 0;
	let coursesCount = 0;
	let errorMessage = "";

	for (let i = 1; i <= 10; i++) {
		let gradeInput = document.getElementsByName("grade" + i)[0];
		if (gradeInput.value !== "") {
			let creditInput = document.getElementsByName("credit" + i)[0];
			let credit = parseFloat(creditInput.value);
			if (credit >= 2 && credit <= 4) {
				let grade = parseFloat(gradeInput.value);
				creditTotal += credit;
				gradeTotal += grade * credit;
				coursesCount++;
			} else {
				errorMessage += "- Course " + i + ": Credit value must be between 2 and 4.\n";
			}
		}
	}

	if (coursesCount === 0) {
		errorMessage += "- You must enter at least one course.\n";
	}

	if (errorMessage !== "") {
		alert("Invalid input(s):\n" + errorMessage);
	} else {
		let gpa = gradeTotal / creditTotal;
		document.getElementById("result").innerHTML = "Your GPA is: " + gpa.toFixed(2);
	}
}

function clearInputs() {
	for (let i = 1; i <= 10; i++) {
		document.getElementsByName("course" + i)[0].value = "";
		document.getElementsByName("credit" + i)[0].value = "";
		document.getElementsByName("grade" + i)[0].value = "";
	}
	document.getElementById("result").innerHTML = "";
}