<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 Page Not Found</title>
  <style>
    body {
      color: white;
      height: 100%;
      background: url(https://cdn.discordapp.com/attachments/765554524886401054/847731093154037770/large_thumbnail.jpg);
      font-family: 'Ubuntu Condensed', sans-serif;
      padding: 0;
      margin: 0;
    }

    #ame {
      width: 173px;
      height: 179px;
    }

    .main {
      width: 100%;
      height: 100vh;
      position: relative;
      overflow: hidden;
    }

    .title-404 {
      font-size: 10rem;
      color: #fff;
      position: absolute;
      bottom: 50%;
      left: 0;
      right: 0;
      letter-spacing: 0.5rem;
      text-align: center;
      z-index: 100;
    }

    .title-404 .small-title {
      font-size: 12px !important;
      margin: 2px;
      letter-spacing: 0.3rem;
    }

    .x {
      animation: x 13s linear infinite alternate;
    }

    .y {
      animation: y 7s linear infinite alternate;
    }

    @keyframes x {
      100% {
        transform: translateX(calc(100vw - 173px));
      }
    }

    @keyframes y {
      100% {
        transform: translateY(calc(100vh - 179px));
      }
    }

    a {
      text-decoration: none;
      color: #fff;
    }

    a:hover {
      color: #ff0;
    }
  </style>
</head>

<body>
  <div class="main">
    <div class="title-404">
      404
      <div class="small-title">Tôi là ai? Đây là đâu?</div>
      <div class="small-title"><a href="/">Nhấn vào đây để quay về trang chủ</a></div>
    </div>
    <div class="x">
      <img class="y" src="https://cdn.discordapp.com/attachments/811850529965080587/847732286903287818/loader.gif" alt="amespin" id="ame" />
    </div>
  </div>
</body>

</html>