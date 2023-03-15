<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thông tin công việc</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        line-height: 1.5;
        color: #333;
      }
      h1 {
        font-size: 24px;
        margin-bottom: 10px;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
      }
      th {
        text-align: left;
        background-color: #f2f2f2;
        padding: 10px;
      }
      td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
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
    <h1>Thông tin công việc</h1>
    <table>
      <tr>
        <th>Tên công việc:</th>
        <td>{{$job['title']}}</td>
      </tr>
      <tr>
        <th>Mô tả công việc:</th>
        <td>
          <p>

            @php echo nl2br($job['description']) @endphp
          </p>
        </td>
      </tr>
      <tr>
        <th>Yêu cầu kỹ năng:</th>
        <td>
          <p>
            @php echo nl2br($job['requirement']) @endphp
          </p>
        </td>
      </tr>
      <tr>
        <th>Lương:</th>
        <td><p >{{$job['salary']}}</p></td>
      </tr>
      <tr>
        <th>Địa điểm làm việc:</th>
        <td> {{$job['location']}}</td>
      </tr>
    </table>
    <p>
      Nếu bạn quan tâm đến công việc này, vui lòng nhấn vào nút bên dưới để
      ứng tuyển:
    </p>
    <p>
      <a href="#" class="button">Ứng tuyển</a>
    </p>
  </body>
</html>
