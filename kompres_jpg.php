<form action="kompres_jpg.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
<?php 
// Fungsi untuk kompres gamber sebelum upload
function compressImage($source, $destination, $quality) { 
    // mendapatkan info image
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime'];  
    // membuat image baru
    switch($mime){ 
    // proses kode memilih tipe tipe image 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
      
    // Menyimpan image dengan ukuran yang baru
    imagejpeg($image, $destination, $quality); 
      
    // Return image
    return $destination; 
} 
  
  
// ini adalah path folder upload yang sudah kita buat
$uploadPath = "images/"; 
  
// jika form upload file sudah di submit :
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // File info 
        $fileName = basename($_FILES["image"]["name"]); 
        $imageUploadPath = $uploadPath . $fileName; 
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
          
        // Tipe format yang diperbolehkan 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source 
            $imageTemp = $_FILES["image"]["tmp_name"]; 
              
            // Ukuran Kompresi 75 (bisa diganti dengan yang lain)
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 75); 
              
            if($compressedImage){ 
                $status = 'success'; 
                $statusMsg = "Gambar Sukses Dikompresi"; 
            }else{ 
                $statusMsg = "Gambar Gagal Dikompresi!"; 
            } 
        }else{ 
            $statusMsg = 'Maaf, hanya JPG, JPEG, PNG, & GIF yang diperbolehkan.'; 
        } 
    }else{ 
        $statusMsg = 'Mohon pilih file untuk di upload'; 
    } 
} 
  
// Menampilkan pesan status
echo $statusMsg; 
  
?>