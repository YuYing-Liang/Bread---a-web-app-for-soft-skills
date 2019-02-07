document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems, 'edge');
});

function q_answer(){
  var x = document.getElementById("ans");
  x.style.display = 'block';
}

function verify_ct(){
  var ans = document.getElementById("response").value;
  var ans_ct = document.getElementById("ans_ct");
  var x = document.getElementById("ans");

  if(!(x.style.display === 'block')){
    alert("Please answer knowledge question first.");
  }else{
    if(!ans || ans.length === 0){
      alert("Please answer the critical thinking question.");
    }else{
      ans_ct.style.display = 'block';
    }
  }
}
