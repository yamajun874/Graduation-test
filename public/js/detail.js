// javascript接続確認
const ttl = document.getElementById("ttl");
console.log(ttl);

const menu = document.getElementById('menu');
menu.addEventListener('click', function () {
  menu.classList.toggle('open');
  const nav = document.getElementById('nav');
  nav.classList.toggle('in');
})

// dateの値取得、表示
const date = document.getElementById('date');
date.addEventListener('change', function () {
  const dateCopy = document.getElementById('dateCopy');
  dateCopy.innerText = date.value;
})

// timeの値取得、表示
const time = document.getElementById('time');
time.addEventListener('input', function () {
  const timeCopy = document.getElementById('timeCopy');
  timeCopy.innerText = time.value;
})

// numberの値取得、表示
const number = document.getElementById('number');
number.addEventListener('change', function () {
  const numberCopy = document.getElementById('numberCopy');
  numberCopy.innerText = number.value + '人';
})

