<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweet add</title>
</head>
<body>
    <div class="container">
        <h2>Tweet add</h2>

        <form action="home.blade.php" method="post">
            <div class="form-group">
                <label for="isi_postingan">Tweet</label>
                <textarea name="isi_posting" id="isi_posting" cols="30" rows="5" class="form-control" placeholder="Ketik sesuatu..."></textarea>
            </div>
            <div class="form-group">
                <label for="gambar_posting">Foto (Optional)</label>
                <input type="file" name="gambar_posting" id="gambar_posting" class="form-control">
            </div>
            <div class="form-group">
                <label for="file_posting">Foto (Optional)</label>
                <input type="file" name="file_posting" id="file_posting" class="form-control">
            </div>
        </form>
    </div>
    
</body>
</html>