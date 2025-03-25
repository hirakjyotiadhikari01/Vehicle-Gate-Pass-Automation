
document.addEventListener('DOMContentLoaded', function () {
    // Initially show the login form
    showLoginForm();

    // Fetch employee data
    fetch('fetch_employees.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Debugging line
            const tbody = document.querySelector('#employeeTable tbody');
            tbody.innerHTML = ''; // Clear any existing rows
            data.forEach(employee => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${employee.name}</td>
                    <td>${employee.department}</td>
                    <td>${employee.employee_id}</td>
                    <td>${employee.phone}</td>
                    <td>${employee.email}</td>
                    <td>
                        <button onclick="approve(${employee.employee_id})">Approve</button>
                        <button onclick="reject(${employee.employee_id})">Reject</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error fetching employee data:', error));
});

function showLoginForm() {
    document.getElementById('login').style.display = 'block';
    document.getElementById('register').style.display = 'none';
}

function showRegisterForm() {
    document.getElementById('login').style.display = 'none';
    document.getElementById('register').style.display = 'block';
}

function adminLogin() {
    alert('Admin login button clicked');
    // Implement your admin login functionality here
}

function approve(empId) {
    alert('Approved ' + empId);
    // Implement your approve functionality here
}

function reject(empId) {
    alert('Rejected ' + empId);
    // Implement your reject functionality here
}
