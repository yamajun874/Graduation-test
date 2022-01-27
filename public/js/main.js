// javascript接続確認
const ttl = document.getElementById("ttl");
console.log(ttl);

const menu = document.getElementById('menu');
menu.addEventListener('click', function () {
  menu.classList.toggle('open');
  const nav = document.getElementById('nav');
  nav.classList.toggle('in');
})

// // 店舗一覧ページのリアルタイム検索表示
// const search = document.getElementById('search');
// console.log(search);
// search.addEventListener('change', function () {
//   // const areaName = document.getElementById('areaName');
//   console.log(search.areaName.value);
//   console.log(search.genreName.value);
//   console.log(search.shopName.value);
//   // const items = [search.areaName.value, search.genreName.value, search.shopName.value];
//   search.submit();
// })

