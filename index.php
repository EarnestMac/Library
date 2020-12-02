<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Earnest Mac's Library</title>
  
  
  <style>
@import url('https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap');
</style>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap');
</style>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
</style>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
      $(document).ready( function () {
      $('#table').DataTable();
} );
  </script>
  
  
</head>
<body>
  
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="page-header" style="text-align:center">
                  <h1>Earnest Mac's Library</h1>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <table class="table" id="table" style="text-align: center">
                  <thead>
                      <tr>
                          <th>Last</th>
                          <th>First</th>
                          <th>Title</th>
                          <th>Series</th>
                          <th>Number in Series</th>
                          <th>Length</th>
                          <th>Year</th>
                          <th>Genre</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      include 'connect.php';

                      if ($conn->connect_error) {
                        die("connection failed: ". $conn->connect_error);
                      }

                      $sql = "SELECT firstName, lastName, title, genre, seriesNumber, series, length, year
                      FROM books
                      LEFT JOIN authors
                          ON books.authorId=authors.authorId
                      LEFT JOIN genres
                          ON books.genreId=genres.genreId
                      LEFT JOIN series
                          ON books.seriesId=series.seriesId
                      ORDER BY lastName";
                      
                      $result = mysqli_query($conn, $sql) or die("bad query: $sql");
                      
                      while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['lastName']}</td>
                            <td>{$row['firstName']}</td>
                            <td><em>{$row['title']}</em></td>
                            <td>{$row['series']}</td>
                            <td>{$row['seriesNumber']}</td>
                            <td>{$row['length']}</td>
                            <td>{$row['year']}</td>
                            <td>{$row['genre']}</td>
                        </tr>";
                      };
                      
                      ?>
                  </tbody>
              </table>
              <hr>
          </div>
      </div>
      
</body>
</html>