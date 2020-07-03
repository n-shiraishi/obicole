window.addEventListener("DOMContentLoaded", function(){
    var count = null,
    lest = null,
    max = 400,
    input_area = document.getElementById("textArea"),
    output_count = document.getElementById("textCount"),
    output_lest = document.getElementById("textLest"),
    attention = document.getElementById("textAttention");

    input_area.onkeyup = function(){
        var length = input_area.value.length;
        count = length;
        lest =  max - length;
        output_lest.innerText = lest;
        output_count.innerText = count;
        attention.style.display = ( length > max ) ? "block" : "none";
    }
}, false);

window.addEventListener("DOMContentLoaded", function(){
    var count = null,
    lest = null,
    max = 50,
    input_area = document.getElementById("titleArea"),
    output_count = document.getElementById("titleCount"),
    output_lest = document.getElementById("titleLest"),
    attention = document.getElementById("titleAttention");

    input_area.onkeyup = function(){
        var length = input_area.value.length;
        count = length;
        lest =  max - length;
        output_lest.innerText = lest;
        output_count.innerText = count;
        attention.style.display = ( length > max ) ? "block" : "none";
    }
}, false);



document.addEventListener('DOMContentLoaded', function() {
  // -----------------------
  // 20文字以下の入力チェック
  // -----------------------
  var targets = document.getElementsByClassName('name');
  for (var i=0 ; i<targets.length ; i++) {
    targets[i].onchange = function () {
      var alertelement = this.parentNode.getElementsByClassName('alertarea');
      if( this.value.trim().length > 20 ) {
        if( alertelement[0] ) { alertelement[0].innerHTML = "20文字以内で入力してください。"; }
      }
      else {
        if( alertelement[0] ) { alertelement[0].innerHTML = ""; }
      }
    }
  }
  // -----------------------
  // メールアドレスの入力チェック
  // -----------------------
  var targets = document.getElementsByClassName('mail');
  for (var i=0 ; i<targets.length ; i++) {
    targets[i].onchange = function () {
      var alertelement = this.parentNode.getElementsByClassName('alertarea');
      if ( !document.form1.email.value.match(/^[A-Za-z0-9]+[\w-]+@[\w\.-]+\.\w{2,}$/)) {
        if( alertelement[0] ) { alertelement[0].innerHTML = "メールアドレスをご確認ください。"; }
      }
      else {
        if( alertelement[0] ) { alertelement[0].innerHTML = ""; }
      }
    }
  }
  // -----------------------
  // 6文字以上の入力チェック
  // -----------------------
  var targets = document.getElementsByClassName('password');
  for (var i=0 ; i<targets.length ; i++) {
    targets[i].onchange = function () {
      var alertelement = this.parentNode.getElementsByClassName('alertarea');
      if( this.value.trim().length < 6 ) {
        if( alertelement[0] ) { alertelement[0].innerHTML = "6文字以上で入力してください。"; }
      }
      else {
        if( alertelement[0] ) { alertelement[0].innerHTML = ""; }
      }
    }
  }
  // -----------------------
  //  パスワード一致チェック
  // -----------------------
  var comparison = document.getElementsByClassName('password');
  var targets = document.getElementsByClassName('confirmation');
  for (var i=0 ; i<targets.length ; i++) {
    targets[i].onchange = function () {
      var alertelement = this.parentNode.getElementsByClassName('alertarea');
      if( targets != comparison ) {
        if( alertelement[0] ) { alertelement[0].innerHTML = "パスワードが一致していません。"; }
      }
      else {
        if( alertelement[0] ) { alertelement[0].innerHTML = ""; }
      }
    }
  }
});