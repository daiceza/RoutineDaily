var confirmDelete=function () {
  var checked = confirm("本当に削除しますか？");
  if (checked == true) {
          return true;
      } else {
          return false;
      }
}