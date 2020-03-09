<form class="container" action="/store" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Vārds, uzvārds:</label>
        <input type="text" class="<?php echo $_SESSION['inputField'] ?? "form-control";?>" name="name"
               value="<?php echo $_SESSION['name']; ?>"
    </div>

    <div class="form-group">
        <label for="birthdate">Dzimšanas datums:</label>
        <input type="date" class="<?php echo $_SESSION['dateField']?? "form-control";?>" name="birthdate"
               value="<?php echo $_SESSION['birthdate']; ?>"
    </div>

    <div class="form-group">
        <input type="file" name="photo">
    </div>

    <button type="submit" class="btn btn-primary btn-md btn-block" name="submit">NOSŪTĪT</button>
</form>




