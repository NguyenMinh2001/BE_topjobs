<!DOCTYPE html>
<html>
<head>
  <title>Danh sách ứng viên</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* CSS styles */
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      line-height: 1.5;
      margin: 0;
      padding: 0;
    }
    h1 {
      margin-top: 0;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: left;
      vertical-align: top;
    }
    th {
      background-color: #eee;
      font-weight: bold;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #ff6a00;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
      }
  </style>
</head>
<body>
  <h1>Danh sách ứng viên</h1>
  <table>
    <thead>
      <tr>
        <th>Họ tên</th>
        <th>Email</th>
        <th>lời nhắn</th>
        <th>CV</th>
      </tr>
    </thead>
    <tbody>
    @foreach($applications as $application)
      <tr>
        <td>{{$application->full_name}}</td>
        <td>{{$application->email}}</td>
        <td>{{$application->description}}</td>
        <td><a href="{{$application->resume}}" type="button" class="button">Xem CV</a></td>
      </tr>
    @endforeach
      <!-- Thêm các thông tin ứng viên khác vào đây -->
    </tbody>
  </table>
</body>
</html>
