<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Page</title>
    <style>
        /* Style the form container */
#myForm {
  width: 300px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f4f4f4;
  border-radius: 5px;
}

/* Style the form headings */
h1 {
  text-align: center;
  color: #333;
}

/* Style form input fields */
input[type="text"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Style form labels */
label {
  font-weight: bold;
}

/* Style the form buttons */
button {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  background-color: #007bff;
  color: #fff;
}

/* Style the reset button */
button[type="reset"] {
  background-color: #dc3545;
}

/* Style the link */
a.mod {
  display: block;
  text-align: center;
  margin-top: 20px;
  color: #007bff;
  text-decoration: none;
}

a.mod:hover {
  text-decoration: underline;
}

    </style>
   
</head>
<body>
    <form id="myForm">
        <h1>Kenut Store</h1>
        <div>
            <label for="item">Items </label>
            <input type="text" name="item" id="item" placeholder="Item">
        </div>
        
        <div>
            <label for="open">Opening Stock</label>
            <input type="text" name="open" id="open" placeholder="Opening Stock">
        </div>
        
        <div>
            <label for="in">Total Stock In</label>
            <input type="text" name="in" id="in" placeholder="Total Stock In">
        </div>
        <div>
            <label for="out">Total Stock out</label>
            <input type="text" name="out" id="out" placeholder="Total Stock out">
        </div>
        <div>
            <label for="stock">Remaining Stock</label>
            <input type="text" name="stock" id="stock" placeholder="Total Stock out">
        </div>
        
        <div>
            <button type="submit">Submit</button>
            <br><br>
            <button type="reset">Reset</button>
            
        </div>
        <a href="view.php" class="mod">Modify Records</a>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(e) {
                e.preventDefault();

                const formData = $(this).serialize();

                console.log(formData);

                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error, xhr, status) {
                        console.log("Error!");
                    }
                });
            });
        });
    </script>
</body>
</html>
