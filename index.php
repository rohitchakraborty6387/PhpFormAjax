<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Advanced Form</h2>
        <form id="advancedForm" enctype="multipart/form-data">
            <!-- Basic Fields -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <!-- Dropdown -->
            <label for="city">City:</label>
            <select id="city" name="city" required>
                <option value="New York">New York</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Chicago">Chicago</option>
                <!-- Add more cities here -->
            </select><br>

            <!-- Checkboxes -->
            <label>Hobbies:</label><br>
            <input type="checkbox" name="hobbies[]" value="Reading"> Reading<br>
            <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling<br>
            <input type="checkbox" name="hobbies[]" value="Painting"> Painting<br>

            <!-- File Uploads -->
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*"><br>

            <label for="excel">Upload Excel:</label>
            <input type="file" id="excel" name="excel" accept=".xlsx, .xls"><br>

            <!-- Advanced Fields -->
            <!-- Add more fields here as needed -->

            <button type="submit">Submit</button>
        </form>
        <div id="response"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>
