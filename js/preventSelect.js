function preventSelect() {
  var owner     = document.getElementById('owner');
  var customer  = document.getElementById('customer');
  //var jobRef    = document.getElementById('jobRef');
  //var hours     = document.getElementById('hours');
  //var date      = document.getElementById('date');
  //var submit    = document.getElementById('submit');

  if(owner.options[owner.selectedIndex].value != "nothingOwner") {
    console.console.log("checking if an owner is selected");
    customer.removeAttribute("disabled");
  }

}

window.onload =  preventSelect();