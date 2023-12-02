document.addEventListener('DOMContentLoaded', function () {
    // Get references to the logo and sidebar elements
    const admin = document.getElementById('admin');
    const sidebar = document.getElementById('sidebar');

    // Add an event listener to the logo
    admin.addEventListener('click', function () {
        // Toggle the 'active' class on the sidebar
        sidebar.classList.toggle('active');
    });

    // Add an event listener to close the sidebar when the close button is clicked
    const closeBtn = document.getElementById('close');
    closeBtn.addEventListener('click', function () {
        sidebar.classList.remove('active');
    });

    // Add an event listener to toggle the sidebar on mobile
    const mobileBar = document.getElementById('bar');
    mobileBar.addEventListener('click', function () {
        sidebar.classList.toggle('active');
    });
});