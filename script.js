$(document).ready( function () {
    $('#visitorTable').DataTable();
} );

function deleteAll() {
    if (confirm('Do you want to delete all the visitors?')) {
        window.location.href = 'alldelete.php';
    }
}

function printVisitors() {
    document.body.innerHTML = '<div class="text-center mt-3"><h1 class="mt-2 mb-5">Visitors Log e-Book</h1><table class="table" id="print-content">' + document.getElementById('visitorTable').innerHTML + '</table></div>';
    window.print();
    location.reload();
}

function validateForm() {
    var name = document.getElementById('name').value;
    var contactNumber = document.getElementById('contactNumber').value;
    var address = document.getElementById('address').value;
    var purposeDestination = document.getElementById('purposeDestination').value;

    if (name == "" || contactNumber == "" || address == "" || purposeDestination == "") {
        alert('Please fill in all fields!');
        return false;
    }
}

function clearForm() {
    document.getElementById('logbookForm').reset();
}

function showNotification() {
    alert('Form submitted successfully!');
    return true;
}

function editVisitor(visitorID) {
    // Redirect to the edit page for the visitor with the given ID.
    window.location.href = 'editVisitor.php?id=' + visitorID;
}

function deleteVisitor(visitorID) {
    // Confirm the deletion with the user.
    if (confirm('Do you want to delete the visitor with ID ' + visitorID + '?')) {
        // If the user confirms, redirect to the delete page for the visitor with the given ID.
        window.location.href = 'deleteVisitor.php?id=' + visitorID;
    }
}
