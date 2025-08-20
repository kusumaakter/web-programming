<!doctype html>
<html>
    <head>
        <title>
            personal profile
        </title>
        
    </head>
    <body>
        <form action="save_personal_profile.php" method="POST">
           Name: <input type="text" name="name"><br><br>
           Email:<input type="text" name="email"><br><br>
           phone:<input type="text" name="phone"><br><br>
           Date of birth:<input type="DATE" name="dob"><br><br>
           gender:<select name="gender" >
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                     </select><br><br>
           nationality:<input type="text" name="nationality"><br><br>
          Religion:<input type="radio" name="religion" value="islam">Islam
                    <input type="radio" name="religion" value="hindu">HINDU
                    <input type="radio" name="religion" value="others">others<br><br>
          Address:<textarea name="address" required></textarea><br><br>
          <input type="submit" value="submit">
          </form>
          </body>
          </html>