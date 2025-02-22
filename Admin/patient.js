// Example Data for the Patient Dashboard
const patientData = {
    name: "John Doe",
    appointments: [
        { date: "2025-03-05", time: "10:00 AM", doctor: "Dr. Smith" },
        { date: "2025-03-15", time: "02:00 PM", doctor: "Dr. Brown" }
    ],
    medicalHistory: [
        "Diabetes - Diagnosed 2020",
        "High Blood Pressure - Diagnosed 2021"
    ],
    prescriptions: [
        "Metformin 500mg - Take once a day",
        "Lisinopril 10mg - Take once a day"
    ]
};

// Populate the data in the DOM
document.getElementById('patient-name').textContent = patientData.name;

const appointmentsList = document.getElementById('appointments-list');
patientData.appointments.forEach(appointment => {
    const li = document.createElement('li');
    li.className = "list-group-item";
    li.textContent = `${appointment.date} at ${appointment.time} with ${appointment.doctor}`;
    appointmentsList.appendChild(li);
});

const medicalHistoryList = document.getElementById('medical-history');
patientData.medicalHistory.forEach(history => {
    const li = document.createElement('li');
    li.className = "list-group-item";
    li.textContent = history;
    medicalHistoryList.appendChild(li);
});

const prescriptionsList = document.getElementById('prescriptions');
patientData.prescriptions.forEach(prescription => {
    const li = document.createElement('li');
    li.className = "list-group-item";
    li.textContent = prescription;
    prescriptionsList.appendChild(li);
});
