<!DOCTYPE html>
<html>

<head>
   <title>Form trong PHP</title>
</head>

<body>
   <h1>Bảng Điểm</h1>
   <form method="POST" action="">
      <table>
         <!-- Form input cho 5 học sinh -->
         <tr>
            <td style ="font-size:20px">Tên:</td>
            <td><input type="text" name="name[]"></td>
            <td style ="font-size:20px">Điểm:</td>
            <td><input type="number" name="diem[]"></td>
         </tr>
         <tr>
            <td style ="font-size:20px">Tên:</td>
            <td><input type="text" name="name[]"></td>
            <td style ="font-size:20px">Điểm:</td>
            <td ><input type="number" name="diem[]"></td>
         </tr>
         <tr>
            <td style ="font-size:20px">Tên:</td>
            <td><input type="text" name="name[]"></td>
            <td style ="font-size:20px">Điểm:</td>
            <td><input type="number" name="diem[]"></td>
         </tr>
         <tr>
            <td style ="font-size:20px">Tên:</td>
            <td><input type="text" name="name[]"></td>
            <td style ="font-size:20px">Điểm:</td>
            <td><input type="number" name="diem[]"></td>
         </tr>
         <tr>
            <td style ="font-size:20px">Tên:</td>
            <td><input type="text" name="name[]"></td>
            <td style ="font-size:20px">Điểm:</td>
            <td><input type="number" name="diem[]"></td>
         </tr>
         <tr>
            <td  colspan="4"><input style="font-size:20px; color:white; background-color:red ; padding : 20px; width: 300px ; margin-top: 50px;" type="submit" name="submit" value="Gửi"></td>
         </tr>
      </table>
   </form>
</body>

</html>


<?php

function xepLoai($diem) {
    if ($diem >= 80) {
        return "Xuất sắc";
    } elseif ($diem >= 65) {
        return "Khá";
    } elseif ($diem >= 50) {
        return "Trung bình";
    } else {
        return "Yếu";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $names = $_POST['name'];
        $score = $_POST['diem'];

        $student = array();

        for ($i = 0; $i < count($names); $i++) {
            $name = test_input($names[$i]);
            $diem = test_input($score[$i]);
           
                $student[$name] = $diem;
            
        }

 if ($student) 
 {
            arsort($student);
            echo "<h2>Kết Quả</h2>";
            echo "<table border='1' cellspacing='0' cellpadding='10'>";
            echo "<tr><th>Tên</th><th>Điểm</th><th>Xếp loại</th></tr>";

            $tongdiem = 0;
            foreach ($student as $name => $diem) {
                $tongdiem += $diem;
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$diem</td>";
                echo "<td>" . xepLoai($diem) . "</td>";
                echo "</tr>";
 }

            
                $diem_trung_binh = $tongdiem / count($student);
                echo "<tr><td colspan='3'>Điểm trung bình nguyên đám: " . number_format($diem_trung_binh, 2) . "</td></tr>";
            

           
        }

    }
   
   
?>


