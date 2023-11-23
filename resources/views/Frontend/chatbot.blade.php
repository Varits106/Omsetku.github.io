<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
</head>

<body>
    <form id="chatbot-form" method="post">
        @csrf
        <input type="text" name="user_input" id="user_input" placeholder="Tulis sesuatu...">
        <button type="submit">Kirim</button>
    </form>

    <!-- Elemen untuk menampilkan respons chatbot -->
    <div id="chatbot-response"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var chatbotForm = document.getElementById('chatbot-form');
            var chatbotResponse = document.getElementById('chatbot-response');

            chatbotForm.addEventListener('submit', function(event) {
                event.preventDefault();

                var userInput = document.getElementById('user_input').value;

                // Kirim permintaan AJAX ke endpoint Chatbot di Laravel
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/chatbot', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Tampilkan respons chatbot di dalam #chatbot-response
                        chatbotResponse.innerHTML = xhr.responseText;
                    }
                };

                // Kirim data penggunaan metode POST
                xhr.send('user_input=' + encodeURIComponent(userInput));
            });
        });
    </script>
</body>

</html>