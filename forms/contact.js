document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#contact-form").addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch("contact.php", {  // Call backend instead of Telegram directly
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Message sent successfully!");
            } else {
                alert("Failed to send message. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred while sending the message.");
        });
    });
});
