<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Doctors and Nurse List</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Position</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="doctorTableBody">
            <!-- Table rows will be dynamically added here -->
        </tbody>
    </table>
</div>

<script>
    // Fetch data from API
    fetch('http://localhost/ushtrim/api.php?action=get_doctors')
        .then(response => response.json())
        .then(data => {
            const doctors = data.doctors;
            const doctorTableBody = document.getElementById('doctorTableBody');
            doctors.forEach(doctor => {
                // Create a new table row
                const row = document.createElement('tr');
                // Populate table cells with data
                row.innerHTML = `
                    <td>${doctor.id}</td>
                    <td>${doctor.name}</td>
                    <td>${doctor.lastname}</td>
                    <td>${doctor.position}</td>
                    <td>${doctor.email}</td>
                `;
                // Append the row to the table body
                doctorTableBody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
</script>

<!-- Bootstrap JS (optional, if you need JavaScript features) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
