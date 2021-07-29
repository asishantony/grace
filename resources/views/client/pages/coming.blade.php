<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
  font-family: 'montserrat', sans-serif;
}

body {
  margin: 0;
  padding: 0;
}

.page {
  background: #f1f1f1;
  display: flex;
  flex-wrap: wrap;
}

.col {
  flex: 1;
  height: 100vh;
  position: relative;
}

.countdown-col {
  background: url(https://fadzrinmadu.github.io/hosted-assets/responsive-coming-soon-page-with-awesome-newsletter-html-css-and-js/bg.png) no-repeat center;
  background-size: cover;
}

.time {
  color: #fff;
  text-transform: uppercase;
  width: 90%;
  display: flex;
  justify-content: center;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.time span {
  padding: 0 14px;
  font-size: 10px;
}

.time span div {
  font-size: 40px;
}

.newslatter {
  width: 90%;
}

.newslatter h4 {
  font-style: italic;
  font-size: 12px;
}

.newslatter input, .newslatter button {
  display: block;
  margin: 12px auto;
  width: 100%;
  max-width: 400px;
  box-sizing: border-box;
  padding: 14px 20px;
  border-radius: 30px;
  border: 1px solid #ddd;
  outline: none;
}

.newslatter-button {
  background: linear-gradient(125deg, #3498db, #34495e);
  color: #fff;
  cursor: pointer;
  transition: 0.4s;
}

.newslatter-button:hover {
  opacity: 0.7;
}


@media screen and (max-width: 900px) {
  .col {
    flex: 100%;
  }
}
    </style>
</head>
<body>
    <div class="page">
        <div class="countdown-col col">
          <div class="time middle">
            <span><div id="days">12</div> Days</span>
            <span><div id="hours">06</div> Hours</span>
            <span><div id="minutes">35</div> Minutes</span>
            <span><div id="seconds">54</div> Seconds</span>
          </div>
        </div>
        </div>
      </div>
      <script>
          let comingDate = new Date('Jul 31, 2021 10:00:00')

let d = document.getElementById('days')
let h = document.getElementById('hours')
let m = document.getElementById('minutes')
let s = document.getElementById('seconds')

let x = setInterval(function() {
  let now = new Date()
  let selisih = comingDate.getTime() - now.getTime()

  let days    = Math.floor(selisih / (1000 * 60 * 60 * 24))
  let hours   = Math.floor(selisih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60))
  let minutes = Math.floor(selisih % (1000 * 60 * 60) / (1000 * 60))
  let seconds = Math.floor(selisih % (1000 * 60) / 1000)

  d.innerHTML = getTrueNumber(days)
  h.innerHTML = getTrueNumber(hours)
  m.innerHTML = getTrueNumber(minutes)
  s.innerHTML = getTrueNumber(seconds)

  if (selisih < 0) {
    clearInterval(x)
    d.innerHTML = '00'
    h.innerHTML = '00'
    m.innerHTML = '00'
    s.innerHTML = '00'
  }
}, 1000)

function getTrueNumber(x) {
  if (x < 10) return '0' + x
  else return x
}
      </script>
</body>
</html>
