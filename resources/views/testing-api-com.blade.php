<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing API For POST</title>
</head>
<body>
    <form action="http://backoffice.com-indo.com/api/v1/user/jobApplications" method="POST" enctype="multipart/form-data">

        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
        <br>
        <label for="university">University</label>
        <input type="text" name="university" id="university">
        <br>
        <label for="major">Major</label>
        <input type="text" name="major" id="major">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="department_id">Department ID</label>
        <input type="number" name="department_id" id="department_id">
        <br>
        <label for="attachment">Attachment</label>
        <input type="file" name="attachment" id="attachment">
        <br>
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>