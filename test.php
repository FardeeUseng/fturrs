<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Park the cars</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4>ชื่อผู้ใช้รถ</h4>
                        <p>Fardee Useng</p>
                        <h4>ป้ายทะเบียน</h4>
                        <p>bkk2020</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-center">
                    <form action="#">
                        <div class="mt-3">
                            <h3>บันทึกการทำผิด</h3>
                        </div>
                        <div class="my-4">
                            <input type="checkbox" name="mistake[]">
                            <input type="checkbox" name="mistake[]">
                            <input type="checkbox" name="mistake[]">
                        </div>
                        <bottom class="btn btn-success mb-4">บันทึก</bottom>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>