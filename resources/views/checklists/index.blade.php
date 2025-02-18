<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checklist</title>
</head>
<body>
    <h2>My Checklists</h2>
    <ul id="checklistContainer"></ul>

    <form id="addChecklistForm">
        <input type="text" id="checklistName" placeholder="Checklist Name" required>
        <button type="submit">Add</button>
    </form>

    <script>
        document.getElementById('addChecklistForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const checklistName = document.getElementById('checklistName').value;
            fetch("{{ url('api/checklists') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer " + localStorage.getItem("token")
                },
                body: JSON.stringify({ name: checklistName })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                location.reload();
            });
        });

        function loadChecklists() {
            fetch("{{ url('api/checklists') }}", {
                headers: { "Authorization": "Bearer " + localStorage.getItem("token") }
            })
            .then(response => response.json())
            .then(data => {
                const checklistContainer = document.getElementById('checklistContainer');
                checklistContainer.innerHTML = "";
                data.forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item.name;
                    checklistContainer.appendChild(li);
                });
            });
        }

        function getToken() {
            return localStorage.getItem('token');
        }

        document.addEventListener('DOMContentLoaded', function() {
            if (!getToken()) {
                window.location.href = "{{ url('/login') }}";
            }
        });

        loadChecklists();
    </script>
</body>
</html>
