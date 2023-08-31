function fetchUsers() {
    $.ajax({
        url: '/api/users',
        type: 'GET',
        success: function (response) {
            updateTable(response);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function updateTable(users) {
    const tableBody = $('#user-table-body');
    tableBody.empty();

    users.forEach(function (user) {
        tableBody.append(`
                <tr>
                    <td>${user.name}</td>
                    <td>${user.city}</td>
                    <td>${user.images_count}</td>
                </tr>
            `);
    });
}

$('#create-user-form').submit(function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const imageFiles = $('#image')[0].files;

    for (let i = 0; i < imageFiles.length; i++) {
        formData.append('images[]', imageFiles[i]);
    }

    const name = $('#name').val();
    const city = $('#city').val();
    formData.append('name', name);
    formData.append('city', city);
    $.ajax({
        url: '/api/users-create',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            fetchUsers();
        },
        error: function (error) {
            console.log(error);
        }
    });
});

// Виклик функції при завантаженні сторінки
$(document).ready(function () {
    fetchUsers();
});