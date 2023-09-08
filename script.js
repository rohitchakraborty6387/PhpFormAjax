document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("advancedForm");
    const responseDiv = document.getElementById("response");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("process_form.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    responseDiv.innerHTML = "<p>Form submitted successfully!</p>";
                    form.reset();
                } else {
                    responseDiv.innerHTML = "<p>Form submission failed. Please check your inputs.</p>";
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                responseDiv.innerHTML = "<p>An error occurred during form submission.</p>";
            });
    });
});
