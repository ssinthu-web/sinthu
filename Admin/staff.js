// Example Data for the Staff Dashboard
const staffData = {
    patients: [
        { name: "John Doe", age: 45, id: "P001" },
        { name: "Jane Smith", age: 33, id: "P002" },
        { name: "Tom Brown", age: 29, id: "P003" }
    ],
    appointments: [
        { patientId: "P001", date: "2025-03-05", time: "10:00 AM" },
        { patientId: "P002", date: "2025-03-06", time: "11:00 AM" }
    ]
};

// Populate the list of patients
document.getElementById('view-patients').addEventListener('click', () => {
    const patientsList = document.getElementById('patients-list');
    patientsList.innerHTML = ""; // Clear previous data
    staffData.patients.forEach(patient => {
        const li = document.createElement('li');
        li.className = "list-group-item";
        li.textContent = `${patient.name} (Age: ${patient.age})`;
        patientsList.appendChild(li);
    });
});

// Populate the list of appointments
document.getElementById('view-appointments').addEventListener('click', () => {
    const appointmentsList = document.getElementById('appointments-list');
    appointmentsList.innerHTML = ""; // Clear previous data
    staffData.appointments.forEach(appointment => {
        const li = document.createElement('li');
        li.className = "list-group-item";
        li.textContent = `Patient ID: ${appointment.patientId} - ${appointment.date} at ${appointment.time}`;
        appointmentsList.appendChild(li);
    });
});
