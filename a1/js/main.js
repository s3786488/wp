// Function to handle dropdown navigation
document.addEventListener("DOMContentLoaded", function () {
    const navSelect = document.getElementById("nav-select");

    if (navSelect) {
        navSelect.addEventListener("change", function () {
            const selectedPage = this.value;
            if (selectedPage) {
                window.location.href = selectedPage; // Redirect to the selected page
            }
        });
    }
});
